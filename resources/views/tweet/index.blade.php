<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0,
    maximum-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>つぶやきアプリ</title>
</head>
<body>
    <h1>つぶやきアプリ</h1>
    @auth
        <div>
            <p>投稿フォーム</p>
            @if (session('feedback.success'))
                <p style="color: green">{{ session('feedback.success') }}</p>
            @endif
            <form action="{{ route('tweet.profile') }}" method="GET">
                @csrf
                    <input type="submit" value="profile">
            </form>
            <form  action="{{ route('tweet.logout') }}" method="POST" >
                @csrf
                <input type="submit" value="ログアウト">
            </form>
            <form action="{{ route('tweet.logout') }}" method="POST">
                @csrf    
                <input type="submit" value="アカウント削除">
            </form>
            
            <form action="{{ route('tweet.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="tweet-content">つぶやきを入力</label>
                <span>140文字まで</span>
                <textarea id="tweet" type="text" name="tweet" placeholder="つぶやきを入力"></textarea>
                @error('tweet')
                <p style="color: red;">{{ $message }} </p>
                @enderror
                <input type="file" id="images" name="images">
                <button type="submit">投稿</button>
            </form>
        </div>
    @endauth
    <div>
        @foreach($tweets as $tweet)
        <details>
            <summary>{{ $tweet['content'] }}  by {{$tweet['user_name']}} 投稿日時 <?php echo $tweet['created_at']?>
                @foreach($tweet['Images'] as $image) {{ $image->name }}
                <div><img src="storage/images/{{ $image->name }}" width="50" height="50"></div>
                @endforeach
                いいね数<?php echo $tweet['good']?>
                    <form action="{{ route('tweet.good',['tweetId' => $tweet['tweet_id']] )}}" method="GET">
                        @csrf
                        <input type="submit" value="GOOD!">
                    </form>
                    <form action="{{ route('tweet.bad',['tweetId' => $tweet['tweet_id']]) }}" method="GET">
                        @csrf
                        <input type="submit" value="BAD!">
                    </form>
            </summary>
            @if(\Illuminate\Support\Facades\Auth::id() === $tweet['user_id'])
            <div>
                <a href="{{ route('tweet.update.index',['tweetId' => $tweet['tweet_id'] ]) }}">編集</a>
                <form action="{{ route('tweet.delete',['tweetId' => $tweet['tweet_id'] ]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit">削除</button>
                </form>
            </div>
        @else
            編集できません
        @endif
        </details>
        @endforeach
    </div>
</body>
</html>