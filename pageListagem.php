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
  <title>Pagina de Listagem</title>
</head>

<body>

  <div class="container">
    
  <?php  include 'header.php';?>

    <div class="main">
      <H2>LISTAGE DE CLIENTES</H2>
      <div class="container-table">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="NOME" aria-label="Recipient's username"
            aria-describedby="button-addon2" id="txt-busca">
          <button class="btn btn-primary" type="button" id="btn-busca">BUSCAR</button>
        </div>
        <div class="tblresults" style="height: 70%; overflow:scroll;">
          <table class="table table-striped" id="tblResults">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">CPF</th>
                <th scope="col">LOGRADOURO</th>
                <th scope="col">CIDADE:</th>
                <th scope="col">AÇÕES:</th>
              </tr>
            </thead>
            <tbody id="tbody">
            </tbody>
          </table>
        </div>
        <p id="cont"></p>

        <div class="paginacao">
          <nav aria-label="Page navigation example">
            <ul class="pagination pagination-sm" id="ulPaginado">
             
            </ul>
          </nav>

        </div>
        
      </div>
    </div>
  </div>

  <footer>
    &copy; copyrigth Sistema php
    <?php print date('Y')?>
  </footer>

  <script src="js/scriptPageListagem.js"></script>
</body>

</html>