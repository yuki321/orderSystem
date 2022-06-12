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
    <div class="m-6">
        <a href={{ route('logout') }} onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <b>Logout</b>
        </a>
        <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
            @csrf
        </form>

        <h1 class="text-xl my-4 font-bold">管理者詳細画面</h1>
        <div class="mb-4">
            <a href="/dashboard" 
                class="underline decoration-sky-600 hover:bg-blue-500">Main</a><br>
        </div>

        <table class="table-auto my-4">
            <div class="my-1 flex flex-wrap">
                <div class="w-40 font-bold">管理者名</div>
                <div class="flex-1">{{ $admin->adminName }}</div>
            </div>
            <div class="my-1 flex flex-wrap">
                <div class="w-40 font-bold">権限</div>
                <div class="flex-1">{{ $admin->admin }}</div>
            </div>
        </table>
        <a href="/editAdmin/{{ $admin->id }}" 
            class="underline decoration-sky-600 hover:bg-blue-500">編集</a><br>
        <a href="/deleteAdmin/{{ $admin->id }}" 
            class="underline decoration-sky-600 hover:bg-blue-500">削除</a><br>
        <br>
        <a href="/adminList" 
            class="underline decoration-sky-600 hover:bg-blue-500">管理者一覧画面</a>
    </div>
</body>
</html>







