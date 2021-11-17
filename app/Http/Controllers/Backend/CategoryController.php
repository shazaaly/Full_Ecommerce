<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function CategoryView()
    {
        $categories = Category::latest()->get();
        return view('backend.categories.category_view', compact('categories'));
    }

    public function CategoryStore(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_ar' => 'required',
        ]);


        category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_ar' => str_replace(' ', '-', $request->category_name_ar),
            'category_icon' => $request->category_icon,

        ]);
        $notification = array(
            'message' => 'Category Added Successfully',
            'type' => 'success',

        );
        return redirect()->back()->with($notification);

    }

    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.categories.category_edit', compact('category'));

    }

    public function categoryUpdate(Request $request)
    {

        $request->validate([
            'category_name_en' => 'required',
            'category_name_ar' => 'required',

        ]);
        $category_id = $request->id;
        $old_icon = $request->old_icon;

        if ($request->category_icon) {

            Category::findOrFail($category_id)->update([
                'category_name_en' => $request->category_name_en,
                'category_name_ar' => $request->category_name_ar,
                'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
                'category_slug_ar' => str_replace(' ', '-', $request->category_name_ar),
                'category_icon' => $request->category_icon,
            ]);
            $notification = array(
                'message' => 'Category added successfully',
                'type' => 'success',

            );
            return redirect()->route('all.categories')->with($notification);
        } else {
            Category::findOrFail($category_id)->update([
                'category_name_en' => $request->category_name_en,
                'category_name_ar' => $request->category_name_ar,
                'category_slug_en' => strtolower(str_replace(' ', '-', 'category_name_en')),
                'category_slug_ar' => str_replace(' ', '-', 'category_name_ar'),
            ]);
            $notification = array(
                'message' => 'Category Updated Successfully',
                'type' => 'success',

            );
            return redirect()->route('all.categories')->with($notification);
        }
    }

    public function CategoryDelete($id){
        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category deleted successfully',
            'type' => 'success',

        );
        return redirect()->route('all.categories')->with($notification);



    }

}
