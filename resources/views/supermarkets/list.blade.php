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
                <div class="btn-group" role="group" aria-label="View type">
                <a href="{{ route('supermarkets.index', ['view' => 'grid']) }}"
                class="btn btn-primary {{ $view === 'grid' ? 'active' : '' }}">Grid View</a>

                <a href="{{ route('supermarkets.index', ['view' => 'list']) }}"
                    class="btn btn-primary {{ $view === 'list' ? 'active' : '' }}">List View</a>

                </div>
            <div class="container py-4 px-4 ml-">
            <table class= "table table-bordered">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Location</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($supermarkets as $supermarket)
                        <tr>
                            <td>{{$supermarket->id}}</td>
                            <td>{{$supermarket->name}}</td>
                            <td>{{$supermarket->location}}</td>
                            <td>
                            <a href="{{ route('supermarkets.edit', $supermarket->id) }}" class="btn btn-primary">Edit</a>

                            </td>
                            <td>
                                <form action="{{ route('supermarkets.destroy', $supermarket) }}" method="POST">
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
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
              </tbody>
                </table>
            </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
