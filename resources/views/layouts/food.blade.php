<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <div class="text-center mb-4">
        @if($food->image)
            <img src="{{ asset('images/' . $food->image) }}" alt="{{ $food->name }}" class="w-32 h-32 mx-auto mb-4">
        @else
            <span>No Image</span>
        @endif
    </div>
    <div class="mb-4">
        <strong class="text-pink-700">نام:</strong> {{ $food->name }}
    </div>
    <div class="mb-4">
        <strong class="text-pink-700">مواد تشکیل دهنده:</strong> {{ $food->materials }}
    </div>
    <div class="mb-4">
        <strong class="text-pink-700">قیمت:</strong> {{ $food->price }}
    </div>
    <div class="mb-4">
        <strong class="text-pink-700">دسته بندی:</strong> {{ $food->foodCategory->name }}
    </div>
    <div class="mb-4">
        <strong class="text-pink-700">تخفیف:</strong> {{ $food->discount }}
    </div>
    <div class="mb-4">
        <strong class="text-pink-700">رستوران:</strong> {{ $food->restaurant->name }}
    </div>
</head>
<body>
<div class="container">
    @yield('content')
</div>
</body>
</html>
