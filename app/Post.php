<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = ['user_id', 'category_id', 'title', 'body', 'slug', 'image', 'published_at'];
    protected $dates = ['published_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/Y";
        if ($showTimes) $format = $format . " H:i:s";
        return $this->created_at->format($format);
    }

    public function getDateAttribute($value)
    {
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

    public function scopePublished($query)
    {
        return $query->where("published_at", "<=", Carbon::now());
    }

    public function publicationLabel()
    {
        if (!$this->published_at) {
            return '<span class="label label-warning">Draft</span>';
        } elseif ($this->published_at && $this->published_at->isFuture()) {
            return '<span class="label label-info">Schedule</span>';
        } else {
            return '<span class="label label-success">Published</span>';
        }

    }

    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";

        if (!is_null($this->image)) {
            $imagePath = public_path() . "/b/images/blogs/" . $this->image;
            if (file_exists($imagePath)) $imageUrl = asset('b/images/blogs/' . $this->image);
        }

        return $imageUrl;

    }

    public function getImageThumbUrlAttribute($value)
    {
        $imageThumbUrl = "";

        if (!is_null($this->image)) {
            $imagePath = public_path() . "/b/images/blogs/" . $this->image;
            if (file_exists($imagePath)) $imageThumbUrl = asset('b/images/blogs/thumb_' . $this->image);
        }

        return $imageThumbUrl;
    }

    public function getBodyPostAttribute()
    {
        return substr($this->body, 0, 60);
    }

    public function getTitlePostAttribute()
    {
        return substr($this->body, 0, 13);
    }

    public function getPublishAtAttribute()
    {
        return Carbon::parse($this->attributes['published_at'])->format('d-M-Y');
    }
}
