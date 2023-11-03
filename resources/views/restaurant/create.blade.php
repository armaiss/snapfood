@php use App\Models\RestaurantCategory;use Illuminate\Support\Facades\Auth; @endphp
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
<x-app-layout>
    <div class="w-full max-w-md mx-auto p-6 bg-white dark:bg-white">
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
        <form action="{{route('restaurants.store')}}" method="post">
            @csrf
            <div class="mb-4">
                <label for="restaurant_category_id" class="block text-sm font-medium text-pink-700">Restaurant
                    Category</label>
                <select name="restaurant_category_id" id="restaurant_category_id"
                        class="mt-1 block w-full border border-pink-300 rounded px-3 py-2">
                    @foreach(RestaurantCategory::all() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-pink-700">Name</label>
                <input id="name" class="mt-1 block w-full border border-pink-300 rounded px-3 py-2" type="text"
                       name="name"
                        autofocus autocomplete="name"/>
            </div>
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-pink-700">Address</label>
                <input id="address" class="mt-1 block w-full border border-pink-300 rounded px-3 py-2" type="text"
                       name="address"
                       autofocus autocomplete="address"/>
            </div>
            <div class="mb-4">
                <label for="telephone" class="block text-sm font-medium text-pink-700">Telephone</label>
                <input id="telephone" class="mt-1 block w-full border border-pink-300 rounded px-3 py-2" type="text"
                       name="telephone"
                       autofocus autocomplete="telephone"/>
            </div>
            <div class="mb-4">
                <label for="bank_account_number" class="block text-sm font-medium text-pink-700">Bank Account
                    Number</label>
                <input id="bank_account_number" class="mt-1 block w-full border border-pink-300 rounded px-3 py-2"
                       type="text" name="bank_account_number"
                        autofocus autocomplete="bank_account_number"/>
            </div>
            <div>
                <input id="user_id" type="hidden" name="user_id"
                       value="{{Auth::user()->id}}" autofocus autocomplete="user_id"/>
            </div>
            <div class="flex items-center justify-between mt-6">
                <button type="submit" class="bg-pink-500 hover:bg-pink-700 text-black font-bold py-2 px-4 rounded">
                    {{ __('Submit') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
</body>
