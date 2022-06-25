<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('/js/app.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Stock</title>
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

        <h1 class="text-xl my-4 font-bold">在庫一覧画面</h1>
        <div>
            <a href="/dashboard" class="underline decoration-sky-600 hover:bg-blue-500">Main</a><br>
        </div>
        
        <form action="/stock" method="get" class="my-4">
            @csrf
            <p class="my-2">
                検索ワード: <input type="text" name="search">
            </p>

            <p class="my-2">
                実在庫数(上限): <input type="number" name="max">
            </p>
            <p class="my-2">
                実在庫数(下限): <input type="number" name="min">
            </p>
            <input type="submit" value="検索"
             class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-4 rounded">
        </form>

        @if($contents->count() > 0)
        <table class="table">
            <thead>
                <th>#</th>
                <th scope="col">商品名</th>
                <th scope="col">実在庫数</th>
                <th scope="col">下限在庫数</th>
                <th scope="col">週間減少在庫数</th>
            </thead>
            <tbody>
                @foreach($contents as $content)
                <tr>
                    <td scope="row">{{ $content->id }}</td>
                    <td><a href="/stockLowerLimit/{{ $content->id }}" class="underline decoration-sky-600 hover:bg-blue-400">{{ $content->itemName }}</a></td>
                    <td>{{ $content->actualStock }}</td>
                    <td>{{ $content->minStock }}</td>
                    <td>{{ $content->decreasePerWeek }}</td>
                    @if($content->actualStock < $content->minStock)
                    
                    <!-- 管理者の場合、商品の下限在庫数設定機能を使用することができる -->
                        @if($isAdmin)
                        <td style="color: red;"><a href="/stockLowerLimit/{{ $content->id }}" class="hover:bg-blue-400"><b>在庫が下限在庫数を下回っています。</b></a></td>
                        @else
                        <td style="color: red;"><b>在庫が下限在庫数を下回っています。</b></td>
                        @endif
                    @elseif($content->actualStock - $content->decreasePerWeek < $content->minStock)
                        @if($isAdmin)
                        <td style="color: skyblue"><a href="/stockLowerLimit/{{ $content->id }}" class="hover:bg-blue-400">1週間以内に在庫が下限在庫数を下回る可能性が高いです。</a></td>
                        @else
                        <td style="color: skyblue">1週間以内に在庫が下限在庫数を下回る可能性が高いです。</td>
                        @endif
                    @endif
                </tr>
                @endforeach
            </tbody> 
        </table>
        @else
        <p><b>該当するデータはありません。</b></p>
        @endif
        
        {{ $contents->links('vendor.pagination.semantic-ui') }}
    </div>
    
</body>
</html>


