@extends('layouts.main')

@section('container')
    <!-- main -->
    <main class="pt-12 bg-gray-100 pb-12">
        <div class="container mx-auto px-4 flex flex-wrap lg:flex-nowrap">

            <!-- Main content -->
            <div class="xl:w-8/12 lg:w-9/12 w-full  xl:ml-6 lg:mr-6">

                <!-- title -->
                {{-- <div class="flex bg-white px-3 py-2 justify-between items-center rounded-sm mb-5">
                    <h5 class="text-base uppercase font-semibold font-roboto">BUSINESS</h5>
                    <a href="#"
                        class="text-white py-1 px-3 rounded-sm uppercase text-sm bg-blue-500 border border-blue-500 hover:text-blue-500 hover:bg-transparent transition">
                        see more
                    </a>
                </div> --}}
                @auth  
                <div class="relative lg:ml-auto lg:block mb-5">
                    <a href="{{route('profile').'/create'}}">
                        <button class="bg-slate-600 hover:bg-slate-900 text-white font-bold py-2 px-4 rounded-full">
                            <i class="fas fa-pencil mr-2"></i>Write Something
                        </button>
                    </a>
                </div>
                @endauth
                <!-- big post -->
                <div class="rounded-lg overflow-hidden bg-white shadow-sm">
                    {{-- <a href="view.html" class="block rounded-md overflow-hidden">
                    </a> --}}
                    <img class="bg-left" src="{{asset('img/about.png')}}"
                    class="w-full h-96 object-cover transform hover:scale-110 transition duration-500">
                    <div class="p-4 pb-5">
                        <a href="{{route('login.show')}}">
                            <h2
                                class="block text-2xl font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
                                Write your own blog
                            </h2>
                        </a>

                        <p class="text-gray-500 text-sm mt-2">
                            Login to write some blog
                        </p>
                        {{-- <div class="mt-3 flex space-x-4">
                            <div class="flex text-gray-400 text-sm items-center">
                                <span class="mr-2 text-xs">
                                    <i class="far fa-user"></i>
                                </span>
                                Blogging Tips
                            </div>
                            <div class="flex text-gray-400 text-sm items-center">
                                <span class="mr-2 text-xs">
                                    <i class="far fa-clock"></i>
                                </span>
                                June 11, 2021
                            </div>
                        </div> --}}
                    </div>
                </div>

                <!-- regular post -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    @foreach ($blogs as $blog)
                    <div class="rounded-lg bg-white p-4 pb-5 shadow-sm">
                        <a href="{{'blog/' . $blog['id']}}" class="block rounded-md overflow-hidden">
                        </a>
                        <div class="mt-3">
                            <a href="{{route('home.id', $blog->id)}}">
                                <h2
                                    class="block text-xl font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
                                    {{$blog->title}}
                                </h2>
                            </a>
                            <div class="mt-2 flex space-x-3">
                                <div class="flex text-gray-400 text-sm items-center">
                                    <span class="mr-2 text-xs">
                                        <i class="far fa-user"></i>
                                    </span>
                                    <a href="{{route('home.user', $blog->user->id)}}" class="hover:text-blue-500 transition font-roboto">
                                        {{$blog->user->name}}
                                    </a>
                                </div>
                                <div class="flex text-gray-400 text-sm items-center">
                                    <span class="mr-2 text-xs">
                                        <i class="far fa-clock"></i>
                                    </span>
                                    {{-- June 11, 2021 --}}
                                    {{$blog->created_at->format('Y-m-d')}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
                <div class="mt-5">
                {{$blogs->links()}}
                </div>
            </div>
 
            <!-- right sidebar -->
            <div class="lg:w-3/12 w-full mt-8 lg:mt-0">
                <!-- Social plugin -->
                <div class="w-full bg-white shadow-sm rounded-lg p-4 ">
                    <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Social</h3>
                    <div class="flex gap-2">
                        <a href="https://ilhanalim.github.io/" target="_blank"
                            class="w-8 h-8 rounded-lg hover:bg-slate-900 hover:text-white transition flex items-center justify-center border border-gray-400 text-base text-gray-800">
                            <i class="fa-solid fa-globe"></i>
                        </a>
                        <a href="https://github.com/Ilhanalim" target="_blank"
                            class="w-8 h-8 rounded-lg hover:bg-slate-900 hover:text-white transition flex items-center justify-center border border-gray-400 text-base text-gray-800">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="https://www.instagram.com/ilhanalim_/" target="_blank"
                            class="w-8 h-8 rounded-lg hover:bg-slate-900 hover:text-white transition flex items-center justify-center border border-gray-400 text-base text-gray-800">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/ilhan-alim-74a627266/" target="_blank"
                            class="w-8 h-8 rounded-lg hover:bg-slate-900 hover:text-white transition flex items-center justify-center border border-gray-400 text-base text-gray-800">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <!-- Popular posts -->
                <div class="w-full mt-8 bg-white shadow-sm rounded-lg p-4 ">
                    <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Random Posts</h3>
                    <div class="space-y-4">
                        @for ($i = 0; $i < 5; $i++)
                        @php
                            $index = (random_int(1, $randomPost->count()) - 1)
                        @endphp
                        <a href="{{route('home.id', $randomPost[$index]->id)}}" class="flex group">
                            <div class="flex-grow pl-3">
                                <h5
                                    class="text-md leading-5 block font-roboto font-semibold  transition group-hover:text-blue-500">
                                    {{$randomPost[$index]->title}}
                                </h5>
                                <div class="flex text-gray-400 text-sm items-center">
                                    <span class="mr-1 text-xs"><i class="far fa-clock"></i></span>
                                     {{$randomPost[$index]->created_at->format('Y-m-d')}}
                                </div>
                            </div>
                        </a>
                        @endfor
                        

                    </div>
                </div>

                
            </div>

        </div>
    </main>

    
@endsection