<aside x-show="sidebarOpen"
                   x-transition:enter="transition ease-in-out duration-300 transform"
                   x-transition:enter-start="-translate-x-full"
                   x-transition:enter-end="translate-x-0"
                   x-transition:leave="transition ease-in-out duration-300 transform"
                   x-transition:leave-start="translate-x-0"
                   x-transition:leave-end="-translate-x-full"
                   :class="{ 'fixed inset-y-0 z-20': isMobile, 'flex-shrink-0': !isMobile }"
                   class="w-64 bg-white text-white h-full border-r border-gray-200">
                <!-- Mobile close button (top right) -->
                <div x-show="isMobile" class="absolute top-0 right-0 p-2">
                    <button @click="sidebarOpen = false" class="text-gray-300 hover:text-white">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <div class="p-4">
                    <nav :class="{ 'mt-6': isMobile }">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            <x-house-icon/>
                            <span class="mx-4">Dashboard</span>
                        </x-nav-link>
                        <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                            <x-house-icon/>
                            <span class="mx-4">Perfil</span>
                        </x-nav-link>
                        {{-- <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            <span class="mx-4">Productos</span>
                        </x-nav-link>
                        <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                            <span class="mx-4">Categorías</span>
                        </x-nav-link> --}}
                    </nav>
                </div>
            </aside>
