<nav class="bg-gray-700 w-full py-2 shadow">
    <div class="flex flex-row text-white">
        <a class="p-5 hover:bg-gray-300 m-0 cursor-pointer" href="{{ route('home') }}">Inicio</a>
        @if (Route::has('login'))
            @auth
                @can('dashboard')
                    <a href="{{ url('/dashboard') }}"  class="p-5 ml-auto hover:bg-gray-300 cursor-pointer">Dashboard</a>
                @endcan
                <form action="{{ route('logout') }}" method="POST" class="@can('dashboard') @else  ml-auto  @endcan">
                    @csrf
                    <button type="submit"  class="p-5 hover:bg-gray-300 cursor-pointer">
                        Log out
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="p-5 ml-auto hover:bg-gray-300 cursor-pointer">Log in</a>
                <a href="{{ route('register') }}" class="p-5 hover:bg-gray-300">
                    @if (Route::has('register'))
                        Register
                    @endif
                </a>
            @endauth
        @endif
    </div>
</nav>
