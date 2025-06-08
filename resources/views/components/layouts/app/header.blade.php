<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white" style="background-image: url('{{ asset('images/fondo5.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        
        <flux:header container class="z-50 border-b border-green-700 bg-green-100 dark:border-green-800 dark:bg-green-900">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <!-- Logo a la izquierda -->
            <img src="{{ asset('images/logo2.png') }}" alt="" class="h-15 w-auto">

            <!-- Spacer para centrar el menú -->
            <flux:spacer />

            <!-- Menú centrado -->
            <flux:navbar class="-mb-px max-lg:hidden space-x-8 rtl:space-x-reverse text-sm font-medium text-white justify-center flex-1">
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'border-b-2 border-yellow-400 text-white' : 'hover:text-yellow-300' }}" wire:navigate>
                    Inicio
                </a>
                <a href="{{ route('categorias') }}" class="{{ request()->routeIs('categorias') ? 'border-b-2 border-yellow-400 text-white' : 'hover:text-yellow-300' }}">
                    Categorías
                </a>
                <a href="{{ route('nosotros') }}" class="{{ request()->routeIs('nosotros') ? 'border-b-2 border-yellow-400 text-white' : 'hover:text-yellow-300' }}">
                    Nosotros
                </a>
                <a href="{{ route('servicios') }}" class="{{ request()->routeIs('servicios') ? 'border-b-2 border-yellow-400 text-white' : 'hover:text-yellow-300' }}">
                    Servicios
                </a>
                <a href="{{ route('contactanos') }}" class="{{ request()->routeIs('contactanos') ? 'border-b-2 border-yellow-400 text-white' : 'hover:text-yellow-300' }}">
                    Contáctanos
                </a>
            </flux:navbar>


            <flux:spacer />

            <flux:navbar class="me-1.5 space-x-0.5 rtl:space-x-reverse py-0!">
                <!-- Buscador con input -->
                <form class="flex items-center">
                    <input
                        type="text"
                        placeholder="Buscar..."
                        class="rounded-full px-3 py-1 text-sm bg-white text-black border border-green-400 focus:outline-none focus:ring-2 focus:ring-green-400"
                    />
                    <button type="submit" class="ml-2 text-green-700 hover:text-green-900">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <!-- Carrito con contador dinámico -->
                @php
                    $cart = session('cart', []);
                    $cart_count = array_sum($cart);
                @endphp
                {{-- 
                <a href="{{ route('carrito') }}" class="relative mx-4 text-green-400 hover:text-green-600 transition" title="Carrito">
                    <i class="fas fa-shopping-cart text-2xl"></i>
                    @if($cart_count > 0)
                        <span class="absolute -top-2 -right-2 bg-yellow-400 text-black rounded-full text-xs px-2 py-0.5 font-bold">
                            {{ $cart_count }}
                        </span>
                    @endif
                </a>
                --}}
            </flux:navbar>

            <!-- Desktop User Menu -->
            <flux:dropdown position="top" align="end">
                <flux:profile
                    class="cursor-pointer"
                    :initials="auth()->user()->initials()"
                />
                

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Ajustes') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
            
        </flux:header>

        <!-- Mobile Menu -->
        <flux:sidebar stashable sticky class="lg:hidden border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="ms-1 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')">
                    <flux:navlist.item icon="layout-grid" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Dashboard') }}
                    </flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>
        </flux:sidebar>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
