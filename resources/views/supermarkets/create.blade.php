<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Supermarket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('supermarkets.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label for="location" class="block font-medium text-gray-700">Location</label>
                            <input type="text" name="location" id="location" class="form-input rounded-md shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label for="manager_id" class="block font-medium text-gray-700">Manager</label>
                            <select name="manager_id" id="manager_id" class="form-select rounded-md shadow-sm">
                                <option value="">Select Manager</option>
                                @foreach ($managers as $manager)
                                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
