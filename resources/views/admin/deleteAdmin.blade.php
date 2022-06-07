<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Delete Admin</title>
</head>
<body>
    <a href={{ route('logout') }} onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <b>Logout</b>
    </a>
    <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
        @csrf
    </form>

    <h1>管理者削除画面</h1>
    <div>
        <a href="/dashboard">Main</a><br>
    </div>

    <p>以下の管理者を削除しますか？</p>
    <form action="/admin" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $admin->id }}">
        <p>管理者名: {{ $admin->adminName }}</p>
        <p>権限: {{ $admin->admin }}</p>

        <input type="submit" name="delete" value="削除">
    </form>

</body>
</html>







