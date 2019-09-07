<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rss',
    ];

   
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

}
