<!DOCTYPE html>
<html lang="en"  dir="rtl" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>لیست سفارشات</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-pink-100 flex items-center justify-center h-screen">
<div class="container mx-auto">
    <h2 class="text-2xl flex justify-center font-bold mb-4">گزارشات</h2>
    <table class="w-full bg-white p-4 shadow-md border rounded-lg overflow-hidden">
        <thead>
        <tr>
            <th class="p-4 border">ردیف</th>
            <th class="p-4 border">شماره سفارش</th>
            <th class="p-4 border">نام مشتری</th>
            <th class="p-4 border">نام رستوران</th>
            <th class="p-4 border">هزینه پرداختی</th>
            <th class="p-4 border">تاریخ ایجاد</th>
            {{--            <th class="p-4 border">تاریخ بروز رسانی</th>--}}


        </tr>
        </thead>
        <tbody>
        @php
            use Illuminate\Support\Facades\Auth;$counter = 1;
        @endphp
        @foreach($orders as $order)

                <tr>
                    <td class="p-4 border">{{ $counter++ }}</td>
                    <td class="p-4 border ">{{ $order->id }}</td>
                    <td class="p-4 border ">{{ $order->user->name }}</td>
                    <td class="p-4 border">{{ $order->restaurant->name }}</td>
                    <td class="p-4 border">{{ $order->total_price }}</td>
                    {{--                    <td class="p-4 border">{{ ($order->status) }}</td>--}}

                                        <td class="p-4 border">{{ $order->created_at }}</td>
                    {{--                    <td class="p-4 border">{{ $order->updated_at }}</td>--}}

                </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        <p class="text-lg font-bold">
            جمع کل مبلغ پرداختی: {{ $totalPriceSum }}
        </p>
    </div>
    <div class="mt-4">
        <a href="{{ route('dashboard') }}">
            <button class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">
                {{ __('داشبورد') }}
            </button>
        </a>
    </div>
</div>
</body>

</html>
