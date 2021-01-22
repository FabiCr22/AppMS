<?php 
/**
	* Controlador AdministradorController
	* Autor: Erick Cruz
	* Sitio Web: https://github.com/ecruz22
	* Copyright © Macro Show 2020
*/
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
class AdministradorController
{
	// ---------- Constructor ----------
	public function __construct(){}
	// ---------- Mostrar mensaje de error en el acceso a vistas de administrador ----------
	public function error(){
		require_once('Views/Administrador/error.php');
	}
	// ---------- Definir algún error ----------
    public function setError($newError){
        $this->error = $newError;
        return $this;
    }
    // ---------- Mostrar página inicial cuando tiene iniciada sesión ----------
	public function welcome(){
		require_once('Views/bienvenido.php');
	}
	/* ----------------------------------------
	--------- INGRESO DE ADMINISTRADOR --------
	---------------------------------------- */
	// ---------- Mostrar formulario para ingresar administrador ----------
	public function register(){
		require_once('Views/Administrador/register.php');
	}
	// ---------- Guardar administrador en DB ----------
	public function save(){
		$administradores=[];
		$administradores=Administrador::all();
		$existe=False;
		foreach ($administradores as $administrador) {
			if (strcmp($administrador->getCI_Admin(),$_POST['CI_Admin'])==0 or strcmp($administrador->getEmail_Admin(),$_POST['Email_Admin'])==0) {
				$existe=True;
			}
		}			

		if (!$existe) {
			$administrador= new Administrador(null, $_POST['CI_Admin'], $_POST['Nombre_Admin'], $_POST['Email_Admin'], $_POST['Pass_Admin']);
			Administrador::save($administrador);
			$_SESSION['mensaje']='Administrador registrado satisfactoriamente. Acceda a la app con sus credenciales.';
			$this->showLogin();
			//header('Location: index.php');
			//require_once('Views/Layouts/layout.php');*/
		}else{
			$_SESSION['mensaje']='La cédula o el correo electrónico para tu usuario ya existen';
			header('Location: index.php');
		}
	}
	/* ----------------------------------------
	------ AUTENTICACIÓN DE ADMINISTRADOR -----
	---------------------------------------- */
	// ---------- Mostrar formulario para autenticar administrador ----------
	public function showLogin(){
		require_once('Views/Administrador/login.php');
	}
	// ---------- Validar si el administrador está registrado en el sistema ----------
	public function login(){
		$administradores=[];
		$administradores=Administrador::all();
		$existe=False;
		foreach ($administradores as $administrador) {
			if (password_verify($_POST['pwd'],$administrador->getPass_Admin()) && strcmp($administrador->getEmail_Admin(),$_POST['email'])==0) {
				$existe=True;
				$_SESSION['usuario_id']=$administrador->getId();
				$_SESSION['usuario_alias']=$administrador->getCI_Admin();
				$_SESSION['usuario_nombre']=$administrador->getNombre_Admin();
				$_SESSION['usuario_tipo']=1;
			}
		}
		if($existe){
			$_SESSION['usuario']=True;//inicio de sesion de administrador
			//require_once('Views/Layouts/layout.php');
			header('Location: index.php');
		}else{
			$usuarios=[];
			$usuarios=Usuario::all();
			$existe=False;
			foreach ($usuarios as $usuario) {
				if (password_verify($_POST['pwd'],$usuario->getPass_User()) && strcmp($usuario->getEmail_User(),$_POST['email'])==0) {
					$existe=True;
					$_SESSION['usuario_id']=$usuario->getId();
					$_SESSION['usuario_alias']=$usuario->getCiRuc_User();
					$_SESSION['usuario_nombre']=$usuario->getNombre_User();
					$_SESSION['usuario_tipo']=2;
				}
			}
			if ($existe) {
				$_SESSION['usuario']=True;//inicio de sesion de usuario
				//require_once('Views/Layouts/layout.php');
				header('Location: index.php');
			}else{
				$_SESSION['mensaje']='Correo electrónico o contraseña invalidos';
				header('Location: index.php');
			}
		}
	}
	// ---------- Cerrar sesión de usuario ----------
	public function logout() {
		unset($_SESSION['usuario']);
		unset($_SESSION['usuario_id']);
		unset($_SESSION['usuario_alias']);
		unset($_SESSION['usuario_nombre']);
		unset($_SESSION['usuario_tipo']);
		//session_destroy();
		header('Location: index.php');
	}
	/* ----------------------------------------
	------ ACTUALIZACIÓN DE ADMINISTRADOR -----
	---------------------------------------- */
	// ---------- Mostrar formulario para actualizar administrador ----------
	public function showupdate(){
		$Id_Admin=$_GET['Id_Admin'];
		$administrador=Administrador::getById($Id_Admin);
		require_once('Views/Administrador/update.php');
	}
	// ---------- Modificar administrador en DB ----------
	public function update(){
		$IdAdmin = $_POST['Id_Admin'];
		$administrador= new Administrador($_POST['Id_Admin'], $_POST['CI_Admin'], $_POST['Nombre_Admin'], $_POST['Email_Admin'], $_POST['Pass_Admin']);
		Administrador::update($administrador);
		$_SESSION['mensaje']='Su información de cuenta de usuario se actualizó satisfactoriamente';
		$this->show($IdAdmin);
		//header('Location: index.php');
	}
	// ---------- Mostrar información de un administrador determinado ----------
	public function show($IdAdmin){
		$administrador=Administrador::getById($IdAdmin);
		require_once('Views/Administrador/show.php');
	}
	/* ----------------------------------------
	----- VISUALIZACIÓN DE ADMINISTRADORES ----
	---------------------------------------- */
	// ---------- Mostrar información de todos los administradores ----------
	public function showall(){
		$administrador=Administrador::all();
		require_once('Views/Administrador/show.php');
	}
	// ---------- Buscar y obtener administrador por Id, CI, Nombre, Email ----------
	public function search(){
		if (!empty($_POST['Id_Admin'])) {
			$lista_administradores[]=Administrador::getById($_POST['Id_Admin']);
			$botones=0;
			require_once('Views/Administrador/showall.php');
		}else{
			$this->show();
		}
	}
	// ---------- Mostrar información de un administrador determinado en PDF ----------
	public function administradorPdf(){
		header('Location: Controllers/AdministradorPdf.php?administrador='.$_GET['administrador']);
	}
	// ---------- Mostrar información de los administradores en PDF ----------
	public function administradoresPdf(){
		header('Location: Controllers/AdministradoresPdf.php?administrador='.$_GET['administrador']);
	}
	
	// ---------- Eliminar administrador en DB ----------
	public function delete(){
		Administrador::delete($_GET['id']);
		$_SESSION['mensaje']='Administrador eliminado satisfactoriamente';
		header('Location: index.php');
	}
}