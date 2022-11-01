<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <title>Login</title>
</head>
<body>

    <div class="AreaLogin">
        <form action="/loginauth">
            @if(isset($_GET['e']))
                <p>{{$_GET['e']}}</p>
            @endif
            <input required type="email" name="email" id="email" placeholder="Email">
            <input required type="password" name="password" id="password" placeholder="Senha">
            <input required type="submit" value="Login">
            <a href="/registrar"> Registrar</a>
        </form>
    </div>

</body>
</html>