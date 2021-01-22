<?php 
/**
	* Modelo para el acceso a la base de datos y funciones CRUD de Tipo_Producto
	* Autor: Erick Cruz
	* Sitio Web: https://github.com/ecruz22
	* Copyright © Macro Show 2020
*/
class Familia_Producto
{
	private $Id_FamiliaProd;
	private $Nombre_FamiliaProd;
	private $Id_TipoProd;

	function __construct($Id_FamiliaProd, $Nombre_FamiliaProd, $Id_TipoProd)
	{
		$this->setId_FamiliaProd($Id_FamiliaProd);
		$this->setNombre_FamiliaProd($Nombre_FamiliaProd);
		$this->setId_TipoProd($Id_TipoProd);
	}
	//Getters y Setters
	public function getId_FamiliaProd(){
		return $this->Id_FamiliaProd;
	}

	public function setId_FamiliaProd($Id_FamiliaProd){
		$this->Id_FamiliaProd = $Id_FamiliaProd;
	}
	public function getNombre_FamiliaProd(){
		return $this->Nombre_FamiliaProd;
	}

	public function setNombre_FamiliaProd($Nombre_FamiliaProd){
		$this->Nombre_FamiliaProd = $Nombre_FamiliaProd;
	}
	public function getId_TipoProd(){
		return $this->Id_TipoProd;
	}

	public function setId_TipoProd($Id_TipoProd){
		$this->Id_TipoProd = $Id_TipoProd;
	}
	//función para obtener una familia de producto por el id
	public static function getByIdFamiliaProd($Id_FamiliaProd){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM familia_producto WHERE Id_FamiliaProd=:Id_FamiliaProd');
		$select->bindValue('Id_FamiliaProd',$Id_FamiliaProd);
		$select->execute();
		$familia_productoDb=$select->fetch();
		$familia_producto= new Familia_Producto($familia_productoDb['Id_FamiliaProd'],$familia_productoDb['Nombre_FamiliaProd'],$familia_productoDb['Id_TipoProd']);
		return $familia_producto;
	}
}