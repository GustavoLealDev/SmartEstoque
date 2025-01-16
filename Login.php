<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Página de Login</title>
</head>

<style>

body {
         font-family: Arial, sans-serif;
        background-color: #333;

    }

    .box{
         position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        background-color: #fffbfb;
        padding: 15px;
        border-radius: 15px;
        width: 20%;
    }


h1 {
    color: #007bff;
}

.inputSubmit{
    background-color: dodgerblue;
    width: 100%;
    border: none;
    padding: 15px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    border-radius: 15px;
}

.inputSubmit:hover{
    background-color: darkblue;
    cursor: pointer;
}


input[type="text"], input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;}
 a{
        background-color: white;
        border-radius: 3px;
        text-decoration: none;
    }
 
a:hover{
        background-color: red;
    }


</style>

<body>
    <div class="box">
       <fieldset>
        <h1>LOGIN</h1>
        <form action="TestLog.php" method="post">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="senha" placeholder="Senha">
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
        </fieldset>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="ml-auto">
        <a href="Add.php" class="btn btn-primary">CADASTRE-SE</a>
        </div>

</body>
</html>