<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;
use App\Models\Image;
use App\Models\ImageTweet;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Services\TweetService;



class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request)
    {   
        
        //var_dump($request->images());
        $tweet_id = Tweet::insertGetId(
            [
                'user_id' => $request->userId(), //ここでUserIdを保存している
                'content' => $request->tweet(),
            ]
        );
        
        
        $image_id = Image::insertGetId(
            [
                'name' => $request->images()?? 'no_image'//投稿されたfileのオリジナル名を格納
            ]
        );

        
        $tweet = Tweet::where('id', $tweet_id)->first();
        //Imageのnameカラムの値を取得
        //echo $tweet->name;
        $nameFromimage=Image::select('name')->get();
        //tmpfileの情報の確認
        //var_dump($_FILES["images"]["tmp_name"]);
        //echo $request->images();
        $tempfilename = $request->images();

        $tempfileaccess = $_FILES["images"]["tmp_name"];
        //確認
        //echo $tempfileaccess;
        
        //tmpfileをpublicを経由してstorage/imagesに格納
        $result = move_uploaded_file($tempfileaccess, "storage/images/".$request->images());
        
        $tweet->image()->sync($image_id);
        $tweet->$nameFromimage;
        echo $nameFromimage;
        $tweet->save();
        return redirect()->route('tweet.index');
    }

}
