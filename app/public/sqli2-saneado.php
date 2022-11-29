<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://educacionadistancia.juntadeandalucia.es/centros/granada/pluginfile.php/995308/mod_assign/introattachment/0/table.css">
</head>

<body>

    <?php
    if (isset($_GET["articulo"])) {
        try {
            //Como esto se implementa en un contenedor docker, el host no es localhost, sino el nombre del servicio: mysql
            //$servername = "localhost:3360";
            $database = "demos";
            $username = "root";
            $pass = "secret";
            $conn =  new PDO("mysql:host=mysql;dbname=$database", $username, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->query("SET NAMES 'UTF8' ");
            $stmt = $conn->prepare("SELECT * FROM demos.articulos where Nombre = ?");
            $stmt->bindParam(1, $_GET["articulo"]);
            $stmt->execute();
            //Verificamos que la consulta tenga resultado
            if ($stmt->rowCount() > 0){
                echo '<div  class="table">';
                echo '<table>';
                echo "<tr><th>Artículo</th><th>Precio</th></tr>";
                while ($row = $stmt->fetch()) {
                    echo "<tr><td> " . $row['Nombre'] . "</td><td> " . $row['Precio'] . "</td></tr>";
                }
                echo '</table>';
                echo '</div>';
            }else{
                echo '<script>alert("ERROR!!!!!");</script>';
                echo "Artículo no encontrado. :(";
           }
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        //cerrar una conexión:
        $conn = null;
    }

    ?>


</body>

</html>
