<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    //
    public function add_product()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.products.product_add', compact('categories', 'brands'));

    }

    public function ProductStore(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800',

        ]);
        if ($files = $request->file('file')){
            $destinationPath = 'upload/pdf';   //upload path
            $digital_item = date('YMdHis').".".$files->getClientOriginalExtension();
            $files->move($destinationPath,$digital_item );

        }

        //        image intervention start: Main Thumb Nail
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/' . $name_gen);
        $save_url = 'upload/products/thumbnail/' . $name_gen;

        //        image intervention end


        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ar' => $request->product_name_ar,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_ar' => str_replace(' ', '-', $request->product_name_ar),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ar' => $request->product_tags_ar,
            'product_size_en' => $request->product_size_en,
            'product_size_ar' => $request->product_size_ar,
            'product_color_en' => $request->product_color_en,
            'product_color_ar' => $request->product_color_ar,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc_en' => $request->short_desc_en,
            'short_desc_ar' => $request->short_desc_ar,
            'long_desc_en' => $request->long_desc_en,
            'long_desc_ar' => $request->long_desc_ar,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'digital_file' => $digital_item,
            'status' => 1,
            'product_thumbnail' => $save_url,
            'created_at' => Carbon::now(),


        ]);
        //            Multiple images upload start

        ////////// Multiple Image Upload Start ///////////

        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;

            MultiImg::insert([

                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),

            ]);

        }

//            Multiple images upload END
        $notification = array(
            'message' => 'Product added successfully',
            'type' => 'info',

        );
        return redirect()->route('Addproduct')->with($notification);
    }

    public function manageProduct()
    {

        $products = Product::latest()->get();
//        return $products[0]['product_thumbnail'];
        return view('backend.products.products_view', compact('products'));

    }


    public function editProduct($id)
    {


        $multiImages = MultiImg::where('product_id', $id)->get();

        $product = Product::findOrFail($id);
//        related foreign keys data:
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $subSubs = SubSubCategory::latest()->get();

        return view('backend.products.product_edit',
            compact('product', 'categories', 'subcategories', 'subSubs', 'brands', 'multiImages'));


    }

    public function productDataUpdate(Request $request)
    {
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ar' => $request->product_name_ar,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_ar' => str_replace(' ', '-', $request->product_name_ar),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ar' => $request->product_tags_ar,
            'product_size_en' => $request->product_size_en,
            'product_size_ar' => $request->product_size_ar,
            'product_color_en' => $request->product_color_en,
            'product_color_ar' => $request->product_color_ar,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc_en' => $request->short_desc_en,
            'short_desc_ar' => $request->short_desc_ar,
            'long_desc_en' => $request->long_desc_en,
            'long_desc_ar' => $request->long_desc_ar,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product updated WITHOUT images successfully',
            'type' => 'info',

        );

        return redirect()->route('manage.product')->with($notification);

    }

//multi image update
    public function MultiImageUpdate(Request $request)
    {

        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;

            MultiImg::where('id', $id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),

            ]);

        } // end foreach

        $notification = array(
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    public function ThumbnailUpdate(Request $request)
    {
        $product_id = $request->id;
        $old_image = $request->old_img;
        unlink($old_image);

        //        image intervention start: Main Thumb Nail
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/' . $name_gen);
        $save_url = 'upload/products/thumbnail/' . $name_gen;

        //        image intervention end
        Product::findOrFail($product_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Product Thumbnail Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    public function deleteMultiImg($id)
    {
        $old_img = MultiImg::findOrFail($id);
        unlink($old_img->photo_name);
        MultiImg::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Product Images Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);


    }

    public function Inactivate($id)
    {
        Product::findOrfail($id)->update([
            "status" => 0
        ]);

        $notification = array(
            'message' => 'Product Inactivated!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);


    }

    public function activate($id)
    {
        Product::findOrfail($id)->update([
            "status" => 1
        ]);

        $notification = array(
            'message' => 'Product Activated!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id', $id)->get();


        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


//    Admin Stock mnag.

    public function product_stock()
    {

        $products = Product::latest()->get();
//        return $products[0]['product_thumbnail'];
        return view('backend.stock.products_view', compact('products'));

    }
}
