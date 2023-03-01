<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Services\TweetService;
use App\Http\Requests\Tweet\ProfileEditRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ProfileEditRequest $request, TweetService $tweet)
    {
        $tweetService = new TweetService();// <-TweetService.php
        $tweets = $tweetService->getTweets(); //つぶやきの一覧を取得
        $user_id = Auth::id();
        echo $user_id;
        $user_name = Auth::user()->name;
        echo $user_name;
        echo "dd";
        $user_email = Auth::user()->email;
        echo $user_email;
        $details = User::select('details')->where('id',$user_id)->first();

        echo ($details);
        
        return view('tweet.profile')
        ->with([
            "tweets" => $tweets,
            "user_id" => $user_id,
            "user_name" => $user_name,
            "user_email" => $user_email,
            "details" => $details  
        ]);
    }
   
}
