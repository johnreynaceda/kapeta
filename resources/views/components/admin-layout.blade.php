<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    {{-- <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div> --}}
    <div x-data="{ darkMode: false, userDropdownOpen: false }" x-bind:class="{ 'dark': darkMode }">
        <!-- Page Container -->
        <div id="page-container" class="mx-auto flex min-h-screen w-full min-w-[320px] flex-col ">
            <!-- Page Header -->
            <header id="page-header" class="z-1 flex flex-none items-center">
                <div class="container mx-auto px-4 lg:px-8 xl:max-w-7xl">
                    <div class="flex justify-between py-10">
                        <!-- Left Section -->
                        <div class="flex items-center space-x-2 lg:space-x-6">
                            <!-- Logo -->
                            <a href="javascript:void(0)"
                                class="group inline-flex text-xl items-center space-x-2 font-bold uppercase tracking-wider hover:fill-red-600 fill-gray-700 text-red-600 hover:text-gray-700 active:text-slate-200">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="h-6 w-6 -rotate-12  indigo-400 transition group-hover:rotate-0 group-active:opacity-50">
                                    <path
                                        d="M5 3H20C21.1046 3 22 3.89543 22 5V8C22 9.10457 21.1046 10 20 10H18V13C18 15.2091 16.2091 17 14 17H8C5.79086 17 4 15.2091 4 13V4C4 3.44772 4.44772 3 5 3ZM18 5V8H20V5H18ZM2 19H20V21H2V19Z">
                                    </path>
                                </svg>
                                <span class="hidden font-mont sm:inline-block">KAPETA!</span>
                            </a>
                            <!-- END Logo -->
                        </div>
                        <!-- END Left Section -->

                        <!-- Right Section -->
                        <div class="flex items-center space-x-2 lg:space-x-6">
                            <!-- Search -->
                            <div class="flex space-x-4 items-center">
                                <a href="" class="hover:font-medium hover:text-red-600">
                                    <span>Dashboard</span>
                                </a>
                                <a href="" class="hover:font-medium hover:text-red-600">
                                    <span>Products</span>
                                </a>
                                <a href="" class="hover:font-medium hover:text-red-600 flex space-x-1">
                                    <span>Orders</span>
                                    <span
                                        class="px-2 bg-green-600 font-bold grid place-content-center text-white text-sm rounded-lg">25</span>
                                </a>
                            </div>
                            <!-- END Search -->

                            <!-- User Dropdown -->
                            <div class="relative inline-block">
                                <!-- Dropdown Toggle Button -->
                                <button type="button"
                                    class="inline-flex items-center justify-center space-x-3 rounded-full bg-slate-500/10 px-3 py-2 text-sm font-medium leading-5 text-gray-600 hover:bg-slate-500/25 hover:text-gray-700 focus:outline-none focus:ring focus:ring-slate-500 focus:ring-opacity-50"
                                    id="dropdown-user" aria-haspopup="true" x-bind:aria-expanded="userDropdownOpen"
                                    x-on:click="userDropdownOpen = true">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=160&ixid=MXwxfDB8MXxhbGx8fHx8fHx8fA&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=160"
                                        alt="User Avatar" class="inline-block h-8 w-8 rounded-full" />
                                    <span class="hidden sm:inline-block">John Smith</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="hi-solid hi-chevron-down inline-block h-5 w-5 text-slate-600">
                                        <path fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <!-- END Dropdown Toggle Button -->

                                <!-- Dropdown -->
                                <div x-show="userDropdownOpen" x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-75"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-100"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-75"
                                    x-on:click.outside="userDropdownOpen = false" role="menu"
                                    aria-labelledby="dropdown-user"
                                    class="absolute right-0 z-50 mt-2 w-48 rounded shadow-xl">
                                    <div class="space-y-2 rounded-2xl bg-white px-3 py-4 ring-opacity-5">
                                        <a role="menuitem" href="javascript:void(0)"
                                            class="flex items-center space-x-3 rounded-lg py-2 px-3 text-sm font-medium text-gray-500 hover:/50 hover:text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor"
                                                class="hi-solid hi-user-circle inline-block h-5 w-5 text-slate-600">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span>Profile</span>
                                        </a>
                                        <a role="menuitem" href="javascript:void(0)"
                                            class="flex items-center space-x-3 rounded-lg py-2 px-3 text-sm font-medium text-gray-500 hover:/50 hover:text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor"
                                                class="hi-solid hi-bell-alert inline-block h-5 w-5 text-slate-600">
                                                <path
                                                    d="M4.214 3.227a.75.75 0 00-1.156-.956 8.97 8.97 0 00-1.856 3.826.75.75 0 001.466.316 7.47 7.47 0 011.546-3.186zM16.942 2.271a.75.75 0 00-1.157.956 7.47 7.47 0 011.547 3.186.75.75 0 001.466-.316 8.971 8.971 0 00-1.856-3.826z" />
                                                <path fill-rule="evenodd"
                                                    d="M10 2a6 6 0 00-6 6c0 1.887-.454 3.665-1.257 5.234a.75.75 0 00.515 1.076 32.94 32.94 0 003.256.508 3.5 3.5 0 006.972 0 32.933 32.933 0 003.256-.508.75.75 0 00.515-1.076A11.448 11.448 0 0116 8a6 6 0 00-6-6zm0 14.5a2 2 0 01-1.95-1.557 33.54 33.54 0 003.9 0A2 2 0 0110 16.5z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span>Notifications</span>
                                        </a>
                                        <a role="menuitem" href="javascript:void(0)"
                                            class="flex items-center space-x-3 rounded-lg py-2 px-3 text-sm font-medium text-gray-500 hover:/50 hover:text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor"
                                                class="hi-solid hi-cog-8-tooth inline-block h-5 w-5 text-slate-600">
                                                <path fill-rule="evenodd"
                                                    d="M8.34 1.804A1 1 0 019.32 1h1.36a1 1 0 01.98.804l.295 1.473c.497.144.971.342 1.416.587l1.25-.834a1 1 0 011.262.125l.962.962a1 1 0 01.125 1.262l-.834 1.25c.245.445.443.919.587 1.416l1.473.294a1 1 0 01.804.98v1.361a1 1 0 01-.804.98l-1.473.295a6.95 6.95 0 01-.587 1.416l.834 1.25a1 1 0 01-.125 1.262l-.962.962a1 1 0 01-1.262.125l-1.25-.834a6.953 6.953 0 01-1.416.587l-.294 1.473a1 1 0 01-.98.804H9.32a1 1 0 01-.98-.804l-.295-1.473a6.957 6.957 0 01-1.416-.587l-1.25.834a1 1 0 01-1.262-.125l-.962-.962a1 1 0 01-.125-1.262l.834-1.25a6.957 6.957 0 01-.587-1.416l-1.473-.294A1 1 0 011 10.68V9.32a1 1 0 01.804-.98l1.473-.295c.144-.497.342-.971.587-1.416l-.834-1.25a1 1 0 01.125-1.262l.962-.962A1 1 0 015.38 3.03l1.25.834a6.957 6.957 0 011.416-.587l.294-1.473zM13 10a3 3 0 11-6 0 3 3 0 016 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span>Account</span>
                                        </a>
                                        <form onsubmit="return false;">
                                            <button type="submit" role="menuitem"
                                                class="flex w-full items-center space-x-3 rounded-lg py-2 px-3 text-left text-sm font-medium text-gray-500 hover:/50 hover:text-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    class="hi-solid hi-lock-closed inline-block h-5 w-5 text-slate-600">
                                                    <path fill-rule="evenodd"
                                                        d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <span>Sign out</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <!-- END Dropdown -->
                            </div>
                            <!-- END User Dropdown -->
                        </div>
                        <!-- END Right Section -->
                    </div>
                </div>
            </header>
            <!-- END Page Header -->

            <!-- Main Navigation -->
            {{-- <div class="container mx-auto px-4 lg:px-8 xl:max-w-7xl">
                <nav
                    class="flex items-center space-x-4 rounded border border-slate-800/50 bg-slate-800/25 p-5 lg:space-x-8">
                    <a href="javascript:void(0)"
                        class="flex items-center font-light text-white transition md:text-lg">
                        <span>Movies</span>
                    </a>
                    <a href="javascript:void(0)"
                        class="flex items-center font-light text-slate-400 transition hover:text-white active:text-slate-400 md:text-lg">
                        <span>Series</span>
                    </a>
                    <a href="javascript:void(0)"
                        class="flex items-center font-light text-slate-400 transition hover:text-white active:text-slate-400 md:text-lg">
                        <span>Documentaries</span>
                    </a>
                </nav>
            </div> --}}
            <!-- END Main Navigation -->

            <!-- Page Content -->
            <main id="page-content" class="flex max-w-full flex-auto flex-col">
                {{ $slot }}
            </main>
            <!-- END Page Content -->

            <!-- Footer -->
            {{-- <footer id="page-footer" class="flex grow-0 items-center border-t border-slate-800">
                <div
                    class="container mx-auto flex flex-col space-y-2 px-4 py-10 text-center text-sm font-medium text-gray-500 md:flex-row md:justify-between md:space-y-0 md:text-left lg:px-8 xl:max-w-7xl">
                    <div>© <span class="font-semibold">TailFlix</span></div>
                    <div class="inline-flex items-center justify-center">
                        <span>Crafted with</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true" class="mx-1 h-4 w-4 text-red-600">
                            <path
                                d="M9.653 16.915l-.005-.003-.019-.01a20.759 20.759 0 01-1.162-.682 22.045 22.045 0 01-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 018-2.828A4.5 4.5 0 0118 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 01-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 01-.69.001l-.002-.001z">
                            </path>
                        </svg>
                        <span>by
                            <a class="font-medium text-indigo-400 transition hover:text-indigo-500"
                                href="https://pixelcave.com" target="_blank">pixelcave</a></span>
                    </div>
                </div>
            </footer> --}}
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->
    </div>
</body>

</html>
