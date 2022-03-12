<?php
session_start();
include 'connection.php';

if(empty($_POST["login"]) || empty($_POST["senha"])){
    $_SESSION['error'] = "Login ou senha incorretos!";
    header('Location: index.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST["login"]);
$senha = mysqli_real_escape_string($conexao, $_POST["senha"]);

$query = "select login, idusuario from usuario where senha = '$senha' and login = '$usuario'";


$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);



if($row == 1){
    $_SESSION['usuario'] = $usuario;
    header('Location: pageCadastro.php');
    exit();
}else{

    $_SESSION['error'] = "Login ou senha incorretos!";
    header('Location: index.php');
    exit();
}

?>