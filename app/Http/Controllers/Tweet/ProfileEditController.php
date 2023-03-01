<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Profile;
use App\Models\User;
use App\Http\Requests\Tweet\ProfileEditRequest;
use App\Services\TweetService;
use Illuminate\Support\Facades\Auth;



class ProfileEditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // ,ProfileEditRequest $request
    public function __invoke(ProfileEditRequest $request, TweetService $tweet)
    {   
        echo "hoa";
        $user_id = Auth::id();
        $user_name = Auth::user();
        var_dump($user_id);
        $details = Profile::where('id',$user_id)->firstOrFail();
         echo $details->details;
        $details->details = Profile::select("select 'details' where id=$user_id");
        $details->save();
        
        return redirect()
             ->route('tweet.profile.edit')
             ->with('feedback.success',"プロフィールを編集しました");
     }
}
