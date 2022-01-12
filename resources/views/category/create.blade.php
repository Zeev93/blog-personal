@extends('layouts.app')


@section('content')


    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <h1 class="text-center text-3xl uppercase font-bold text-gray-700"> New Category </h1>
                        <a href="{{route('categories.index')}}" class=" mr-auto block bg-gray-300 rounded p-2 m-2 text-gray-700 font-bold uppercase hover:bg-gray-700 hover:text-white"> Cancel </a>
                    </div>

                    <form action="{{ route('categories.store')  }}" method="POST" class="py-5">
                        @csrf
                        <div class="pb-3">
                            <label for="name" class="font-bold text-gray-700 uppercase">Category Name</label>
                            <input type="text" class="w-full block p-2 rounded shadow" name="name" id="name" value="{{ OLD('name') }}">
                            @error('name')
                                <div class="my-5 bg-red-500 text-center">
                                    <span class="font-bold uppercase text-white" role="alert">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <input type="submit" class="cursor-pointer ml-auto block bg-gray-700 rounded p-2 my-10 text-white font-bold uppercase hover:bg-gray-300 hover:text-gray-700" value="Create">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
