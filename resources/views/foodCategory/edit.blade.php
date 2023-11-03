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
<form method="post" action="{{route('foodCategories.update',$category)}}">
    @csrf
    @method('put')
    <input type="text" name="name" value="{{$category->name}}" >
    <input type="submit">
</form>
</body>
</html>
