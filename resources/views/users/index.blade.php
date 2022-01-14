@extends('layouts.app')


@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col py-3">
                        <h1 class="text-center text-3xl uppercase font-bold text-gray-700">users</h1>
                        <a href=" {{route('users.create')}}" class="cursor-pointer ml-auto block bg-gray-700 rounded p-2 my-2 text-white font-bold uppercase hover:bg-gray-300 hover:text-gray-700"> New User </a>
                    </div>
                    {{ $users->links() }}
                    <div class="py-5">
                        <table class="table-auto w-full">
                            <thead>
                              <tr class="border-y-2 uppercase">
                                <th class="w-10">ID</th>
                                <th class="w-auto">Name</th>
                                <th class="w-auto">Email</th>
                                <th class="w-auto">Rol</th>
                                {{-- <th class="w-20"></th> --}}
                                <th class="w-20"></th>
                                <th class="w-20"></th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-300 text-center">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-center">{{ $user->rol }}</td>
                                        {{-- <td><a href="{{route('users.show', ['user' => $user->id])}}" class="bg-green-600 rounded py-1 px-4 m-2 text-white font-bold uppercase hover:bg-green-300 hover:text-green-600 text-center"><i class="fas fa-eye"></i></a></td> --}}
                                        <td><a href="{{route('users.edit', ['user' => $user->id])}}" class="bg-orange-600 rounded py-1 px-4 m-2 text-white font-bold uppercase hover:bg-orange-300 hover:text-orange-600 text-center"><i class="fas fa-pencil-alt"></i></a></td>
                                        <td>
                                            <form onsubmit="return confirmar(event, this);" action="{{route('users.destroy', ['user' => $user->id])}}" method="POST" id="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-700 rounded py-1 px-4 m-2 text-white font-bold uppercase hover:bg-red-300 hover:text-red-700"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links() }}
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

