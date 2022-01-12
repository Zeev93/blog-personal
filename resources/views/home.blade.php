@extends('layouts.public')

@section('content')
    <div class="py-5">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3  grid grid-cols-2 gap-20">
                @foreach ($posts as $post)
                    <div class="border rounded p-3 ">
                        <img src="{{ url('storage/'.$post->photo) }}" alt="" class="w-64 m-auto">
                        <h1 class="text-center text-3xl uppercase font-bold text-gray-700"> {{ $post->title}}</h1>
                        <p class="text-gray-500 text-center text-sm"> Published On: {{\Carbon\Carbon::parse($post->published_at)->format('d/m/Y')}}</p>
                        <p class="text-gray-500 text-center text-sm"> Published By: {{$post->user->name}}</p>
                        <p>
                            {{ Str::limit( $post->body, 200)}}
                        </p>
                        <button class="bg-green-600 rounded py-1 px-4 m-2 text-white font-bold uppercase hover:bg-green-300 hover:text-green-600 text-center">Visit</button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
