<x-app-layout>
<x-slot name="header">


        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assign Manager') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
               <!-- Message Status -->
        <x-success-status class="mb-4" :status="session('message')" />

        </div>
     
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <form action="{{ route('employees.update_manager', $employee) }}" method="POST">
            @csrf
            @method('PUT')
            
                <label for="manager_id">Manager</label>
                    <select name="manager_id" id="manager_id">
                        <option value="">Select a manager</option>
                        @foreach ($managers as $manager)
                            <option value="{{ $manager->id }}" {{ $employee->manager_id == $manager->id ? 'selected' : '' }}>
                                {{ $manager->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit">Assign Manager</button>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>