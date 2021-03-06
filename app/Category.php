<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Category extends Model
{
    protected $fillable = ['name','slug'];
    
    public function scopeTerbaru($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}