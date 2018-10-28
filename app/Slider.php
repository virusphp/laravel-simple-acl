<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['content', 'image', 'link'];

    public function getImageThumbAttribute($value)
    {
        $imageSlider = "";

        if (!is_null($this->image)) {
            $imagePath = public_path() . "/f/images/slider/" . $this->image;
            if (file_exists($imagePath)) $imageSlider = asset('f/images/slider/thumb_' . $this->image);
        }

        return $imageSlider;

    }

    public function getImageSliderAttribute($value)
    {
        $imageSlider = "";

        if (!is_null($this->image)) {
            $imagePath = public_path() . "/f/images/slider/" . $this->image;
            if (file_exists($imagePath)) $imageSlider = asset('f/images/slider/' . $this->image);
        }

        return $imageSlider;

    }
}
