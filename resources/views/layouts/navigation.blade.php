<nav x-data="{ open: false }" class="bg-slate-900/80 backdrop-blur-md border-b border-slate-800 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 group">
                        <div class="p-2 rounded-xl bg-indigo-600 shadow-lg shadow-indigo-600/20 group-hover:scale-110 transition-transform">
                             <x-application-logo class="block h-6 w-auto fill-current text-white" />
                        </div>
                        <span class="text-xl font-black text-white tracking-tighter group-hover:text-indigo-400 transition-colors">PORTAL<span class="text-indigo-600">.</span></span>
                    </a>
                </div>

                <div class="hidden space-x-4 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-slate-400 hover:text-white border-transparent hover:border-indigo-500 transition-all">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('about')" :active="request()->routeIs('about')" class="text-slate-400 hover:text-white border-transparent hover:border-indigo-500 transition-all">
                        {{ __('About') }}
                    </x-nav-link>
                    @auth
                        <x-nav-link :href="route('product.index')" :active="request()->routeIs('product.*')" class="text-slate-400 hover:text-white border-transparent hover:border-indigo-500 transition-all">
                            {{ __('Products') }}
                        </x-nav-link>

                        @can('view-category') 
                            <x-nav-link :href="route('category.index')" :active="request()->routeIs('category.*')" class="text-slate-400 hover:text-white border-transparent hover:border-indigo-500 transition-all">
                                {{ __('Categories') }}
                            </x-nav-link>
                        @endcan
                    @endauth
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="h-8 w-px bg-slate-800 mx-4"></div>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-3 p-1.5 pr-4 rounded-2xl bg-slate-800/50 border border-slate-700/50 hover:bg-slate-800 transition-all group">
                            <div class="w-8 h-8 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-bold text-xs">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <div class="text-sm font-semibold text-slate-300 group-hover:text-white transition-colors">{{ Auth::user()->name }}</div>
                            <svg class="fill-current h-4 w-4 text-slate-500 group-hover:text-white transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" class="text-rose-400 hover:text-rose-300" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-slate-900 border-t border-slate-800">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @auth
                <x-responsive-nav-link :href="route('product.index')" :active="request()->routeIs('product.*')">
                    {{ __('Product') }}
                </x-responsive-nav-link>

                @can('view-category') 
                    <x-responsive-nav-link :href="route('category.index')" :active="request()->routeIs('category.*')">
                        {{ __('Category') }}
                    </x-responsive-nav-link>
                @endcan
            @endauth
        </div>
        <div class="pt-4 pb-1 border-t border-slate-800">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-slate-400">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>