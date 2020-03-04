<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directorio</title>
</head>
<body>
    <?php
    if (isset($_REQUEST["id"])){
        $id = $_REQUEST["id"];

        include "conexion.php";
        $sql = "delete from juanf_directorio where idDirectorio =".$id;
        $nada = ejecutar($sql);

        echo "<script language='javascript'>";
        echo "window.location.assign('index.php?borrar=yes');";
        echo "</script>";


    }else{
        echo "<script language='javascript'>";
        echo "window.location.assign('index.php');";
        echo "</script>";
    }
    ?>
    
</body>
</html>