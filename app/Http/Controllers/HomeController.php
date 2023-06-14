<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

use function Symfony\Component\String\b;

class HomeController extends Controller
{
    public function show(): View
    {
        $blog = Blog::with('user')->latest()->paginate(10);
        $randomPost = Blog::with('user')->get();
        return view('home.home', [
            'blogs' => $blog,
            'randomPost' => $randomPost
        ]);
    }

    public function showById($id): View
    {
        $blog = Blog::with('user')->find($id);
        $randomPost = Blog::with('user')->get();
        $paragraph = $blog['content'];
        $paragraph = explode("\r\n", $paragraph);
        return view('home.blog', [
            'blog' => $blog,
            'paragraphs' => $paragraph,
            'randomPost' => $randomPost
        ]);
    }

    public function showByUser($id): View
    {
        $user = User::find($id);
        $randomPost = Blog::with('user')->get();
        $blogs = $user->blog;
        return view('home.user', [
            'user' => $user,
            'blogs' => $blogs,
            'randomPost' => $randomPost
        ]);
    }

    public function about(): View
    {
        $blog = Blog::with('user')->get();
        $randomPost = Blog::with('user')->get();
        return view('home.about', [
            'blogs' => $blog,
            'randomPost' => $randomPost
        ]);
    }
}
