<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Order Histories</title>
</head>
<body>
    <h1>発注履歴画面</h1>
    <div>
        <a href="/dashboard">Main</a><br>
    </div>

    <form action="/orderHistory" method="get">
        @csrf
        <!-- <p>
            検索ワード: <input type="text" name="search">
        </p> -->
        <p>

            単価(上限): <input type="number" name="max">
        </p>
        <p>
            単価(下限): <input type="number" name="min">

        </p>
        <input type="submit" value="検索">
    </form>

    @if($contents->count() > 0)
    <table class="table">
        <thead>
            <th>#</th>
            <th scope="col">商品名</th>
            <th scope="col">顧客名</th>
            <th scope="col">発注数</th>
            <th scope="col">合計金額</th>
        </thead>
        <tbody>
            @foreach($contents as $content)
            <tr>
                <td scope="row">{{ $content->id }}</td>
                <td>{{ $content->itemName }}</td>
                <td>{{ $content->companyName }}</td>
                <td>{{ $content->numOfOrder }}</td>
                <td>{{ $content->totalPrice }}</td>

            </tr>
            @endforeach
        </tbody> 
    </table>
    @else
    <p><b>該当するデータはありません。</b></p>
    @endif


    
</body>
</html>