<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //
    public function SubCategoryView()
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.categories.subcategory_view', compact('subcategories', 'categories'));

    }

    public function SubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_ar' => 'required',
        ]);


        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_ar' => str_replace(' ', '-', $request->subcategory_name_ar),

        ]);
        $notification = array(
            'message' => 'Subcategory added successfully',
            'type' => 'success',

        );
        return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = Subcategory::findOrFail($id);
        return view('backend.categories.subcategory_edit', compact('subcategory', 'categories'));
    }

    public function SubCategoryUpdate(Request $request)
    {

        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_ar' => 'required',
            'category_id' => 'required',

        ]);
        $subcategory_id = $request->id;

        Subcategory::find($subcategory_id)->update([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', 'subcategory_name_en')),
            'subcategory_slug_ar' => str_replace(' ', '-', 'subcategory_name_ar'),
            'category_id' => $request->category_id

        ]);

        $notification = array(
            'message' => 'Subcategory added successfully',
            'type' => 'warning',

        );
        return redirect()->route('all.subcategories')->with($notification);


    }


    public function SubCategoryDelete($id)
    {
        Subcategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Subcategory deleted successfully',
            'type' => 'warning',

        );
        return redirect()->route('all.subcategories')->with($notification);
    }

//    Sub Subcategory admin methods

    public function Sub_subCategoryView()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
//        $subcategories = Subcategory::latest()->get();
        $sub_subcategories = SubSubCategory::latest()->get();

        return view('backend.categories.sub_subcategory_view', compact('categories', 'sub_subcategories'));

    }

    public function GetSubCategory($category_id)
    {
        $subcat = Subcategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();
//        pass data with json format to match jq code condition in view:
        return json_encode($subcat);

    }

//

    public function GetSubSubCategory($subcategory_id)
    {

        $subsubcat = SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name_en', 'ASC')->get();
        return json_encode($subsubcat);
    }


    public function SubSubCategoryStore(Request $request)
    {
        try {
            SubSubCategory::insert([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'subsubcategory_name_en' => $request->subsubcategory_name_en,
                'subsubcategory_name_ar' => $request->subsubcategory_name_ar,
                'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
                'subsubcategory_slug_ar' => str_replace(' ', '-', $request->subsubcategory_name_ar),


            ]);

            $notification = array(
                'message' => 'Sub-SubCategory Inserted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } catch (\Exception $exception) {
            return $exception;

        }

    } // end method

    public function Sub_subCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = Subcategory::orderBy('subcategory_name_en', 'ASC')->get();

        $sub_subcategory = SubSubCategory::findOrFail($id);
        return view('backend.categories.sub_subcategory_edit',
            compact('categories', 'subcategories', 'sub_subcategory'));

    }

    public function Sub_subCategoryUpdate(Request $request)
    {
        $subsub_id = $request->id;

        SubSubCategory::findOrFail($subsub_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_ar' => $request->subsubcategory_name_ar,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_ar' => str_replace(' ', '-', $request->subsubcategory_name_ar),

        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.sub_subcategories')->with($notification);

    }

    public function Sub_subCategoryDelete($id)
    {

        $subsub = SubSubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Sub-SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

}
