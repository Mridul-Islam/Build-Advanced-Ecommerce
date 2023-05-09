<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trait\HomeSlideTrait;
use App\Trait\HomeAboutTrait;

class HomeController extends Controller
{
    use HomeSlideTrait;
    use HomeAboutTrait;

    public function index()
    {
        $home_slider = $this->getHomeSlider();

        $home_about = $this->getHomeAbout();

        return view('front.index', compact('home_slider', 'home_about'));
    }



}// End of class
