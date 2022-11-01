<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/painel.css">
    <title>Painel</title>
</head>
<body>

    <div class="AreaProdutos">
        <section><a href="/add"><img src="/img/add.png" alt=""></a></section>
        <section>

        @while($info = mysqli_fetch_array($produtos))
        <?php $img = 'img/produtos/'.$info['img']; ?>
            <div>
                <img src='<?php echo $img?>' alt="">
                <h2>{{$info['name']}}</h2>
                <p>{{$info['descricao']}}</p>
                <button onclick="window.location.href='/produtos/del/{{$info['id']}}'">DELETAR</button>
            </div>
        @endwhile
        
        
        </section>
    </div>

    <div onclick="window.location.href = '/logout'" class="logout">LOGOUT</div>
</body>
</html>