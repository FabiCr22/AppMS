<?php 
/**
	* Modelo para el acceso a la base de datos y funciones CRUD de Administrador
	* Autor: Erick Cruz
	* Sitio Web: https://github.com/ecruz22
	* Copyright © Macro Show 2020
*/
class Administrador
{
	private $Id_Admin;
	private $Ci_Admin;
	private $Nombre_Admin;
	private $Email_Admin;
	private $Pass_Admin;

	function __construct($Id_Admin, $Ci_Admin, $Nombre_Admin, $Email_Admin, $Pass_Admin)
	{
		$this->setId_Admin($Id_Admin);
		$this->setCi_Admin($Ci_Admin);
		$this->setNombre_Admin($Nombre_Admin);
		$this->setEmail_Admin($Email_Admin);
		$this->setPass_Admin($Pass_Admin);
	}

	public function getId_Admin(){
		return $this->Id_Admin;
	}

	public function setId_Admin($Id_Admin){
		$this->Id_Admin = $Id_Admin;
	}

	public function getCi_Admin(){
		return $this->Ci_Admin;
	}

	public function setCi_Admin($Ci_Admin){
		$this->Ci_Admin = $Ci_Admin;
	}

	public function getNombre_Admin(){
		return $this->Nombre_Admin;
	}

	public function setNombre_Admin($Nombre_Admin){
		$this->Nombre_Admin = $Nombre_Admin;
	}

	public function getEmail_Admin(){
		return $this->Email_Admin;
	}

	public function setEmail_Admin($Email_Admin){
		$this->Email_Admin = $Email_Admin;
	}

	public function getPass_Admin(){
		return $this->Pass_Admin;
	}

	public function setPass_Admin($Pass_Admin){
		$this->Pass_Admin = $Pass_Admin;
	}

	//opciones CRUD
	//función para obtener todos los administradores
	public static function all(){
		$listaAdministradores =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM administrador');

		//carga en la $listaAdministradores cada registro desde la base de datos
		foreach ($sql->fetchAll() as $administrador) {
			$listaAdministradores[]= new Administrador($administrador['Id_Admin'], $administrador['Ci_Admin'], $administrador['Nombre_Admin'], $administrador['Email_Admin'], $administrador['Pass_Admin']);
		}
		return $listaAdministradores;
	}

	//función para registrar un administrador
	public static function save($administrador){
		$db=Db::getConnect();
		$insert=$db->prepare('INSERT INTO administrador VALUES(NULL, :Ci_Admin, :Nombre_Admin, :Email_Admin, :Pass_Admin)');
		$insert->bindValue('Ci_Admin',$administrador->getCi_Admin());
		$insert->bindValue('Nombre_Admin',$administrador->getNombre_Admin());
		$insert->bindValue('Email_Admin',$administrador->getEmail_Admin());
		//encripta la clave
		$pass=password_hash($administrador->getPass_Admin(),PASSWORD_DEFAULT);
		$insert->bindValue('Pass_Admin',$pass);
		$insert->execute();
	}

	//función para actualizar
	public static function update($administrador){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE administrador SET Nombre_Admin=:Nombre_Admin, Pass_Admin=:Pass_Admin WHERE Id_Admin=:Id_Admin');
		$update->bindValue('Id_Admin',$administrador->getId_Admin());
		$update->bindValue('Nombre_Admin',$administrador->getNombre_Admin());
		//encripta la clave
		$pass=password_hash($administrador->getPass_Admin(),PASSWORD_DEFAULT);
		$update->bindValue('Pass_Admin',$pass);
		$update->execute();
	}

	//función para eliminar por el Id_Admin
	public static function delete($Id_Admin){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE FROM administrador WHERE Id_Admin=:Id_Admin');
		$delete->bindValue('Id_Admin',$Id_Admin);
		$delete->execute();
	}

	//función para obtener un administrador por el Id_Admin
	public static function getById($Id_Admin){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM administrador WHERE Id_Admin=:Id_Admin');
		$select->bindValue('Id_Admin',$Id_Admin);
		$select->execute();
		//asignarlo al objeto administrador
		$administradorDb=$select->fetch();
		$administrador= new Administrador($administradorDb['Id_Admin'], $administradorDb['Ci_Admin'], $administradorDb['Nombre_Admin'], $administradorDb['Email_Admin'], $administradorDb['Pass_Admin']);
		return $administrador;
	}
}