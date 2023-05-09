<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class AboutController extends Controller
{

    public function aboutPage()
    {
        $about_slider = About::first();

        return view('admin.aboute_page.about_page_all', compact('about_slider'));
    }



    // ----------------------------------------------------------
    // Start of update about
    // ----------------------------------------------------------
    public function updateAbout(About $about, Request $request)
    {
        $save_image_url = $about->about_image;
        // Image validation
        if($request->file('about_image'))
        {
            $file = $request->file('about_image');
            $image = hexdec(uniqid()) . "-". $file->getClientOriginalName();

            // Save image to folder
            Image::make($file)->resize(523, 605)->save('images/home_about/'.$image);

            $save_image_url = 'images/home_about/'.$image;

            // Delete previous image from the folder
            if($about->about_image)
            {
                unlink($about->about_image);
            }
        }

        // Update Home Slider data
        $about->update([
            'title' => $request->about_title,
            'short_title' => $request->short_title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'about_image' => $save_image_url,
        ]);

        $notification = array(
            'message' => 'About Page Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // ----------------------------------------------------------
    // End of update about
    // ----------------------------------------------------------




    // -----------------------------------------------------------
    // Start of Home About Page
    // -----------------------------------------------------------
    public function homeAbout()
    {
        $about_page = About::first();

        return view('front.about', compact('about_page'));
    }
    // -----------------------------------------------------------
    // End of Home About Page
    // -----------------------------------------------------------



}// End of class
