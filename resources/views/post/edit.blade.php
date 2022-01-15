@extends('layouts.app')



@section('content')


    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <h1 class="text-center text-3xl uppercase font-bold text-gray-700"> Edit Post </h1>
                        <a href="{{route('posts.index')}}" class=" mr-auto block bg-gray-300 rounded p-2 m-2 text-gray-700 font-bold uppercase hover:bg-gray-700 hover:text-white"> Cancel </a>
                    </div>

                    <form action="{{ route('posts.update', ['post' => $post->id])  }}" method="POST" class="py-5" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="pb-3">
                            <label for="title" class="font-bold text-gray-700 uppercase">Post Title</label>
                            <input type="text" class="w-full block p-2 rounded shadow" name="title" id="title" value="{{ $post->title}}">
                            @error('title')
                                <div class="my-5 bg-red-500 text-center">
                                    <span class="font-bold uppercase text-white" role="alert">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="py-3">
                            <label for="photo" class="font-bold text-gray-700 uppercase">Portrait</label>
                            @if( $post->photo !== "" )
                                <img src="{{ url('storage/'. $post->photo) }}" alt="{{$post->title}}" class="w-60">
                            @endif
                            <input type="file" class="w-full block p-2 rounded shadow" name="photo" id="photo">
                            @error('photo')
                                <div class="my-5 bg-red-500 text-center">
                                    <span class="font-bold uppercase text-white" role="alert">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="py-3">
                            <label for="category_id" class="font-bold text-gray-700 uppercase">Category</label>
                            <select name="category_id" id="category_id" class="w-full block p-2 rounded shadow">
                                <option value="" disabled selected> - Select a category - </option>
                                @foreach ($categories as $category)
                                    <option
                                        {{ $post->category_id == $category->id ? 'selected' : ''}}
                                        value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="my-5 bg-red-500 text-center">
                                    <span class="font-bold uppercase text-white" role="alert">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="py-3">
                            <label for="category_id" class="font-bold text-gray-700 uppercase">Tags</label>
                            <div class="grid grid-cols-2 gap-2">
                                @foreach ($tags as $tag)
                                    <div class="inline-block">
                                        <input
                                            @if(count($tag->posts->where('id', '=', $post->id)->chunk(1)) >= 1  )
                                                checked
                                            @endif
                                        id="tag-{{$tag->id}}" type="checkbox" name="tags[]" value="{{$tag->id}}" class="p-2 rounded shadow">
                                        <label for="tag-{{$tag->id}}"> {{$tag->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="py-3">
                            <label for="body" class="font-bold text-gray-700 uppercase">Content</label>
                            <textarea name="body" id="body" rows="10" class="w-full block p-2 rounded shadow" >{{ $post->body }}</textarea>
                            @error('body')
                                <div class="my-5 bg-red-500 text-center">
                                    <span class="font-bold uppercase text-white" role="alert">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <input type="submit" class="cursor-pointer ml-auto block bg-gray-700 rounded p-2 my-10 text-white font-bold uppercase hover:bg-gray-300 hover:text-gray-700" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
