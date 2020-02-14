<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Directorio</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script src="https://kit.fontawesome.com/5637dd924f.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="header">
<h1>Directorio</h1>
<button type="button">Nuevo Contacto</button>
</div>

<?php 
include "conexion.php";
?>

<section class="botonera">
    <?php

        for ($i=65; $i<=90; $i++){
            echo "<button type='button' onClick=mostrarResultados('".chr($i)."')>".chr($i)."</button>";
        }
    ?>
</section>

<section class="busquedas">
    <form method="post" action="index.php">
        <input type="text" class="campo" name="busqueda"/>
        <button type="submit" class="boton"><i class="fas fa-search"></i></button>
    </form>
</section>

<?php
    //checamos si se ha enviado un querystring a la página o el formulario con una búsqueda
    if (isset($_REQUEST["letra"])){
        $letraParaBuscar = $_REQUEST["letra"];

        //buscamos los apellidos que inician con la letra seleccionada
        $sql = "select idDirectorio, nombre, apellido from juanf_directorio where apellido like '".$letraParaBuscar."%' order by apellido";
        $rs = ejecutar($sql);

    }else if (isset($_POST["busqueda"])){
        $registroParaBuscar = $_POST["busqueda"];

        $sql = "select idDirectorio, nombre, apellido from juanf_directorio where apellido like '".$registroParaBuscar."%' order by apellido";
        $rs = ejecutar($sql);
    }
?>

<section class="listaResultados">
    <div class = "contenedor" id="contenedor">
        <?php
        if (isset($_REQUEST["letra"]) || isset($_POST["busqueda"])){
            echo '<div id="r1">Registros encontrados: </div>';
            echo '<ul class="listaNombres">';

            //checamos si la búsqueda realizada encontró registros en la BD
             if (mysqli_num_rows($rs) != 0){
                $k = 0;
                while ($datos = mysqli_fetch_array($rs)){
                    if ($k % 2 == 0){
                        echo "<li class='oscuro'>";
                    }else{
                        echo "<li class='claro'>";
                    }
                    echo "<a href='javascript:mostrarRegistro(".$datos['idDirectorio'].")'>".$datos["apellido"]."</a>, ".$datos["nombre"]."</li>";
                    $k++;
                }
            }else{
                echo 'No se encontraron registros con la búsqueda realizada';
            }

            echo "</ul>";

        } else {
            echo '<div id="r1">Seleccione una letra o realize una búsqueda para desplegar los registros del directorio</div>';
        }
        ?>  
        
    </div>

    <div class="contenedorRegistro" id="registro"> 
        <button type="button"><i class="fas fa-caret-square-left"></i></button>
        <div class="registro"></div>
        <button type="button"><i class="fas fa-caret-square-right"></i></button>
    </div>

</section>

<div class="modal">
    <div class="modal-bg">
        <div class="modal-container"> </div>
    </div>
</div>


<script src="./scripts.js"></script>  
</body>
</html>