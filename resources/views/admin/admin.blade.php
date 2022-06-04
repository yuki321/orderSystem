<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Stock</title>
</head>
<body>
    <a href={{ route('logout') }} onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <b>Logout</b>
    </a>
    <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
        @csrf
    </form>

    <h1>管理者画面</h1>
    <div>
        <a href="/dashboard">Main</a><br>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="/adminList">管理者一覧</a><br>
                    <a href="">ユーザ一覧</a><br>
                    <a href="">ユーザ更新</a><br>
                    <a href="">ユーザ削除</a><br>
                    <a href="">発注履歴削除</a><br>
                    <a href="">最低在庫設定機能</a><br>
                    <a href="">在庫修正機能</a><br>
                </div>
            </div>
        </div>
    </div>

</body>
</html>



