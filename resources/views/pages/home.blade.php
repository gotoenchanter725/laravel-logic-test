@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="w-full h-full flex justify-center items-center min-h-screen bg-primary">
        <div class="relative pt-6 pb-16 sm:pb-20">
            <header>
                <nav class="container relative flex items-center justify-between px-4 mx-auto sm:px-6" aria-label="Global">
                    <div class="flex items-center flex-1">
                        <div class="space-x-10 lg:flex lg:ml-10">
                            <a href="/register"
                                class="capitalize transition-colors duration-300 text-white hover:text-blue-400">Register</a>
                            @if ($user)
                                <a href="/main"
                                    class="capitalize transition-colors duration-300 text-white hover:text-blue-400">Main</a>
                            @endif
                                
                            @if ($user && $user->is_admin)
                                <a href="/admin/users"
                                    class="capitalize transition-colors duration-300 text-white hover:text-blue-400">Admin</a>
                            @endif
                        </div>
                    </div>
                </nav>
                <div class="absolute inset-x-0 top-0 z-10 p-2 transition origin-top-right transform" style="display: none;">
                    <div class="overflow-hidden bg-white rounded-lg shadow-md ring-1 ring-black ring-opacity-5">
                        <div class="flex items-center justify-between px-5 pt-4">
                            <div><img class="w-auto h-7 sm:h-8" src="/images/logo.svg" alt=""></div>
                            <div class="-mr-2">
                                <button type="button"
                                    class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500"><span
                                        class="sr-only">Close menu</span><svg class="w-5 h-5"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <main class="flex justify-around items-center mt-16 sm:mt-20">
                <div class="container px-4 mx-auto sm:px-6">
                    <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                        <div class="sm:text-center lg:col-span-6 lg:text-left lg:flex lg:items-center">
                            <div>
                                <h1
                                    class="mt-4 text-3xl font-bold text-white sm:mt-5 sm:leading-none lg:mt-6 lg:text-4xl 2xl:text-5xl">
                                    <span class="md:block">Laravel</span>
                                    <span class="text-blue-400 md:block"> with Tailwind CSS</span>
                                </h1>
                                <p class="mt-3 text-base text-gray-300 sm:mt-5 sm:text-xl xl:text-lg">
                                    Tailwind provides almost all the tools you need to build out a site, so you rarely need to write any custom CSS.
                                </p>
                                <div
                                    class="grid grid-cols-1 gap-3 mt-8 text-center lg:justify-start sm:justify-center sm:flex sm:gap-0 sm:space-x-4">
                                    <a aria-label="Premium Themes" href="/register"
                                        class="flex items-center justify-center px-6 py-3 space-x-2 text-sm font-medium text-white transition-colors duration-300 bg-gray-800 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-gray-600">
                                        <span>
                                            Register
                                        </span>
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-16 sm:mt-24 lg:mt-0 lg:col-span-6"><img
                                class="xl:max-w-xl" src="{{ asset('assets/images/home.svg') }}" alt="home"></div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
