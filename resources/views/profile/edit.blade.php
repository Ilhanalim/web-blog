@extends('layouts.main')
@section('title', 'Profile - Web Blog')

@section('container')

    @if (session('succsess'))
        <div class="flex items-center justify-center">
            <div class="absolute top-[35px] left-[375px] flex items-center bg-green-500 text-white text-center text-sm font-bold px-3 py-2 w-8/12 mt-5 rounded" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p>{{session('succsess')}}</p>
            </div>
        </div>
    @endif
    

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
            <div class="w-full h-80 bg-white shadow-sm rounded-xl p-4 font-roboto">
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
            <div class="rounded-lg overflow-hidden bg-white shadow-sm">
                <a href="view.html" class="block rounded-md overflow-hidden">
                    {{-- <img src="src/images/img-12.jpg"
                        class="w-full h-96 object-cover transform hover:scale-110 transition duration-500"> --}}
                </a>
                <div class="p-4 pb-5">
                    <h2
                        class="block text-2xl mb-3 font-semibold text-gray-700 font-roboto">
                        Edit a Post
                    </h2>
                    <a href="{{route('profile').'/'.$blog->id }}">
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
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mt-4">
                        <form action="{{route('profile').'/'.$blog->id}}" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-6">
                              <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                              <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title..." required>
                            </div>
                            <div class="mb-6">
                              
                            <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
                            <textarea id="content" name="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " placeholder="Write your content here..."></textarea>
        
                            </div>
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                          </form>
                       
                    </div>
                </div>
            </div>
            
            <div class="mt-5">
            {{-- {{$blogs->links()}} --}}
            </div>
        </div>

      

    </div>
</main>


@endsection