<?php
session_start();

if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: Login.php');
    exit();
}

include "Conexao.php";

$conectado = $_SESSION['email'];

$sql = "SELECT * FROM produtos ORDER BY id DESC";
$query_cadastros = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Sistema de Estoque</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #333;
            color: #343a40; 
        }

        h2{
            color: white;
        }
        .navbar {
            background-color: #fff ;
        }
        .navbar-brand {
            color:#007bff;
        }
        .content {
            text-align: center; 
            margin-top: 30px; 
        }
        .table-bg {
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .form-control {
            border-radius: 20px;
        }
        .form-inline {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <h1 class="navbar-brand">Bem-vindo <u><?php echo $conectado; ?></u></h1>
            <div class="ml-auto">
                <a href="saida.php" class="btn btn-danger">SAIR</a>
            </div>
        </div>
    </nav>
    
    <div class="content">
        <h2>CONTROLE DE ESTOQUE</h2>
    </div>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered table-bg mt-4">
                <thead class="thead-light">
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Validade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <form action="Add.php" method="GET" class="form-inline">
                            <td><input type="text" name="produto" class="form-control" placeholder="Nome do Produto"></td>
                            <td><input type="text" name="quantidade" class="form-control" placeholder="Quantidade do Produto"></td>
                            <td><input type="text" name="datav" class="form-control" placeholder="Validade(AAAA-MM-DD)"></td>
                            <td><input class="btn btn-custom" id="adicionar" type="submit" value="Adicionar"></td>
                        </form>
                    </tr>
    
                    <?php
                    while ($receber_dados = mysqli_fetch_array($query_cadastros)) {
                        $id = $receber_dados['id'];
                        $produto = $receber_dados['produto'];
                        $quantidade = $receber_dados['quantidade'];
                        $datav = $receber_dados['datav'];
                    ?>
                        <tr>
                            <form action="Att.php" method="GET">
                                <td><input type="text" name="produto" value="<?php echo $produto; ?>" class="form-control"></td>
                                <td><input type="text" name="quantidade" value="<?php echo $quantidade; ?>" class="form-control"></td>
                                <td><input type="text" name="datav" value="<?php echo $datav; ?>" class="form-control"></td>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <button class="btn btn-custom" id="atualizar" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                        </svg>
                                    </button>
                                </td>
                            </form>
                            <td>
                                <form action="Deleta.php" method="GET">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <button type="submit" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>