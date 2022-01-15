@extends('layouts.app')



@section('content')
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col py-3">
                        <h1 class="text-center text-3xl uppercase font-bold text-gray-700">Role</h1>
                        @can('roles.create')
                            <a href=" {{route('roles.create')}}" class="cursor-pointer ml-auto block bg-gray-700 rounded p-2 my-2 text-white font-bold uppercase hover:bg-gray-300 hover:text-gray-700"> New Role </a>
                        @endcan
                    </div>
                    {{ $roles->links() }}
                    <div class="py-5">
                        <table class="table-auto w-full">
                            <thead>
                              <tr class="border-y-2 uppercase">
                                <th class="w-10">ID</th>
                                <th class="w-auto">Role</th>
                                <th class="w-20"></th>
                                <th class="w-20"></th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr class="hover:bg-gray-300">
                                        <td class="py-3 px-4 m-2">{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @can('roles.edit')
                                                <a href="{{route('roles.edit', ['role' => $role->id])}}" class="bg-orange-600 rounded py-1 px-4 m-2 text-white font-bold uppercase hover:bg-orange-300 hover:text-orange-600 text-center"><i class="fas fa-pencil-alt"></i></a>
                                            @endcan
                                        </td>
                                        <td>
                                            <form onsubmit="return confirmar(event, this);" action="{{route('roles.destroy', ['role' => $role->id])}}" method="POST" id="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                @can('roles.destroy')
                                                    <button type="submit" class="bg-red-700 rounded py-1 px-4 m-2 text-white font-bold uppercase hover:bg-red-300 hover:text-red-700"><i class="fas fa-trash-alt"></i></button>
                                                @endcan
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const confirmar = (e, form) => {
        e.preventDefault();
            Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit()
                    }
            })
                return false;
        }
    </script>
@endsection

