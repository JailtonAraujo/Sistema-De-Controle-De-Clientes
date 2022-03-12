<?php
$HOST = 'localhost';
$USUARIO = 'root';
$SENHA = '1234';
$DB='sistema-php';

$conexao = mysqli_connect($HOST,$USUARIO, $SENHA, $DB) or die('Não foi possivel connectar!');

?>