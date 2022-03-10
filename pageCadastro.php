<?php
session_start();
if(!$_SESSION['usuario']){
    header('Location:index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/principal.css">
  <title>HomePage</title>
</head>

<body>

  <div class="container">

    <?php  include 'header.php';?>
    <div class="main">
      <h2>CADASTRO DE CLIENTES</h2>

      <div class="container-conteudo">

          <form action="processing.php?acao=salvar" class="form-group needs-validation" method="post" id="form-cadastro">
            <div class="dados-cadastrais">
              <legend>Dados Pessoais</legend>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">ID:</span>
                <input type="text" name="id" class="form-control" id="id" aria-label="Username"
                  aria-describedby="basic-addon1" value="<?php if(isset($_SESSION['id'])){echo $_SESSION['id'];}?>" readonly>
                <div class="invalid-feedback">
                  Campo Obrigatorio!!
                </div>
                <div class="valid-feedback">
                  Ok
                </div>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">NOME:</span>
                <input type="text" name="nome" class="form-control" id="nome" aria-label="Username"
                  aria-describedby="basic-addon1" required value="<?php if(isset($_SESSION['cpf'])){echo $_SESSION['nome'];}?>">
                <div class="invalid-feedback">
                  Campo Obrigatorio!!
                </div>
                <div class="valid-feedback">
                  Ok
                </div>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">CPF:</span>
                <input type="number" name="cpf" id="cpf" class="form-control" aria-label="Username"
                  aria-describedby="basic-addon1" required value="<?php if(isset($_SESSION['cpf'])){echo $_SESSION['cpf'];}?>">
                <div class="invalid-feedback">
                  Campo Obrigatorio!!
                </div>
                <div class="valid-feedback">
                  Ok
                </div>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">RG:</span>
                <input type="text" name="rg" id="rg" class="form-control" aria-label="Username"
                  aria-describedby="basic-addon1" required value="<?php if(isset($_SESSION['rg'])){echo $_SESSION['rg'];}?>">
                <div class="invalid-feedback">
                  Campo Obrigatorio!!
                </div>
                <div class="valid-feedback">
                  Ok
                </div>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">IDADE:</span>
                <input type="date" name="data-nascimento" id="data-nascimento" class="form-control" aria-label="Username"
                  aria-describedby="basic-addon1" required value="<?php if(isset($_SESSION['dataNascimento'])){echo $_SESSION['dataNascimento'];}?>">
                <div class="invalid-feedback">
                  Campo Obrigatorio!!
                </div>
                <div class="valid-feedback">
                  Ok
                </div>
              </div>
              <div class="button-group">
                <button type="submit" id="btn-salvar" class="btn btn-success">SALVAR</button>
                <button type="button" class="btn btn-secondary" id="btn-limpar"
                  onclick="limparCampos();">LIMPAR</button>
              </div>

              <div id="resposta" style="color: red; margin-top: 8px;">
                <?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; } ?>
              </div>
            </div>

            <div class="endereco">
              <legend>Endereço</legend>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">ID:</span>
                <input type="text" name="idEndereco" class="form-control" id="idEndereco" aria-label="Username"
                  aria-describedby="basic-addon1" value="<?php if(isset($_SESSION['idEndereco'])){echo $_SESSION['idEndereco'];}?>" readonly>
                <div class="invalid-feedback">
                  Campo Obrigatorio!!
                </div>
                <div class="valid-feedback">
                  Ok
                </div>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">CEP:</span>
                <input type="number" name="cep" class="form-control" id="cep" aria-label="Username"
                  aria-describedby="basic-addon1" required onblur="BuscarEndereco();" value="<?php if(isset($_SESSION['cep'])){echo $_SESSION['cep'];}?>">
                <div class="invalid-feedback">
                  Campo Obrigatorio!!
                </div>
                <div class="valid-feedback">
                  Ok
                </div>
              </div>
              <p id="alertCep" style="color: red;"></p> 
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">LOGRADOURO:</span>
                <input type="text" name="logradouro" id="logradouro" class="form-control" aria-label="Username"
                  aria-describedby="basic-addon1" required value="<?php if(isset($_SESSION['logradouro'])){echo $_SESSION['logradouro'];}?>">
                <div class="invalid-feedback">
                  Campo Obrigatorio!!
                </div>
                <div class="valid-feedback">
                  Ok
                </div>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">COMPLEMENTO:</span>
                <input type="text" name="complemento" id="complemento" class="form-control" aria-label="Username"
                  aria-describedby="basic-addon1" required value="<?php if(isset($_SESSION['complemento'])){echo $_SESSION['complemento'];}?>">
                <div class="invalid-feedback">
                  Campo Obrigatorio!!
                </div>
                <div class="valid-feedback">
                  Ok
                </div>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">BAIRRO:</span>
                <input type="text" name="bairro" id="bairro" class="form-control" aria-label="Username"
                  aria-describedby="basic-addon1" required value="<?php if(isset($_SESSION['bairro'])){echo $_SESSION['bairro'];}?>">
                <div class="invalid-feedback">
                  Campo Obrigatorio!!
                </div>
                <div class="valid-feedback">
                  Ok
                </div>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">CIDADE:</span>
                <input type="text" name="cidade" id="cidade" class="form-control" aria-label="Username"
                  aria-describedby="basic-addon1" required readonly value="<?php if(isset($_SESSION['cidade'])){echo $_SESSION['cidade'];}?>">
                <div class="invalid-feedback">
                  Campo Obrigatorio!!
                </div>
                <div class="valid-feedback">
                  Ok
                </div>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">NUMERO:</span>
                <input type="number" name="numero" id="numero" class="form-control" aria-label="Username"
                  aria-describedby="basic-addon1" required value="<?php if(isset($_SESSION['numero'])){echo $_SESSION['numero'];}?>">
                <div class="invalid-feedback">
                  Campo Obrigatorio!!
                </div>
                <div class="valid-feedback">
                  Ok
                </div>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">UF:</span>
                <input type="text" name="uf" id="uf" class="form-control" aria-label="Username"
                  aria-describedby="basic-addon1" required readonly value="<?php if(isset($_SESSION['uf'])){echo $_SESSION['uf'];}?>">
                <div class="invalid-feedback">
                  Campo Obrigatorio!!
                </div>
                <div class="valid-feedback">
                  Ok
                </div>
              </div>

            </div>
          </form>


      </div>
    </div>

    <footer>
      &copy; copyrigth Sistema php
      <?php print date('Y')?>
    </footer>
    <script src="js/script.js"></script>
</body>

</html>