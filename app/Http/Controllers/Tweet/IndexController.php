<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService;
use App\Models\Tweet;
use App\Models\Image;
use App\Models\User;
use App\Models\ImageTweet;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweet)
    {   
        $tweetService = new TweetService();// <-TweetService.php
        $tweets = $tweetService->getTweets(); //つぶやきの一覧を取得
        $imageids = ImageTweet::select('image_id','tweet_id')->get();
        $TItweets = array() ;
        foreach($imageids as $imageid){
            $Images = Image::select('name')->where('id',$imageid->image_id)->get();
            $tweets = $tweetService->getTweets();
            // array_push($TItweets,$Images,$tweets);
            foreach ($tweets as $tweet) {
                $tweet_content = $tweet->content;
                $tweet_updated_at = $tweet->updated_at;
                $tweet_id = $tweet->id;
                $user_id = $tweet->user_id;
                // $Images と $tweet を配列にまとめて $TItweets に追加する
                $TItweets[] = array(
                    'Images' => $Images,
                    'content' => $tweet_content,
                    'updated_at' => $tweet_updated_at,
                    'tweet_id' => $tweet_id,
                    'user_id' => $user_id

                );
            }
        }
        //var_dump($TItweets);
        // foreach ($TItweets as $tweet) {
        //     echo $tweet['content'];
        //     echo $tweet['updated_at'];
        //     foreach ($tweet['Images'] as $image) {
        //         echo $image->name;
        //     }
        // }
        
        
        
        
        return view('tweet.index')
        ->with([
            "tweets" => $TItweets
        ]);
        
        
    }
}
