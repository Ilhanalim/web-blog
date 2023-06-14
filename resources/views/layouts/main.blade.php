<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"> --}}
    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                primary: {
                    50: "#eff6ff",
                    100: "#dbeafe",
                    200: "#bfdbfe",
                    300: "#93c5fd",
                    400: "#60a5fa",
                    500: "#3b82f6",
                    600: "#2563eb",
                    700: "#1d4ed8",
                    800: "#1e40af",
                    900: "#1e3a8a",
                },
            },
        },
    },
    plugins: [],
        }
      </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <title>Halo</title>
</head>
<body class="font-poppins text-gray-600">
    <!-- navbar -->
    <nav class="shadow-sm">
        <div class="container px-4 mx-auto flex items-center py-3">
            <!-- logo -->
            <div class="lg:w-44 w-40">
                <a href="{{route('home')}}">
                    {{-- <img src="src/images/logo.png" alt="logo" class="w-full"> --}}
                    <h1 class="font-semibold">Web Blog</h1>
                </a>
            </div>
            <!-- logo end -->

            <!-- navlinks -->
            <div class="ml-12 lg:flex space-x-5  hidden">
                <a href="{{route('home')}}"
                    class="flex items-center font-semibold text-sm  transition hover:text-blue-500">
                    <span class="mr-2">
                        <i class="fas fa-home"></i>
                    </span>
                    Home
                </a>
                <a href="{{route('home.about')}}"
                    class="flex items-center font-semibold text-sm  transition hover:text-blue-500">
                    <span class="mr-2">
                        <i class="far fa-file-alt"></i>
                    </span>
                    About
                </a>
            </div>
            <!-- navlinks end -->

            <!-- searchbar -->
            {{-- <div class="relative lg:ml-auto hidden lg:block">
                <span class="absolute left-3 top-2 text-sm text-gray-500">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text"
                    class="block w-full shadow-sm border-none rounded-3xl  pl-11 pr-2 py-2 focus:outline-none bg-gray-50 text-sm text-gray-700 placeholder-gray-500"
                    placeholder="Search">
            </div> --}}
            @guest
            <div class="relative lg:ml-auto hidden lg:block">
                <a href="{{route('login.show')}}"
                    class="text-sm font-semibold hover:text-blue-500 transition flex items-center">
                    <span class="mr-2">
                        <i class="far fa-user"></i>
                    </span>
                    Login/Register</a>
            </div>
            @endguest
            
            @auth

            <div class="lg:flex lg:ml-auto hidden">
                <a href="{{route('profile')}}"
                    class="text-sm font-semibold hover:text-blue-500 transition mr-12 flex items-center">
                    <span class="mr-2">
                        <i class="far fa-user"></i>
                    </span>
                    {{auth()->user()->name}}</a>
                
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit"
                    class="text-sm font-semibold hover:text-blue-500 transition flex items-center">
                    <span class="mr-2">
                        <svg class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="1568" height="1280" viewBox="0 0 1568 1280"><path fill="currentColor" d="M640 1184q0 4 1 20t.5 26.5t-3 23.5t-10 19.5t-20.5 6.5H288q-119 0-203.5-84.5T0 992V288Q0 169 84.5 84.5T288 0h320q13 0 22.5 9.5T640 32q0 4 1 20t.5 26.5t-3 23.5t-10 19.5T608 128H288q-66 0-113 47t-47 113v704q0 66 47 113t113 47h312l11.5 1l11.5 3l8 5.5l7 9l2 13.5zm928-544q0 26-19 45l-544 544q-19 19-45 19t-45-19t-19-45V896H448q-26 0-45-19t-19-45V448q0-26 19-45t45-19h448V96q0-26 19-45t45-19t45 19l544 544q19 19 19 45z"/></svg>
                    </span>
                    Logout</button>
                </form>
            </div>
            @endauth
            <div class="text-xl ml-auto text-gray-700 cursor-pointer xl:hidden block hover:text-blue-500 transition" id="open_sidebar">
                <i class="fas fa-bars"></i>
            </div>
            <!-- searchbar end -->

        </div>
    </nav>

    @yield('container')

    <!-- mobile menu -->
<div class="fixed w-full h-full bg-black bg-opacity-25 left-0 top-0 z-10 opacity-0 invisible transition-all duration-500 xl:hidden" id="sidebar_wrapper">
    <div class="fixed top-0 w-72 h-full bg-white shadow-md z-10 flex flex-col transition-all duration-500 -left-80" id="sidebar">

        <!-- search and menu -->
        <div class="lg:hidden">
            <!-- searchbar -->
            {{-- <div class="relative mx-3 mt-3 shadow-sm">
                <span class="absolute left-3 top-2 text-sm text-gray-500">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text"
                    class="block w-full shadow-sm border-none rounded-3xl  pl-11 pr-2 py-2 focus:outline-none bg-gray-50 text-sm text-gray-700 placeholder-gray-500"
                    placeholder="Search">
            </div> --}}
    
            <!-- navlink -->
            <h3 class="text-xl font-semibold text-gray-700 mb-1 font-roboto pl-3 pt-3">Menu</h3>
            <div class="">
                @auth
                <a href="{{route('profile', auth()->user()->id)}}"
                    class="flex px-4 py-1 text-sm font-semibold hover:text-blue-500 transition mr-12 items-center">
                    <span class="mr-2">
                        <i class="far fa-user"></i>
                    </span>
                    {{auth()->user()->name}}
                </a>
                @endauth
                <a href="{{route('home')}}"
                    class="flex px-4 py-1 uppercase items-center font-semibold text-sm  transition hover:text-blue-500">
                    <span class="w-6">
                        <i class="fas fa-home"></i>
                    </span>
                    Home
                </a>
                <a href="#"
                    class="flex px-4 py-1 uppercase items-center font-semibold text-sm  transition hover:text-blue-500">
                    <span class="w-6">
                        <i class="far fa-file-alt"></i>
                    </span>
                    About
                </a>
                <a href="#"
                    class="flex px-4 py-1 uppercase items-center font-semibold text-sm  transition hover:text-blue-500">
                    <span class="w-6">
                        <i class="fas fa-phone"></i>
                    </span>
                    Contact
                </a>
                @guest
                    <div class="relative lg:ml-auto hidden lg:block">
                        <a href="{{route('login.show')}}"
                            class="text-sm font-semibold hover:text-blue-500 transition flex items-center">
                            <span class="mr-2">
                                <i class="far fa-user"></i>
                            </span>
                            Login/Register</a>
                    </div>
                @endguest
                @auth
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit"
                        class="text-sm flex px-4 py-1 font-semibold hover:text-blue-500 transition items-center">
                        <span class="mr-2">
                            <svg class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="1568" height="1280" viewBox="0 0 1568 1280"><path fill="currentColor" d="M640 1184q0 4 1 20t.5 26.5t-3 23.5t-10 19.5t-20.5 6.5H288q-119 0-203.5-84.5T0 992V288Q0 169 84.5 84.5T288 0h320q13 0 22.5 9.5T640 32q0 4 1 20t.5 26.5t-3 23.5t-10 19.5T608 128H288q-66 0-113 47t-47 113v704q0 66 47 113t113 47h312l11.5 1l11.5 3l8 5.5l7 9l2 13.5zm928-544q0 26-19 45l-544 544q-19 19-45 19t-45-19t-19-45V896H448q-26 0-45-19t-19-45V448q0-26 19-45t45-19h448V96q0-26 19-45t45-19t45 19l544 544q19 19 19 45z"/></svg>
                        </span>
                        Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</div>

    <!-- footer -->
    <footer class="border-t py-4">
        <p class=" text-sm text-center">Copyright © 2023 <span class="font-semibold">Ilhanalim</span>
            All Rights Reserved</p>
    </footer>

    <script>
        document.querySelector('#open_sidebar').addEventListener('click', function(){
            document.querySelector('#sidebar').classList.remove('-left-80')
            document.querySelector('#sidebar').classList.add('left-0')
            document.querySelector('#sidebar_wrapper').classList.remove('opacity-0')
            document.querySelector('#sidebar_wrapper').classList.remove('invisible')
        })

        document.body.addEventListener('click', function(e){
            if(e.target.id==='sidebar_wrapper'){
                document.querySelector('#sidebar').classList.add('-left-80')
                document.querySelector('#sidebar').classList.remove('left-0')
                document.querySelector('#sidebar_wrapper').classList.add('opacity-0')
                document.querySelector('#sidebar_wrapper').classList.add('invisible')
            }
        })
    </script>

    
</body>
</html>
