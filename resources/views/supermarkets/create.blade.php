<x-app-layout>
<x-slot name="header">


        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Supermarket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
               <!-- Message Status -->
        <x-success-status class="mb-4" :status="session('message')" />

        </div>
     
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <form action="{{url('supermarkets/add')}}" method="POST">
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Supermarket Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus />
                    <x-validation-errors :messages="$errors->get('name')" class="mt-2" />
               </div>
               <div>
                    <x-input-label for="location" :value="__('Supermarket Location')" />
                    <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" autofocus />
                    <x-validation-errors :messages="$errors->get('location')" class="mt-2" />
               </div>
                <div>
                        <x-primary-button class="ml-3">{{ __('Save Super') }} </x-primary-button>
                </div>
               </form>
            </div>
        </div>
    </div>
</x-app-layout>