<?php

namespace App\Http\Controllers;

use App\Category;
use App\Category_Post;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::get();
    }

    public function home()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        $authors = User::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('welcome' , compact('posts', 'authors' , 'categories'));
    }

    public function AuthorPost($id)
    {
        $user = User::find($id);
        $posts = $user->posts;
        $authors = User::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('author_posts' , compact('posts', 'authors' , 'categories'));
    }
    public function CategoryPost($id)
    {
        $category = Category::find($id);
        $posts = $category->posts()->paginate(5);
        $authors = User::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('welcome' , compact('posts', 'authors' , 'categories'));
    }

    public function Search(Request $request)
    {
        $keywors = $request['keywords'];
        $posts = Post::where('title',  'LIKE', "%{$keywors}%")
                    ->orWhere('body', 'LIKE', "%{$keywors}%")
                    ->paginate(5);
        $posts->appends($request->all());
        $authors = User::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('welcome' , compact('posts', 'authors' , 'categories', 'keywors'));

    }
}
