<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="css/main.css"> -->
    <title>Stock</title>
</head>
<body>
    <h1>在庫一覧画面</h1>
    <div>
        <a href="/dashboard">Main</a><br>
    </div>

    <form action="/stock" method="get">
        @csrf
        <p>
            検索ワード: <input type="text" name="search">
        </p>
        <!-- <p>

            単価(上限): <input type="number" name="max">
        </p>
        <p>
            単価(下限): <input type="number" name="min">

        </p> -->
        <input type="submit" value="検索">
    </form>

    @if($stocks->count() > 0)
    <table class="table">
        <thead>
            <th>#</th>
            <th scope="col">商品名</th>
            <th scope="col">実在庫数</th>
            <th scope="col">下限在庫数</th>
            <th scope="col">週間減少在庫数</th>
        </thead>
        <tbody>
            @foreach($stocks as $stock)
            <tr>
                <td scope="row">{{ $stock->id }}</td>
                <td>{{ $stock->itemName }}</td>
                <td>{{ $stock->actualStock }}</td>
                <td>{{ $stock->minStock }}</td>
                <td>{{ $stock->decreasePerWeek }}</td>
            </tr>
            @endforeach
        </tbody> 
    </table>
    @else
    <p><b>該当するデータはありません。</b></p>
    @endif

    {{ $stocks->links() }}

</body>
</html>


