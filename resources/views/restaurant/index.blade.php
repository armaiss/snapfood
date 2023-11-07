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
<table class="bg-white p-6 shadow-md border">
    <tr>
        <th class="p-4 border">مدیر رستوران</th>
        <th class="p-4 border">نام رستوران</th>
        <th class="p-4 border">دسته بندی</th>
        <th class="p-4 border">تلفن</th>
        <th class="p-4 border">آدرس</th>
    </tr>
    @foreach($restaurants as $restaurant)
        <tr>

            <td class="p-4 border">{{ $restaurant->user_id }}</td>
            <td class="p-4 border">{{ $restaurant->name }}</td>
            <td class="p-4 border">{{ $restaurant->restaurantCategory->name }}</td>
            <td class="p-4 border">{{ $restaurant->telephone }}</td>
            <td class="p-4 border">{{ $restaurant->address }}</td>
            <td class="p-4 border">
            </td>
        </tr>
    @endforeach
</table>

</body>
</html>
