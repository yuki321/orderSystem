<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Admin Detail</title>
</head>
<body>
    <a href={{ route('logout') }} onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <b>Logout</b>
    </a>
    <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
        @csrf
    </form>

    <h1>管理者詳細画面</h1>
    <div>
        <a href="/dashboard">Main</a><br>
    </div>

    <table class="table">
        <tr>
            <th scope="col">管理者名</th><td>{{ $admin->adminName }}</td>
        </tr>
        <tr>
            <th scope="col">権限</th><td>{{ $admin->admin }}</td>
        </tr>
    </table>
    <a href="/editAdmin/{{ $admin->id }}">編集</a><br>
    <a href="/deleteAdmin/{{ $admin->id }}">削除</a><br>
    <br>

    <a href="/adminList">管理者一覧画面</a>

</body>
</html>






