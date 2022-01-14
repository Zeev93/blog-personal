
<ul class="flex flex-row bg-gray-400 shadow">
    @foreach ($categories as $category)
        <a class="cursor-pointer p-3 m-auto border-none font-bold text-white text-sm hover:bg-gray-700" href="{{ route('search.category', ['category' => $category->id ]) }}"> <li> {{$category->name }}</li></a>
    @endforeach
</ul>

