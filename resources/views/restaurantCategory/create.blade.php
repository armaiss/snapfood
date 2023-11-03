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
<form method="post" action="{{route('restaurantCategories.store')}}" class="w-full max-w-md mx-auto p-6">
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-pink-700">Name</label>
        <input type="text" name="name" id="name" class="mt-1 block w-full border border-pink-300 rounded px-3 py-2" />
    </div>
    <div class="flex items-center justify-between mt-6">
        <input type="submit" value="Submit" class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded" />
    </div>
</form>
</body>
</html>
