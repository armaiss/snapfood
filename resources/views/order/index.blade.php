<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>لیست سفارشات</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-pink-100 flex items-center justify-center h-screen">
<div class="container mx-auto">
    <h2 class="text-2xl flex justify-center font-bold mb-4">لیست سفارشات</h2>
    <table class="w-full bg-white p-6 shadow-md border rounded-lg overflow-hidden">
        <thead>
        <tr>
            <th class="p-4 border">ردیف</th>
            <th class="p-4 border">شماره سفارش</th>
            <th class="p-4 border">نام مشتری</th>
            <th class="p-4 border">نام رستوران</th>
            <th class="p-4 border">هزینه پرداختی</th>
            <th class="p-4 border">وضعیت</th>
            {{--            <th class="p-4 border">تاریخ ایجاد</th>--}}
            {{--            <th class="p-4 border">تاریخ بروز رسانی</th>--}}
            <th class="p-4 border">عملیات</th>

        </tr>
        </thead>
        <tbody>
        @php
            use Illuminate\Support\Facades\Auth;$counter = 1;
        @endphp
        @foreach($orders as $order)
            @if($order->is_paid != 0 && $order->status !='تحویل گرفته شد' )
{{--                @if(Auth::user()->hasRole('shop_manager'))--}}
                    <tr>
                        <td class="p-4 border">{{ $counter++ }}</td>
                        <td class="p-10 border ">{{ $order->id }}</td>
                        <td class="p-10 border ">{{ $order->user->name }}</td>
                        <td class="p-4 border">{{ $order->restaurant->name }}</td>
                        <td class="p-4 border">{{ $order->total_price }}</td>
                        {{--                    <td class="p-4 border">{{ ($order->status) }}</td>--}}
                        <td class="p-4 border">{{ 1 }}</td>
                        {{--                    <td class="p-4 border">{{ $order->created_at }}</td>--}}
                        {{--                    <td class="p-4 border">{{ $order->updated_at }}</td>--}}
                        <td class="p-4 border">
                            <div class="flex mt-4">
                                <form action="{{ route('orders.destroy', $order) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button
                                        class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">
                                        {{ __('حذف') }}
                                    </button>
                                </form>
                            </div>
                        </td>
                        <td>
                            <form method="post" action="{{ route('orders.update', $order->id) }}">
                                @csrf
                                @method('put')

                                <!-- دیگر فیلدهای فرم -->

                                <div class="form-group ">

                                    <select name="status" id="status" class="form-control">
                                        <option value="{{$order->status }}" selected>{{ $order->status }}</option>
                                        <option
                                            value="در حال بررسی" {{ $order->status == 'در حال بررسی' ? 'selected' : '' }}>
                                            در حال بررسی
                                        </option>
                                        <option
                                            value="در حال تهیه" {{ $order->status == 'در حال تهیه' ? 'selected' : '' }}>
                                            در حال تهیه
                                        </option>
                                        <option
                                            value="در حال ارسال" {{ $order->status == 'در حال ارسال' ? 'selected' : '' }}>
                                            در حال ارسال
                                        </option>
                                        <option
                                            value="تحویل گرفته شد" {{ $order->status == 'تحویل گرفته شد' ? 'selected' : '' }}>
                                            تحویل گرفته شد
                                        </option>
                                    </select>

                                    <button type="submit"
                                            class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">
                                        اعمال
                                    </button>
                                </div>


                            </form>
                        </td>
                    </tr>
                @endif
{{--            @endif--}}
        @endforeach
        </tbody>
    </table>

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
