<!doctype html>
<html lang="ja">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>PC MARKET</title>
    <!-- BootstrapのCSS読み込み -->
    <link href="/css/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery読み込み -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="/js/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="nvabar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="EC">PC MARKET</a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="EC">商品一覧</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="cart">カート</a>
        </li>
    </ul>
</nav>
<div class="container">
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">商品名</th>
            <th scope="col">価格</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($cartItems as $cartItem): ?>
        <tr>
            <td>{{$cartItem->id}}</td>
            <td>{{$cartItem->name}}</td>
            <td>{{$cartItem->price}}</td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="card text-center">
        <h5 class="card-header">合計金額</h5>
        <div class="card-body">
            <?=$sum?>円
        </div>
    </div>
    <form action="/order" method="post">
        @csrf
        <button class="btn btn-dark btn-block" type="submit">注文</button>
    </form>
</div>
</body>
</html>