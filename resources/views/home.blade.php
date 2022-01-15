@extends('layouts.public')

@section('content')
    <div class="py-5">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">

                @isset($searchTitle)
                    <h1 class="text-center text-4xl text-gray-700 py-5">Search By: #{{$searchTitle}}</h1>
                @endisset

                <div class="grid grid-cols-4 gap-20">
                    @foreach ($posts as $post)
                        <div class="border rounded p-3">
                            <h2 class="text-center text-3xl uppercase font-bold text-gray-700 py-3"> {{ $post->title}}</h2>
                            @if ($post->photo == '')
                                <img src="{{ asset('img/img-not-found.png') }}" alt="" class="w-64 m-auto py-5">
                            @else
                                <img src="{{ url('storage/'.$post->photo) }}" alt="" class="w-64 m-auto py-5">
                            @endif
                            <p class="text-gray-500 text-sm pt-3"> Published On: {{\Carbon\Carbon::parse($post->published_at)->format('d/m/Y')}}</p>
                            <p class="text-gray-500 text-sm"> Published By: {{$post->user->name}}</p>

                                <p class="text-gray-700 py-3">
                                <span class="font-bold"> Category: </span> {{$post->category->name}}
                                </p>

                            <p class="py-3 text-gray-700">
                                {{ Str::limit( $post->body, 200)}}
                            </p>

                            <p class="text-gray-500 text-sm"> Comments: {{count($post->comments)}}</p>
                            @if ( count($post->tags) > 1 )
                                <p class="text-gray-700 py-3"> Tags:
                                    @foreach ($post->tags as $tag)
                                        <span class="font-bold">
                                            <a href="{{route('search.tag', ['tag' => $tag->id])}}">#{{$tag->name }}</a>
                                        </span>
                                    @endforeach
                                </p>
                            @endif
                            <a href="{{ route('visit.post', ['post' => $post->id]) }}" class="bg-green-600 block rounded py-1 px-4 m-2 text-white font-bold uppercase hover:bg-green-400 hover:text-white text-center">Visit</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
