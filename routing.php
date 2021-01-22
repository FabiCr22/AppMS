<?php
/**
	* Enrutador de direcciones: Controladores y Acciones
	* Autor: Erick Cruz
	* Sitio Web: https://github.com/ecruz22
	* Copyright © Macro Show 2020
*/
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	//función para llamar al controlador y su acción, pasados como parámetros
	function call($controller, $action){
		//importar el controlador desde la carpeta Controllers
		require_once('Controllers/' . $controller . 'Controller.php');
		//crear el controlador
		switch($controller){
			case 'usuario':
				require_once('Models/Usuario.php');
				require_once('Models/Administrador.php');
				require_once('Controllers/PlantillaUsuarioPdf.php');
				$controller= new UsuarioController();
				break;
			case 'producto':
				require_once('Models/Tipo_Producto.php');
				require_once('Models/Familia_Producto.php');
				require_once('Models/Producto.php');
				require_once('Models/Paginacion.php');
				$controller= new ProductoController();
				break;
			case 'seminario':
				require_once('Models/Seminario.php');
				require_once('Models/Paginacion.php');
				$controller= new SeminarioController();
				break;
			case 'reserva':
				require_once('Models/Seminario.php');
				require_once('Models/Reserva.php');
				$controller= new ReservaController();
				break;
			case 'administrador':
				require_once('Models/Administrador.php');
				$controller= new AdministradorController();
				break;
			case 'empresa':
				require_once('Models/Producto.php');
				require_once('Models/Tipo_Producto.php');
				require_once('Models/Familia_Producto.php');
				require_once('Models/Seminario.php');
				$controller= new EmpresaController();
				break;
		}
		//llamar a la acción del controlador
		$controller->{$action }();
	}

	//array con los controladores y sus respectivas acciones
	$controllers= array(
		'usuario'=>['error', 'setError', 'welcome', 'register', 'save', 'showLogin', 'login', 'showLogout', 'logout', 'showupdate', 'update', 'show', 'showall', 'search', 'usuarioPdf', 'usuariosPdf', 'delete'],
		'producto'=>['error', 'register', 'save', 'show', 'showsearchupdate', 'searchupdate', 'showupdate', 'update', 'showsearchdelete', 'searchdelete', 'delete', 'showall', 'search', 'productoPdf', 'productosPdf', 'showInstrumento', 'showAccesorio', 'showAmplificacion', 'showDj', 'showEstudio', 'showIluminacion'],
		'seminario'=>['error', 'register', 'save', 'show', 'showsearchupdate', 'searchupdate', 'showupdate', 'update', 'showsearchdelete', 'searchdelete', 'delete', 'showall', 'search', 'seminarioPdf', 'seminariosPdf'],
		'reserva'=>['error', 'showsearchregister', 'searchregister', 'save', 'show', 'showsearchdelete', 'searchdelete', 'delete', 'showsearchUser', 'searchUser', 'reservaUserPdf', 'reservasUserPdf', 'showsearchSem', 'searchSem', 'userSemPdf'],
		'administrador'=>['error', 'setError', 'welcome', 'register', 'save', 'showLogin', 'login', 'logout', 'showupdate', 'update', 'show', 'showall', 'search', 'administradorPdf', 'administradoresPdf', 'delete'],
		'empresa'=>['showInicio','showAntecedentes','showMisionVision', 'showContactos', 'showAyuda', 'showPolitica','showTerminos']
	);

	//verificar que el controlador enviado desde index.php esté dentro del arreglo controllers
	if (array_key_exists($controller, $controllers)) {
		//verificar que el arreglo controllers con la clave (controller) del index exista la acción
		if (in_array($action, $controllers[$controller])) {
			//llamar la función call y pasarle el controlador y la acción (método) que está dentro del controlador
			if (isset($_SESSION['usuario'])){//ingresa sólo cuando el usuario tiene sesión abierta
				call($controller, $action);}
			elseif(($controller=='usuario'||$controller=='administrador'||$controller=='empresa'||$controller=='producto'||$controller=='seminario')&&($action=='showLogin'||$action=='login'||$action=='register'||$action=='save'||$action=='showInicio'||$action=='showAntecedentes'||$action=='showMisionVision'||$action=='showContactos'||$action=='showAyuda'||$action=='showPolitica'||$action=='showTerminos'||$action=='show'||$action=='showall'||$action=='productoPdf'||$action=='seminarioPdf'||$action=='reservaPdf')){// ingresa a páginas que no necesita sesión de usuario
				call($controller, $action);
			}else{//página que indica que no hay permisos
				call($controller, 'error');
			}
		}else{
			call('usuario', 'error');
		}
	}else{// le pasa el nombre del controlador y la pagina de error
		call('usuario', 'error');
	}
?>