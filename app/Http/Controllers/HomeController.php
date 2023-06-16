<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use function Symfony\Component\String\b;

class HomeController extends Controller
{
    public function show(Request $request): View
    {
        $blogs = Blog::with(['user','comment'])->latest();

        if ($search = $request->search) {
            $blogs->where('title', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%');
        }

        $randomPost = Blog::with(['user','comment'])->get();
        return view('home.home', [
            'blogs' => $blogs->paginate(10),
            'randomPost' => $randomPost
        ]);
    }

    public function showById($id): View
    {
        $blog = Blog::with(['user','comment'])->find($id);
        $comments = Comment::with(['user','blog'])->where('blog_id',$id)->latest()->get();
        $randomPost = Blog::with(['user','comment'])->get();
        $paragraph = $blog['content'];
        $paragraph = explode("\r\n", $paragraph);

        return view('home.blog', [
            'blog' => $blog,
            'paragraphs' => $paragraph,
            'randomPost' => $randomPost,
            'comments' => $comments
        ]);
    }

    public function addComment(Request $request, $id)
    {
        $validatedData = $request->validate([
            'content' => 'required'
        ]);

        $validatedData['user_id'] = Auth::id();
        $validatedData['blog_id'] = $id;


        if (Comment::create($validatedData)) {
            return back()->with('succsess', 'Your comment has been posted!');
        }
        
        return back()->with('error', 'Post failed!');
    }
    public function deleteComment($commentId)
    {
        if (Comment::destroy($commentId)) {
            return back()->with('succsess', 'Your comment has been deleted!');
        }
        
        return back()->with('error', 'delete failed!');
    }



    public function showByUser($name): View
    {
        $user = User::where('name', $name)->first();
        $randomPost = Blog::with(['user','comment'])->get();
        $blogs = $user->blog;
        return view('home.user', [
            'user' => $user,
            'blogs' => $blogs,
            'randomPost' => $randomPost
        ]);
    }

    public function about(): View
    {
        $blog = Blog::with(['user','comment'])->get();
        $randomPost = Blog::with('user')->get();
        return view('home.about', [
            'blogs' => $blog,
            'randomPost' => $randomPost
        ]);
    }
}
