<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نمایش کامنت‌ها</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-pink-100">
<div class="container mx-auto mt-8 p-8">


    <div class="min-w-full flex bg-white mb-4 border-gray-300 shadow-md rounded-md overflow-hidden">
        <form action="" method="get" class=" bg-white p-4 rounded shadow-md flex items-center w-1/2">
            <label for="filter_food" class=" w-1/2 text-gray-700 text-sm font-bold mb-2">فیلتر بر اساس غذا:</label>
            <select id="filter_food" name="filter_food" class="w-1/2 p-2 border border-gray-300 rounded">
                <option value="">همه</option>
{{--                @foreach(\Illuminate\Support\Facades\Auth::user()->restaurant->foods as $food)--}}
{{--                    <option value="{{$food->name}}">{{$food->name}}</option>--}}
{{--                @endforeach--}}
            </select>
            <button type="submit" class="bg-pink-500 text-white p-2 mr-2 rounded w-1/4 ">اعمال فیلتر</button>
        </form>

        <form action="" method="get" class="bg-white p-4 rounded shadow-md flex items-center w-1/2">
            <label for="filter_status" class="text-gray-700 text-sm font-bold mb-2 w-1/2">فیلتر بر اساس وضعیت:</label>
            <select id="filter_status" name="filter_status" class="w-1/2 p-2 border border-gray-300 rounded ">
                <option value="">همه</option>
                <option value="در حال بررسی">در حال بررسی</option>
                <option value="در حال تهیه">در حال تهیه</option>
                <option value="در حال ارسال">در حال ارسال</option>
            </select>
            <button type="submit" class="bg-pink-500 text-white p-2 rounded mr-2 w-1/4">اعمال فیلتر</button>
        </form>
    </div>

    <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-md overflow-hidden">
        <thead class="bg-gray-100">
        <tr>
            <th class="py-2 px-4 border-b">شماره</th>
            <th class="py-2 px-4 border-b">نام</th>
            <th class="py-2 px-4 border-b">دیدگاه</th>
            <th class="py-2 px-4 border-b">شماره سفارش</th>
            <th class="py-2 px-4 border-b">تاریخ</th>
            <th class="py-2 px-4 border-b">وضعیت</th>
            <th class="py-2 px-4 border-b">عملیات</th>
        </tr>
        </thead>
        <tbody>
        {{--        {{$comments->withQueryString()->links()}}--}}
        @foreach($comments as $comment)
            @if(Auth::user()->hasRole('admin'))
                <tr>
                    <td class="py-2 px-2 border-b">{{ $loop->iteration }}</td>
                    <td class="py-2 px-2 border-b">{{ $comment->cart->user->name }}</td>
                    <td class="py-2 px-4 border-b whitespace-pre-line h-auto">{{ $comment->content }}</td>
                    <td class="py-2 px-2 border-b">{{ $comment->cart_id }}</td>
                    <td class="py-2 px-2 border-b">{{ $comment->created_at }}</td>
                    <td class="py-2 px-2 border-b">{{ $comment->status }}</td>
                    <td class="py-2 px-2 border-b">
                        <div  class="flex items-center ">
                            <form action="{{ route('comments.update', $comment) }}" method="post" class="border-l-4">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" value="تایید" name="status">
                                <input type="submit" class="bg-green-500 text-white p-2 rounded" value="تایید">

                            </form>
                            <form action="{{ route('comments.destroy', $comment) }}" method="post">
                                @csrf
                                @method('DELETE')
                                @if($comment->status =='درخواست حذف')
                                    <input type="submit" id="delete" name="delete" class="bg-red-500 text-white p-2 rounded" value="حذف">
                                @endif
                            </form>
                        </div>

                    </td>
                </tr>
            @elseif(Auth::user()->hasRole('shop_manager') && $comment->cart->restaurant_id == Auth::user()->restaurant->id)
                <tr>
                    <td class="py-2 px-2 border-b">{{ $loop->iteration }}</td>
                    <td class="py-2 px-2 border-b">{{ $comment->cart->user->name }}</td>
                    <td class="py-2 px-4 border-b whitespace-pre-line h-auto">{{ $comment->content }}</td>
                    <td class="py-2 px-2 border-b">{{ $comment->cart_id }}</td>
                    <td class="py-2 px-2 border-b">{{ $comment->created_at }}</td>
                    <td class="py-2 px-2 border-b">{{ $comment->status }}</td>
                    <td class="py-2 px-2 border-b">

                        <form action="{{ route('comments.update', $comment->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" value="تایید" name="status">
                            <input type="submit" id="accept" name="accept" class="bg-green-500 text-white p-2 rounded" value="تایید">

                        </form>
                        <form action="{{ route('comments.update', $comment->id) }}" method="post" class="flex w-1/2">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" value="درخواست حذف" name="status">
                            <input type="submit" id="ask_delete" name="ask_delete" class="bg-red-500 text-white p-2 rounded" value="درخواست حذف">

                        </form>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
</body>

</html>
