<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Tweet\UpdateRequest;

class GoodController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,TweetService $tweetService)
    {   
        //echo ;
        $tweetId = (int) $request->route('tweetId');
        var_dump( $tweetId );
        Tweet::increment('good');
        // return redirect()
        // ->route('tweet.index');
    }
}
