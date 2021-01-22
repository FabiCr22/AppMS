<?php 
/**
	* Modelo para el acceso a la base de datos y funciones CRUD de Producto
	* Autor: Erick Cruz
	* Sitio Web: https://github.com/ecruz22
	* Copyright © Macro Show 2020
*/
class Producto
{
	private $Id_Prod;
	private $Nombre_Prod;
	private $Descripcion_Prod;
	private $Imagen_Prod;
	private $Precio_Prod;
	private $Tipo_Prod;
	private $Familia_Prod;
	private $FechaSubida_Prod;
	private $Ci_Admin;

	function __construct($Id_Prod, $Nombre_Prod, $Descripcion_Prod, $Imagen_Prod, $Precio_Prod, $Tipo_Prod, $Familia_Prod, $FechaSubida_Prod, $Ci_Admin)
	{
		$this->setId_Prod($Id_Prod);
		$this->setNombre_Prod($Nombre_Prod);
		$this->setDescripcion_Prod($Descripcion_Prod);
		$this->setImagen_Prod($Imagen_Prod);
		$this->setPrecio_Prod($Precio_Prod);
		$this->setTipo_Prod($Tipo_Prod);
		$this->setFamilia_Prod($Familia_Prod);
		$this->setFechaSubida_Prod($FechaSubida_Prod);
		$this->setCi_Admin($Ci_Admin);
	}
	//Getters y Setters
	public function getId_Prod(){
		return $this->Id_Prod;
	}
	public function setId_Prod($Id_Prod){
		$this->Id_Prod = $Id_Prod;
	}
	public function getNombre_Prod(){
		return $this->Nombre_Prod;
	}
	public function setNombre_Prod($Nombre_Prod){
		$this->Nombre_Prod = $Nombre_Prod;
	}
	public function getDescripcion_Prod(){
		return $this->Descripcion_Prod;
	}
	public function setDescripcion_Prod($Descripcion_Prod){
		$this->Descripcion_Prod = $Descripcion_Prod;
	}
	public function getImagen_Prod(){
		return $this->Imagen_Prod;
	}
	public function setImagen_Prod($Imagen_Prod){
		$this->Imagen_Prod = $Imagen_Prod;
	}
	public function getPrecio_Prod(){
		return $this->Precio_Prod;
	}
	public function setPrecio_Prod($Precio_Prod){
		$this->Precio_Prod = $Precio_Prod;
	}
	public function getTipo_Prod(){
		return $this->Tipo_Prod;
	}
	public function setTipo_Prod($Tipo_Prod){
		$this->Tipo_Prod = $Tipo_Prod;
	}
	public function getFamilia_Prod(){
		return $this->Familia_Prod;
	}
	public function setFamilia_Prod($Familia_Prod){
		$this->Familia_Prod = $Familia_Prod;
	}
	public function getFechaSubida_Prod(){
		return $this->FechaSubida_Prod;
	}
	public function setFechaSubida_Prod($FechaSubida_Prod){
		$this->FechaSubida_Prod = $FechaSubida_Prod;
	}
	public function getCi_Admin(){
		return $this->Ci_Admin;
	}
	public function setCi_Admin($Ci_Admin){
		$this->Ci_Admin = $Ci_Admin;
	}
	//opciones CRUD
	//función para registrar un producto
	public static function save($producto){
		$db=Db::getConnect();
		$insert=$db->prepare('INSERT INTO producto VALUES(NULL, :Nombre_Prod, :Descripcion_Prod, :Imagen_Prod, :Precio_Prod, :Tipo_Prod, :Familia_Prod, :FechaSubida_Prod, :Ci_Admin)');
		$insert->bindValue('Nombre_Prod',$producto->getNombre_Prod());
		$insert->bindValue('Descripcion_Prod',$producto->getDescripcion_Prod());
		$insert->bindValue('Imagen_Prod',$producto->getImagen_Prod());
		$insert->bindValue('Precio_Prod',$producto->getPrecio_Prod());
		$insert->bindValue('Tipo_Prod',$producto->getTipo_Prod());
		$insert->bindValue('Familia_Prod',$producto->getFamilia_Prod());
		$insert->bindValue('FechaSubida_Prod',$producto->getFechaSubida_Prod());
		$insert->bindValue('Ci_Admin',$producto->getCi_Admin());
		$insert->execute();
	}
	//función para obtener todos los productos
	public static function all(){
		$listaProductos =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM producto ORDER BY Id_Prod');
		foreach ($sql->fetchAll() as $producto) {
			$listaProductos[]= new Producto($producto['Id_Prod'],$producto['Nombre_Prod'],$producto['Descripcion_Prod'],$producto['Imagen_Prod'],$producto['Precio_Prod'],$producto['Tipo_Prod'],$producto['Familia_Prod'],$producto['FechaSubida_Prod'],$producto['Ci_Admin']);
		}
		return $listaProductos;
	}
	//función para actualizar un producto por el id
	public static function update($producto){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE producto SET Nombre_Prod=:Nombre_Prod, Descripcion_Prod=:Descripcion_Prod, Imagen_Prod=:Imagen_Prod, Precio_Prod=:Precio_Prod, Tipo_Prod=:Tipo_Prod, Familia_Prod=:Familia_Prod, FechaSubida_Prod=:FechaSubida_Prod, Ci_Admin=:Ci_Admin WHERE Id_Prod=:Id_Prod');
		$update->bindValue('Id_Prod',$producto->getId_Prod());
		$update->bindValue('Nombre_Prod',$producto->getNombre_Prod());
		$update->bindValue('Descripcion_Prod',$producto->getDescripcion_Prod());
		$update->bindValue('Imagen_Prod',$producto->getImagen_Prod());
		$update->bindValue('Precio_Prod',$producto->getPrecio_Prod());
		$update->bindValue('Tipo_Prod',$producto->getTipo_Prod());
		$update->bindValue('Familia_Prod',$producto->getFamilia_Prod());
		$update->bindValue('FechaSubida_Prod',$producto->getFechaSubida_Prod());
		$update->bindValue('Ci_Admin',$producto->getCi_Admin());
		$update->execute();
	}
	//función para eliminar un producto por el id
	public static function delete($Id_Prod){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE FROM producto WHERE Id_Prod=:Id_Prod');
		$delete->bindValue('Id_Prod',$Id_Prod);
		$delete->execute();
	}
	//función para obtener un producto por el id
	public static function getById($Id_Prod){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM producto WHERE Id_Prod=:Id_Prod OR Nombre_Prod=:Id_Prod');
		$select->bindValue('Id_Prod',$Id_Prod);
		$select->execute();
		$productoDb=$select->fetch();
		$producto= new Producto($productoDb['Id_Prod'],$productoDb['Nombre_Prod'],$productoDb['Descripcion_Prod'],$productoDb['Imagen_Prod'],$productoDb['Precio_Prod'],$productoDb['Tipo_Prod'],$productoDb['Familia_Prod'],$productoDb['FechaSubida_Prod'],$productoDb['Ci_Admin']);
		return $producto;
	}
	//función para obtener todos los productos por nombre
	public static function getByNombre($Search_Prod){
		$listaProductos =[];
		$db=Db::getConnect();
		$sql=$db->prepare('SELECT * FROM producto INNER JOIN tipo_producto ON producto.Tipo_Prod =tipo_producto.Id_TipoProd INNER JOIN familia_producto ON tipo_producto.Id_TipoProd = familia_producto.Id_TipoProd WHERE Id_Prod LIKE :Search_Prod');
		$sql->bindValue('Search_Prod',$Search_Prod);
		$sql->execute();
		foreach ($sql->fetchAll() as $producto) {
			$listaProductos= new Producto($producto['Id_Prod'],$producto['Nombre_Prod'],$producto['Descripcion_Prod'],$producto['Imagen_Prod'],$producto['Precio_Prod'],$producto['Nombre_TipoProd'],$producto['Nombre_FamiliaProd'],$producto['FechaSubida_Prod'],$producto['Ci_Admin']);
		}
		return $listaProductos;
	}
	//función para obtener un producto por su tipo
	public static function getByTipo($Tipo_Prod){
		$listaProductos =[];
		$db=Db::getConnect();
		$sql=$db->prepare('SELECT * FROM producto WHERE Tipo_Prod=:Tipo_Prod ORDER BY FechaSubida_Prod');
		$sql->bindValue('Tipo_Prod',$Tipo_Prod);
		$sql->execute();
		foreach ($sql->fetchAll() as $producto) {
			$listaProductos[]= new Producto($producto['Id_Prod'],$producto['Nombre_Prod'],$producto['Descripcion_Prod'],$producto['Imagen_Prod'],$producto['Precio_Prod'],$producto['Tipo_Prod'],$producto['Familia_Prod'],$producto['FechaSubida_Prod'],$producto['Ci_Admin']);
		}
		return $listaProductos;
	}
	//función para obtener un producto por su familia
	public static function getByFamilia($Familia_Prod){
		$listaProductos =[];
		$db=Db::getConnect();
		$sql=$db->prepare('SELECT * FROM producto INNER JOIN tipo_producto ON producto.Tipo_Prod =tipo_producto.Id_TipoProd INNER JOIN familia_producto ON tipo_producto.Id_TipoProd = familia_producto.Id_TipoProd WHERE Familia_Prod=:Familia_Prod');
		$sql->bindValue('Familia_Prod',$Familia_Prod);
		$sql->execute();
		foreach ($sql->fetchAll() as $producto) {
			$listaProductos[]= new Producto($producto['Id_Prod'],$producto['Nombre_Prod'],$producto['Descripcion_Prod'],$producto['Imagen_Prod'],$producto['Precio_Prod'],$producto['Tipo_Prod'],$producto['Familia_Prod'],$producto['FechaSubida_Prod'],$producto['Ci_Admin']);
		}
		return $listaProductos;
	}
	//función para obtener un producto por su tipo y familia
	public static function getByTipoFamilia($Tipo_Prod, $Familia_Prod){
		$listaProductos =[];
		$db=Db::getConnect();
		$sql=$db->prepare('SELECT * FROM producto INNER JOIN tipo_producto ON producto.Tipo_Prod =tipo_producto.Id_TipoProd INNER JOIN familia_producto ON tipo_producto.Id_TipoProd = familia_producto.Id_TipoProd WHERE Tipo_Prod=:Tipo_Prod AND Familia_Prod=:Familia_Prod');
		$sql->bindValue('Tipo_Prod',$Tipo_Prod);
		$sql->bindValue('Familia_Prod',$Familia_Prod);
		$sql->execute();
		foreach ($sql->fetchAll() as $producto) {
			$listaProductos[]= new Producto($producto['Id_Prod'],$producto['Nombre_Prod'],$producto['Descripcion_Prod'],$producto['Imagen_Prod'],$producto['Precio_Prod'],$producto['Tipo_Prod'],$producto['Familia_Prod'],$producto['FechaSubida_Prod'],$producto['Ci_Admin']);
		}
		return $listaProductos;
	}

	//-----------------FUNCIONES CRUD DE Tipo_Producto----------------------
	//función para registrar un tipo de producto
	public static function saveTipoProd($tipo_producto){
		$db=Db::getConnect();
		$insert=$db->prepare('INSERT INTO tipo_producto VALUES(NULL, :Nombre_TipoProd)');
		$insert->bindValue('Nombre_TipoProd',$tipo_producto->getNombre_TipoProd());
		$insert->execute();
	}
	//función para obtener todos los tipos de productos
	public static function allTipoProd(){
		$listaTipoProductos =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM tipo_producto ORDER BY Nombre_TipoProd');
		foreach ($sql->fetchAll() as $tipo_producto) {
			$listaTipoProductos[]= new Tipo_Producto($tipo_producto['Id_Tipoprod'],$tipo_producto['Nombre_TipoProd']);
		}
		return $listaTipoProductos;
	}
	//función para actualizar un tipo de producto por el id
	public static function updateTipoProd($tipo_producto){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE tipo_producto SET Nombre_TipoProd=:Nombre_TipoProd WHERE Id_TipoProd=:Id_TipoProd');
		$update->bindValue('Id_TipoProd',$tipo_producto->getId_TipoProd());
		$update->bindValue('Nombre_TipoProd',$tipo_producto->getNombre_TipoProd());
		$update->execute();
	}
	//función para eliminar un tipo de producto por el id
	public static function deleteTipoProd($Id_TipoProd){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE FROM tipo_producto WHERE Id_Tipoprod=:Id_Tipoprod');
		$delete->bindValue('Id_Tipoprod',$Id_Tipoprod);
		$delete->execute();
	}
	//función para obtener un tipo de producto por el id
	/*public static function getByIdTipoProd($Id_Tipoprod){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM tipo_producto WHERE Id_Tipoprod=:Id_Tipoprod');
		$select->bindValue('Id_Tipoprod',$Id_Tipoprod);
		$select->execute();
		$tipo_productoDb=$select->fetch();
		$tipo_producto= new Tipo_Producto($tipo_productoDb['Id_Tipoprod'],$tipo_productoDb['Nombre_TipoProd']);
		return $tipo_producto;
	}*/
	//función para obtener un tipo de producto por su nombre
	public static function getByNombreTipoProd($Nombre_TipoProd){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM tipo_producto WHERE Nombre_TipoProd=:Nombre_TipoProd');
		$select->bindValue('Nombre_TipoProd',$Nombre_TipoProd);
		$select->execute();
		$tipo_productoDb=$select->fetch();
		$tipo_producto= new Tipo_Producto($tipo_productoDb['Id_TipoProd'],$tipo_productoDb['Nombre_TipoProd']);
		return $tipo_producto;
	}
	//-----------------FUNCIONES CRUD DE Familia_Producto----------------------
	//función para registrar una familia de producto
	public static function saveFamiliaProd($familia_producto){
		$db=Db::getConnect();
		$insert=$db->prepare('INSERT INTO familia_producto VALUES(NULL, :Nombre_FamiliaProd, :Id_TipoProd)');
		$insert->bindValue('Nombre_FamiliaProd',$familia_producto->getNombre_FamiliaProd());
		$insert->bindValue('Id_TipoProd',$familia_producto->getId_TipoProd());
		$insert->execute();
	}
	//función para obtener todas las familias de productos
	public static function allFamiliaProd(){
		$listaFamiliaProductos =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM familia_producto');
		foreach ($sql->fetchAll() as $familia_producto) {
			$listaFamiliaProductos[]= new Familia_Producto($familia_producto['Id_FamiliaProd'],$familia_producto['Nombre_FamiliaProd'],$familia_producto['Id_TipoProd']);
		}
		return $listaFamiliaProductos;
	}
	//función para actualizar una familia de producto por el id
	public static function updateFamiliaProd($familia_producto){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE familia_producto SET Nombre_FamiliaProd=:Nombre_FamiliaProd, Id_TipoProd=:Id_TipoProd WHERE Id_FamiliaProd=:Id_FamiliaProd');
		$update->bindValue('Id_FamiliaProd',$familia_producto->getId_FamiliaProd());
		$update->bindValue('Nombre_FamiliaProd',$familia_producto->getNombre_FamiliaProd());
		$update->bindValue('Id_TipoProd',$familia_producto->getId_TipoProd());
		$update->execute();
	}
	//función para eliminar una familia de producto por el id
	public static function deleteFamiliaProd($Id_FamiliaProd){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE FROM familia_producto WHERE Id_FamiliaProd=:Id_FamiliaProd');
		$delete->bindValue('Id_FamiliaProd',$Id_FamiliaProd);
		$delete->execute();
	}
	//función para obtener una familia de producto por el id
	/*public static function getByIdFamiliaProd($Id_FamiliaProd){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM familia_producto WHERE Id_FamiliaProd=:Id_FamiliaProd');
		$select->bindValue('Id_FamiliaProd',$Id_FamiliaProd);
		$select->execute();
		$familia_productoDb=$select->fetch();
		$familia_producto= new Familia_Producto($familia_productoDb['Id_FamiliaProd'],$familia_productoDb['Nombre_FamiliaProd'],$familia_productoDb['Id_TipoProd']);
		return $familia_producto;
	}*/
	//función para obtener una familia de producto por su nombre
	public static function getByNombreFamiliaProd($Nombre_FamiliaProd){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM familia_producto WHERE Nombre_FamiliaProd=:Nombre_FamiliaProd');
		$select->bindValue('Nombre_FamiliaProd',$Nombre_FamiliaProd);
		$select->execute();
		$familia_productoDb=$select->fetch();
		$familia_producto= new Familia_Producto($familia_productoDb['Id_FamiliaProd'],$familia_productoDb['Nombre_FamiliaProd'],$familia_productoDb['Id_TipoProd']);
		return $familia_producto;
	}
	//función para obtener una familia de producto por su tipo
	public static function getByTipoFamiliaProd($Id_TipoProd){
		$listaFamiliaProductos =[];
		$db=Db::getConnect();
		$sql=$db->prepare('SELECT * FROM familia_producto WHERE Id_TipoProd=:Id_TipoProd');
		$sql->bindValue('Id_TipoProd',$Id_TipoProd);
		$sql->execute();
		foreach ($sql->fetchAll() as $familia_producto) {
			$listaFamiliaProductos[]= new Familia_Producto($familia_producto['Id_FamiliaProd'],$familia_producto['Nombre_FamiliaProd'],$familia_producto['Id_TipoProd']);
		}
		return $listaFamiliaProductos;
	}
}