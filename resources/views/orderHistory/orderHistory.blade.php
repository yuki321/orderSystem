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
    <div class="m-6">
        <a href={{ route('logout') }} onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <b>Logout</b>
        </a>
        <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
            @csrf
        </form>

        <h1 class="text-xl my-4 font-bold">発注履歴画面</h1>
        <div>
            <a href="/dashboard" class="underline decoration-sky-600 hover:bg-blue-500">Main</a><br>
        </div>

        <form action="/orderHistory" method="get" class="my-4">
            @csrf
            <p class="my-2">
                商品名: <input type="text" name="item_name">
            </p>
            <p class="my-2">
                発注数(上限): <input type="number" name="order_max">
            </p>
            <p class="my-2">
                発注数(下限): <input type="number" name="order_min">
            </p>
            <p class="my-2">
                合計金額(上限): <input type="number" name="totalPrice_max">
            </p>
            <p class="my-2">
                合計金額(下限): <input type="number" name="totalPrice_min">
            </p>
            <input type="submit" value="検索"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-4 rounded">
        </form>

        @if($contents->count() > 0)
        <table class="table">
            <thead>
                <th>#</th>
                <th scope="col">商品名</th>
                <th scope="col">発注数</th>
                <th scope="col">合計金額</th>
            </thead>
            <tbody>
                @foreach($contents as $content)
                <tr>
                    <td scope="row">{{ $content->id }}</td>
                    <td>{{ $content->itemName }}</td>
                    <td>{{ $content->numOfOrder }}</td>
                    <td>{{ $content->totalPrice }}</td>
                    <td><a href="/deleteOrderHistories/{{ $content->id }}"
                        class="hover:bg-blue-500 px-2 py-1">削除</a></td>
                </tr>
                @endforeach
            </tbody> 
        </table>
        @else
        <p><b>該当するデータはありません。</b></p>
        @endif

        {{ $contents->links() }}

    </div>
</body>
</html>