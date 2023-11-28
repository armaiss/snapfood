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
                    <form action="{{ route('comment.approve', $comment->id) }}" method="post">
                        @csrf
                        @method('POST')
                        <button type="submit" class="bg-red-500 text-white p-2 rounded">تایید</button>
                    </form>
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white p-2 rounded">حذف</button>
                    </form>
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
                        <form action="{{ route('comment.approve', $comment->id) }}" method="post">
                            @csrf
                            @method('POST')
                            <button type="submit" class="bg-red-500 text-white p-2 rounded">تایید</button>
                        </form>
            @endif
                @endforeach
        </tbody>
    </table>
</div>
</body>

</html>
