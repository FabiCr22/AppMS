<?php 
/**
	* Modelo para el acceso a la base de datos y funciones CRUD de Reserva
	* Autor: Erick Cruz
	* Sitio Web: https://github.com/ecruz22
	* Copyright © Macro Show 2020
*/
class Reserva
{
	private $CiRuc_User;
	private $Id_Sem;
	
	function __construct($CiRuc_User, $Id_Sem)
	{
		$this->setCiRuc_User($CiRuc_User);
		$this->setId_Sem($Id_Sem);
	}
	//Getters y Setters
	public function getCiRuc_User(){
		return $this->CiRuc_User;
	}
	public function setCiRuc_User($CiRuc_User){
		$this->CiRuc_User = $CiRuc_User;
	}
	public function getId_Sem(){
		return $this->Id_Sem;
	}
	public function setId_Sem($Id_Sem){
		$this->Id_Sem = $Id_Sem;
	}
	//opciones CRUD
	//función para realizar una reserva
	public static function save($reserva){
		$db=Db::getConnect();
		$insert=$db->prepare('INSERT INTO reserva VALUES(:CiRuc_User, :Id_Sem)');
		$insert->bindValue('CiRuc_User',$reserva->getCiRuc_User());
		$insert->bindValue('Id_Sem',$reserva->getId_Sem());
		$insert->execute();
	}
	//función para obtener todas las reservas
	public static function all(){
		$listaReservas =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM seminario RIGHT JOIN reserva ON seminario.Id_Sem = reserva.Id_Sem LEFT JOIN usuario ON reserva.CiRuc_User = usuario.CiRuc_User ORDER BY usuario.Nombre_User');
		foreach ($sql->fetchAll() as $reserva) {
			$listaReservas[]= new Reserva($reserva['Id_Sem'],$reserva['CiRuc_User']);
		}
		return $listaReservas;
	}
	//función para eliminar una reserva por el Id_sem
	public static function delete($Id_Sem){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE FROM reserva WHERE Id_Sem=:Id_Sem');
		$delete->bindValue('Id_Sem',$Id_Sem);
		$delete->execute();
	}
	//función para obtener una reserva por el id del seminario y por cedula de usuario
	public static function getById($Id_Sem,$CiRuc_User){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM reserva WHERE Id_Sem=:Id_Sem AND CiRuc_User=:CiRuc_User');
		$select->bindValue('Id_Sem',$Id_Sem);
		$select->bindValue('CiRuc_User',$CiRuc_User);
		$select->execute();
		$reservaDb=$select->fetch();
		$reserva= new Reserva($reservaDb['CiRuc_User'],$reservaDb['Id_Sem']);
		return $reserva;
	}
	//función para obtener todas las reservas por cedula de usuario
	public static function getByCiRucUser($CiRuc_User){
		$listaReservas =[];
		$db=Db::getConnect();
		$sql=$db->prepare('SELECT * FROM reserva WHERE CiRuc_User=:CiRuc_User order by CiRuc_User');
		$sql->bindValue('CiRuc_User',$CiRuc_User);
		$sql->execute();
		foreach ($sql->fetchAll() as $reserva) {
			$listaReservas[]= new Reserva($reserva['CiRuc_User'],$reserva['Id_Sem']);
		}
		return $listaReservas;
	}
	//función para obtener todas las reservas de un seminario
	public static function getById_Sem($Id_Sem){
		$listaReservas =[];
		$db=Db::getConnect();
		$sql=$db->prepare('SELECT * FROM reserva WHERE Id_Sem=:Id_Sem order by Id_Sem');
		$sql->bindValue('Id_Sem',$Id_Sem);
		$sql->execute();
		foreach ($sql->fetchAll() as $reserva) {
			$listaReservas[]= new Reserva($reserva['Id_Sem'],$reserva['CiRuc_User']);
		}
		return $listaReservas;
	}
}