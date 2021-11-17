<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    //
    public function SliderView()
    {
        $sliderItems = Slider::latest()->get();
        return view('backend.slider.slider_view', compact('sliderItems'));

    }

    public function SliderStore(Request $request)
    {

        $request->validate([
            'slider_img' => 'required',

        ]);

        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(870, 370)->save('upload/slider/' . $name_gen);
        $save_url = 'upload/slider/' . $name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $save_url,
        ]);
        $notification = array(
            'message' => 'Slider added successfully',
            'type' => 'success',

        );
        return redirect()->back()->with($notification);

    }

    public function SliderEdit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('slider'));

    }

    public function SliderUpdate(Request $request)
    {
        $slider_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('slider_img')) {
            unlink($old_image);
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(300, 300)->save('upload/slider/' . $name_gen);
            $save_url = 'upload/slider/' . $name_gen;

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $save_url,
            ]);
            $notification = array(
                'message' => 'Slider Updated successfully',
                'type' => 'success',

            );
            return redirect()->route('manage_slider')->with($notification);
        } else {
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            $notification = array(
                'message' => 'Slider Updated successfully',
                'type' => 'success',

            );
            return redirect()->route('manage_slider')->with($notification);
        }

    }

    public function SliderDelete($id)
    {

        $slider = Slider::findOrFail($id);
        $image = $slider->slider_img;
        unlink($image);
        Slider::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Slider deleted successfully',
            'type' => 'success',

        );
        return redirect()->route('manage_slider')->with($notification);

    }

    public function Slider_activate($id)
    {
        Slider::findOrfail($id)->update([
            'status' => 1

        ]);
        $notification = array(
            'message' => 'Slider Activated!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }
    public function Slider_Inactivate($id)
    {
        Slider::findOrfail($id)->update([
            "status" => 0
        ]);

        $notification = array(
            'message' => 'Slider Inactivated!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);


    }
}
