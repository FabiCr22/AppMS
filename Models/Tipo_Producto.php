<?php 
/**
	* Modelo para el acceso a la base de datos y funciones CRUD de Tipo_Producto
	* Autor: Erick Cruz
	* Sitio Web: https://github.com/ecruz22
	* Copyright © Macro Show 2020
*/
class Tipo_Producto
{
	private $Id_Tipoprod;
	private $Nombre_TipoProd;

	function __construct($Id_Tipoprod, $Nombre_TipoProd)
	{
		$this->setId_Tipoprod($Id_Tipoprod);
		$this->setNombre_TipoProd($Nombre_TipoProd);
	}
	//Getters y Setters
	public function getId_Tipoprod(){
		return $this->Id_Tipoprod;
	}

	public function setId_Tipoprod($Id_Tipoprod){
		$this->Id_Tipoprod = $Id_Tipoprod;
	}

	public function getNombre_TipoProd(){
		return $this->Nombre_TipoProd;
	}

	public function setNombre_TipoProd($Nombre_TipoProd){
		$this->Nombre_TipoProd = $Nombre_TipoProd;
	}
	//función para obtener un tipo de producto por el id
	public static function getByIdTipoProd($Id_Tipoprod){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM tipo_producto WHERE Id_Tipoprod=:Id_Tipoprod');
		$select->bindValue('Id_Tipoprod',$Id_Tipoprod);
		$select->execute();
		$tipo_productoDb=$select->fetch();
		$tipo_producto= new Tipo_Producto($tipo_productoDb['Id_Tipoprod'],$tipo_productoDb['Nombre_TipoProd']);
		return $tipo_producto;
	}
}