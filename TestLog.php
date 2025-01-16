<?php
    session_start();
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
{
    include "Conexao.php";

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM cadastro WHERE email= '$email' and senha = '$senha'";

    $resultado = $conexao -> query($sql);

    if(mysqli_num_rows($resultado) < 1)
 {
        
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: Login.php');
    }  else {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location: Site.php ');
    }

   
} else {
        header('Location: Login.php');
    }

?>