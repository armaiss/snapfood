<html dir="rtl">
<x-app-layout >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            مدیریت فروشنده ها
        </h2>
    </x-slot>
    <x-validation-errors class="mb-4" />
    <form class="grid grid-cols-4 gap-4 " method="POST" action="{{ route('shop.store') }}" >
        @csrf
        <div>
            <x-label for="title" value="عنوان" />
            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus  />
        </div>
        <div >
            <x-label for="first_name" value="نام" />
            <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required  />
        </div>
        <div>
            <x-label for="last_name" value="نام خانوادگی " />
            <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('first_name')" required  />
        </div>
        <div>
            <x-label for="telephone" value="شماره تماس" />
            <x-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')" required  />
        </div>
        <div class="col-span-4">
            <x-label for="address" value="آدرس" />
            <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"  />
        </div>

        <div class="col-start-1 col-end-2">


            <x-label for="name" value="نام کاربری" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required  />

        </div>
        <div class="col-start-2 col-end-3">

            <x-label for="email" value="ایمیل" />
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required  />

        </div>
        <div  class="w-1/3  col-start-4">
            <x-button class="flex justify-center al">
                {{ __('submit') }}
            </x-button>
        </div>


    </form>

</x-app-layout>
</html>
