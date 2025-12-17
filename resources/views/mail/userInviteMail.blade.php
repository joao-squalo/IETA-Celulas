<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Document</title>
</head>

<body>
    <h1>Bem-vindo ao sistema de Células</h1>
    <p>Ola, {{$user->name}}. <br/>Sua conta foi criada com sucesso. <br/>Utilize a senha temporária abaixo para o seu primeiro acesso:</p>
    <h2><strong>{{ $password }}</strong></h2>
    <p>Por favor, altere sua senha após fazer login pela primeira vez.</p>
</body>

</html>
