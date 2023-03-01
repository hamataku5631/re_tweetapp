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
    <h1>プロフィール</h1>
    <li>ユーザーID</li> 
    {{ $user_id }}</li>
    <li>ユーザーNAME</li>
    {{ $user_name }}<br>
    <li>ユーザーEMAIL</li>
    {{ $user_email }}<br>
    <li>ユーザーPROFILE</li>
    {{ $details->details }}
    <form action="{{ route('tweet.profile.edit') }}" method="get">
        @csrf    
        <input type="submit" value="PROFILE編集"><br>
    </form>
    <form action="{{ route('tweet.softdelete') }}" method="get">
                @csrf    
                <input type="submit" value="アカウント削除">
    </form>
    <a href="{{ route('tweet.index') }}"><戻る</a>
   
    
   
    