<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-pink-100 flex items-center justify-center h-screen">
<form method="post" action="{{route('foodCategories.store')}}">
    @csrf
    @error('name')
    {{$message}}
    @enderror
    <input type="text" name="name" >
    <input type="submit">
</form>
<a href="{{route('dashboard')}}" class="ml-4">
    <button class="bg-pink-500 hover-bg-pink-700 text-white font-bold py-2 px-4 rounded">
        {{ __('داشبورد') }}
    </button>
</a>
</body>
</html>
