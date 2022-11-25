<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://educacionadistancia.juntadeandalucia.es/centros/granada/pluginfile.php/995308/mod_assign/introattachment/0/table.css">
</head>

<body>

    <?php
    if (isset($_GET["articulo"])) {
        $conexion = mysqli_connect("localhost", "root", "", "demos")
        or die ("No se puede conectar con el servidor");

        $queEmp = "SELECT * FROM demos.articulos where Nombre ='" . $_GET["articulo"] . "'";

        $resEmp = mysqli_query($conexion, $queEmp) or die(mysqli_error());
        $totEmp = mysqli_num_rows($resEmp);

        if ($totEmp > 0) {
            echo '<div  class="table">';
            echo '<table>';
            echo "<tr><th>Artículo</th><th>Precio</th></tr>";
            while ($rowEmp = mysqli_fetch_assoc($resEmp)) {
                echo "<tr><td> " . $rowEmp['Nombre'] . "</td><td> " . $rowEmp['Precio'] . "</td></tr>";
            }
            echo '</table>';
            echo '</div>';
        } else {
            echo "Artículo no encontrado. :(";
        }


    }

    ?>


</body>

</html>
