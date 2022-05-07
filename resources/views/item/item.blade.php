<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Item</title>
</head>
<body>
    <h1>商品一覧画面</h1>
    <div>
        <a href="/dashboard">Main</a><br>
    </div>

    <table>
        <thead>
            <th>商品ID</th>
            <th>商品名</th>
            <th>単価</th>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item->itemId }}</td>
                <td>{{ $item->itemName }}</td>
                <td>{{ $item->unitPrice }}</td>
            </tr>
            @endforeach
        </tbody>
 
</table>


</body>
</html>


