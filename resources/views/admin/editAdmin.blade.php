<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Edit Admin</title>
</head>
<body>
    <a href={{ route('logout') }} onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <b>Logout</b>
    </a>
    <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
        @csrf
    </form>

    <h1>管理者編集画面</h1>
    <div>
        <a href="/dashboard">Main</a><br>
    </div>

    <form action="/adminList" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $admin->id }}">

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li style="color: red"><b>{{ $error }}</b></li>
                @endforeach
            </ul>
        </div>
        @endif

        <div>
            管理者名: <input type="text" name="adminName" value="{{ $admin->adminName }}">
        </div>
        <p>■管理者に付与する権限を選択して下さい</p>
        <div>
            <input type="checkbox" value="4" name="authentication" id="auth">
            <label for="auth">管理者権限</label></br>
            <input type="checkbox" value="2" name="setting" id="setting">
            <label for="setting">設定権限</label></br>
            <input type="checkbox" value="1" name="delOrderHistory" id="del">
            <label for="del">発注履歴削除権限</label></br>
        </div>
        <input type="submit" name="adminList" value="編集">
    </form>
    <a href="/adminList">管理者一覧画面</a>

</body>
</html>





