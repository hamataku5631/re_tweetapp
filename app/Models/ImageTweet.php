<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageTweet extends Model
{
    use HasFactory;
    protected $table = 'image_tweet';
    public function tweet()
    {
        return $this->belongsToMany(Tweet::class);
       
    }
    public function image()
    {
        return $this->belongsToMany(Image::class);
    }
}
