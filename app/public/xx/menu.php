<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Práctica 1.1 - Login</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="styles-breakPoints.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
</head>

    <!-- PRIMERA FILA: HEADER    -->
    <div class="container-fluid">
        <div class="row">
            <header class="col-12 border border-warning bg-black mt-2 text-white text-center">
                <h1>Práctica 1.1 - Login</h1>

                <!-- NAV -->
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary mt-3">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">PPS</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li class="nav-item">
                                    <a class="nav-link" href="salir.php">Desconectar</a>
                                </li>
                            </ul>

                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </header>
        </div>

        <!-- FILA:  IDENTIFICACION -  -->
        <div class="container-fluid bg-warning text-end row" >
            <div class="col-12">
                Usuario:
                <?php
                //VERIFICAMOS QUE EL USUARIO HUBIERA REALIZADO EL PROCESO DE IDENTIFICACIÓN.
                //SI SE HA IDENTIFICADO, PONE SU NOMBRE DE USUARIO EN LA BARRA DE NAV
                //SI NO SE HA IDENTIFICADO, MUESTRA UN MENSAJE DE ERROR Y REDIRIGE A LA PÁGINA DE INICIO
                if(!empty($_SESSION['nombreUsuario'])) {
                    $nombre = $_SESSION['nombreUsuario'];
                    echo $nombre;
                } else {
                    echo '<script>alert("ERROR!!!!! DEBE iniciar la sesión");</script>';
                    echo "<script> window.location='index.php';</script>";
                }
                ?>
            </div>
        </div>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Logged in</h1>
            </div>
        </div>
    </div>
</body>
</html>