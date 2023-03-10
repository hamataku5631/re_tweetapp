<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'tweet' => 'required|max:140',
            // 'images' => 'array|max:4',
            // 'images*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
    //Requestクラスのuser関数で今自分がログインしているユーザーが取得できる
    public function userId(): int
    {
        return $this->user()->id;
    }
    
    public function tweet(): string
    {
        return $this->input('tweet');
    }
    
    public function images()
    {   if ($this->hasFile('images')) {
        return $this->file('images')->getClientOriginalName();
    }return null;
    }

}
