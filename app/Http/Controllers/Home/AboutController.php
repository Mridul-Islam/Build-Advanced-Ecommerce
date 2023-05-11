<?php

namespace App\Http\Controllers\Home;

use Image;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{

    public function aboutPage()
    {
        $about_slider = About::first();

        return view('admin.about_page.about_page_all', compact('about_slider'));
    }



    // Start of update about
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
    // End of update about




    // Start of Home About Page
    public function homeAbout()
    {
        $about_page = About::first();

        return view('front.about', compact('about_page'));
    }
    // End of Home About Page




    // Start of show about multi image page
    public function aboutMultiImage()
    {
        return view('admin.about_page.multi_image');
    }
    // End of show about multi image page




    // Start of store multi image
    public function storeMultiImage(Request $request)
    {
        $images = $request->file('multi_image');

        foreach($images as $the_image)
        {
            $name = hexdec(uniqid()) . "-" . $the_image->getClientOriginalName();

            $save_image_url = 'images/home_about/' . $name;

            Image::make($the_image)->resize(220, 220)->save($save_image_url);

            MultiImage::insert([
                'multi_image' => $save_image_url
            ]);
        }

        $notification = array(
            'message' => 'Multi Image inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End of store multi image




    // Start of all multi image
    public function allMultiImage()
    {
        $all_multi_image= MultiImage::all();

        return view('admin.about_page.all_multi_image', compact('all_multi_image'));
    }
    // End of all multi image





    // Start of Edit multi image
    public function editMultiImage(MultiImage $multiImage)
    {
        return view('admin.about_page.edit_multi_image', compact('multiImage'));
    }
    // End of edit multi image




    // Start of update Multi Image
    public function updateMultiImage(MultiImage $multiImage, Request $request)
    {
        if($request->file('edit_multi_image'))
        {
            $file = $request->file('edit_multi_image');
            $image = hexdec(uniqid()) . "-". $file->getClientOriginalName();

            // Delete previous image from the folder
            if($multiImage->multi_image && file_exists(public_path() . $multiImage->multi_image))
            {
                unlink($multiImage->multi_image);
            }

            // Save image to folder
            Image::make($file)->resize(220, 220)->save('images/home_about/'.$image);

            $save_image_url = 'images/home_about/'.$image;

            // Update image url in database
            $multiImage->update([
                'multi_image' => $save_image_url
            ]);
        }

        $notification = array(
            'message' => 'Multi Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.multi_image')->with($notification);
    }
    // End of update Multi Image




    // Start of delete multi Image method
    public function deleteMultiImage(MultiImage $multiImage)
    {
        // delete file
        if($multiImage->multi_image && file_exists(public_path() . $multiImage->multi_image))
        {
            unlink($multiImage->multi_image);
        }

        // Delete data
        $multiImage->delete();

        $notification = array(
            'message' => 'Multi Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End of delete multi Image method




}// End of class
