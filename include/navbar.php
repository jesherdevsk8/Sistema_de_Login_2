<div class="row">
    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="area-administrativa.php">Projeto</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastrar <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="cadastrarUsuario.php">Usuário</a></li>
                            <li><a href="cadastrarCliente.php">Cliente</a></li>    
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Visualizar <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="visualizarUsuario.php">Usuário</a></li>
                            <li><a href="visualizarCliente.php">Clientes</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['email'] ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Perfil</a></li>
                            <li><a href="#">Trocar senha</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="include/sair.php">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>