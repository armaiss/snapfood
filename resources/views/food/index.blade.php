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
<table class="bg-white p-6 shadow-md border">
    <tr>
        <th class="p-4 border">آیدی</th>
        <th class="p-4 border">نام</th>
        <th class="p-4 border">نوع</th>
        <th class="p-4 border">قیمت</th>
        <th class="p-4 border">تخفیف</th>
        <th class="p-4 border">عملیات</th>
    </tr>
    @foreach($foods as $food)
        <tr>
            <td class="p-10 border flex justify-center align-bottom">{{ $food->id }}</td>
            <td class="p-4 border">{{ $food->name }}</td>
            <td class="p-4 border">{{ $food->materials }}</td>
            <td class="p-4 border">{{ $food->price }}</td>
            <td class="p-4 border">{{ $food->discount }}</td>
            <td class="p-4 border">
                <div class="flex mt-4">
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
            </td>
        </tr>
    @endforeach
    <tr>
        <td>
            <a href="{{ route('foods.create') }}" class="ml-4">
                <button class="bg-pink-500 hover-bg-pink-700 text-white font-bold py-2 px-4 m-2 rounded">
                    {{ __('اضافه کردن غذا') }}
                </button>
            </a>
        </td>

    </tr>
</table>

</body>
</html>
