<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Slider extends Model
{
    protected $fillable = ['content', 'image', 'link', 'start_at', 'finish_at'];
    protected $dates = ['start_at', 'finish_at'];

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

    public function getContentSliderAttribute()
    {
        return substr($this->content, 0, 50);
    }

    public function publicationLabel()
    {
        if (!$this->start_at) {
            return '<span class="label label-warning">Draft</span>';
        } elseif ($this->start_at && $this->start_at->isFuture()) {
            return '<span class="label label-info">Schedule</span>';
        } elseif($this->finish_at && $this->finish_at->isPast()) {
            return '<span class="label label-danger">Expired</span>';
        }else{
            return '<span class="label label-success">publish</span>';
        }

    }


    public function scopeStartAt($query)
    {
        return $query->where("start_at", "<=", Carbon::now());
    }
    public function scopeFinishAt($query)
    {
        return $query->where("finish_at", ">=", Carbon::now());
    }

    public function scopeSchedule($query)
    {
        return $query->where("start_at", ">=", Carbon::now());
    }

    public function scopeExpired($query)
    {
        return $query->where("finish_at", "<=", Carbon::now());
    }

    public function scopeDraft($query)
    {
        return $query->whereNull("start_at");
    }

    public function getWaktuStartAttribute()
    {
        return Carbon::parse($this->start_at)->format('H:i');
    }

    public function getWaktuFinishAttribute()
    {
        return Carbon::parse($this->finish_at)->format('H:i');
    }
}
