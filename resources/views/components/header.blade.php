<header class="bg-white shadow-sm w-full h-[8vh]">
    <div class="flex items-center justify-between mx-auto w-full h-full">
        <!-- Mobile menu button and logo -->
        <div class="flex items-center h-full">
            <button @click="sidebarOpen = !sidebarOpen" x-show="isMobile" class="text-gray-500 focus:outline-none ml-4 mr-1">
                <svg x-show="!sidebarOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="sidebarOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Logo or app name -->
            <div :class="{ 'border-r-[1px] border-b-[1px] border-gray-300 w-64': !isMobile }" class=" flex py-4 px-2 items-center justify-center h-full">
            <x-application-logo class="w-[40px] fill-current text-primary" />
            <a href="{{ route('dashboard') }}" class="text-xl font-bold text-gray-800 ml-2">
                Dashboard
            </a>
            </div>
        </div>


        <!-- User dropdown -->
        <div class="flex items-center mr-4">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out cursor-pointer">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Perfil') }}
                    </x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                            {{ __('Cerrar sesión') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</header>
