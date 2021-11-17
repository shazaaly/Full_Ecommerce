<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    //

    public function manage_settings()
    {
        $settings = SiteSetting::find(1);
        return view('backend.settings.settings_update', compact('settings'));

    }

    public function update_settings(Request $request)
    {
        $setting_id = $request->id;

        $old_image = $request->old_image;

        if ($request->file('logo')) {
//            unlink($old_image);
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(300, 300)->save('upload/' . $name_gen);
            $save_url = 'upload/' . $name_gen;

            SiteSetting::find($setting_id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'twitter' => $request->twitter,
                'logo' => $save_url,
            ]);
            $notification = array(
                'message' => 'Site Settings Updated successfully',
                'type' => 'success',

            );
            return redirect()->route('manage_settings')->with($notification);
        } else {

            SiteSetting::findOrFail($setting_id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,


            ]);

            $notification = array(
                'message' => 'Setting Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('manage_settings')->with($notification);

        } // end else

    }

    public function seo_settings()
    {
        $seo_settings = Seo::find(1);
        return view('backend.settings.seo_update', compact('seo_settings'));

    }

    public function seo_update(Request $request)
    {
        $setting_id = $request->id;


            Seo::find($setting_id)->update([
                'meta_title' => $request->meta_title,
                'meta_author' => $request->meta_author,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'google_analytics' => $request->google_analytics,

            ]);
            $notification = array(
                'message' => 'Seo Settings Updated successfully',
                'type' => 'success',

            );
            return redirect()->route('seo_settings')->with($notification);

    }
}
