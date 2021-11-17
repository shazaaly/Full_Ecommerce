<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeBlogController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\languageController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\GoogleAuthController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\WishlistController;
use App\Models\ShipDivision;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Socialite\Facades\Socialite;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//Admin Login start : /admin/login
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'storeAdmin'])->name('admin.login');
});


Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard')->middleware('auth:admin');


Route::middleware(['auth:admin'])->group(function () {

//Admin all routes start
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/update/{id}', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.update');
    Route::get('/admin/profile/change-password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/profile/update-password', [AdminProfileController::class, 'AdminUpdatePassword'])->name('update.admin.password');

//Admin all routes end
    //Admin Brands Routes Start
    Route::prefix('brands')->group(function () {
        Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brands');
        Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
        Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
        Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
    });

//Brands Routes End

//Admin Categories Routes Start
    Route::prefix('category')->group(function () {
        Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.categories');
        Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
        Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

        //    Admin subcategories
        Route::get('subcategory/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategories');
        Route::post('subcategory/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
        Route::get('subcategory/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
        Route::post('subcategory/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
        Route::get('subcategory/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');

//Admin Categories Routes End

        // Admin sub_subcategories: uses same controller
        Route::get('sub-subcategory/view', [SubCategoryController::class, 'Sub_subCategoryView'])->name('all.sub_subcategories');
        Route::post('sub-subcategory/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('sub_subcategories.store');
        Route::get('sub-subcategory/edit/{id}', [SubCategoryController::class, 'Sub_subCategoryEdit'])->name('sub_subcategories.edit');
        Route::post('sub-subcategory/update', [SubCategoryController::class, 'Sub_subCategoryUpdate'])->name('sub_subcategories.update');
        Route::get('sub-subcategory/delete/{id}', [SubCategoryController::class, 'Sub_subCategoryDelete'])->name('sub_subcategories.delete');

//    gat subcategory related to category in sub sub view:
        Route::get('subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory'])->name('GetSubCategory');


//    for add product view
        Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);

    });

//Admin Products Routes Start
    Route::prefix('/products')->group(function () {

        Route::get('/add', [ProductController::class, 'add_product'])->name('Addproduct');
        Route::post('/store', [ProductController::class, 'ProductStore'])->name('product.store');
        Route::get('/manage', [ProductController::class, 'manageProduct'])->name('manage.product');
        Route::get('/edit/{id}', [ProductController::class, 'editProduct'])->name('edit.product');
        Route::post('/data/update/{id}', [ProductController::class, 'productDataUpdate'])->name('update.product');
        Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update.product.image');
        Route::post('/thumbnail/update', [ProductController::class, 'ThumbnailUpdate'])->name('update-product-thambnail');
        Route::get('/multi-image/delete/{id}', [ProductController::class, 'deleteMultiImg'])->name('product.multiimg.delete');
        Route::get('/activate/{id}', [ProductController::class, 'activate'])->name('activate.product');
        Route::get('/in-activate/{id}', [ProductController::class, 'Inactivate'])->name('inactivate.product');
        Route::get('/delete/{id}', [ProductController::class, 'deleteProduct'])->name('product.delete');

    });
//Admin manage_slider
    Route::prefix('/slider')->group(function () {
        Route::get('/view', [SliderController::class, 'SliderView'])->name('manage_slider');
        Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
        Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('edit.slider');
        Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
        Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
        Route::get('/activate/{id}', [SliderController::class, 'Slider_activate'])->name('activate.slider');
        Route::get('/in-activate/{id}', [SliderController::class, 'Slider_Inactivate'])->name('inactivate.slider');
    });

    //Admin Coupon Routes
    Route::prefix('/coupons')->group(function () {
        Route::get('/', [CouponController::class, 'CouponView'])->name('manage_coupon');
        Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');
        Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
        Route::post('/update/{id}', [CouponController::class, 'CouponUpdate'])->name('coupon.update');
        Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');


    });

    //Admin Shipping Routes
    Route::prefix('/shipping')->group(function () {
        Route::get('division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage_division');
        Route::post('/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');
        Route::get('/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');
        Route::post('/update/{id}', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');
        Route::get('/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');

        Route::get('district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage_district');
        Route::post('district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');
        Route::get('district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');
        Route::post('district/update/{id}', [ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');
        Route::get('district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');

        Route::get('state/view', [ShippingAreaController::class, 'StateView'])->name('manage_state');
        Route::post('state/store', [ShippingAreaController::class, 'StateStore'])->name('state.store');
        Route::get('state/edit/{id}', [ShippingAreaController::class, 'StatetEdit'])->name('state.edit');
        Route::post('state/update/{id}', [ShippingAreaController::class, 'StateUpdate'])->name('state.update');
        Route::get('state/delete/{id}', [ShippingAreaController::class, 'StateDelete'])->name('state.delete');

        //        get district according to division in state view
        Route::get('/division/district/ajax/{division_id}', [ShippingAreaController::class, 'GetDistrict'])->name('GetDistrict');

    });

//    Admin  orders:
    Route::prefix('orders')->group(function () {
        Route::get('/pending/orders', [OrderController::class, 'pendingOrders'])->name('pending_orders');
        Route::get('/order/details/{order_id}', [OrderController::class, 'pendingOrderDetails'])->name('pendingOrder.details');
        Route::get('pending/delete/{id}', [OrderController::class, 'pendingOrderDelete'])->name('pending.delete');


        Route::get('/confirmed/orders', [OrderController::class, 'confirmedOrders'])->name('confirmed_orders');
        Route::get('confirmed/order/details/{order_id}', [OrderController::class, 'confirmedOrderDetails'])->name('confirmedOrder.details');
        Route::get('confirmed/delete/{id}', [OrderController::class, 'confirmedOrderDelete'])->name('confirmed.delete');

        Route::get('/processed/orders', [OrderController::class, 'processingOrders'])->name('processing_orders');
        Route::get('processed/order/details/{order_id}', [OrderController::class, 'processingOrderDetails'])->name('processingOrder.details');
        Route::get('/delete/{id}', [OrderController::class, 'processingOrderDelete'])->name('processingOrder.delete');

        Route::get('/picked/orders', [OrderController::class, 'pickedOrders'])->name('picked_orders');
        Route::get('picked/order/details/{order_id}', [OrderController::class, 'pickedOrderDetails'])->name('PickedOrder.details');
        Route::get('picked/delete/{id}', [OrderController::class, 'processingOrderDelete'])->name('PickedOrder.delete');

        Route::get('/shipped/orders', [OrderController::class, 'shippedOrders'])->name('shipped_orders');
        Route::get('shipped/order/details/{order_id}', [OrderController::class, 'shippedOrderDetails'])->name('shipped.details');
        Route::get('shipped/delete/{id}', [OrderController::class, 'shippedOrderDelete'])->name('shipped.delete');

        Route::get('/delivered/orders', [OrderController::class, 'deliveredOrders'])->name('delivered_orders');
        Route::get('delivered/order/details/{order_id}', [OrderController::class, 'deliveredOrderDetails'])->name('delivered.details');
        Route::get('delivered/delete/{id}', [OrderController::class, 'deliveredOrderDelete'])->name('delivered.delete');

        Route::get('/cancelled/orders', [OrderController::class, 'cancelledOrders'])->name('cancelled_orders');
        Route::get('cancelled/order/details/{order_id}', [OrderController::class, 'cancelledOrderDetails'])->name('cancelled.details');
        Route::get('cancelled/delete/{id}', [OrderController::class, 'cancelledOrderDelete'])->name('cancelled.delete');
//         Change Order status
        Route::get('/confirm/order/{order_id}', [OrderController::class, 'confirm'])->name('pending_to_confirmed');
        Route::get('/process/order/{order_id}', [OrderController::class, 'process'])->name('confirmed_to_processing');

        Route::get('/pick/order/{order_id}', [OrderController::class, 'pick'])->name('processing_to_picked');
        Route::get('/ship/order/{order_id}', [OrderController::class, 'ship'])->name('picked_to_shipped');
        Route::get('/deliver/order/{order_id}', [OrderController::class, 'deliver'])->name('shipped_to_delivered');
        Route::get('/cancel/order/{order_id}', [OrderController::class, 'cancel'])->name('cancel');

//        invoice download for confirmed orders:
        Route::get('/download/invoice/{order_id}', [OrderController::class, 'AdminDownloadInvoice'])->name('invoice.download');

    });

    //        Admin Stock Managment
    Route::prefix('/stock')->group(function () {

        Route::get('/management', [ProductController::class, 'product_stock'])->name('product_stock');


    });

    //        Admin Reports
    Route::prefix('/reports')->group(function () {

        Route::get('/view', [ReportController::class, 'all_reports'])->name('all_reports');
        Route::post('/search_by_date', [ReportController::class, 'search_by_date'])->name('search_by_date');
        Route::post('/search_by_month', [ReportController::class, 'search_by_month'])->name('search_by_month');
        Route::post('/search_by_year', [ReportController::class, 'search_by_year'])->name('search_by_year');

    });

//    Admin Blog Categories:
    //        Admin blog
    Route::prefix('/blog')->group(function () {

        Route::get('/categories', [BlogController::class, 'blogCategories'])->name('blog.category');
        Route::post('blog_category', [BlogController::class, 'blogCategoryStore'])->name('blogCategory.store');
        Route::get('/edit/{id}', [BlogController::class, 'CategoryEdit'])->name('category.edit');
        Route::post('/update/{id}', [BlogController::class, 'CategoryUpdate'])->name('category.update');
        Route::get('/delete/{id}', [BlogController::class, 'CategoryDelete'])->name('category.delete');

        Route::get('/post/add', [BlogController::class, 'addBlogPosts'])->name('add.post');
        Route::get('/post/view', [BlogController::class, 'viewBlogPosts'])->name('view.post');
        Route::post('post/store', [BlogController::class, 'blogPostStore'])->name('post.store');
        Route::get('/edit/{id}', [BlogController::class, 'postEdit'])->name('post.edit');
        Route::post('/update/{id}', [BlogController::class, 'postUpdate'])->name('post.update');
        Route::get('/delete/{id}', [BlogController::class, 'postDelete'])->name('post.delete');


    });

    //        Admin Users
    Route::prefix('/users')->group(function () {

        Route::get('/view', [AdminProfileController::class, 'all_users'])->name('all_users');
    });

    //        Admin User Roles
    Route::prefix('/adminUserRole')->group(function () {

        Route::get('/all', [AdminUserController::class, 'allAdminRoles'])->name('all_admins');
        Route::get('/add', [AdminUserController::class, 'add_admin'])->name('add_admin');
        Route::post('/store-admin', [AdminUserController::class, 'adminUser_store'])->name('adminUser_store');

        Route::get('/edit/{id}', [AdminUserController::class, 'edit_adminUser'])->name('edit_adminUser');
        Route::post('/update/{id}', [AdminUserController::class, 'update_adminUser'])->name('update_adminUser');
        Route::get('/delete/{id}', [AdminUserController::class, 'delete_adminUser'])->name('delete_adminUser');


    });


    //        Admin Site Settings
    Route::prefix('/settings')->group(function () {

        Route::get('/site', [SettingsController::class, 'manage_settings'])->name('manage_settings');
        Route::post('/update', [SettingsController::class, 'update_settings'])->name('settings_update');
        Route::get('/seo', [SettingsController::class, 'seo_settings'])->name('seo_settings');
        Route::post('/seo/update', [SettingsController::class, 'seo_update'])->name('seo_update');
    });

    //        Admin return orders
    Route::prefix('/return')->group(function () {

        Route::get('/all/requests', [ReturnController::class, 'return_requests'])->name('return.request');
        Route::get('/approve/request/order/{order_id}', [ReturnController::class, 'ApproveRequest'])->name('approve_request');
        Route::get('/approved', [ReturnController::class, 'ApprovedReturn'])->name('Approved_return');

    });

    //        Admin return orders
    Route::prefix('/reviews')->group(function () {

        Route::get('/pending', [ReviewController::class, 'pending_reviews'])->name('pending_reviews');
        Route::get('/approve/review//{review_id}', [ReviewController::class, 'approveReview'])->name('approve_review');
        Route::get('/approved', [ReviewController::class, 'Approved'])->name('approved_reviews');
        Route::get('/delete/{id}', [ReviewController::class, 'review_delete'])->name('review_delete');

    });


});


//User routes Start

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');

//
//user login with google account;
Route::get('google/auth/redirect',[GoogleAuthController::class, 'googleRedirect'])->name('googleRedirect');
Route::get('google/auth/callback/',[GoogleAuthController::class, 'googleCallback']);
////end user login with google
///
///
Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/update', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');
//User routes End

// Front end All routes START
//Multi lang routes:
Route::get('/en', [languageController::class, 'englishLang'])->name('english.language');
Route::get('/ar', [languageController::class, 'arabicLang'])->name('arabic.language');

Route::get('product/details/{id}/{slug}', [IndexController::class, 'productDetails']);
Route::get('product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);
Route::get('subcategory/product/{id}/{slug}', [IndexController::class, 'SubCatWiseProduct']);
Route::get('sub-subcategory/product/{id}/{slug}', [IndexController::class, 'SubSubCatWiseProduct']);

//modal ajax add to cart:
Route::get('/product/view/modal/{id}', [IndexController::class, 'productViewAjax']);

//Cart
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
//mini cart

Route::get('/product/mini/cart', [CartController::class, 'AddMiniCart']);
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

//front end user search product:
Route::post('product/search', [IndexController::class, 'product_search'])->name('product_search');

//advanced search frontend:
Route::post('advance/search', [IndexController::class, 'advancedSearch']);

//Front end shop page:
Route::get('/shop', [ShopController::class, 'shop_page'])->name('shop_page');
Route::post('/shop/filter', [ShopController::class, 'shop_filter'])->name('shop_filter');


//wishlist:
Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'User'], function () {
//wish list view
    Route::get('wishlist', [WishlistController::class, 'viewWishlist'])->name('wishlist');

//ajax load wishlist
    Route::get('/get-wishlist-product/', [WishlistController::class, 'ajaxWishlist']);
//wishlist remove
    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'removeWishlistProduct']);
//    Stripe :
    Route::post('/stripe/order', [StripeController::class, 'stripeOrder'])->name('stripe.order');
//user read orders:
    Route::get('/my-orders', [AllUserController::class, 'myOrders'])->name('my.orders');
    Route::get('/order_details/{order_id}', [AllUserController::class, 'orderDetails']);

//    Cash On Delivery:
    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');
//    Invoice download
    Route::get('/invoice_download/{order_id}', [AllUserController::class, 'invoiceDownload']);
//    return order request
    Route::post('/return/order/{order_id}', [AllUserController::class, 'returnOrder'])->name('return');
    Route::get('/return/order/list', [AllUserController::class, 'returnOrderList'])->name('return.order.list');

    Route::get('/cancelled/orders/list', [AllUserController::class, 'cancelledOrdersList'])->name('cancelled.orders');

//    User Review:
    Route::post('add/review/{product_id}', [ReviewController::class, 'storeReview'])->name('review_store');
// User Order Tracking:
    Route::post('track/my-order', [AllUserController::class, 'order_tracking'])->name('order_tracking');


//
});

Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);
//cart
cart:
Route::get('/cart', [CartPageController::class, 'MyCart'])->name('mycart');
Route::get('/get-cart-product', [CartPageController::class, 'GetCartProduct']);
Route::get('/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);
Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);
Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);

//ajax coupon apply in front end

Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
//coupon calc area:
Route::get('coupon-calculation', [CartController::class, 'CouponCalc']);
//coupon remove front end:

Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

//Checkout
Route::get('/checkout', [CartController::class, 'checkoutCreate'])->name('checkout');
//District and state acc to division:

Route::get('/division/district/ajax/{division_id}', [ShippingAreaController::class, 'GetDistrict']);

Route::get('/district/state/ajax/{district_id}', [ShippingAreaController::class, 'GetState']);

Route::post('/checkout/store', [CheckoutController::class, 'checkoutStore'])->name('checkout.store');

//front end blog
Route::get('/blog', [HomeBlogController::class, 'blogPosts'])->name('home_blog');
Route::get('/blog/post/details/{post_id}', [HomeBlogController::class, 'postDetails'])->name('post_details');
Route::get('/blog/posts/category/{category_id}', [HomeBlogController::class, 'postsByCategory'])->name('postsByCategory');










// Front end All routes END






