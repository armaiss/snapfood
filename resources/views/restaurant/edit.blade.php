<x-app-layout>
    <form action="{{route('restaurants.update',$restaurant)}}" method="post">
        @csrf
        @method('PUT')

        <div>
            <x-label for="restaurant_category_id" value="{{ __('restaurant_category_id') }}" />
            <select name="restaurant_category_id" id="restaurant_category_id">
                @foreach(\App\Models\RestaurantCategory::all() as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <x-label for="name" value="{{ __('name') }}" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$restaurant->name}}" autofocus autocomplete="name" />
        </div>
        <div>
            <x-label for="address" value="{{ __('address') }}" />
            <x-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{$restaurant->address}}"  autofocus autocomplete="address" />
        </div>
        <div>
            <x-label for="telephone" value="{{ __('telephone') }}" />
            <x-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" value="{{$restaurant->telephone}}"  autofocus autocomplete="telephone" />
        </div>
        <div>
            <x-label for="bank_account_number" value="{{ __('bank_account_number') }}" />
            <x-input id="bank_account_number" class="block mt-1 w-full" type="text" name="bank_account_number" value="{{$restaurant->bank_account_number}}"  autofocus autocomplete="bank_account_number" />
        </div>
        <x-button class="ml-4">
            {{ __('submit') }}
        </x-button>
    </form>
    <a href="{{route('foods.index')}}">
        <x-button class="ml-4">
            {{ __('foods') }}
        </x-button>
    </a>
</x-app-layout>

