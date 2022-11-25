<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    // Si el usuario está logado, entonces lo redirigimos a la página de menu.php
    // Si el usuario no está logado, entonces comprueba si el usuario y la contraseña son correctos
    if(!empty($_SESSION['nombreUsuario'])) {
        echo '<script>window.location="menu.php";</script>';
    }else{
        $usuario    = $_POST['nombreEmpleado'];
        $password   = $_POST['passwordEmpleado'];
        $procesar   = $_POST['procesar'];
        if ($procesar === "procesar") {
            comprobarUsuario($usuario, $password);
        }else{
            echo '<script>alert("ERROR!!!!! Acceso no autorizado.");</script>';
            echo '<script>window.location="index.php";</script>';
        }
    }


    // FUNCION PARA COMPROBAR SI EL USUARIO EXISTE
    function comprobarUsuario($usuario, $password){
        try {
            //Como esto se implementa en un contenedor docker, el host no es localhost, sino el nombre del servicio: mysql
            //$servername = "localhost:3360";
            $database = "tienda-bicicleta";
            $username = "sonia";
            $pass = "sonia";
            $conn =  new PDO("mysql:host=mysql;dbname=$database", $username, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->query("SET NAMES 'UTF8' ");
            $stmt = $conn->prepare("SELECT * FROM usuario WHERE nombre = ? AND password = ?");
            $stmt->bindParam(1, $usuario);
            $stmt->bindParam(2, $password);
            $stmt->execute();

            //Verificamos que el insert haya realizado
            if ($stmt->rowCount() > 0){
                //El usuario existe en la BD y se redirige a al Panel de Control de Administrador
                //Creamos la variable de sesión
                $_SESSION['nombreUsuario'] = $usuario;
                header("Location: menu.php");
            }else{
                echo '<script>alert("ERROR!!!!! Usuario no valido.");</script>';
                echo '<script>window.location="index.php";</script>';            }

        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        //cerrar una conexión:
        $conn = null;
    }







