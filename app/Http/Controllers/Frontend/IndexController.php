<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SiteSetting;
use App\Models\Slider;
use App\Models\Subcategory;
use App\Models\SubSubCategory;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class IndexController extends Controller
{
    //
    public function index()
    {

        $products = Product::where('status', 1)->orderBy('product_name_en', 'DESC')->limit(6)->get();
        $hotDeals = Product::where('hot_deals', 1)->where('discount_price', '!=', null)->orderBy('product_name_en', 'DESC')->limit(3)->get();
        $specialOffers = Product::where('special_offer', 1)->orderBy('product_name_en', 'DESC')->limit(3)->get();
        $specialDeals = Product::where('special_deals', 1)->orderBy('product_name_en', 'DESC')->limit(3)->get();
        $featured_products = Product::where('featured', 1)->orderBy('product_name_en', 'DESC')->limit(6)->get();
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        $skip_category_0 = Category::skip(0)->first();
        $skip_products_0 = Product::where('status', 1)->where('category_id', $skip_category_0->id)->orderBY('id', 'DESC')->get();

        $skip_category_1 = Category::skip(1)->first();
        $skip_products_1 = Product::where('status', 1)->where('category_id', $skip_category_1->id)->orderBY('id', 'DESC')->get();

        $skip_brand_1 = Brand::skip(1)->first();
        $skip_brand_products_1 = Product::where('status', 1)->where('brand_id', $skip_brand_1->id)->orderBY('id', 'DESC')->get();
        $blogposts = BlogPost::latest()->get();


        return view('frontend.index',
            compact('categories', 'sliders', 'products', 'featured_products', 'hotDeals',
                'specialOffers', 'specialDeals', 'skip_category_0', 'skip_products_0', 'skip_category_1', 'skip_products_1', 'skip_brand_1', 'skip_brand_products_1',
                'blogposts'));
    }

    public function UserLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));


    }

    public function UserProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');

//            @unlink(public_path('upload/admin_images/' . $data->profile_photo_path));

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Profile Updated successfully',
            'type' => 'info',
        );

        return redirect()->route('dashboard')->with($notification);

    }

    public function UserChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));


    }

    public function UserPasswordUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'confirmed', Password::min(4)],
        ]);

        try {
            $hashedPassword = Auth::user()->password;

            if (Hash::check($request->oldpassword, $hashedPassword)) {

                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->route('user.logout');

            } else {
                return redirect()->back();

            }

        } catch (\Exception $exception) {
            return $exception;
        }

    }

    public function productDetails($id)

    {
        $hotDeals = Product::where('hot_deals', 1)->where('discount_price', '!=', null)->orderBy('product_name_en', 'DESC')->limit(3)->get();

        $multiImgs = MultiImg::where('product_id', $id)->get();

        $product = Product::findOrFail($id);
        $color_en = $product->product_color_en;
        //       return as=>        red,blue  => we need to explode comma
        $product_color_en = explode(',', $color_en);
//      explode will separate like : [
//  "red",
//  "blue"
//
        $color_ar = $product->product_color_ar;
        $product_color_ar = explode(',', $color_ar);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        $size_ar = $product->product_size_en;
        $product_size_ar = explode(',', $size_ar);

        $related_products = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->orderBy('id', 'Desc')->paginate(3);


        return view('frontend.product.product_details',
            compact('product', 'multiImgs', 'hotDeals', 'product_color_ar', 'product_color_en', 'product_size_ar', 'product_size_en', 'related_products'));


    }

    public function TagWiseProduct($tag)
    {
        $products = Product::where('status', 1)->where('product_tags_en', $tag)->orWhere('product_tags_ar', $tag)->orderBy('id', 'DESC')->paginate(3);

        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        return view('frontend.tags.tags_view', compact('products', 'categories'));
    }

    public function SubCatWiseProduct(Request $request, $id, $slug)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcatWiseProducts = Product::where('status', 1)->where('subcategory_id', $id)->orderBy('id', 'DESC')->paginate(3);
        $breadcrumb_subcats = Subcategory::with('category')->where('id', $id)->get();

//       load more products ajax:

        if ($request->ajax()) {
            $grid_view = view('frontend.product.grid_view_product',compact('subcatWiseProducts'))->render();

            $list_view = view('frontend.product.list_view_product',compact('subcatWiseProducts'))->render();
            return response()->json(['grid_view' => $grid_view,'list_view',$list_view]);

        }
        ///  End Load More Product with Ajax

        return view('frontend.product.subcategory_view',compact('subcatWiseProducts','categories','breadcrumb_subcats'));

    }

    public function SubSubCatWiseProduct($id, $slug)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subSubcatWiseProducts = Product::where('status', 1)->where('subsubcategory_id', $id)->orderBy('id', 'DESC')->paginate(6);
        $breadSubSucCats = SubSubCategory::with(['category', 'subcategory'])->where('id', $id)->get();
        return view('frontend.product.sub_subcategory_view', compact('subSubcatWiseProducts', 'categories', 'breadSubSucCats'));

    }

    public function productViewAjax($id)
    {
        $product = Product::with('category', 'brand')->findOrFail($id);

        $color = $product->product_color_en;
        $product_color = explode(',', $color);

        $size = $product->product_size_en;
        $product_size = explode(',', $size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));


    }

    public function product_search(Request $request)
    {

        $request->validate([
            'search' => 'required'
        ]);
        $item = $request->search;
        $categories = Category::latest()->get();
        $products = Product::where('product_name_en', 'LIKE', "%$item%")->get();
        return view('frontend.search.product_view', compact('categories', 'products', 'item'));

    }

    public function advancedSearch(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);
        $item = $request->search;
        $products = Product::where('product_name_en', 'LIKE', "%$item%")->select('product_name_en', 'product_thumbnail', 'selling_price', 'id', 'product_slug_en')->limit(5)->get();
        return view('frontend.search.search_product', compact('products', 'item'));


    }


}
