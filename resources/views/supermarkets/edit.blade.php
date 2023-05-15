<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Supermarket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <!-- Message Status -->
                <x-success-status class="mb-4" :status="session('message')" />
            </div>
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('supermarkets.update', $supermarket->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div>
                        <x-input-label for="name" :value="__('Supermarket Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$supermarket->name" autofocus />
                        <x-validation-errors :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="location" :value="__('Supermarket Location')" />
                        <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="$supermarket->location" autofocus />
                        <x-validation-errors :messages="$errors->get('location')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="manager_id" :value="__('Manager')" />
                        <select name="manager_id" id="manager_id" class="block mt-1 w-full">
                            @foreach ($managers as $manager)
                                <option value="{{ $manager->id }}" {{ $manager->id === $supermarket->manager_id ? 'selected' : '' }}>
                                    {{ $manager->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-validation-errors :messages="$errors->get('manager_id')" class="mt-2" />
                    </div>
<br>
                    <div>
                        <x-primary-button class="ml-3">{{ __('Update Supermarket') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
