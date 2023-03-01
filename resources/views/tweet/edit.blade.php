<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0,
    maximum-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>プロフィール</title>
</head>
<body>
    <div>
        <a href="{{ route('tweet.profile') }}"><戻る</a>
        <p>プロフィール編集</p>
        @if (session('feedback.success'))
            <p style="color: green">{{ session('feedback.success') }}</p>
        @endif
        <form action="{{ route('tweet.profile.edited') }}" method="post">
        @method('PUT')    
        @csrf
            <label for="tweet-content">PROFILE </label>
            
            <textarea id="tweet-content" type="text" name="edit" placeholder="何か書いてね！">{{ $details->details}}</textarea>
            @error('edit')
            <p style="color: red;">{{ $message }}</p>
            @enderror
            <button type="submit">編集</button>
        </form>
    </div>
</body>