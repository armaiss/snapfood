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
<body class="bg-pink-100">
<div class="container mx-auto mt-8 p-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 overflow-y-auto">
        @foreach($foods as $food)
            <div class="bg-white p-6 shadow-md border min-w-0">
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
            <div class="flex justify-end">
                <form action="{{ route('foods.destroy', $food) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 m-2 rounded">
                        {{ __('حذف') }}
                    </button>
                </form>
                <a href="{{ route('foods.edit', $food) }}" class="ml-4">
                    <button class="bg-pink-500 hover-bg-pink-700 text-white font-bold py-2 px-4 m-2 rounded">
                        {{ __('ویرایش') }}
                    </button>
                </a>
            </div>
        </div>
    @endforeach
</div>
<div class="mt-8">
{{--    {{ $foods->links() }}--}}
</div>
</div>
</body>
</html>
