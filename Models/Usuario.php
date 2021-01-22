<?php 
/**
	* Modelo para el acceso a la base de datos y funciones CRUD de Usuario
	* Autor: Erick Cruz
	* Sitio Web: https://github.com/ecruz22
	* Copyright © Macro Show 2020
*/
class Usuario
{
	private $Id_User;
	private $CiRuc_User;
	private $Nombre_User;
	private $Telefono_User;
	private $Email_User;
	private $Direccion_User;
	private $Descripcion_User;
	private $Pass_User;

	function __construct($Id_User, $CiRuc_User, $Nombre_User, $Telefono_User, $Email_User, $Direccion_User, $Descripcion_User, $Pass_User)
	{
		$this->setId_User($Id_User);
		$this->setCiRuc_User($CiRuc_User);
		$this->setNombre_User($Nombre_User);
		$this->setTelefono_User($Telefono_User);
		$this->setEmail_User($Email_User);
		$this->setDireccion_User($Direccion_User);
		$this->setDescripcion_User($Descripcion_User);
		$this->setPass_User($Pass_User);
	}

	public function getId_User(){
		return $this->Id_User;
	}

	public function setId_User($Id_User){
		$this->Id_User = $Id_User;
	}

	public function getCiRuc_User(){
		return $this->CiRuc_User;
	}

	public function setCiRuc_User($CiRuc_User){
		$this->CiRuc_User = $CiRuc_User;
	}

	public function getNombre_User(){
		return $this->Nombre_User;
	}

	public function setNombre_User($Nombre_User){
		$this->Nombre_User = $Nombre_User;
	}

	public function getTelefono_User(){
		return $this->Telefono_User;
	}

	public function setTelefono_User($Telefono_User){
		$this->Telefono_User = $Telefono_User;
	}

	public function getEmail_User(){
		return $this->Email_User;
	}

	public function setEmail_User($Email_User){
		$this->Email_User = $Email_User;
	}

	public function getDireccion_User(){
		return $this->Direccion_User;
	}

	public function setDireccion_User($Direccion_User){
		$this->Direccion_User = $Direccion_User;
	}

	public function getDescripcion_User(){
		return $this->Descripcion_User;
	}

	public function setDescripcion_User($Descripcion_User){
		$this->Descripcion_User = $Descripcion_User;
	}

	public function getPass_User(){
		return $this->Pass_User;
	}

	public function setPass_User($Pass_User){
		$this->Pass_User = $Pass_User;
	}

	//opciones CRUD
	//función para obtener todos los usuarios
	public static function all(){
		$listaUsuarios =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM usuario');
		foreach ($sql->fetchAll() as $usuario) {
			$listaUsuarios[]= new Usuario($usuario['Id_User'], $usuario['CiRuc_User'], $usuario['Nombre_User'], $usuario['Telefono_User'], $usuario['Email_User'], $usuario['Direccion_User'], $usuario['Descripcion_User'], $usuario['Pass_User']);
		}
		return $listaUsuarios;
	}

	//función para registrar un usuario
	public static function save($usuario){
		$db=Db::getConnect();
		$insert=$db->prepare('INSERT INTO usuario VALUES(NULL, :CiRuc_User, :Nombre_User, :Telefono_User, :Email_User, :Direccion_User, :Descripcion_User, :Pass_User)');
		$insert->bindValue('CiRuc_User',$usuario->getCiRuc_User());
		$insert->bindValue('Nombre_User',$usuario->getNombre_User());
		$insert->bindValue('Telefono_User',$usuario->getTelefono_User());
		$insert->bindValue('Email_User',$usuario->getEmail_User());
		$insert->bindValue('Direccion_User',$usuario->getDireccion_User());
		$insert->bindValue('Descripcion_User',$usuario->getDescripcion_User());
		//encripta la clave
		$pass=password_hash($usuario->getPass_User(),PASSWORD_DEFAULT);
		$insert->bindValue('Pass_User',$pass);
		$insert->execute();
	}

	//función para actualizar 
	public static function update($usuario){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE usuario SET Nombre_User=:Nombre_User, Telefono_User=:Telefono_User, Direccion_User=:Direccion_User, Descripcion_User=:Descripcion_User, Pass_User=:Pass_User WHERE Id_User=:Id_User');
		$update->bindValue('Id_User',$usuario->getId_User());
		$update->bindValue('Nombre_User',$usuario->getNombre_User());
		$update->bindValue('Telefono_User',$usuario->getTelefono_User());
		$update->bindValue('Direccion_User',$usuario->getDireccion_User());
		$update->bindValue('Descripcion_User',$usuario->getDescripcion_User());
		//encripta la clave
		$pass=password_hash($usuario->getPass_User(),PASSWORD_DEFAULT);
		$update->bindValue('Pass_User',$pass);
		$update->execute();
	}

	//función para eliminar por el Id_User
	public static function delete($Id_User){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE FROM usuario WHERE Id_User=:Id_User');
		$delete->bindValue('Id_User',$Id_User);
		$delete->execute();
	}

	//función para obtener un usuario por el Id_User
	public static function getById($Id_User){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM usuario WHERE Id_User=:Id_User');
		$select->bindValue('Id_User',$Id_User);
		$select->execute();
		$usuarioDb=$select->fetch();
		$usuario= new Usuario($usuarioDb['Id_User'], $usuarioDb['CiRuc_User'], $usuarioDb['Nombre_User'], $usuarioDb['Telefono_User'], $usuarioDb['Email_User'], $usuarioDb['Direccion_User'], $usuarioDb['Descripcion_User'], $usuarioDb['Pass_User']);
		return $usuario;
	}

	//función para obtener un usuario por la ci
	public static function getByCedula($CiRuc_User){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM usuario WHERE CiRuc_User=:CiRuc_User');
		$select->bindValue('CiRuc_User',$CiRuc_User);
		$select->execute();
		$usuarioDb=$select->fetch();
		$usuario= new Usuario($usuarioDb['Id_User'], $usuarioDb['CiRuc_User'], $usuarioDb['Nombre_User'], $usuarioDb['Telefono_User'], $usuarioDb['Email_User'], $usuarioDb['Direccion_User'], $usuarioDb['Descripcion_User'], $usuarioDb['Pass_User']);
		return $usuario;
	}

	//función para obtener un usuario por el nombre
	public static function getByNombre($Nombre_User){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM usuario WHERE Nombre_User=:Nombre_User');
		$select->bindValue('Nombre_User',$Nombre_User);
		$select->execute();
		$usuarioDb=$select->fetch();
		$usuario= new Usuario($usuarioDb['Id_User'], $usuarioDb['CiRuc_User'], $usuarioDb['Nombre_User'], $usuarioDb['Telefono_User'], $usuarioDb['Email_User'], $usuarioDb['Direccion_User'], $usuarioDb['Descripcion_User'], $usuarioDb['Pass_User']);
		return $usuario;
	}

	//función para obtener un usuario por el telefono
	public static function getByTelefono($Telefono_User){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM usuario WHERE Telefono_User=:Telefono_User');
		$select->bindValue('Telefono_User',$Telefono_User);
		$select->execute();
		$usuarioDb=$select->fetch();
		$usuario= new Usuario($usuarioDb['Id_User'], $usuarioDb['CiRuc_User'], $usuarioDb['Nombre_User'], $usuarioDb['Telefono_User'], $usuarioDb['Email_User'], $usuarioDb['Direccion_User'], $usuarioDb['Descripcion_User'], $usuarioDb['Pass_User']);
		return $usuario;
	}

	//función para obtener un usuario por el email
	public static function getByEmail($Email_User){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM usuario WHERE Email_User=:Email_User');
		$select->bindValue('Email_User',$Email_User);
		$select->execute();
		$usuarioDb=$select->fetch();
		$usuario= new Usuario($usuarioDb['Id_User'], $usuarioDb['CiRuc_User'], $usuarioDb['Nombre_User'], $usuarioDb['Telefono_User'], $usuarioDb['Email_User'], $usuarioDb['Direccion_User'], $usuarioDb['Descripcion_User'], $usuarioDb['Pass_User']);
		return $usuario;
	}
}