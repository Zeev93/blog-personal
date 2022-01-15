@extends('layouts.app')


@section('content')


    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <h1 class="text-center text-3xl uppercase font-bold text-gray-700"> Edit Role </h1>
                        <a href="{{route('roles.index')}}" class=" mr-auto block bg-gray-300 rounded p-2 m-2 text-gray-700 font-bold uppercase hover:bg-gray-700 hover:text-white"> Cancel </a>
                    </div>

                    <form action="{{ route('roles.update', ['role' => $role->id])  }}" method="POST" class="py-5">
                        @csrf
                        <div class="py-3">
                                @method('PUT')
                                <label for="name" class="font-bold text-gray-700 uppercase">Role Name</label>
                                <input type="text" class="w-full block p-2 rounded shadow" name="name" id="name" value="{{ $role->name }}">
                                @error('name')
                                    <div class="my-5 bg-red-500 text-center">
                                        <span class="font-bold uppercase text-white" role="alert">{{ $message }}</span>
                                    </div>
                                @enderror
                        </div>
                        <div class="py-3">
                            <label class="font-bold text-gray-700 uppercase">Tags</label>
                            <div class="grid grid-cols-2 gap-2">
                                @foreach ($permissions as $permission)
                                    <div class="inline-block">
                                        <input
                                            {{-- Solucionar si es posible --}}
                                            @if(count($permission->roles->where('id', '=', $role->id)->chunk(1)) >= 1  )
                                                checked
                                            @endif
                                        id="tag-{{$permission->id}}" type="checkbox" name="permissions[]" value="{{$permission->id}}" class="p-2 rounded shadow">
                                        <label for="tag-{{$permission->id}}"> {{$permission->description}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <input type="submit" class="cursor-pointer ml-auto block bg-gray-700 rounded p-2 my-10 text-white font-bold uppercase hover:bg-gray-300 hover:text-gray-700" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
