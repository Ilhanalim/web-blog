@extends('layouts.main')
@section('title', 'Web Blog')

@section('container')


<main class="pt-12 bg-gray-100 pb-12">
    <div class="container mx-auto px-4 flex flex-wrap lg:flex-nowrap">
    
        <!-- Main content -->
        <div class="xl:w-8/12 lg:w-9/12 w-full  xl:ml-6 lg:mr-6">

            <!-- big post -->
            <div class="rounded-3xl overflow-hidden bg-white shadow-sm">
                <div class="p-4 pb-5">
                        <h2
                            class="block text-2xl font-semibold text-gray-700 font-roboto">
                            {{$blog->title}}
                        </h2>
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
                            {{$blog->updated_at->diffForHumans()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mt-4">
                <div class="rounded-3xl bg-white p-4 pl-7 pr-7 pb-5 shadow-sm">
                    <div class="mt-3">
                        <h2
                            class="block text-xl font-semibold text-gray-700 font-roboto">
                            Comment ({{$comments->count()}})
                        </h2>
                    </div>
                    <hr class="mt-2 mb-2">
                    @foreach ($comments as $comment)   
                    <div class="comment mb-3">
                        <div class="flex space-x-4">
                            <div class="flex text-gray-400 font-semibold text-base items-center">
                                <span class="mr-2 text-xs">
                                    <i class="far fa-user"></i>
                                </span>
                                @if ($comment->user->id == Auth::id())
                                    <a href="{{route('profile')}}" class="hover:text-blue-500 transition font-roboto">
                                        You
                                    </a>
                                @else
                                    <a href="{{route('home.user', $comment->user->name)}}" class="hover:text-blue-500 transition font-roboto">
                                        {{$comment->user->name}}
                                    </a>
                                @endif
                            </div>
                            <div class="flex text-gray-400 text-sm items-center">
                                <span class="mr-2 text-xs">
                                    <i class="far fa-clock"></i>
                                </span>
                                {{$comment->updated_at->diffForHumans()}}
                            </div>
                        </div>
                        <div class="flex align-baseline space-x-4 justify-between">
                            <h2 class="block text-sm text-gray-700 font-roboto">
                                    {{$comment->content}}
                            </h2>
                            @if ($comment->user->id == Auth::id())
                                <form action="{{route('comments.delete',$comment->id)}}" method="post" class="text-sm font-semibold hover:text-blue-500 transition flex items-center">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="flex items-center justify-center underline text-xs text p-0 font-semibold text-gray-700 font-roboto">
                                        delete</button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <hr class="m-1">
                    @endforeach

                </div>
                {{-- {{$comments->links()}} --}}
            </div>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mt-4">
                <div class="rounded-3xl bg-white p-4 pl-7 pr-7 pb-5 shadow-sm">
                    <div class="mt-3">
                        <form action="" method="post">
                            @csrf
                            <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your comment</label>
                            <textarea id="content" name="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " placeholder="Write your comment here..."></textarea>
                            <button type="submit" class="mt-3 rounded-3xl text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- right sidebar -->
        <div class="lg:w-3/12 w-full mt-8 lg:mt-0">
            <!-- Social plugin -->
            <div class="w-full bg-white shadow-sm rounded-3xl p-4 ">
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
            <div class="w-full mt-8 bg-white shadow-sm rounded-3xl p-4 ">
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
                                 {{$randomPost[$index]->updated_at->diffForHumans()}}
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