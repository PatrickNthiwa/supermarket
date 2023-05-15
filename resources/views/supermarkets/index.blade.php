<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Supermarket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Message Status -->
            <x-success-status class="mb-4" :status="session('message')" />

            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mb-4">
                <a href="{{ route('supermarkets.index', ['view' => 'grid']) }}"
                class="btn btn-primary {{ $view === 'grid' ? 'active' : '' }}">Grid View</a>

                <a href="{{ route('supermarkets.index', ['view' => 'list']) }}"
                    class="btn btn-primary {{ $view === 'list' ? 'active' : '' }}">List View</a>

                </div>

                @if ($view === 'grid')
                    <!-- Grid View -->
                    <div class="grid grid-cols-3 gap-4">
                        @forelse ($supermarkets as $supermarket)
                            <!-- ... grid view item ... -->
                    <div class="p-4">
                        <h3 class="text-lg font-medium">{{ $supermarket->name }}</h3>
                        <p class="text-gray-500">{{ $supermarket->location }}</p>
                        <!-- ... other supermarket details ... -->
                        <div class="mt-4">
                        <a href="{{ route('supermarkets.edit', $supermarket->id) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ route('supermarkets.destroy', $supermarket->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>

                            
                          @empty
                            <div>No Records Found!</div>
                        @endforelse
                    </div>
                @else
                   <!-- List View -->
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($supermarkets as $supermarket)
                                <tr>
                                    <td>{{ $supermarket->id }}</td>
                                    <td>{{ $supermarket->name }}</td>
                                    <td>{{ $supermarket->location }}</td>
                                    <td>
                                        <a href="{{ route('supermarkets/'. $supermarket->id.'/edit') }}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('supermarkets.destroy', $supermarket->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Records Found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>


                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

                   