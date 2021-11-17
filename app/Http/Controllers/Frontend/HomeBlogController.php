<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use Illuminate\Http\Request;

class HomeBlogController extends Controller
{
    //

    public function blogPosts()
    {
        $categories = BlogPostCategory::latest()->get();
        $blogposts = BlogPost::latest()->get();
        return view('frontend.blog.blog_list', compact('blogposts', 'categories'));

    }

    public function postDetails($post_id)
    {

        $categories = BlogPostCategory::latest()->get();
        $post = BlogPost::findOrfail($post_id);
        return view('frontend.blog.post_details', compact('post', 'categories'));

    }

    public function postsByCategory($category_id)
    {
        $categories = BlogPostCategory::latest()->get();
        $blogposts = BlogPost::where('category_id', $category_id)->orderBy('created_at', 'DESC')->get();
        return view('frontend.blog.postPerCategory', compact('blogposts', 'categories'));


    }
}
