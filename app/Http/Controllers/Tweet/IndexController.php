<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;

use App\Services\TweetService;
use App\Models\Tweet;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweet)
    {   
        $Images= Image::select('name')->get();
        $tweetService = new TweetService();// <-TweetService.php
        $tweets = $tweetService->getTweets(); //つぶやきの一覧を取得
        // $tweets = Tweet::with('user')->get();
        return view('tweet.index')
        ->with([
            "tweets" => $tweets
            
        ])
        ;
    }
}
