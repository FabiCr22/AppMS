<?php
$servidor="localhost";
$nombreBd="db_ms";
$usuario="root";
$pass="";
$conexion = new mysqli($servidor,$usuario,$pass,$nombreBd);
if($conexion -> connect_error ){
    die("No se pudo conectar");    
}

$fila = $conexion->query('SELECT Imagen_Prod FROM producto WHERE Id_Prod='.$_POST['id']);
$id = mysqli_fetch_row($fila);
if(file_exists($id[0])){
    unlink($id[0]);
}else{
  echo 'Imagen no encontrada';
}
$conexion->query("DELETE FROM producto WHERE Id_Prod=".$_POST['id']);
//echo 'listo';
$_SESSION['mensaje']='Producto eliminado satisfactoriamente';
//$this->showsearchdelete();
header('Location.href=?controller=producto&action=showsearchdelete');
?>