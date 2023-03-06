<?php
namespace App\Services;

use App\Models\Image;
use App\Models\ImageTweet;
use App\Models\Tweet;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class TweetService
{
    public function getTweets() //->IndexContrller.php
    {   
        //image get
        $nameFromimage=Image::select('name')->get();
        
        return Tweet::with('user')->get();
    }
    //自分のtweetかどうかをチェックするメソッド
    public function checkOwnTweet(int $userId, int $tweetId ): bool
    {
        $tweet = Tweet::where('id', $tweetId)->first(); 
        if (!$tweet) {
            return false;
        }
        return $tweet->user_id === $userId;   
    }
    
}



?>