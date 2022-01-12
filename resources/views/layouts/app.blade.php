<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        @yield('styles')
    </head>
    <body class="font-sans antialiased">
        <div>
            @if(session('status'))
            <div class="bg-gray-700 p-8 text-center text-white font-bold uppercase" id="status-bar" role="alert">
                {{session('status')}}
            </div>
        @endif
        </div>
        <div class="min-h-screen bg-gray-100">
            <div class="flex">
                <aside class="w-2/12 shadow bg-gray-700">
                    @include('layouts.aside')
                </aside>
                <main class="w-10/12">
                    @include('layouts.navigation')
                    @yield('content')
                </main>
            </div>

        </div>
    </body>
    @yield('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const statusBar = document.getElementById('status-bar')

        if(statusBar){
            setTimeout(() => {
                statusBar.parentNode.removeChild(statusBar)
            }, 2000);
        }
    </script>
</html>



