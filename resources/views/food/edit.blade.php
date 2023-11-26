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
<body>
<div class="bg-white p-6 sm:p-8 sm:rounded-lg shadow">
    <form method="POST" action="{{ route('foods.update', $food) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-pink-700 text-sm font-medium">Name</label>
            <input id="name" class="block mt-1 w-full border border-pink-300 rounded px-3 py-2" type="text" name="name" value="{{ $food->name }}">
        </div>

        <!-- Discount -->
        <div class="mb-4">
            <label for="discount" class="block text-pink-700 text-sm font-medium">Discount</label>
            <input id="discount" class="block mt-1 w-full border border-pink-300 rounded px-3 py-2" type="text" name="discount" value="{{ $food->discount }}">
        </div>

        <!-- Materials -->
        <div class="mb-4">
            <label for="materials" class="block text-pink-700 text-sm font-medium">Materials</label>
            <input id="materials" class="block mt-1 w-full border border-pink-300 rounded px-3 py-2" type="text" name="materials" value="{{ $food->materials }}">
        </div>

        <!-- Price -->
        <div class="mb-4">
            <label for="price" class="block text-pink-700 text-sm font-medium">Price</label>
            <input id="price" class="block mt-1 w-full border border-pink-300 rounded px-3 py-2" type="text" name="price" value="{{ $food->price }}">
        </div>

        <!-- Category -->
        <div class="mb-4">
            <label for="category" class="block text-pink-700 text-sm font-medium">Category</label>
            <select id="category" class="block mt-1 w-full border border-pink-300 rounded px-3 py-2" type="text" name="food_category_id">
                @foreach(\App\Models\FoodCategory::all() as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <!-- Image -->
        <div class="mb-4">
            <label for="image" class="block text-pink-700 text-sm font-medium">Image</label>
            <input id="image" class="block mt-1 w-full border border-pink-300 rounded px-3 py-2" type="file" name="image">
            @if($food->image)
                <img src="{{ asset('images/'.$food->image) }}" alt="{{ $food->name }}" class="mt-2">
            @endif
        </div>


        <input type="hidden" name="restaurant_id" value="{{ Auth::user()->restaurant->id }}">

        <div class="flex items-center justify-end mt-4">
            <button class="bg-pink-500 text-white px-4 py-2 rounded">Submit</button>
        </div>
    </form>

</div>
<a href="{{route('dashboard')}}" class="ml-4">
    <button class="bg-pink-500 hover-bg-pink-700 text-white font-bold py-2 px-4 rounded">
        {{ __('داشبورد') }}
    </button>
</a>
</body>
</html>
