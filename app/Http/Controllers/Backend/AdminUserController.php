<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminUserController extends Controller
{
    //
    public function allAdminRoles()
    {
        $admin_users = Admin::where('type', 2)->latest()->get();
        return view('backend.role.admin_role_all', compact('admin_users'));


    }

    public function add_admin()
    {
        return view('backend.role.admin_add');
    }

    public function adminUser_store(Request $request)
    {
//        return $request->all();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required|min:6',
            'profile_photo_path' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);


        $image = $request->file('profile_photo_path');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(225, 225)->save('upload/adminUsers/' . $name_gen);
        $save_url = 'upload/adminUsers/' . $name_gen;

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'profile_photo_path' => $save_url,

//            fields of Privileges:
            'brand' => $request->brand,
            'category' => $request->category,
            'product' => $request->product,
            'slider' => $request->slider,
            'coupons' => $request->coupons,
            'shipping' => $request->shipping,
            'blog' => $request->blog,
            'settings' => $request->settings,
            'returnOrders' => $request->returnOrders,
            'reviews' => $request->reviews,
            'orders' => $request->orders,
            'reports' => $request->reports,
            'allUsers' => $request->allUsers,
            'adminUserRole' => $request->adminUserRole,
            'type' => 2,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Admin added successfully',
            'type' => 'success',

        );
        return redirect()->route('all_admins')->with($notification);

    }

    public function edit_adminUser($id)
    {
        $admin = Admin::findOrFail($id);
        return view('backend.role.admin_edit', compact('admin'));

    }

    public function update_adminUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required|min:6',
            'profile_photo_path' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $admin_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('profile_photo_path')) {
            unlink($old_image);
            $image = $request->file('profile_photo_path');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(300, 300)->save('upload/admin_images/' . $name_gen);
            $save_url = 'upload/admin_images/' . $name_gen;

            Admin::findOrFail($admin_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'profile_photo_path' => $save_url,

//            fields of Privileges:
                'brand' => $request->brand,
                'category' => $request->category,
                'product' => $request->product,
                'slider' => $request->slider,
                'coupons' => $request->coupons,
                'shipping' => $request->shipping,
                'blog' => $request->blog,
                'settings' => $request->settings,
                'returnOrders' => $request->returnOrders,
                'reviews' => $request->reviews,
                'orders' => $request->orders,
                'reports' => $request->reports,
                'allUsers' => $request->allUsers,
                'adminUserRole' => $request->adminUserRole,
                'type' => 2,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Admin Updated successfully',
                'type' => 'success',

            );
            return redirect()->route('all_admins')->with($notification);
        } else {
            Admin::findOrFail($admin_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
//            fields of Privileges:
                'brand' => $request->brand,
                'category' => $request->category,
                'product' => $request->product,
                'slider' => $request->slider,
                'coupons' => $request->coupons,
                'shipping' => $request->shipping,
                'blog' => $request->blog,
                'settings' => $request->settings,
                'returnOrders' => $request->returnOrders,
                'reviews' => $request->reviews,
                'orders' => $request->orders,
                'reports' => $request->reports,
                'allUsers' => $request->allUsers,
                'adminUserRole' => $request->adminUserRole,
                'type' => 2,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Admin Updated successfully',
                'type' => 'success',

            );
            return redirect()->route('all_admins')->with($notification);
        }

    }

    public function delete_adminUser($id)
    {

        $admin = Admin::findOrFail($id);
        $image = $admin->profile_photo_path;

        Admin::findOrFail($id)->delete();
        unlink($image);
        $notification = array(
            'message' => 'Admin deleted successfully',
            'type' => 'info',

        );
        return redirect()->route('all_admins')->with($notification);
    }



}
