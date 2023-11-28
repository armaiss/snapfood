<!doctype html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>comments</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-pink-100">
<div class="container mx-auto mt-8 p-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 overflow-y-auto">
        @foreach($comments as $comment)
            <div class="bg-white p-6 shadow-md border min-w-0">
                <div class="mb-4">
                    <strong class="text-pink-700">شماره:</strong> {{ $loop->iteration }}
                </div>
                <div class="mb-4">
                    <strong class="text-pink-700">نام:</strong> {{$comment->cart->user->name }}
                </div>
                <div class="mb-4">
                    <strong class="text-pink-700">دیدگاه</strong> {{ $comment->content }}
                </div>
                <div class="mb-4">
                    <strong class="text-pink-700">شماره سفارش:</strong> {{  $comment->cart_id }}
                </div>
                <div class="mb-4">
                    <strong class="text-pink-700">شماره سفارش:</strong> {{  $comment->cart->id }}
                </div>
                <div class="mb-4">
                    <strong class="text-pink-700">تاریخ:</strong> {{ $comment->created_at }}
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>

</html>
