@extends('layouts.main')

@section('container')


<main class="pt-12 bg-gray-100 pb-12">
    <div class="container mx-auto px-4 flex flex-wrap lg:flex-nowrap">

        <!-- Main content -->
        <div class="xl:w-8/12 lg:w-9/12 w-full  xl:ml-6 lg:mr-6">

            <!-- big post -->
            <div class="rounded-sm overflow-hidden bg-white shadow-sm">
                <a href="view.html" class="block rounded-md overflow-hidden">
                    {{-- <img src="src/images/img-12.jpg"
                        class="w-full h-96 object-cover transform hover:scale-110 transition duration-500"> --}}
                </a>
                <div class="p-4 pb-5">
                    <a href="view.html">
                        <h2
                            class="block text-2xl font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
                            {{$blog->title}}
                        </h2>
                    </a>
                    @foreach ($paragraphs as $paragraph)
                    <p class="text-gray-500 text-sm mt-2 ">
                        {{$paragraph}}
                    </p>
                    @endforeach
                    <div class="mt-3 flex space-x-4">
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
                            {{$blog->created_at->format('Y-m-d')}}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- right sidebar -->
        <div class="lg:w-3/12 w-full mt-8 lg:mt-0">
            <!-- Social plugin -->
            <div class="w-full bg-white shadow-sm rounded-sm p-4 ">
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
            <div class="w-full mt-8 bg-white shadow-sm rounded-sm p-4 ">
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