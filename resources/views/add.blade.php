


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <title>Registrar</title>
</head>
<body>

    <div class="AreaLogin">
        <form action="/produtos" method="post" enctype="multipart/form-data">
            
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            @if(isset($_GET['e']))
                <p>{{$_GET['e']}}</p>
            @endif
            <input required type="text" name="name" id="name" placeholder="Nome">
            <input required type="text" name="desc" id="desc" placeholder="Descrição">
            <input required type="file" name="arquivo" id="arquivo">
            <input required  type="submit" value="Salvar">
            <a href="/painel">Voltar</a>
        </form >
    </div>

</body>
</html>