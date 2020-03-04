<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directorio</title>
</head>
<body>
<?php
if (isset($_POST["id"])){
    //recuperamos todo el registro
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $empresa = $_POST["empresa"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $comentarios = $_POST["comentarios"];

    //hacemos un query de update para actulizar el registro
    include "conexion.php";

    $sql = "update juanf_directorio set nombre='$nombre', apellido='$apellido', empresa='$empresa', email='$email', telefono='$telefono', comentarios='$comentarios' where idDirectorio = ".$id;

    $nada = ejecutar($sql);

    //redireccionamos a la página index mostrando el tarjetón abierto con el registro editado
    echo "<script language='javascript'>";
    //echo "window.location.assign('index.php?id=$id');";
    echo "window.location.assign('index.php?id=".$id."&accion=editar');";
    echo "</script>";



}else{
?>

     //no se ha enviado nada, redireccionamos a index
    <script language='javascript'>
    window.location.assign('index.php');
    </script>


<?php
}

?>
    
</body>
</html>