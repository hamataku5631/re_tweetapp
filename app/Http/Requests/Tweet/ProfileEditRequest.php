<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Profile;
use App\Models\User;
use App\Services\TweetService;
use Illuminate\Http\Request;

class ProfileEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
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
            
        ];
    }
    public function details()
    {
        echo "name";
        return $this->input('details');
    }
    public function id(): int
    {
        return (int) $this->route('tweetId');
    }
    
}
