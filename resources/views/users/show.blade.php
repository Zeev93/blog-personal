@extends('layouts.app')


@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <a href="{{route('posts.index')}}" class="cursor-pointer mr-auto block bg-gray-700 rounded p-2 my-2 text-white font-bold uppercase hover:bg-gray-300 hover:text-gray-700"> Back </a>
                        <h1 class="text-center text-3xl uppercase font-bold text-gray-700"> {{$post->title }}</h1>
                    </div>
                    <div class="py-5">

                        <div class="w-96 m-auto">
                            <img src="{{ url('storage/' . $post->photo) }}" alt="{{ $post->title }}" class="w-fit">
                        </div>
                        <div class="flex flex-col">
                            <p class="text-gray-500 text-center text-sm"> Published On: {{\Carbon\Carbon::parse($post->published_at)->format('d/m/Y')}}</p>
                            <p class="text-gray-500 text-center text-sm"> Published By: {{$post->user->name}}</p>
                        </div>
                        <p class="text-gray-700"> Tags:
                            @foreach ($post->tags as $tag)
                                 <span class="font-bold">
                                     #{{$tag->name }}
                                 </span>
                            @endforeach
                         </p>
                        <p class="py-5 text-gray-700">
                            {{$post->body}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

