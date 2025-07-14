<!DOCTYPE html>
<html>
<head>
    <title>Редактировать пост</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>
<body>
    <div class="container mx-auto p-4">
<h1>Редактировать пост</h1>

<form action="/posts/{{ $post->id }}" method="POST">
    @csrf
    @method('PUT') <!-- Указываем, что это PUT-запрос -->

    <div >
        <div>
            <label for="theme" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Заголовок:</label>
            <input type="text"  name="theme" id="theme" class="form-control" value="{{ old('title', $post->theme) }}" required />
        </div>
    </div>

    <div>
        <label for="content">Текст:</label>
        <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                    <label for="editor" class="sr-only">Publish post</label>
                    <textarea  name="post" id="post" rows="8" class="form-control" placeholder="Write an article..." required >{{ old('content', $post->post) }}</textarea>
                </div>
        </div>
    </div>
    <div>
        <label for="published_at">Дата публикации:</label>
        <input type="datetime-local" name="time_for_posted" id="time_for_posted" class="border-blue-500 border-2 border-solid"
               value="{{ old('time_for_posted', optional($post->published_at)->format('Y-m-d\TH:i')) }}">
    </div>
    <button type="submit" class="btn btn-primary mt-5">Обновить</button>
</form>

<br>
<a href="/posts" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Назад к списку</a>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ru.js "></script>

    <script>
        flatpickr("#time_for_posted", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true,
            defaultDate: new Date(),
            minDate: "today",
            locale: "ru",
            altInput: true,
            altFormat: "d.m.Y H:i"
        });
    </script>
</body>
</html>
