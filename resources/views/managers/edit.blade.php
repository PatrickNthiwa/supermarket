<x-app-layout>
<x-slot name="header">


        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Manager') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
               <!-- Message Status -->
        <x-success-status class="mb-4" :status="session('message')" />

        </div>
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <form action="{{route('managers.update', $manager->id)}}" method="POST">
                @csrf

                @method("PUT")
                <div>
                    <x-input-label for="name" :value="__('Manager Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$manager->name" autofocus />
                    <x-validation-errors :messages="$errors->get('name')" class="mt-2" />
               </div>
               <div>
                    <x-input-label for="phone" :value="__('Manager Phone')" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="$manager->phone" autofocus />
                    <x-validation-errors :messages="$errors->get('phone')" class="mt-2" />
               </div>
               <div>
                    <x-input-label for="email" :value="__('Manager Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$manager->email" autofocus />
                    <x-validation-errors :messages="$errors->get('email')" class="mt-2" />
               </div>
                          
                <div>
                    <br>
                        <x-primary-button class="ml-3">{{ __('Update Manager') }} </x-primary-button>
                </div>
               </form>
            </div>
        </div>
    </div>
</x-app-layout>