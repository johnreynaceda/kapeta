<div>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
</div>
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
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style>
        #map {
            height: 100%;
        }

        /*
 * Optional: Makes the sample page fill the window.
 */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            background-color: #fff;
            border: 0;
            border-radius: 2px;
            box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
            margin: 10px;
            padding: 0 0.5em;
            font: 400 18px Roboto, Arial, sans-serif;
            overflow: hidden;
            font-family: Roboto;
            padding: 0;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }

        #target {
            width: 345px;
        }
    </style>
    <!-- Scripts -->
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body class="font-sans antialiased ">
    <div class="relative z-50" x-data="{ darkMode: false, userDropdownOpen: false }" x-bind:class="{ 'dark': darkMode }">
        <!-- Page Container -->
        <div id="page-container" class="mx-auto flex min-h-screen w-full relative min-w-[320px] flex-col ">
            <!-- Page Header -->
            <header id="page-header" class="z-1 flex flex-none items-center relative">
                <div class="relative container mx-auto px-4 lg:px-8 xl:max-w-7xl">
                    <div class="flex justify-between py-10">
                        <!-- Left Section -->
                        <div class="flex items-center relative space-x-2 lg:space-x-6">
                            <!-- Logo -->
                            <a href="{{ route('customer.dashboard') }}"
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
                        <div class="flex items-center relative space-x-2 lg:space-x-6">
                            <!-- Search -->
                            <div class="flex space-x-4 items-center">
                                <a href="{{ route('customer.dashboard') }}"
                                    class="{{ request()->routeIs('customer.dashboard') ? 'text-red-600 font-medium' : '' }} hover:font-medium hover:text-red-600">
                                    <span>Dashboard</span>
                                </a>
                                <a href="{{ route('customer.location') }}"
                                    class="{{ request()->routeIs('customer.location') ? 'text-red-600 font-medium' : '' }} hover:font-medium hover:text-red-600">
                                    <span>Locate Shops</span>
                                </a>
                                <a href="{{ route('customer.my-order') }}"
                                    class="{{ request()->routeIs('customer.my-order') ? 'text-red-600 font-medium' : '' }} hover:font-medium hover:text-red-600 flex space-x-1">
                                    <span>My Orders</span>
                                </a>

                                <livewire:customer.cart />
                            </div>
                            <!-- END Search -->

                            <!-- User Dropdown -->
                            <div class="relative inline-block">
                                <!-- Dropdown Toggle Button -->
                                <button type="button"
                                    class="inline-flex relative items-center   justify-center space-x-3 rounded-full bg-slate-50 border px-3 py-2 text-sm font-medium leading-5 text-gray-600  hover:text-gray-700 focus:outline-none focus:ring focus:ring-slate-500 focus:ring-opacity-50"
                                    id="dropdown-user" aria-haspopup="true" x-bind:aria-expanded="userDropdownOpen"
                                    x-on:click="userDropdownOpen = true">
                                    <img src="{{ auth()->user()->customerDetail->profile_path == null ? 'https://ui-avatars.com/api/?name=' . auth()->user()->name . '&color=7F9CF5&background=EBF4FF' : asset('storage/' . auth()->user()->customerDetail->profile_path) }}"
                                        alt="User Avatar" class="inline-block h-8 w-8 rounded-full" />
                                    <span class="hidden sm:inline-block">{{ auth()->user()->name }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="hi-solid hi-chevron-down inline-block h-5 w-5 text-slate-600">
                                        <path fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <!-- END Dropdown Toggle Button -->

                                <!-- Dropdown -->
                                <div x-show="userDropdownOpen" x-cloak
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-75"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-100"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-75"
                                    x-on:click.outside="userDropdownOpen = false" role="menu"
                                    aria-labelledby="dropdown-user"
                                    class="absolute right-0 z-50 mt-2 w-48 rounded shadow">
                                    <div class=" rounded-2xl bg-white px-3  ring-opacity-5">
                                        <a role="menuitem" href="{{ route('customer.profile') }}"
                                            class="flex items-center space-x-3 rounded-lg py-2 px-3 text-sm fill-gray-500 hover:font-medium hover:text-red-600 hover:fill-red-600 text-gray-500 hover:/50 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5">
                                                <path
                                                    d="M5 20H19V22H5V20ZM12 18C7.58172 18 4 14.4183 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10C20 14.4183 16.4183 18 12 18Z">
                                                </path>
                                            </svg>
                                            <span>Profile</span>
                                        </a>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                                type="submit" role="menuitem"
                                                class="flex w-full items-center fill-gray-500 hover:font-medium hover:text-red-600 hover:fill-red-600 space-x-3 rounded-lg py-2 px-3 text-left text-sm font-medium text-gray-500 hover:/50 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    class="h-5 w-5">
                                                    <path
                                                        d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM17 16L22 12L17 8V11H9V13H17V16Z">
                                                    </path>
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

            <main id="page-content" class="flex max-w-full flex-auto relative flex-col">
                {{ $slot }}
            </main>

        </div>
    </div>
    <div class="fixed top-0 right-0  left-0 bottom-0">
        <x-svg.bg class="opacity-10 z-30" />
    </div>
    <x-notifications z-index="z-50" />
    <x-dialog z-index="z-50" blur="md" align="center" />
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initAutocomplete&libraries=places&v=weekly"
        defer></script>
    @livewireScripts
</body>

</html>
