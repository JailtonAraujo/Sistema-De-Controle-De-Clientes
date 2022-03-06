<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>

    <div class="container">
        <form action="logar.php" id="form" method="post">
            <h2>LOGIN</h2>
            <div class="form-control">
                <label for="login">Login:</label>

                <input type="text" id="login" name="login">

                <i id="icon"><img src="" alt=""></i>
                <small></small>
            </div>
            <div class="form-control">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha">
                <i id="icon"><img src="" alt=""></i>
                <small></small>
            </div>
            <input id="btn" type="submit" value="Logar">


            <?php 
                if(isset($_SESSION['nao-autenticado'])):
            ?>
                <p id = "msg-alert">Login ou senha incorretos, confira-os!</p>
            <?php
                endif;
            ?>
        </form>
       
    </div>
    <script src="js/login.js"></script>
</body>
</html>