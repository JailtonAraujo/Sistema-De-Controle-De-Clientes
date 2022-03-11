<?php
$HOST = 'localhost';
$USUARIO = 'root';
$SENHA = '';
$DB='sistema-php';

$conexao = mysqli_connect($HOST,$USUARIO, $SENHA, $DB) or die('Não foi possivel connectar!');

?>