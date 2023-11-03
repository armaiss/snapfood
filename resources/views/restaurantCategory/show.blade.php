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
<table class="w-full max-w-md mx-auto">
    <thead>
    <tr>
        <th scope="col" class="px-6 py-3">
            ID
        </th>
        <th scope="col" class="px-6 py-3">
            Name
        </th>
    </tr>
    </thead>
    <tbody>
    <tr class="bg-white dark:bg-white">
        <th scope="row" class="px-6 py-4 font-medium text-pink-500 whitespace-nowrap dark:text-pink-500">
            {{$category->id}}
        </th>
        <td class="px-6 py-4">
            {{$category->name}}
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
