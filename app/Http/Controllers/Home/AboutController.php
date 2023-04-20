<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{

    public function aboutPage()
    {
        $about_slider = About::first();

        return view('admin.aboute_page.about_page_all', compact('about_slider'));
    }



}// End of class
