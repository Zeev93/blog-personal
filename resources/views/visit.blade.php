@extends('layouts.public')

@section('content')
    <div class="py-5">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <a href="{{route('home')}}" class="cursor-pointer mr-auto block bg-gray-700 rounded p-2 my-2 text-white font-bold uppercase hover:bg-gray-300 hover:text-gray-700"> Back </a>
                        <h1 class="text-center text-3xl uppercase font-bold text-gray-700"> {{$post->title }}</h1>
                    </div>
                    <div class="py-5">

                        <div class="w-96 m-auto">
                            @if ($post->photo == '' )
                            <img src="{{ asset('img/img-not-found.png') }}" alt="" class="w-64 m-auto py-5">
                            @else
                                <img src="{{ url('storage/'.$post->photo) }}" alt="" class="w-64 m-auto py-5">
                            @endif
                        </div>
                        <div class="flex flex-col">
                            <p class="text-gray-500 text-center text-sm"> Published On: {{\Carbon\Carbon::parse($post->published_at)->format('d/m/Y')}}</p>
                            <p class="text-gray-500 text-center text-sm"> Published By: {{$post->user->name}}</p>
                        </div>
                        @if ( count($post->tags) > 1 )
                            <p class="text-gray-700 py-3"> Tags:
                                @foreach ($post->tags as $tag)
                                    <span class="font-bold">
                                        <a href="{{route('search.tag', ['tag' => $tag->id])}}">#{{$tag->name }}</a>
                                    </span>
                                @endforeach
                            </p>
                        @endif
                        <p class="py-5 text-gray-700">
                            {{$post->body}}
                        </p>
                    </div>
                </div>

                <div class="p-6 shadow">
                    <h2 class="text-gray-700 font-bold uppercase text-2xl py-5">Comments</h2>
                    @foreach ($comments as $comment)
                        <div class="p-3 shadow border">
                            <h3 class="text-gray-700 text-2xl font-bold uppercase">Title: {{ $comment->title }}</h3>
                            <p class="text-gray-500 text-sm"> Writed By: {{ $comment->user->name }}</p>
                            <p class="text-gray-700">{{$comment->body}}</p>
                            <p class="text-gray-500 text-sm"> Published On: {{\Carbon\Carbon::parse($comment->published_at)->format('d/m/Y')}}</p>
                        </div>
                    @endforeach

                    <div class="p-3 shadow border">
                        <h2 class="text-gray-700 font-bold uppercase text-2xl py-5">Share your opinion</h2>
                        <form action="{{ route('comment.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <div class="p-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="w-full block p-2 rounded shadow">
                                @error('title')
                                <div class="my-5 bg-red-500 text-center">
                                    <span class="font-bold uppercase text-white" role="alert">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="p-3">
                                <label for="body">Comment</label>
                                <textarea name="body" id="body" rows="5" class="w-full block p-2 rounded shadow"></textarea>
                                @error('body')
                                <div class="my-5 bg-red-500 text-center">
                                    <span class="font-bold uppercase text-white" role="alert">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>

                            <div class="px-3">
                                <input type="submit" class="cursor-pointer ml-auto block bg-gray-700 rounded p-2 my-10 text-white font-bold uppercase hover:bg-gray-300 hover:text-gray-700" value="Send">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
