<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Image;

class Tweet extends Model
{
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->belongsToMany(Image::class);
    }
    public function imagetweet()
    {
        return $this->belongsToMany(Image::class);
    }
    
    
}
