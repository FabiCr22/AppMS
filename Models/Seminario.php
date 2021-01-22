<?php 
/**
	* Modelo para el acceso a la base de datos y funciones CRUD de Seminario
	* Autor: Erick Cruz
	* Sitio Web: https://github.com/ecruz22
	* Copyright © Macro Show 2020
*/
class Seminario
{
	private $Id_Sem;
	private $Titulo_Sem;
	private $Descripcion_Sem;
	private $Imagen_Sem;
	private $Fecha_Sem;
	private $Hora_Sem;
	private $Precio_Sem;
	private $Ci_Admin;

	function __construct($Id_Sem, $Titulo_Sem, $Descripcion_Sem, $Imagen_Sem, $Fecha_Sem, $Hora_Sem, $Precio_Sem, $Ci_Admin)
	{
		$this->setId_Sem($Id_Sem);
		$this->setTitulo_Sem($Titulo_Sem);
		$this->setDescripcion_Sem($Descripcion_Sem);
		$this->setImagen_Sem($Imagen_Sem);
		$this->setFecha_Sem($Fecha_Sem);
		$this->setHora_Sem($Hora_Sem);
		$this->setPrecio_Sem($Precio_Sem);
		$this->setCi_Admin($Ci_Admin);
	}
	//Getters y Setters
	public function getId_Sem(){
		return $this->Id_Sem;
	}
	public function setId_Sem($Id_Sem){
		$this->Id_Sem = $Id_Sem;
	}
	public function getTitulo_Sem(){
		return $this->Titulo_Sem;
	}
	public function setTitulo_Sem($Titulo_Sem){
		$this->Titulo_Sem = $Titulo_Sem;
	}
	public function getDescripcion_Sem(){
		return $this->Descripcion_Sem;
	}
	public function setDescripcion_Sem($Descripcion_Sem){
		$this->Descripcion_Sem = $Descripcion_Sem;
	}
	public function getImagen_Sem(){
		return $this->Imagen_Sem;
	}
	public function setImagen_Sem($Imagen_Sem){
		$this->Imagen_Sem = $Imagen_Sem;
	}
	public function getFecha_Sem(){
		return $this->Fecha_Sem;
	}
	public function setFecha_Sem($Fecha_Sem){
		$this->Fecha_Sem = $Fecha_Sem;
	}
	public function getHora_Sem(){
		return $this->Hora_Sem;
	}
	public function setHora_Sem($Hora_Sem){
		$this->Hora_Sem = $Hora_Sem;
	}
	public function getPrecio_Sem(){
		return $this->Precio_Sem;
	}
	public function setPrecio_Sem($Precio_Sem){
		$this->Precio_Sem = $Precio_Sem;
	}
	public function getCi_Admin(){
		return $this->Ci_Admin;
	}
	public function setCi_Admin($Ci_Admin){
		$this->Ci_Admin = $Ci_Admin;
	}
	//opciones CRUD
	//función para registrar un seminario
	public static function save($seminario){
		$db=Db::getConnect();
		$insert=$db->prepare('INSERT INTO seminario VALUES(NULL, :Titulo_Sem, :Descripcion_Sem, :Imagen_Sem, :Fecha_Sem, :Hora_Sem, :Precio_Sem, :Ci_Admin)');
		$insert->bindValue('Titulo_Sem',$seminario->getTitulo_Sem());
		$insert->bindValue('Descripcion_Sem',$seminario->getDescripcion_Sem());
		$insert->bindValue('Imagen_Sem',$seminario->getImagen_Sem());
		$insert->bindValue('Fecha_Sem',$seminario->getFecha_Sem());
		$insert->bindValue('Hora_Sem',$seminario->getHora_Sem());
		$insert->bindValue('Precio_Sem',$seminario->getPrecio_Sem());
		$insert->bindValue('Ci_Admin',$seminario->getCi_Admin());
		$insert->execute();
	}
	//función para obtener todas los seminarios
	public static function all(){
		$listaSeminarios =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM seminario order by Id_Sem');
		foreach ($sql->fetchAll() as $seminario) {
			$listaSeminarios[]= new Seminario($seminario['Id_Sem'],$seminario['Titulo_Sem'], $seminario['Descripcion_Sem'],$seminario['Imagen_Sem'],$seminario['Fecha_Sem'],$seminario['Hora_Sem'],$seminario['Precio_Sem'],$seminario['Ci_Admin']);
		}
		return $listaSeminarios;
	}
	//función para actualizar un seminario por el id
	public static function update($seminario){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE seminario SET Titulo_Sem=:Titulo_Sem, Descripcion_Sem=:Descripcion_Sem, Imagen_Sem=:Imagen_Sem, Fecha_Sem=:Fecha_Sem, Hora_Sem=:Hora_Sem, Precio_Sem=:Precio_Sem WHERE Id_Sem=:Id_Sem');
		$update->bindValue('Id_Sem',$seminario->getId_Sem());
		$update->bindValue('Titulo_Sem',$seminario->getTitulo_Sem());
		$update->bindValue('Descripcion_Sem',$seminario->getDescripcion_Sem());
		$update->bindValue('Imagen_Sem',$seminario->getImagen_Sem());
		$update->bindValue('Fecha_Sem',$seminario->getFecha_Sem());
		$update->bindValue('Hora_Sem',$seminario->getHora_Sem());
		$update->bindValue('Precio_Sem',$seminario->getPrecio_Sem());
		$update->execute();
	}
	//función para eliminar un seminario por el id
	public static function delete($Id_Sem){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE FROM seminario WHERE Id_Sem=:Id_Sem');
		$delete->bindValue('Id_Sem',$Id_Sem);
		$delete->execute();
	}
	//función para obtener un seminario por el id
	public static function getById($Id_Sem){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM seminario WHERE Id_Sem=:Id_Sem OR Titulo_Sem=:Id_Sem');
		$select->bindValue('Id_Sem',$Id_Sem);
		$select->execute();
		$seminarioDb=$select->fetch();
		$seminario= new Seminario($seminarioDb['Id_Sem'],$seminarioDb['Titulo_Sem'],$seminarioDb['Descripcion_Sem'],$seminarioDb['Imagen_Sem'],$seminarioDb['Fecha_Sem'],$seminarioDb['Hora_Sem'],$seminarioDb['Precio_Sem'],$seminarioDb['Ci_Admin']);
		return $seminario;
	}
	//función para obtener todos los seminarios por titulo
	public static function getByTitulo($Titulo_Sem){
		$listaSeminarios =[];
		$db=Db::getConnect();
		$sql=$db->prepare('SELECT * FROM seminario WHERE Titulo_Sem=:Titulo_Sem order by Titulo_Sem');
		$sql->bindValue('Titulo_Sem',$Titulo_Sem);
		$sql->execute();
		foreach ($sql->fetchAll() as $seminario) {
			$listaSeminarios[]= new Seminario($seminario['Id_Sem'],$seminario['Titulo_Sem'],$seminario['Descripcion_Sem'],$seminario['Imagen_Sem'],$seminario['Fecha_Sem'],$seminario['Hora_Sem'],$seminario['Precio_Sem'],$seminario['Ci_Admin']);
		}
		return $listaSeminarios;
	}
	//función para obtener un seminario por su fecha
	public static function getByFecha($Fecha_Sem){
		$listaSeminarios =[];
		$db=Db::getConnect();
		$sql=$db->prepare('SELECT * FROM seminario WHERE Fecha_Sem=:Fecha_Sem order by Fecha_Sem');
		$sql->bindValue('Fecha_Sem',$Fecha_Sem);
		$sql->execute();
		foreach ($sql->fetchAll() as $seminario) {
			$listaSeminarios[]= new Seminario($seminario['Id_Sem'],$seminario['Titulo_Sem'],$seminario['Descripcion_Sem'],$seminario['Imagen_Sem'],$seminario['Fecha_Sem'],$seminario['Hora_Sem'],$seminario['Precio_Sem'],$seminario['Ci_Admin']);
		}
		return $listaSeminarios;
	}
}