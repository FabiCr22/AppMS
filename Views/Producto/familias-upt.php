<?php
function getConn(){
  $mysqli = mysqli_connect('localhost', 'root', '', "db_ms");
  if (mysqli_connect_errno($mysqli))
    echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
  $mysqli->set_charset('utf8');
  return $mysqli;
}

function getFamilia(){
  $mysqli = getConn();
  $id_tipo = $_POST['id_tipo'];
  $queryF = "SELECT Id_FamiliaProd, Nombre_FamiliaProd FROM familia_producto WHERE Id_TipoProd = '$id_tipo'";
  $resultF = $mysqli->query($queryF);
  $familias = "<option value='0'>Seleccione una opción</option>";
  while($rowF = $resultF->fetch_assoc()){
    $familias .= "<option value='".$rowF['Id_FamiliaProd']."'>".$rowF['Nombre_FamiliaProd']."</option>";
  }
  return $familias;
}
echo getFamilia();
?>