<?php
function getConn(){
  $mysqli = mysqli_connect('localhost', 'root', '', "db_ms");
  if (mysqli_connect_errno($mysqli))
    echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
  $mysqli->set_charset('utf8');
  return $mysqli;
}

function getUser(){
  $mysqli = getConn();
  $Id_User = $_GET['Id_User'];
  header('Location.href=?controller=usuario&action=usuarioPdf&usuario='.$Id_User);
  //$query = "SELECT Id_User FROM usuario WHERE Id_User= '$Id_User'";
  //$result = $mysqli->query($query);
  //$usuario=$result->fetch();

  //$usuario = "<option value='0'>Seleccione una opción</option>";
  //while($row = $result->fetch_assoc()){
    //$usuario .= "<option value='".$row['Id_FamiliaProd']."'>".$row['Nombre_FamiliaProd']."</option>";
  //}

  //return $result;
}
echo getUser();

?>