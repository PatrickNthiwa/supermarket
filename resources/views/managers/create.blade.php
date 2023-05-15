<x-app-layout>
<x-slot name="header">


        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Manager') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
               <!-- Message Status -->
        <x-success-status class="mb-4" :status="session('message')" />

        </div>
     
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <form action="{{ route('managers.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Manager Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="name">Manager Phone</label>
        <input type="text" name="phone" id="phone" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="name">Manager Email</label>
        <input type="text" name="email" id="email" class="form-control" required>
    </div>
    <br>
    <!-- <div class="form-group">
        <label for="supermarket_id">Supermarket</label>
        <select name="supermarket_id" id="supermarket_id" class="form-control" >
            <option value="">Select Supermarket</option>
            @foreach ($supermarkets as $supermarket)
                <option value="{{ $supermarket->id }}">{{ $supermarket->name }}</option>
            @endforeach
        </select>
    </div> -->
    <button type="submit" class="btn btn-primary">Create Manager</button>
</form>

            </div>
        </div>
    </div>
</x-app-layout>