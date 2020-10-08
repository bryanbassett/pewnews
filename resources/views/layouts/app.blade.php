<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PewNews @yield('page_title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
      
    </head>
    <body class="antialiased bg-gray-100 dark:bg-gray-900">
        
            @if (Route::has('login'))

        <nav class="flex items-center justify-between flex-wrap  bg-gradient-to-l to-gray-200 from-red-800 p-6"  onclick="toggleNavbar('navbar')">
            <div class="flex items-center flex-shrink-0 text-white mr-6">
                <a href="{{ url('/') }}">
                    <div class="flex items-center flex-shrink-0 text-white mr-6">
                        <img class="h-8 fill-current" src="/images/headerlogo.png">
                    </div>
                </a>
            </div>
            <div class="block lg:hidden">
                <button class="flex items-center px-3 py-2 border rounded text-red-900 border-teal-400 hover:text-white hover:border-white">
                  <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                </button>
            </div>
            <div class="w-full block hidden  flex-grow lg:flex lg:items-center lg:w-auto " id="navbar">
                <div class="text-sm lg:flex-grow">
                        <a href="{{ url('/') }}" class="block mt-4 lg:inline-block lg:mt-0 text-red-900 hover:text-white mr-4">Home</a>  
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block mt-4 lg:inline-block lg:mt-0 text-red-900 hover:text-white mr-4">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block mt-4 lg:inline-block lg:mt-0 text-red-900 hover:text-white mr-4">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="block mt-4 lg:inline-block lg:mt-0 text-red-900 hover:text-white mr-4">Register</a>
                        @endif
                    @endif
                </div>
            </div>

            @endif
            </nav>
            <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 pt-4">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

                @yield('content')   

                <!-- footer -->
                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                
                            <a href="https://bjbassett.org" class="ml-1 underline">
                               Bryan James Bassett 2020
                            </a>
                            
                        </div>
                    </div>
                    <!-- end footer -->
                
                </div>
            </div>
        </div>
        <script>

            function toggleNavbar(collapseID){
                document.getElementById(collapseID).classList.toggle("hidden");
                document.getElementById(collapseID).classList.toggle("flex");
            }
          
        </script>
    </body>
</html>