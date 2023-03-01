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
    ユーザーID<br>  
    {{ $user_id }}<br>
    ユーザーNAME<br>
    {{ $user_name }}<br>
    ユーザーEMAIL<br>  
    {{ $user_email }}<br>
    ユーザーPROFILE<br>
    {{ $details }}
    
    <form action="{{ route('tweet.profile.edit') }}" method="get">
        @csrf    
        <input type="submit" value="profile編集"><br>
    </from>
    <form action="{{ route('tweet.logout') }}" method="POST">
                @csrf    
                <input type="submit" value="アカウント削除">
            </form>
        <form id="withdrawal-form" action="{{ route('user.withdrawal') }}" method="post" style="display: none;">
            {{ csrf_field() }}
        </form>


    <a href="{{ route('tweet.index') }}"><戻る</a>
   
    
   
    