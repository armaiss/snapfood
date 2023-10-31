<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            مدیریت فروشنده ها
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('shop.store') }}">
        @csrf

    </form>

</x-app-layout>
