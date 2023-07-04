{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class=h-full>

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

<body class="font-sans antialiased h-full">
    <section>
        <div class="relative flex justify-center max-h-full overflow-hidden lg:px-0 md:px-12">
            <div
                class="relative z-10 flex flex-col flex-1 px-4 py-10 bg-white shadow-2xl lg:py-24 md:flex-none md:px-28 sm:justify-center">
                <div class="w-full max-w-md mx-auto md:max-w-sm md:px-0 md:w-96 sm:px-4">
                    <div class="flex flex-col">
                        <div>
                            <h2 class="text-4xl text-black">Let's get started!</h2>
                            <p class="mt-2 text-sm text-gray-500">
                                Complete the details below so I can process your request and then
                                schedule a time to discuss your goals.
                            </p>
                        </div>
                    </div>
                    <form>
                        <input autocomplete="false" name="hidden" style="display: none">
                        <input name="_redirect" type="hidden" value="#">
                        <div class="mt-4 space-y-6">
                            <div>
                                <label class="block mb-3 text-sm font-medium text-gray-600" name="name">
                                    First name
                                </label>
                                <input
                                    class="block w-full px-6 py-3 text-black bg-white border border-gray-200 appearance-none rounded-xl placeholder:text-gray-400 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                    placeholder="Your name">
                            </div>
                            <div class="col-span-full">
                                <label class="block mb-3 text-sm font-medium text-gray-600" name="company">
                                    What is the name of your company / organisation?
                                </label>
                                <input
                                    class="block w-full px-6 py-3 text-black bg-white border border-gray-200 appearance-none rounded-xl placeholder:text-gray-400 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                    placeholder="Company name">
                            </div>
                            <div class="col-span-full">
                                <label class="block mb-3 text-sm font-medium text-gray-600" name="email">
                                    How shall we contact you?
                                </label>
                                <input
                                    class="block w-full px-6 py-3 text-black bg-white border border-gray-200 appearance-none rounded-xl placeholder:text-gray-400 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                    placeholder="email@example.com" autocomplete="off" type="email">
                            </div>
                            <div>
                                <div>
                                    <label class="block mb-3 text-sm font-medium text-gray-600" name="message">
                                        Project details
                                    </label>
                                    <div class="mt-1">
                                        <textarea
                                            class="block w-full px-6 py-3 text-black bg-white border border-gray-200 appearance-none rounded-xl placeholder:text-gray-400 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                            placeholder="What are you working on?" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-full">
                                <button
                                    class="items-center justify-center w-full px-6 py-2.5 text-center text-white duration-200 bg-black border-2 border-black rounded-full nline-flex hover:bg-transparent hover:border-black hover:text-black focus:outline-none focus-visible:outline-black text-sm focus-visible:ring-black"
                                    type="submit">
                                    Submit your request
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="hidden bg-white lg:block lg:flex-1 lg:relative sm:contents">
                <div class="absolute inset-0 object-cover w-full h-full bg-white" alt="" height="1866"
                    width="1664">
                    <img class="object-center w-full h-auto bg-gray-200"
                        src="https://d33wubrfki0l68.cloudfront.net/64c901dbc4b16388ef27646a320ad9c1441594df/236fd/images/placeholders/rectangle2.svg"
                        alt="" width="1310" height="873">
                </div>
            </div>
        </div>
    </section>
</body>

</html>
