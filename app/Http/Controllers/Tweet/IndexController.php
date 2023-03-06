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
        var_dump ($tweets->id);
        $imageids = ImageTweet::select('image_id','tweet_id')->where('tweet_id',$tweets->id)->get();
        $TItweets = array() ;
        foreach($imageids as $imageid){
            //echo $imageid->image_id;
            //echo $imageid->tweet_id;
            $Images = Image::select('name')->where('id',$imageid->image_id)->where('imageid')->get();
            //$tweetcontent = $tweets->content; 
            // foreach($tweets as $tweet){
            //     //var_dump ($tweet->content);
            //     $tweet_content= $tweet->content;
            //     //echo $tweet_content;
            //     $tweet_updated_at = $tweet->updated_at;
            //     //echo $tweet_uapdated_at;
            //     array_push($TItweets,$tweet_content,$tweet_updated_at);
            // }
           
            //echo $tweets;
            //echo $Images;
            
            array_push($TItweets,$Images,$tweets);
        }
        //var_dump($TItweets);
        foreach($TItweets as $tweet){
           var_dump($tweet->content);

        }
        
        
        // return view('tweet.index')
        // ->with([
        //     "tweets" => $TItweets
        // ])
        
    }
}
