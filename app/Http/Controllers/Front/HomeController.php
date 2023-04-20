<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trait\HomeSlideTrait;

class HomeController extends Controller
{
    use HomeSlideTrait;

    public function index()
    {
        $home_slider = $this->getHomeSlider();

        return view('front.index', compact('home_slider'));
    }



}// End of class
