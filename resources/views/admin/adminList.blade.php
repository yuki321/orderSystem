<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Admin List</title>
</head>
<body>
    <a href={{ route('logout') }} onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <b>Logout</b>
    </a>
    <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
        @csrf
    </form>

    <h1>管理者一覧画面</h1>
    <div>
        <a href="/dashboard">Main</a><br>
    </div>

    <a href="/createAdmin">新規管理者登録</a>

    @if($admins->count() > 0)
    <table class="table">
        <thead>
            <th>#</th>
            <th scope="col">管理者名</th>
            <th scope="col">権限</th>
        </thead>
        <tbody>
            @foreach($admins as $admin)
            <tr>
                <td scope="row">{{ $admin->id }}</td>
                <td>{{ $admin->adminName }}</td>
                <td>{{ $admin->admin }}</td>
            </tr>
            @endforeach
        </tbody> 
    </table>
    @else
    <p><b>該当するデータはありません。</b></p>
    @endif

    {{ $admins->links() }}

</body>
</html>





