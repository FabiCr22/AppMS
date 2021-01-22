<?php 
/**
* Controlador UsuarioController
* Autor: Erick Cruz
* Sitio Web: https://github.com/ecruz22
* Copyright © Macro Show 2020
*/
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
class UsuarioController
{
	// ---------- Constructor ----------
	public function __construct(){}
	// ---------- Mostrar mensaje de error en el acceso a vistas de usuario ----------
	public function error(){
		require_once('Views/User/error.php');
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
	------------ INGRESO DE USUARIO -----------
	---------------------------------------- */
	// ---------- Mostrar formulario para ingresar usuario ----------
	public function register(){
		require_once('Views/User/register.php');
	}
	// ---------- Guardar usuario en DB ----------
	public function save(){
		$usuarios=[];
		$usuarios=Usuario::all();
		$existe=False;
		foreach ($usuarios as $usuario) {
			if (strcmp($usuario->getCiRuc_User(),$_POST['CiRuc_User'])==0 or strcmp($usuario->getEmail_User(),$_POST['Email_User'])==0) {
				$existe=True;
			}
		}			

		if (!$existe) {
			$usuario= new Usuario(null, $_POST['CiRuc_User'], $_POST['Nombre_User'], $_POST['Telefono_User'], $_POST['Email_User'], $_POST['Direccion_User'], $_POST['Descripcion_User'], $_POST['Pass_User']);
			Usuario::save($usuario);
			$_SESSION['mensaje']='Usuario registrado satisfactoriamente. Acceda a la app con sus credenciales.';
			$this->showLogin();
			//header('Location: index.php');
			//require_once('Views/Layouts/layout.php');
		}else{
			$_SESSION['mensaje']='La cédula o el correo electrónico para tu usuario ya existen';
			header('Location: index.php');
		}	
	}
	/* ----------------------------------------
	--------- AUTENTICACIÓN DE USUARIO --------
	---------------------------------------- */
	// ---------- Mostrar formulario para autenticar usuario ----------
	public function showLogin(){
		require_once('Views/User/login.php');
	}
	// ---------- Validar si el usuario está registrado en el sistema ----------
	public function login(){
		$administradores=[];
		$administradores=Administrador::all();
		$existe=False;
		foreach ($administradores as $administrador) {
			if (password_verify($_POST['pwd'],$administrador->getPass_Admin()) && strcmp($administrador->getEmail_Admin(),$_POST['email'])==0) {
				$existe=True;
				$_SESSION['usuario_id']=$administrador->getId_Admin();
				$_SESSION['usuario_alias']=$administrador->getCi_Admin();
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
					$_SESSION['usuario_id']=$usuario->getId_User();
					$_SESSION['usuario_alias']=$usuario->getCiRuc_User();
					$_SESSION['usuario_nombre']=$usuario->getNombre_User();
					$_SESSION['usuario_tipo']=2;
				}
			}
			if ($existe) {
				$_SESSION['usuario']=True;//inicio de sesion de usuario
				//$_SESSION['mensaje']= 'Bienvenido a la App de la Casa Musical Macro Show';
				header('Location: index.php');
			}else{
				$_SESSION['mensaje']='Correo electrónico o contraseña invalidos';
				header('Location: index.php');
			}
		}
	}
	// ---------- Cerrar sesión de usuario ----------
	public function showLogout(){
		require_once('Views/User/logout.php');
	}
	public function logout() {
		unset($_SESSION['usuario']);
		unset($_SESSION['usuario_id']);
		unset($_SESSION['usuario_alias']);
		unset($_SESSION['usuario_nombre']);
		unset($_SESSION['usuario_tipo']);
		//session_destroy();
		$_SESSION['mensaje']='Ud cerró la sesión de su cuenta.';
		header('Location: index.php');
	}
	/* ----------------------------------------
	--------- ACTUALIZACIÓN DE USUARIO --------
	---------------------------------------- */
	// ---------- Mostrar formulario para actualizar usuario ----------
	public function showupdate(){
		$Id_User=$_GET['Id_User'];
		$usuario=Usuario::getById($Id_User);
		require_once('Views/User/update.php');
	}
	// ---------- Modificar usuario en DB ----------
	public function update(){
		$IdUser = $_POST['Id_User'];
		$usuario= new Usuario($_POST['Id_User'], $_POST['CiRuc_User'], $_POST['Nombre_User'], $_POST['Telefono_User'], $_POST['Email_User'], $_POST['Direccion_User'], $_POST['Descripcion_User'], $_POST['Pass_User']);
		Usuario::update($usuario);
		$_SESSION['mensaje']='Su información de cuenta de usuario se actualizó satisfactoriamente';
		$this->show($IdUser);
		//header('Location: index.php');
	}
	// ---------- Mostrar información de un usuario determinado ----------
	public function show($IdUser){
		$usuario=Usuario::getById($IdUser);
		require_once('Views/User/show.php');
	}
	/* ----------------------------------------
	-------- VISUALIZACIÓN DE USUARIOS --------
	---------------------------------------- */
	// ---------- Mostrar información de todos los usuarios ----------
	public function showall(){
		//$administradores=Administrador::all();
		//$lista_usuarios=$administradores;
		$usuarios=Usuario::all();
		$lista_usuarios=$usuarios;
		require_once('Views/User/showall.php');
	}
	// ---------- Buscar y obtener usuario por Id, CI/RUC, Nombre, Email, Dirección, Descripción ----------
	public function search(){
		if (!empty($_POST['Id_User'])) {
			$lista_usuarios[]=Usuario::getById($_POST['Id_User']);
			$botones=0;
			require_once('Views/Usuario/showall.php');
		}else{
			$this->show($_POST['Id_User']);
		}
	}
	// ---------- Mostrar información de un usuario determinado en PDF ----------
	public function usuarioPdf(){
		header('Location: Controllers/UsuarioPdf.php?Id_User='.$_GET['Id_User']);
	}
	// ---------- Mostrar información de los usuarios en PDF ----------
	public function usuariosPdf(){
		header('Location: Controllers/UsuariosPdf.php?');
	}
	
	// ---------- Eliminar usuario en DB ----------
	public function delete(){
		Usuario::delete($_GET['id']);
		$_SESSION['mensaje']='Usuario eliminado satisfactoriamente';
		header('Location: index.php');
	}
}