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


<body>

    <?php
        if(empty($_SESSION['nombreUsuario'])) {
            echo '<script>alert("ERROR!!!!! DEBE iniciar la sesión");</script>';
            echo "<script> window.location='index.php';</script>";
        }

        // BORRRAMOS LAS VARIABLES DE SESIÓN PARA QUE NO PUEDAN ACCEDER A LA PÁGINAS QUE ESTÁN PROTEGIDAS POR LA SESIÓN DE USUARIO
        session_destroy();
        // BORRRAMOS LAS VARIABLES QUE TENGA $_POST
        unset($_POST);
        echo '<script>alert("Sesión cerrada correctamente.");</script>';
        echo "<script> window.location='index.php';</script>";
    ?>

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


        <!-- SEGUNDA FILA: FORMULARIO DE ACCESO    -->
        <div class="container-fluid row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 bg-secondary text-white">
                <h5>ADIOSssssssssss</h5>
            </div>
        </div>
    </div>

</body>
</html>
