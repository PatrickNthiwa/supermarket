<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Managers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div>
                    <!-- Message Status -->
                     <x-success-status class="mb-4" :status="session('message')" />
                </div>
     
            <div class="container py-4 px-4 ml-">
          
            <table class= "table table-bordered">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <!-- <td>Supermarket</td> -->
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($managers as $manager)
                        <tr>
                            <td>{{$manager->id}}</td>
                            <td>{{$manager->name}}</td>
                            <td>{{$manager->email}}</td>
                            <td>{{$manager->phone}}</td>
                          

                            <td>
                            <a href="{{ route('managers.edit', $manager->id) }}" class="btn btn-primary">Edit</a>

                            </td>
                            <td>
                                <form action="{{ route('managers.destroy', $manager) }}" method="POST">
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
