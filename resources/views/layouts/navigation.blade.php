<nav x-data="{ open: false }" class="sticky top-0 z-50 border-b border-white/60 bg-white/80 shadow-sm backdrop-blur-xl">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 rounded-full border border-emerald-100 bg-white/80 px-3 py-2 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                        <div class="rounded-full bg-emerald-600 p-2 text-white shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-600">Portal</div>
                            <span class="text-lg font-bold text-slate-900">{{ config('app.name', 'Pesantren Kita') }}</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-8 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-emerald-700 hover:text-emerald-900">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if(auth()->user()->isAdmin() || auth()->user()->isStaff())
                        <x-nav-link :href="route('pendaftaran.index')" :active="request()->routeIs('pendaftaran.*')" class="text-emerald-700 hover:text-emerald-900">
                            {{ __('Pendaftaran') }}
                        </x-nav-link>
                        
                        <x-nav-link :href="route('informasi.index')" :active="request()->routeIs('informasi.*')" class="text-emerald-700 hover:text-emerald-900">
                            {{ __('Informasi') }}
                        </x-nav-link>
                    @endif

                    @if(auth()->user()->isWali())
                        <x-nav-link :href="route('riwayat.index')" :active="request()->routeIs('riwayat.*')" class="text-emerald-700 hover:text-emerald-900">
                            {{ __('Riwayat') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-3 rounded-full border border-emerald-100 bg-emerald-50 px-3 py-2 text-sm font-medium leading-4 text-emerald-800 transition duration-150 ease-in-out hover:bg-emerald-100 focus:outline-none">
                            <span class="flex h-8 w-8 items-center justify-center rounded-full bg-emerald-600 text-xs font-semibold text-white shadow-sm">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-emerald-700 hover:text-emerald-900">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-emerald-700 hover:text-emerald-900">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center rounded-xl p-2 text-emerald-700 transition duration-150 ease-in-out hover:bg-emerald-100 hover:text-emerald-900 focus:outline-none focus:bg-emerald-100 focus:text-emerald-900">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-emerald-100 bg-white/95 backdrop-blur-xl">
        <div class="space-y-1 px-4 py-3">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @if(auth()->user()->isAdmin() || auth()->user()->isStaff())
                <x-responsive-nav-link :href="route('pendaftaran.index')" :active="request()->routeIs('pendaftaran.*')">
                    {{ __('Pendaftaran') }}
                </x-responsive-nav-link>
                
                <x-responsive-nav-link :href="route('informasi.index')" :active="request()->routeIs('informasi.*')">
                    {{ __('Informasi') }}
                </x-responsive-nav-link>
            @endif

            @if(auth()->user()->isWali())
                <x-responsive-nav-link :href="route('riwayat.index')" :active="request()->routeIs('riwayat.*')">
                    {{ __('Riwayat') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="border-t border-emerald-100 px-4 pb-1 pt-4">
            <div class="rounded-2xl bg-emerald-50 px-4 py-3">
                <div class="font-medium text-base text-emerald-900">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-emerald-600">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
