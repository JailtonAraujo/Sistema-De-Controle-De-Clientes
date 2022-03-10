<header class="header1">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">

            <h3>
                Olá,
                <?php echo $_SESSION['usuario'];?>
            </h3>
            <form class="d-flex">
                <a href="pageListagem.php" id="ancor-modific"><button class="btn btn-outline-success" type="button"
                        style="width:200px; margin-right: 10px; font-weight: bold;" id="btn-modific">LISTAR
                        CLIENTES</button></a>
                <a href="processing.php?acao=logout"><button class="btn btn-outline-dark" type="button"
                        style="width:200px;font-weight: bold;">SAIR</button></a>
            </form>
        </div>
    </nav>
</header>