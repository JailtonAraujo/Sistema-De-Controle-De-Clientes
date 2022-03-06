<?php
require 'connection.php';

$acao = $_GET['acao'];

if($acao === 'salvar'){

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $dataNascimento = $_POST['data-nascimento'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $numero = $_POST['numero'];
    $uf = $_POST['uf'];

$queryCliente = "insert into cliente (nome, cpf, rg, dataNascimento) values ('$nome', '$cpf', '$rg', '$dataNascimento')";

try{
    mysqli_query($conexao, $queryCliente);
    $last_id = mysqli_insert_id($conexao);
    
    $queryEndereco = "insert into endereco (idCliente, cep, logradouro, complemento, bairro, cidade, numero, uf)
     values ('$last_id', '$cep', '$logradouro', '$complemento', '$bairro', '$cidade', '$numero', '$uf')";

    mysqli_query($conexao, $queryEndereco);

    mysqli_commit($conexao);

    $_SESSION['message'] = 'SALVO COM SUCESSO!';
}catch(Exception $e){
    echo $e;
    mysqli_rollback($conexao);
}finally{
    mysqli_close($conexao);
}

header('Location:pageCadastro.php');
}


else if($acao === 'buscarFetch'){
    $buscar = $_GET['buscar'];

    try{
    $sql = "select cliente.idCliente, cliente.nome, cliente.cpf, endereco.logradouro, endereco.cidade 
    from cliente
    inner join endereco on endereco.idCliente = cliente.idCliente
    where cliente.nome  like '%';";

    $result = mysqli_query($conexao, $sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    
    echo json_encode($rows);
    mysqli_commit($conexao);


    }catch(Exception $e){
        echo $e;
        mysqli_rollback($conexao);
    }finally{
        mysqli_close($conexao);
    }

}

?>