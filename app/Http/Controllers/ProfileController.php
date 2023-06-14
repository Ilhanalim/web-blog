<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $blogs = Blog::where('user_id', Auth::id())->latest()->get();
        return view('profile.profile', [
            'blogs' => $blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $validatedData['user_id'] = Auth::id();


        if (Blog::create($validatedData)) {
            return to_route('profile')->with('succsess', 'Your blog has been posted!');
        }
        
        return to_route('profile')->with('error', 'Post failed!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        $paragraph = $blog->content;
        $paragraph = explode("\r\n", $paragraph);
        return view('profile.show', [
            'blog' => $blog,
            'paragraphs' => $paragraph
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $paragraph = $blog->content;
        $paragraph = explode("\r\n", $paragraph);
        return view('profile.edit', [
            'blog' => $blog,
            'paragraphs' => $paragraph
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $validatedData['user_id'] = Auth::id();


        if (Blog::where('id', $id)->update($validatedData)) {
            return to_route('profile')->with('succsess', 'Your blog has been updated!');
        }
        
        return to_route('profile')->with('error', 'Update failed!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $blog = Blog::find($id);
        if (Blog::destroy($id)) {
            return to_route('profile')->with('succsess', 'Your blog has been deleted!');
        }
    }
}
