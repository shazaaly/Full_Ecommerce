<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    //
    public function blogCategories()
    {
        $blog_categories = BlogPostCategory::latest()->get();
        return view('backend.blog.categories.category_view', compact('blog_categories'));
    }

    public function blogCategoryStore(Request $request)

    {
        $request->validate([
            'blog_category_name_en' => 'required',
            'blog_category_name_ar' => 'required',
        ]);


        BlogPostCategory::insert([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_ar' => $request->blog_category_name_ar,
            'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_en)),
            'blog_category_slug_ar' => str_replace(' ', '-', $request->blog_category_name_ar),
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Blog category added successfully',
            'type' => 'success',

        );
        return redirect()->back()->with($notification);
    }

    public function CategoryEdit($id)
    {
        $category = BlogPostCategory::findOrFail($id);
        return view('backend.blog.categories.blog_category_edit', compact('category'));

    }

    public function categoryUpdate(Request $request, $id)
    {

        $request->validate([
            'blog_category_name_en' => 'required',
            'blog_category_name_ar' => 'required',

        ]);

        BlogPostCategory::findOrFail($id)->update([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_ar' => $request->blog_category_name_ar,
            'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_en)),
            'blog_category_slug_ar' => str_replace(' ', '-', $request->blog_category_name_ar),
        ]);
        $notification = array(
            'message' => 'Category Updated successfully',
            'type' => 'success',

        );

        return redirect()->route('blog.category')->with($notification);

    }

    public function CategoryDelete($id)
    {
        BlogPostCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category deleted successfully',
            'type' => 'success',

        );
        return redirect()->route('blog.category')->with($notification);

    }

    public function viewBlogPosts()
    {
        $blog_categories = BlogPostCategory::latest()->get();
        $posts = BlogPost::latest()->get();
        return view('backend.blog.posts.posts_view', compact('posts', 'blog_categories'));


    }

    public function addBlogPosts()
    {
        $categories = BlogPostCategory::latest()->get();
        return view('backend.blog.posts.posts_add', compact('categories'));

    }

    public function blogPostStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'post_title_en' => 'required|max:200|min:10',
            'post_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'post_details_en' => 'required|max:2000',

        ]);
        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(780, 433)->save('upload/posts/' . $name_gen);
        $save_url = 'upload/posts/' . $name_gen;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title_en' => $request->post_title_en,
            'post_title_ar' => $request->post_title_ar,
            'post_slug_en' => strtolower(str_replace(' ', '-', $request->post_slug_en)),
            'post_slug_ar' => str_replace(' ', '-', $request->post_slug_ar),
            'post_details_en' => $request->post_details_en,
            'post_details_ar' => $request->post_details_ar,
            'created_at' => Carbon::now(),
            'post_image' => $save_url,

        ]);
        $notification = array(
            'message' => 'Post added successfully',
            'type' => 'success',

        );
        return redirect()->route('view.post')->with($notification);

    }

    public function postEdit($id)
    {
        $categories = BlogPostCategory::latest()->get();

        $post = BlogPost::findOrFail($id);
        return view('backend.blog.posts.post_edit', compact('post', 'categories'));

    }

    public function postUpdate(Request $request)
    {
//        return $request->all();
        $post_id = $request->id;
//       return $request->all();
//        $request->validate([
//            'category_id' => 'sometimes|required',
//            'post_title_en' => 'sometimes|required|max:200|min:10',
//            'post_image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'post_details_en' => 'sometimes|required|max:2000',
//
//        ]);

        $old_image = $request->old_image;


        if ($request->file('post_image')) {

//            unlink($old_image);


            $image = $request->file('post_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(780, 433)->save('upload/posts/' . $name_gen);
            $save_url = 'upload/posts/' . $name_gen;

            BlogPost::findOrFail($post_id)->update([
                'category_id' => $request->category_id,
                'post_title_en' => $request->post_title_en,
                'post_title_ar' => $request->post_title_ar,
                'post_slug_en' => strtolower(str_replace(' ', '-', $request->post_slug_en)),
                'post_slug_ar' => str_replace(' ', '-', $request->post_slug_ar),
                'post_details_en' => $request->post_details_en,
                'post_details_ar' => $request->post_details_ar,
                'created_at' => Carbon::now(),
                'post_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Post updated successfully',
                'type' => 'success',

            );

            return redirect()->route('view.post')->with($notification);
        } else {
            BlogPost::findOrFail($post_id)->update([
                'category_id' => $request->category_id,
                'post_title_en' => $request->post_title_en,
                'post_title_ar' => $request->post_title_ar,
                'post_slug_en' => strtolower(str_replace(' ', '-', $request->post_slug_en)),
                'post_slug_ar' => str_replace(' ', '-', $request->post_slug_ar),
                'post_details_en' => $request->post_details_en,
                'post_details_ar' => $request->post_details_ar,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Post Updated Successfully',
                'type' => 'success',

            );
            return redirect()->route('view.post')->with($notification);
        }
    }

    public function postDelete($id)
    {

        $post = BlogPost::findOrFail($id);
        $image = $post->post_image;
        unlink($image);
        BlogPost::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Post deleted successfully',
            'type' => 'success',

        );
        return redirect()->route('view.post')->with($notification);

    }


}
