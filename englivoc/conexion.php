<?php 
$conexion = pg_connect("host=localhost   dbname=proyecto_vocabulario  user=postgres   password=manoloxd123");

if($conexion){
}else{
    echo "no se ha conectado";
}

$query= "Select * from palabras";

$consulta= pg_query($conexion,$query);

if($conexion){

    if(pg_num_rows($consulta)>0){

    }
}