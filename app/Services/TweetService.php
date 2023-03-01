<?php
namespace App\Services;

use App\Models\Tweet;
use App\Models\Image;
use App\Models\ImageTweet;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class TweetService
{
    public function getTweets() //->IndexContrller.php
    {   
        //image get
        $nameFromimage=Image::select('name')->get();

        return Tweet::orderBy('id','DESC')->get();
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
    // public function saveTweet(int $userId,string $content,array $images)
    // {   
    //     DB::transaction(function () use ($userId,$content,$images) {
    //         // $tweet = new Tweet;
    //         // $tweet->user_id = $userId;
    //         // $tweet->content = $content;
    //         // $tweet->save();
    //         //Storage::putFile('public/images',$images);
    //         // $imageModel  = new Tweet;
    //         // $imageModel->name =$image->hashNmae();
    //         //$images->save();
    //         // $imageModel->images()->attach($imageModel->id);
    //     });
    // }
}



?>