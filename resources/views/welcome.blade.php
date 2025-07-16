<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="table table-striped">
            <thead class="">
            <tr>
                <th scope="col" class="">
                    Тема
                </th>
                <th scope="col" class="">
                    Пост
                </th>
                 <th scope="col" class="">
                    Медиа
                </th>
                <th scope="col" class="">
                    Дата для выгрузки
                </th>
                <th scope="col" class="">
                    Выгружено
                </th>
                <th scope="col" class="">
                    <span class="sr-only">Открыть</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">
                    {{$post->theme}}
                </td>
                <td class="px-6 py-4">
                    {{$post->post}}
                </td>
                <td class="px-6 py-4">
                    @if ($post->media)
                        Есть
                    @else
                        Нет
                    @endif
                </td>
                <td class="px-6 py-4">
                    {{$post->time_for_posted}}
                </td>
                <td class="px-6 py-4">
                    @if ($post->posted_at)
                        Выгружено
                    @else
                        Не выгружено
                    @endif
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="/posts/{{$post->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Открыть</a>
                </td>
            </tr>

            @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>
