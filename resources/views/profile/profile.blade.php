@extends('layouts.main')
@section('title', 'Profile - Web Blog')

@section('container')

    {{-- @if (session('succsess'))
        <div class="flex items-center justify-center">
            <div class="absolute top-[35px] left-[375px] flex items-center bg-green-500 text-white text-center text-sm font-bold px-3 py-2 w-8/12 mt-5 rounded" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p>{{session('succsess')}}</p>
            </div>
        </div>
    @endif --}}
    

    @if (session('error'))
        <div class="flex items-center justify-center">
            <div class="absolute top-[35px] left-[375px] flex items-center bg-red-500 text-white text-center text-sm font-bold px-4 py-3 w-6/12 mt-5 rounded" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p>{{session('error')}}</p>
            </div>
        </div>
    @endif

<main class="pt-12 bg-gray-100 pb-12">
    <div class="container mx-auto px-4 flex flex-wrap lg:flex-nowrap">
        {{-- left sidebar --}}
        <div class="w-3/12 hidden xl:block h-screen">
            <!-- categories -->
            <div class="w-full h-80 bg-white shadow-sm rounded-3xl p-4 font-roboto">
                <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto"></h3>
                <div class="space-y-5">
                    <a href="{{route('profile')}}"
                        class="flex leading-4 items-center text-gray-700 font-semibold text-xl transition hover:text-blue-500">
                        <span class="mr-2">
                            <i class="far fa-user"></i>
                        </span>
                        <span>My Blog</span>
                    </a>
                    <a href="{{route('profile').'/create'}}"
                        class="flex leading-4 items-center text-gray-700 font-semibold text-xl transition hover:text-blue-500">
                        <span class="mr-2">
                            <i class="far fa-sticky-note"></i>
                        </span>
                        <span>Create a new Blog</span>
                    </a>
                    <a href="{{route('home')}}"
                        class="flex leading-4 items-center text-gray-700 font-semibold text-xl transition hover:text-blue-500">
                        <span class="mr-2">
                            <i class="fa-solid fa-house"></i>
                        </span>
                        <span>Back to home</span>
                    </a>
                   
                </div>
            </div>
        
        </div>
        <!-- Main content -->
        <div class="xl:w-9/12 lg:w-9/12 w-full  xl:ml-6 lg:mr-6">
            <!-- big post -->
            <div class="rounded-3xl overflow-hidden bg-white shadow-sm">
                {{-- <a href="view.html" class="block rounded-md overflow-hidden">
                </a> --}}
                <div class="p-4 pl-7 pr-7 pb-5">

                    <h2
                        class="block text-2xl font-semibold text-gray-700 transition font-roboto">
                        Your blog 
                    </h2>
                    
                    <a href="{{route('profile').'/create'}}"
                        class="flex lg:hidden leading-4 mt-3 p-3 w-8/12 rounded-lg bg-blue-500 items-center text-white font-semibold text-xl transition hover:bg-blue-800">
                        {{-- <span class="mr-2">
                            <i class="far fa-sticky-note"></i>
                        </span> --}}
                        <span>Create a new Blog</span>
                    </a>

                </div>
            </div>
            <!-- regular post -->
            @if ($blogs->isEmpty())
            <div class="grid grid-cols-1 h-screen md:grid-cols-1 gap-4 mt-4 text-center">
                <div class="rounded-3xl w-full bg-white p-4 pb-5 shadow-sm">
                    <div class="mt-3">               
                        <h2
                        class="block text-3xl font-semibold text-gray-700 font-roboto">
                        You haven't posted anything yet
                    </h2>
                </div>
            </div>
            @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            @foreach ($blogs as $blog)
            
                    <div class="rounded-3xl bg-white p-4 pl-7 pr-7 pb-5 shadow-sm">
                        <div class="mt-3">
                            <a href="{{route('profile').'/'.$blog->id }}">
                                
                                <h2
                                    class="block text-xl font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
                                    {{$blog->title}}
                                </h2>
                            </a>
                            <h5 class="text-xs text-gray-400">{{Str::limit($blog->content, 90)}}</h5>
                            <div class="mt-2 flex space-x-3">
                                <div class="flex text-gray-400 text-sm items-center">
                                    <span class="mr-2 text-xs">
                                        <i class="far fa-user"></i>
                                    </span>
                                    You
                                </div>
                                <div class="flex text-gray-400 text-sm items-center">
                                    <span class="mr-2 text-xs">
                                        <i class="far fa-clock"></i>
                                    </span>
                                    {{$blog->updated_at->diffForHumans()}}
                                </div>
                            </div>

                            <div class="mt-4 flex space-x-3">
                                <div class="flex text-gray-400 text-sm items-center">
                                    <a href="{{route('profile').'/'.$blog->id .'/edit'}}" class="text-sm font-semibold hover:text-blue-500 transition flex items-center">
                                        <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                            Edit</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
                @endif
               
            
            <div class="mt-5">
            {{$blogs->links()}}
            </div>
        </div>

      

    </div>
</main>


@endsection