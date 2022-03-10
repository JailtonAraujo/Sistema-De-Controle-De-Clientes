<?php
require 'connection.php';
session_start();

        $_SESSION['id']='';
        $_SESSION['idEndereco'] = '';

        $_SESSION['nome'] ='';
        $_SESSION['cpf'] ='';
        $_SESSION['rg'] = '';
        $_SESSION['dataNascimento'] ='';
        $_SESSION['cep'] = '';
        $_SESSION['logradouro'] = '';
        $_SESSION['complemento'] = '';
        $_SESSION['bairro'] = '';
        $_SESSION['cidade'] = '';
        $_SESSION['numero'] = '';
        $_SESSION['uf'] = '';

if( isset($_GET['acao'])){
    $acao = $_GET['acao'];

$offset = 0;

if($acao === 'salvar'){

    $id = $_POST['id'];
    $idEndereco = $_POST['idEndereco'];
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

try{

    if ($id > 0 && !empty($id)){

    $queryCliente = "update cliente set nome = $nome, cpf= $cpf, rg= $rg, dataNascimento=$dataNascimento where idCliente = $id";
    mysqli_query($conexao, $queryCliente);

    $queryEndereco = "update endereco set cep = $cep, logradouro= $logradouro, complemento= $complemento, bairro= $bairro, cidade= $cidade, numero= $numero, uf= $uf where idEndereco = $idEndereco";
    mysqli_query($conexao, $queryEndereco);

    $_SESSION['msg'] = "Atualizado com sucesso!";

    }else{

    $queryCliente = "insert into cliente (nome, cpf, rg, dataNascimento) values ('$nome', '$cpf', '$rg', '$dataNascimento')";

    mysqli_query($conexao, $queryCliente);
    $last_id = mysqli_insert_id($conexao);
    
    $queryEndereco = "insert into endereco (idCliente, cep, logradouro, complemento, bairro, cidade, numero, uf)
     values ('$last_id', '$cep', '$logradouro', '$complemento', '$bairro', '$cidade', '$numero', '$uf')";

    mysqli_query($conexao, $queryEndereco);

    $_SESSION['msg'] = "Salvo com sucesso!";

    }

    mysqli_commit($conexao);

}catch(Exception $e){
    $_SESSION['msg'] = "Erro Ao atualizar : $e!";
    mysqli_rollback($conexao);
}finally{
    mysqli_close($conexao);
}

header('Location:pageCadastro.php');
}

else if($acao==='buscarClientePaginado'){

    $buscar = $_GET['buscar'];
    
    if( isset($_GET['offset'])){
        $offset = $_GET['offset'];
    }   
    
    try{
    $sql = "select cliente.idCliente, cliente.nome, cliente.cpf, endereco.logradouro, endereco.cidade 
    from cliente
    inner join endereco on endereco.idCliente = cliente.idCliente
    where cliente.nome  like '$buscar%' limit 5 offset $offset;";

    $sqlCount = "select count(*) as total from cliente where nome like upper('$buscar%')";

    $result = mysqli_query($conexao, $sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    $resultCount = mysqli_query($conexao, $sqlCount);
    $total = $resultCount->fetch_all(MYSQLI_ASSOC);
    array_push($rows,$total[0]);
    
    echo json_encode($rows);
    mysqli_commit($conexao);


    }catch(Exception $e){
        echo $e;
        mysqli_rollback($conexao);
    }finally{
        mysqli_close($conexao);
    }
}

    else if($acao === "excluir"){
        $id = $_GET['id'];

        try{

        mysqli_query($conexao, $sql);
        mysqli_commit($conexao);   

        }catch(Exception $e){
            echo $e;
            mysqli_rollback($conexao);
        }finally{
            mysqli_close($conexao);
        }
        //echo '<div class="alert alert-success" role="alert"> EXCLUIDO COM SUCESSO! </div>';
        header('Location:pageListagem.php');
    }

    else if ($acao === "buscarClienteId"){

        $id = $_GET['id'];

        $sql = "select cliente.idCliente, cliente.nome, cliente.cpf, cliente.rg, cliente.dataNascimento, endereco.idEndereco, endereco.cep, endereco.logradouro, endereco.complemento, endereco.cidade,
        endereco.bairro,  endereco.numero, endereco.uf
            from cliente
            inner join endereco on endereco.idCliente = cliente.idCliente
            where cliente.idCliente = $id";

    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    //echo  $row["idCliente"]

        $_SESSION['id']=$row['idCliente'];;
        $_SESSION['idEndereco'] = $row['idEndereco'];
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['cpf'] = $row['cpf'];
        $_SESSION['rg'] = $row['rg'];
        $_SESSION['dataNascimento'] = $row['dataNascimento'];
        $_SESSION['cep'] = $row['cep'];
        $_SESSION['logradouro'] = $row['logradouro'];
        $_SESSION['complemento'] = $row['complemento'];
        $_SESSION['bairro'] = $row['bairro'];
        $_SESSION['cidade'] = $row['cidade'];
        $_SESSION['numero'] = $row['numero'];
        $_SESSION['uf'] = $row['uf'];

        $_SESSION['msg'] = 'Cliente carregado para edição!';

        mysqli_close($conexao);

        header('Location:pageCadastro.php');
    }

    else if($acao==="logout"){
        session_start();
        session_destroy();
        header('Location: index.php');
    }
}

?>