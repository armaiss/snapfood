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
        <table class="w-full bg-white p-6 shadow-md border rounded-lg overflow-hidden">
            <thead>
            <tr>
                <th class="p-4 border">ردیف</th>
                <th class="p-4 border">آیدی</th>
                <th class="p-4 border">نام رستوران</th>
                <th class="p-4 border">قیمت کل</th>
                <th class="p-4 border">تاریخ ایجاد</th>
                <th class="p-4 border">تاریخ بروز رسانی</th>
                <th class="p-4 border">وضعیت</th>
                <th class="p-4 border">عملیات</th>
            </tr>
            </thead>
            <tbody>
            @php
                $counter = 1;
            @endphp
            @foreach($orders as $order)
                @if($order->is_paid != 0)
                    <tr>
                        <td class="p-4 border">{{ $counter++ }}</td>
                        <td class="p-10 border flex justify-center align-bottom">{{ $order->id }}</td>
                        <td class="p-4 border">{{ $order->restaurant->name }}</td>
                        <td class="p-4 border">{{ $order->total_price }}</td>
                        <td class="p-4 border">{{ $order->created_at }}</td>
                        <td class="p-4 border">{{ $order->updated_at }}</td>
                        <td class="p-4 border">
                            <div class="flex mt-4">
                                <form action="{{ route('foods.destroy', $order) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">
                                        {{ __('حذف') }}
                                    </button>
                                </form>
                                <a href="{{ route('order.edit', $order) }}" class="ml-4">
                                    <button class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">
                                        {{ __('بروزرسانی وضعیت') }}
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </form>

</div>
<a href="{{route('dashboard')}}" class="ml-4">
    <button class="bg-pink-500 hover-bg-pink-700 text-white font-bold py-2 px-4 rounded">
        {{ __('داشبورد') }}
    </button>
</a>
</body>
</html>
