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
    <div class="m-6">
        <a href={{ route('logout') }} onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <b>Logout</b>
        </a>
        <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
            @csrf
        </form>

        <h1 class="text-xl my-4 font-bold">管理者作成画面</h1>
        <div>
            <a href="/dashboard" 
                class="underline decoration-sky-600 hover:bg-blue-500">Main</a><br>
        </div>

        <form action="/dashboard" method="POST">
            @csrf
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li style="color: red"><b>{{ $error }}</b></li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- 
                ドロップダウンリストからユーザーを選択
                ユーザーに紐づいたuserIdが作成ボタン押下時に
                送信される
            -->
            <div class="my-4">
                <p class="my-1">■管理者に設定したいユーザ名を選択して下さい</p>
                <select name="adminName" id="adminName">
                    <option></option>
                    @foreach($usersWithoutAdmins as $userWithoutAdmins)
                        <option value="{{ $userWithoutAdmins }}">{{ $userWithoutAdmins }}</option>
                    @endforeach
                </select>
            </div>
            <div class="my-4">
                <p class="my-1">■管理者に付与する権限を選択して下さい</p>
                <div>
                    <input type="checkbox" value="管理者権限" name="authentication" id="auth">
                    <label for="auth">管理者権限</label></br>
                    <input type="checkbox" value="設定権限" name="setting" id="setting">
                    <label for="setting">設定権限</label></br>
                    <input type="checkbox" value="発注履歴削除権限" name="delOrderHistory" id="del">
                    <label for="del">発注履歴削除権限</label></br>
                </div>
            </div>
            <input type="submit" name="adminList" value="作成" 
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-6 rounded">
        </form>
        <a href="/adminList" 
            class="underline decoration-sky-600 hover:bg-blue-500">管理者一覧画面</a>
    </div>

</body>
</html>







