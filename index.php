<?php
/**
	* index AppMS
	* Autor: Erick Cruz
	* Sitio Web: https://github.com/ecruz22
	* Copyright © Macro Show 2020
*/
	if(!isset($_SESSION))
    { 
        session_start(); 
    }
    require_once('connection.php');
	//controller guarda el controlador y action guarda la acción (metodo)
	//si controller y action son pasadas por la url desde layout.php entran en el if
	if (isset($_GET['controller'])&&isset($_GET['action'])) {
		$controller=$_GET['controller'];
		$action=$_GET['action'];
	} else {
		$controller='empresa';
		//$action='showInicio';
		if (isset($_SESSION['usuario'])) {
			$action='welcome';
			if ($_SESSION['usuario_tipo']==1) {
				$controller='administrador';
			}elseif ($_SESSION['usuario_tipo']==2) {
				$controller='usuario';
			}
		}else{
			$action='showInicio';
		}
	}
	require_once('Views/Layouts/layout.php');	//carga la vista layout.php
?>