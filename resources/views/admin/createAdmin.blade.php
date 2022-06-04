<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Create Admin</title>
</head>
<body>
    <a href={{ route('logout') }} onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <b>Logout</b>
    </a>
    <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
        @csrf
    </form>

    <h1>管理者作成画面</h1>
    <div>
        <a href="/dashboard">Main</a><br>
    </div>

    <form action="/adminList" method="POST">
        @csrf
        <!-- <p>
            管理者名: <input type="text" name="adminName">
        </p> -->

        <!-- 
            ドロップダウンリストからユーザーを選択
            ユーザーに紐づいたuserIdが作成ボタン押下時に
            送信される
        -->
        <select name="adminName" id="adminName">
            <option value="userName">-- 管理者にするユーザーを選択して下さい --</option>
            @foreach($usersWithoutAdmins as $userWithoutAdmins)
                <option value="admin">{{ $userWithoutAdmins }}</option>
            @endforeach
        </select>
        <p>
            権限: <input type="number" name="admin">
        </p>
        <input type="submit" name="createAdmin" value="作成">
    </form>
    <a href="/adminList">戻る</a>

</body>
</html>







