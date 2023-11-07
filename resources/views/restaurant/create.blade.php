<div class="max-w-screen-xl mx-auto h-screen overflow-y-auto">
    @php use App\Models\RestaurantCategory; use Illuminate\Support\Facades\Auth; @endphp
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-`edge">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="bg-pink-100 flex items-center justify-center">
    <x-app-layout>
        <div class="w-full mx-auto p-6 bg-white dark:bg-white">
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
            <form action="{{route('restaurants.store')}}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="restaurant_category_id" class="block text-sm font-medium text-pink-700">دسته بندی رستوران</label>
                    <select name="restaurant_category_id" id="restaurant_category_id"
                            class="mt-1 block w-full border border-pink-300 rounded px-3 py-2">
                        @foreach(RestaurantCategory::all() as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- بخش‌های دیگر فرم -->
                <div class="grid grid-cols-2 gap-4">
                    @foreach(['شنبه', 'یکشنبه', 'دوشنبه', 'سه شنبه', 'چهارشنبه', 'پنجشنبه', 'جمعه'] as $day)
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-pink-700">{{ $day }}</label>
                            <div class="grid grid-cols-2 gap-1">
                                <label for="{{ strtolower($day) }}_opening" class="text-sm text-pink-700">باز شدن</label>
                                <input id="{{ strtolower($day) }}_opening" type="time" name="{{ strtolower($day) }}_opening"
                                       class="border border-pink-300 rounded px-3 py-2">
                                <label for="{{ strtolower($day) }}_closing" class="text-sm text-pink-700">تعطیل شدن</label>
                                <input id="{{ strtolower($day) }}_closing" type="time" name="{{ strtolower($day) }}_closing"
                                       class="border border-pink-300 rounded px-3 py-2">
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- پایان بخش‌های دیگر فرم -->
                <div class="flex items-center justify-between mt-6">
                    <button type="submit" class="bg-pink-500 hover:bg-pink-700 text-black font-bold py-2 px-4 rounded">
                        {{ __('ثبت') }}
                    </button>
                </div>
            </form>
        </div>
    </x-app-layout>
    </body>
    </html>
</div>
