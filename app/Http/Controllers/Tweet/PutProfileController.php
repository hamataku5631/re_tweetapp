<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TweetService;
use App\Http\Requests\Tweet\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;

class PutProfileController extends Controller
{
    public function __invoke(ProfileRequest $request, TweetService $tweetService)
    { 
        echo "ha";
        $user_id = Auth::id();
        var_dump($user_id);
        $details = User::where('id',$user_id)->firstOrFail();
        echo "ha";
        $details->details = $request->edit;
        
        echo $details->details;
        $details->save();
        return redirect()
            ->route('tweet.profile.edit')
            ->with('feedback.success',"つぶやきを編集しました");
    }
}
