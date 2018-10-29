<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'category_id', 'title', 'body', 'slug', 'image', 'published_at', 'view_count'];
    protected $dates = ['published_at', 'deleted_at'];

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

    public function scopeSchedule($query)
    {
        return $query->where("published_at", ">=", Carbon::now());
    }

    public function scopeDraft($query)
    {
        return $query->whereNull("published_at");
    }

    public function scopePopuler($query)
	{
		return $query->orderBy('view_count', 'desc');
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

    public function getBodyHtmlAttribute($value)
    {
        return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
    }

    public function getBodyPostAttribute()
    {
        return str_limit($this->body, 200);
    }

    public function getTitlePostAttribute()
    {
        return substr($this->title, 0, 100);
    }

    public function getPublishAtAttribute()
    {
        return Carbon::parse($this->attributes['published_at'])->format('d-M-Y');
    }

    public function scopePopular($query)
	{
		return $query->orderBy('view_count', 'desc');
	}
}
