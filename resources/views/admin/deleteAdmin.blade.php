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
    <div class="m-6">
        <a href={{ route('logout') }} onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <b>Logout</b>
        </a>
        <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
            @csrf
        </form>

        <h1 class="text-xl my-4 font-bold">管理者削除画面</h1>
        <div>
            <a href="/dashboard" 
                class="underline decoration-sky-600 hover:bg-blue-500">Main</a><br>
        </div>

        <p class="mt-6 mb-1">■以下の管理者を削除しますか？</p>
        <form action="/admin" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $admin->id }}">
            <p class="my-1">管理者名: {{ $admin->adminName }}</p>
            <p class="my-1">権限: {{ $admin->admin }}</p>

            <input type="submit" name="delete" value="削除" 
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-2 mb-6 rounded">
        </form>
        <a href="/adminList" 
            class="underline decoration-sky-600 hover:bg-blue-500">管理者一覧画面</a>

    </div>
</body>
</html>







