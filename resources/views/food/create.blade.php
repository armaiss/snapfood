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
<layout>
    <div class="sm:p-8 bg-white shadow sm:rounded-lg p-6">
        <form method="POST" action="{{ route('foods.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block font-medium text-sm text-pink-700">Name</label>
                <input id="name" class="block mt-1 w-full border border-pink-300 rounded px-3 py-2" type="text" name="name"
                    />
                <!-- error :messages="$errors->get('name')" class="mt-2" -->
            </div>
            <!-- Materials -->
            <div>
                <label for="materials" class="block font-medium text-sm text-pink-700">Materials</label>
                <input id="materials" class="block mt-1 w-full border border-pink-300 rounded px-3 py-2" type="text" name="materials"
                      />
                <!-- error :messages="$errors->get('materials')" class="mt-2" -->
            </div>
            <!-- Price -->
            <div>
                <label for="price" class="block font-medium text-sm text-pink-700">Price</label>
                <input id="price" class="block mt-1 w-full border border-pink-300 rounded px-3 py-2" type="text" name="price"
                      />
                <!-- error :messages="$errors->get('price')" class="mt-2" -->
            </div>

            <!-- Category -->
            <div>
                <label for="category" class="block font-medium text-sm text-pink-700">Category</label>
                <select id="category" class="block mt-1 w-full border border-pink-300 rounded px-3 py-2" type="text" name="food_category_id">
                    @foreach(\App\Models\FoodCategory::all() as $category)
                        <option value="{{$category->id}}"> {{$category->name}}</option>
                    @endforeach
                </select>
                <!-- error :messages="$errors->get('food_category_id')" class="mt-2" -->
            </div>

            <input type="hidden" name="restaurant_id" value="{{Auth::user()->restaurant->id}}">

            <div class="flex items-center justify-end mt-4">
                <button class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Create') }}
                </button>
            </div>
        </form>
    </div>
</layout>
