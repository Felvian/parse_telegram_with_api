<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$post->theme}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mx-auto p-4">
        <div class="py-5"><h1 class="font-bold text-2xl">{{ $post->theme }}</h1></div>

        <pre style="white-space: pre-wrap;">{{ $post->post }}</pre>
        @foreach(explode(',', $post->url) as $link)
            @php
                $trimmedLink = trim($link); // Убираем лишние пробелы
            @endphp
            <a href="{{ $trimmedLink }}" target="_blank">{{ $trimmedLink }}</a><br>
        @endforeach
        <div class="py-5"></div><a href="/posts/{{ $post->id }}/edit"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Редактировать</a><br>
        <a href="/posts"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Назад к списку постов</a></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
