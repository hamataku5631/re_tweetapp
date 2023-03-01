<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Tweet\UpdateRequest;
use Illuminate\Http\Response;
use App\Models\Profile;
use App\Models\User;
use App\Http\Requests\Tweet\ProfileEditRequest;
use App\Services\TweetService;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;



class ProfileEditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // ,ProfileEditRequest $request
    public function __invoke(ProfileEditRequest $request)
    {   
        echo "hoa";
        $user_id = Auth::id();
        $user_name = Auth::user();
        var_dump($user_id);
        $details = User::where('id',$user_id)->firstOrFail();
        echo $details->details;
        
        
        return view('tweet.edit')
        
        ->with([
            "user_id" => $user_id,
            "user_name" => $user_name,
            "details" => $details
        ]);
     }
}
