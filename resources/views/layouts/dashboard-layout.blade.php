<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'iNotify') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="relative min-h-screen md:flex">
            <!-- sidebar -->
            <aside class="z-10 text-red-100 w-64 px-2 py-4 absolute inset-y-0 left-0 md:relative shadow-lg" style="background-color: #972121">

            <!-- logo -->
            <div class="flex items-center justify-between px-2">
                <div class="flex items-center space-x-10">
                    <a href="">
                        <x-application-logo-white class="block h-15 w-auto fill-current"/>
                    </a>   
                </div>
            </div>

                <!-- Page Heading -->
            @if (isset($header))
                <header>
                    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-7">
                        <hr>
                    </div>
                </header>
            @endif
            
                <span class="text-2x1 font-extrabold ml-5" style="font-family:'Open Sans'">Main Menu</span>

                <!-- Nav links -->
                <nav class="mt-7" style="font-family: 'Poppins'; font-weight: bold">
                    <x-side-nav-link href="{{route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    <i class="fa-solid fa-gauge-high mr-3"></i>Dashboard
                    </x-side-nav-link>

                    <x-side-nav-link href="{{route('reports') }}" :active="request()->routeIs('reports')">
                    <i class="fa-solid fa-envelope mr-3"></i>Reports
                    </x-side-nav-link>

                    <x-side-nav-link href="{{route('contacts.index') }}" :active="(request()->routeIs('contacts.index') || request()->routeIs('contacts.department'))">
                    <i class="fa-solid fa-address-book mr-3"></i>Contacts
                    </x-side-nav-link>

                    <x-side-nav-link href="{{route('verifications') }}" :active="request()->routeIs('verifications')">
                    <i class="fa-solid fa-file-circle-check mr-3"></i>Verifications
                    </x-side-nav-link>
                </nav>

                  <!-- Footer -->
                <footer class="text-center text-lg-start text-muted" style="font-family: 'Poppins'; font-size:13px">
                        <!-- Left -->
                        <div class="me-5 d-none d-lg-block" style="margin-top:55vh">
                            <span>Disaster Response System</span>
                        </div>
                </footer>
            </aside>

            <!-- Main content -->
            <main class="flex-1 bg-gray-100 h-screen">
                <nav>
                    <div class="mx-auto px-2 sm:px-6 lg-px-8 mt-5">
                        <div class="relative flex items-center justify-between md:justify-end h-16">
                            <div class="absolute inset-y-0 right-0 flex-items-center">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="flex items-center text-sm font-medium rounded-md text-gray-700 hover:text-red-700
                                        p-2 focus:outline-none transition ease-in-out duration-200">
                                        <div class="row">
                                            <div style="font-size:20px">{{ Auth::user()->name }}</div>
                                            <div style="font-size:12px">{{ Auth::user()->department}}</div>
                                        </div>
                                            

                                            <div class="ml-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit')">
                                            <p><i class="fa-solid fa-gear mr-5"></i>My Profile</p>
                                        </x-dropdown-link>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                <p><i class="fa-solid fa-right-from-bracket mr-5"></i>Logout</p>
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </div>
                    </div>
                </nav>
                <div>
                    {{$slot}}
                </div>
            </main>
        </div>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCT_l3vrw3dC6Iz4vKzeeRlYKAu2rMJMi4&libraries=places"></script>
    </body>
</html>
