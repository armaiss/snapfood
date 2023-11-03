<x-app-layout >
    @foreach($errors->all() as $error)

        {{$error}}
    @endforeach
    <form action="{{route('restaurants.store')}}" method="post" >
        @csrf


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
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus autocomplete="name" />
        </div>
        <div>
            <x-label for="address" value="{{ __('address') }}" />
            <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"  autofocus autocomplete="address" />
        </div>
        <div>
            <x-label for="telephone" value="{{ __('telephone') }}" />
            <x-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')"  autofocus autocomplete="telephone" />
        </div>
        <div>
            <x-label for="bank_account_number" value="{{ __('bank_account_number') }}" />
            <x-input id="bank_account_number" class="block mt-1 w-full" type="text" name="bank_account_number" :value="old('bank_account_number')"  autofocus autocomplete="bank_account_number" />
        </div>
        <div>

            <x-input id="name" class="block mt-1 w-full" type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}"   autofocus autocomplete="name" />
        </div>
        <x-button class="ml-4">
            {{ __('submit') }}
        </x-button>
    </form>
</x-app-layout>

