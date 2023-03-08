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
        $tweets = $tweetService->getTweets();
        //tweetからデータ取り出し
        foreach($tweets as $tweet){
            $tweet_content = $tweet->content;
            $tweet_created_at = $tweet->created_at;
            $tweet_id = $tweet->id;
            $user_id = $tweet->user_id;
            $good = $tweet->good;
            $user_name = $tweet->user->name;
            //imagetweetテーブルからtweetのidと同じtweet_idを持っているimage_idを取得する
            $imageids = ImageTweet::select('image_id')->where('tweet_id',$tweet_id)->get();
            //取得したimage_idをもとにimageテーブルからファイル名であるnameを取得する
            foreach($imageids as $imageid){
                $Images = Image::select('name')->where('id',$imageid->image_id)->orderBy('id','desc')->get();
                $TItweets[] = array(
                    'Images' => $Images,
                    'content' => $tweet_content,
                    'created_at' => $tweet_created_at,
                    'tweet_id' => $tweet_id,
                    'user_id' => $user_id,
                    'good' => $good,
                    'user_name' => $user_name

                );
            }
        }
        return view('tweet.index')
        ->with([
            "tweets" => $TItweets
        ]);
        
        
    }
}
