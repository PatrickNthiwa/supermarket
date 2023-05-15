<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Employees to Manager') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('managers.addEmployees', $manager) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="employee_names" class="block font-medium text-sm text-gray-700">Employee Names</label>
                            <input id="employee_names" type="text" name="employee_names[]" class="form-control" multiple required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Employees</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
