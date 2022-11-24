@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="w-full h-full flex justify-center items-center min-h-screen bg-primary">
        <div class="relative pt-6 pb-16 sm:pb-20">
            <header>
                <nav class="container relative flex items-center justify-between px-4 mx-auto sm:px-6" aria-label="Global">
                    <div class="flex items-center flex-1">
                        <div class="flex items-center justify-between w-full lg:w-auto">
                            <a href="/">
                                <span class="sr-only">Meraki UI</span>
                                <img class="w-auto h-7 sm:h-8" src="/images/logo.svg" alt="" />
                            </a>
                            <div class="flex items-center -mr-2 lg:hidden">
                                <button type="button"
                                    class="inline-flex items-center justify-center p-2 text-white rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus-ring-inset focus:ring-gray-700"
                                    aria-expanded="false">
                                    <span class="sr-only">Open main menu</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 rotate-180" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="hidden space-x-10 lg:flex lg:ml-10">
                            <a href="/components"
                                class="capitalize transition-colors duration-300 text-white hover:text-blue-400">Components</a><a
                                href="/themes"
                                class="capitalize transition-colors duration-300 text-white hover:text-blue-400">premium
                                themes
                            </a>
                            <a href="/request-component"
                                class="capitalize transition-colors duration-300 text-white hover:text-blue-400">request
                                component
                            </a>
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
                        <div class="px-2 pt-4 pb-3 space-y-0.5">
                            <a href="/components"
                                class="block px-3 py-2 text-base text-gray-700 capitalize rounded-md hover:text-gray-900 hover:bg-gray-50">Components</a><a
                                href="/themes"
                                class="block px-3 py-2 text-base text-gray-700 capitalize rounded-md hover:text-gray-900 hover:bg-gray-50">premium
                                themes</a>
                            <a href="/request-component"
                                class="block px-3 py-2 text-base text-gray-700 capitalize rounded-md hover:text-gray-900 hover:bg-gray-50">request
                                component</a>
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
                                    <span class="md:block">Custom UI Components Built</span><span
                                        class="text-blue-400 md:block"> with Tailwind CSS &amp; Alpine JS</span>
                                </h1>
                                <p class="mt-3 text-base text-gray-300 sm:mt-5 sm:text-xl xl:text-lg">Meraki UI is Tailwind
                                    CSS Components That Support RTL Languages &amp; Fully Responsive Based On Flexbox &amp;
                                    CSS Grid with elegant Dark Mode.</p>
                                <div class="flex flex-wrap items-center justify-center mt-8 space-x-5 lg:justify-start"><a
                                        aria-label="components" href="/components"
                                        class="flex text-white hover:underline"><svg xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z">
                                            </path>
                                        </svg>
                                        <p class="mx-2">139 Components</p>
                                    </a><a aria-label="MIT License" class="flex text-white hover:underline" target="_blank"
                                        href="https://github.com/merakiui/merakiui/blob/master/LICENSE"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0012 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 01-2.031.352 5.988 5.988 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 01-2.031.352 5.989 5.989 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971z">
                                            </path>
                                        </svg>
                                        <p class="mx-2">MIT Licensed</p>
                                    </a></div>
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
