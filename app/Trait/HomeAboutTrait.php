<?php

namespace App\Trait;

use App\Models\About;

trait HomeAboutTrait
{
    private function getHomeAbout()
    {
        return About::first();
    }


}// End of trait



