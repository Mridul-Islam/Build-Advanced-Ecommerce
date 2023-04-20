<?php

namespace App\Http\Controllers\Home;

use App\Models\HomeSlide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use App\Trait\HomeSlideTrait;

class HomeSliderController extends Controller
{
    use HomeSlideTrait;

    public function homeSlider()
    {
        $home_slide = $this->getHomeSlider();

        return view('admin.home_slide.home_slide_all', compact('home_slide'));
    }




    // --------------------------------------------------------------------------
    // Start of update home slider method
    // --------------------------------------------------------------------------
    public function updateHomeSlide(HomeSlide $slide, Request $request)
    {
        $save_image_url = $slide->home_slide;
        // Image validation
        if($request->file('slider_image'))
        {
            $file = $request->file('slider_image');
            $image = hexdec(uniqid()) . "-". $file->getClientOriginalName();

            // Save image to folder
            Image::make($file)->resize(636, 852)->save('images/home_slider/'.$image);

            $save_image_url = 'images/home_slider/'.$image;

            // Delete previous image from the folder
            if($slide->home_slide)
            {
                unlink($slide->home_slide);
            }
        }

        // Update Home Slider data
        $slide->update([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'home_slide' => $save_image_url,
            'video_url' => $request->video_url,
        ]);

        $notification = array(
            'message' => 'Home Slider Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // --------------------------------------------------------------------------
    // End of update home slider method
    // --------------------------------------------------------------------------



}// End of class
