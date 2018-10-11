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
}
