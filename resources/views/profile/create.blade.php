@extends('layouts.main')
@section('title', 'Profile - Web Blog')

@section('container')


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
                    <a href="{{route('profile') . '/create'}}"
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
                <div class="p-7 pb-5">
                    <h2
                        class="block text-2xl font-semibold text-gray-700 transition font-roboto">
                        Create a New Post
                    </h2>
                </div>
            </div>
            <!-- regular post -->
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mt-4">
                <div class="rounded-3xl bg-white p-7 shadow-sm">
                    <form action="{{route('profile')}}" method="post">
                        @csrf
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title..." required>

                        <label for="content" class="block mt-3 mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
                        <textarea id="content" name="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " placeholder="Write your content here..."></textarea>
                        
                        <button type="submit" class="mt-3 rounded-3xl text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>

                  
            </div>
        </div>

      

    </div>
</main>


@endsection