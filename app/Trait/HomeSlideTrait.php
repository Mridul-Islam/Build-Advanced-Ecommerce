<?php

namespace App\Trait;

use App\Models\HomeSlide;

trait HomeSlideTrait
{

    public function getHomeSlider()
    {
        return HomeSlide::first();
    }

}

