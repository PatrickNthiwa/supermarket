<x-app-layout>
<x-slot name="header">


        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
               <!-- Message Status -->
        <x-success-status class="mb-4" :status="session('message')" />

        </div>
     
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <form action="{{ route('employees.store') }}" method="POST">
                @csrf
                <!-- Employee details fields -->
                <label for="name">Name</label>
                <input type="text" name="name" id="name">

                <label for="type">Type</label>
                <select name="type" id="type">
                    <option value="male">Backoffice</option>
                    <option value="female">Cashier</option>
                </select>

                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="custom">Custom</option>
                    <option value="other">Other</option>
                </select>

                <button type="submit" class="btn btn-primary">Create Employee</button>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>