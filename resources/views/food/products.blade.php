<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-pink-100 flex items-center justify-center h-screen">

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <!-- Display Food Items -->
    @foreach($foods as $food)
        <div class="bg-white p-6 shadow-md border">
            <img src="{{ $food->image }}" alt="{{ $food->name }}" class="w-32 h-32 object-cover mx-auto mb-4">
            <div class="text-center">
                <p class="font-bold text-lg">{{ $food->name }}</p>
                <p class="text-sm">{{ $food->materials }}</p>
                <p class="text-sm">{{ $food->price }}</p>
            </div>
        </div>
    @endforeach
</div>

<!-- Category Filter Form -->
<form method="post" action="{{ route('categoryFilter') }}" class="form-group mt-4">
    @csrf
    <label for="categoryFilter">انتخاب دسته‌بندی:</label>
    <select name="categoryFilter" id="categoryFilter" class="form-control">
        @foreach($foodCategories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        اعمال
    </button>
</form>

</body>
</html>
