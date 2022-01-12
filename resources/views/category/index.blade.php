@extends('layouts.app')


@section('content')


    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="" class="bg-gray-300 border rounded p-2 m-3 text-right"> Agregar </a>
                    <table class="table-auto w-full py-5">
                        <thead>
                          <tr>
                            <th class="w-10">ID</th>
                            <th class="w-auto">Category</th>
                            <th class="w-20"></th>
                            <th class="w-20"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td><button class="bg-gray-300 border rounded p-2 block">Edit</button></td>
                                    <td><button class="bg-gray-300 border rounded p-2 block">Delete</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
