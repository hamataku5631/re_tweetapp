<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function tweet()
    {
        return $this->belongsToMany(Tweet::class);
       
    }
    public function imagetweet()
    {
        return $this->belongsToMany(Image::class);
    }
}
