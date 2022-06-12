<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Admin</title>
</head>
<body>
    <div class="py-6">
        <a href={{ route('logout') }} class="ml-6" 
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <b>Logout</b>
        </a>
        <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
            @csrf
        </form>

        <h1 class="text-xl ml-6 my-4 font-bold">管理者画面</h1>
        <div>
            <a href="/dashboard" class="ml-6 underline decoration-sky-600 hover:bg-blue-500">Main</a><br>
        </div>
        <div class="py-6">
            <div class="max-w-xl ml-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="/adminList" class="font-bold hover:bg-blue-500">管理者一覧</a><br>
                        <a href="" class="font-bold hover:bg-blue-500">ユーザ一覧</a><br>
                        <a href="" class="font-bold hover:bg-blue-500">在庫修正機能</a><br>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>



