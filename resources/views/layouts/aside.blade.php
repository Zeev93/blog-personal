<nav class="p-5 min-h-screen">
    <a href="" class="w-full">
        <div class="flex justify-center align-middle">
            <x-application-logo class="block h-10 w-auto fill-current text-white" />
            <span class="m-auto text-center text-white font-bold">AbrahamAG Blog</span>
        </div>
    </a>

    <hr class="bg-white w-full my-5">

    <div class="w-full text-center">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white">
            {{ __('Dashboard') }}
        </x-nav-link>
    </div>
    @hasanyrole('Admin|Blogger')
        <ul class="w-full text-center">
            @role('Admin')
                <hr class="bg-white w-full my-5">
                <p class="text-white text-lg"> Administrator </p>
                <li class="py-3">
                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')" class="text-white">
                        {{ __('Users') }}
                    </x-nav-link>
                </li>
                <li class="pb-3">
                    <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')" class="text-white">
                        {{ __('Roles') }}
                    </x-nav-link>
                </li>
                <hr class="bg-white w-full my-5">
            @endrole

            <li class="pb-3">
                <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')" class="text-white">
                    {{ __('Posts') }}
                </x-nav-link>
            </li>

            <li class="pb-3">
                <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')" class="text-white">
                    {{ __('Categories') }}
                </x-nav-link>
            </li>
            <li class="pb-3">
                <x-nav-link :href="route('tags.index')" :active="request()->routeIs('tags.index')" class="text-white">
                    {{ __('Tags') }}
                </x-nav-link>
            </li>
        </ul>
    @endhasanyrole


</nav>
