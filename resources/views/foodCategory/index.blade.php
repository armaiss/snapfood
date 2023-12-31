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
<table>
    <thead>
    <tr>
        <th scope="col" class="px-6 py-3">
            ID
        </th>
        <th scope="col" class="px-6 py-3">
            Name
        </th>
        <th scope="col" class="px-6 py-3">
            Action
        </th>
        <th scope="col" class="px-6 py-3">
            Action
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr class="bg-white dark:bg-white">
            <th scope="row" class="px-6 py-4 font-medium text-pink-500 whitespace-nowrap dark:text-pink-500">
                <a href="{{route('foodCategories.show', $category)}}">{{$category->id}}</a>
            </th>
            <td class="px-6 py-4">
                {{$category->name}}
            </td>
            <td class="px-6 py-4">
                <a href="{{route('foodCategories.edit',$category)}}">
                    <button class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('edit') }}
                    </button>
                </a>
            </td>
            <td class="px-6 py-4">
                <form action="{{route('foodCategories.destroy',$category)}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button class="bg-pink-500 hover-bg-pink-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Delete') }}
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    <tr class="bg-white dark:bg-white">
        <th scope="row" class="px-6 py-4 font-medium text-pink-500 whitespace-nowrap dark:text-pink-500">
            #
        </th>
        <td class="px-6 py-4">
            #
        </td>
        <td class="px-6 py-4">
            #
        </td>
        <td class="px-6 py-4">
            <a href="{{route('foodCategories.create')}}">
                <button class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Create') }}
                </button>
            </a>

        </td>

    </tr>
    </tbody>
</table>
<a href="{{route('dashboard')}}" class="ml-4">
    <button class="bg-pink-500 hover-bg-pink-700 text-white font-bold py-2 px-4 rounded">
        {{ __('داشبورد') }}
    </button>
</a>
</body>
</html>
