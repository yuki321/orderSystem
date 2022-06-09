<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Set Stock Lower Limit</title>
</head>
<body>
    <a href={{ route('logout') }} onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <b>Logout</b>
    </a>
    <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
        @csrf
    </form>

    <h1>下限在庫数設定画面</h1>
    <div>
        <a href="/dashboard">Main</a><br>
    </div>

    <div>
        商品名: <p></p>
    </div>
    <div>
        実在庫数: <p></p>
    </div>
    <div>
        週間減少在庫数: <p></p>
    </div>
    <div>
        現在下限在庫数: <p></p>
    </div>
    <br>

    <form action="/stock" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $stock->id }}">

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li style="color: red"><b>{{ $error }}</b></li>
                @endforeach
            </ul>
        </div>
        @endif

        <p>■下限在庫数を設定して下さい</p>        
        <input type="number" value="{{ $stock->minStock }}" name="minStock"><br>
        <input type="submit" value="変更">
    </form>
    <br>
    
    <a href="/adminList">管理者一覧画面</a>

</body>
</html>







