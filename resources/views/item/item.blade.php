<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Item</title>
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

        <h1 class="text-xl my-4 font-bold">商品一覧画面</h1>
        <div>
            <a href="/dashboard" class="underline decoration-sky-600 hover:bg-blue-500">Main</a><br>
        </div>

        <form action="/item" method="get" class="my-4">
            @csrf
            <p>
                検索ワード: <input type="text" name="search" class="my-2">
            </p>
            <p>

                単価(上限): <input type="number" name="max" class="my-2">
            </p>
            <p>
                単価(下限): <input type="number" name="min" class="my-2">

            </p>
            <input type="submit" value="検索"
             class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-4 rounded">
        </form>

        @if($items->count() > 0)
        <table class="table">
            <thead>
                <th>#</th>
                <th scope="col">商品名</th>
                <th scope="col">単価</th>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td scope="row">{{ $item->id }}</td>
                    <td>{{ $item->itemName }}</td>
                    <td>{{ $item->unitPrice }}</td>

                    @if($isAdmin)
                    <td><a href="/itemOrder/{{ $item->id }}" 
            class=" decoration-sky-600 hover:bg-blue-500 px-2 py-1">発注</a></td>
                    @endif
                </tr>
                @endforeach
            </tbody> 
        </table>
        @else
        <p><b>該当するデータはありません。</b></p>
        @endif

        {{ $items->links() }}
    
    </div>

</body>
</html>


