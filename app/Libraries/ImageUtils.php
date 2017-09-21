<?php

namespace App\Libraries;

use Image;

class ImageUtils {
    
    private $image;
    
    public function __construct($path) {
        $this->image = Image::make($path)->orientate();
    }

    public function resize($width, $height) {
        $currentWidth = $this->image->width();
        $currentHeight = $this->image->height();

        //if (($width > $currentWidth) || ($height > $currentHeight))
           // return null;

        if ($currentWidth > $currentHeight) {
            $this->image->widen($width);
        } else {
            $this->image->heighten($height);
        }
    }
    
    public function crop(){
        
    }
    
    public function get(){
        return $this->image;
    }

}
