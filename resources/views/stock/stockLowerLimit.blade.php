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
    <div class="m-6">
        <a href={{ route('logout') }} onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            <b>Logout</b>
        </a>
        <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
            @csrf
        </form>

        <h1 class="text-xl my-4 font-bold">下限在庫数設定画面</h1>
        <div>
            <a href="/dashboard" class="underline decoration-sky-600 hover:bg-blue-500">Main</a><br>
        </div>
        
        <div class="my-6">
            <table class="table-auto">
                <div class="my-2 flex flex-wrap">
                    <div class="w-40 font-bold">商品名:</div> <div class="flex-1">{{ $contents->itemName }}</div>
                </div>
                <div class="my-2 flex flex-wrap">
                    <div class="w-40 font-bold">実在庫数:</div><div class="flex-1">{{ $stock->actualStock }}</div>
                </div>
                <div class="my-2 flex flex-wrap">
                    <div class="w-40 font-bold">週間減少在庫数:</div><div class="flex-1">{{ $stock->minStock }}</div>
                </div>
                <div class="my-2 flex flex-wrap">
                    <div class="w-40 font-bold">現在下限在庫数:</div><div class="flex-1">{{ $stock->decreasePerWeek }}</div>
                </div>
            </table>
        </div>
        <br>
        
        <form action="/stock" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $stock->id }}">
            
            @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                    <li style="color: red"><b>{{ $error }}</b></li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            <p class="mb-2">■下限在庫数を設定して下さい</p>        
            <input type="number" value="{{ $stock->minStock }}" name="minStock"><br>
            <input type="submit" value="変更" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4  my-4 rounded">
        </form>
    <br>
    
    <a href="/stock" class="underline decoration-sky-600 hover:bg-blue-500">在庫一覧画面</a>
    </div>

</body>
</html>







