<?php

namespace App\Console;

use App\Models\Posts;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $now = now();

            // Получаем все посты, у которых время публикации <= сейчас и еще не отправлены
            $posts = Posts::where('time_for_posted', '<=', $now)
                ->whereNull('posted_at')
                ->get();

            foreach ($posts as $post) {
                $token = env('TELEGRAM_BOT_TOKEN');
                $chatId = env('TELEGRAM_CHANNEL_ID');

                if (!$token || !$chatId) {
                    Log::error("Отсутствуют TELEGRAM_BOT_TOKEN или TELEGRAM_CHANNEL_ID");
                    continue;
                }

                try {
                    $response = Http::withOptions(['verify' => false])->post(
                        "https://api.telegram.org/bot {$token}/sendMessage",
                        [
                            'chat_id' => $chatId,
                            'text' => "*{$post->theme}*\n\n{$post->post}",
                            'parse_mode' => 'Markdown',
                        ]
                    );

                    if ($response->successful()) {
                        // Помечаем пост как отправленный
                        $post->update(['posted_at' => now()]);
                    } else {
                        Log::error("Ошибка отправки в Telegram для поста #{$post->id}: " . $response->body());
                    }
                } catch (\Exception $e) {
                    Log::error("Исключение при отправке поста #{$post->id}: " . $e->getMessage());
                }
            }

        })->everyMinute()->description('Отправляет запланированные посты в Telegram');
    }


    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
