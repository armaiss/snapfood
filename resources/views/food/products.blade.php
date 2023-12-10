<!doctype html>
<html lang="en"  dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-pink-100">
<div class="min-w-full flex bg-white mb-4 border-gray-300 shadow-md rounded-md overflow-hidden">

<form action="" method="get" class=" bg-white p-4 rounded shadow-md flex items-center w-1/2">
    <label for="filter_food" class=" w-1/2 text-gray-700 text-sm font-bold mb-2">فیلتر بر اساس غذا:</label>
    <select id="filter_food" name="filter_food" class="w-1/2 p-2 border border-gray-300 rounded">
        <option value="">همه</option>
        @foreach($foods as $food)
            <option value="{{$food->id}}">{{$food->name}}</option>
        @endforeach
    </select>
    <button type="submit" class="bg-pink-500 text-white p-2 mr-2 rounded w-1/4 ">اعمال فیلتر</button>
</form>

    <form action="" method="get" class=" bg-white p-4 rounded shadow-md flex items-center w-1/2">
        <label for="filter_category" class=" w-1/2 text-gray-700 text-sm font-bold mb-2">فیلتر بر اساس دسته بندی :</label>
        <select id="filter_category" name="filter_category" class="w-1/2 p-2 border border-gray-300 rounded">
            <option value="">همه</option>
            @foreach($foodCategories as $foodCategory)
                <option value="{{$foodCategory->id}}">{{$foodCategory->name}}</option>
            @endforeach
        </select>
        <button type="submit" class="bg-pink-500 text-white p-2 mr-2 rounded w-1/4 ">اعمال فیلتر</button>
    </form>
</div>
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
                    <form action="{{ route('comment.store') }}" method="post">
                        @csrf

                        <label for="comment"> دیدگاه:</label><br>
                        <textarea name="comment" id="comment" rows="4" cols="50"></textarea><br>
                        <input class="bg-pink-500 hover-bg-pink-700 text-white font-bold py-2 px-4 m-2 rounded"  type="submit" value="ثبت دیدگاه">
                    </form>

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
