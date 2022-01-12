<nav class="bg-gray-700 w-full py-2 shadow">
    <ul class="flex flex-row text-white">
        <li class="my-auto mx-3">
            <a href="{{ route('home') }}">Inicio</a>
        </li>
        <li class="my-auto mx-3 ml-auto">
            <input type="text" placeholder="Search" class="w-full block p-2 rounded shadow">
        </li>

        @if (Route::has('login'))
                <li class="my-auto mx-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 ">Register</a>
                        @endif
                    @endauth
                </li>
            @endif
    </ul>
</nav>
