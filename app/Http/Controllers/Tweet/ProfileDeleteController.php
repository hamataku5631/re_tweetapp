<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Tweet;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;


class ProfileDeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweet)
    {
        echo "ha";
        $user_id = Auth::id();
        echo $user_id;
        $delete = User::find($user_id);
        $delete->delete();
        return view('tweet.index')
        // ->with(['user_id'=>$user_id,
        //     "tweets" => $tweets,
        //     "images" => $Images])
        ;
        
        
    }
}
