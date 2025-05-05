<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    public function posts()
    {
        $posts = Post::with(['category', 'user'])->latest()->get();

        return view('pages.posts.posts', compact('posts'));
    }

    public function videos()
    {
        return view('pages.videos.videos'); 
    }

    public function photos()
    {
        return view('pages.photos.photos'); 
    }

    public function about()
    {
        return view('pages.about');  
    }

    public function contact()
    {  
        return view('pages.contact');
    }

    public function photosDetail()
    {
        return view('pages.photos.photo-detail');  
    }

    public function videosDetail()
    {  
        return view('pages.videos.video-detail');
    }

    public function postsDetail($id)
    {
        $post = Post::with(['category', 'user'])->findOrFail($id);
        
        return view('pages.posts.posts-detail', compact('post'));
    }
}
