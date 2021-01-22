<?php
/**
	* Controlador ProductoController
	* Autor: Erick Cruz
	* Sitio Web: https://github.com/ecruz22
	* Copyright © Macro Show 2020
*/
if(!isset($_SESSION))
{
	session_start();
}
class ProductoController
{
	// ---------- Constructor ----------
	function __construct(){}
	// ---------- Mostrar mensaje de error en el acceso a vistas de producto ----------
	public function error(){
		require_once('Views/Producto/error.php');
	}
	/* ----------------------------------------
	----------- INGRESO DE PRODUCTO -----------
	---------------------------------------- */
	// ---------- Mostrar formulario para ingresar producto ----------
	public function register(){
		$lista_tipos_productos=Producto::allTipoProd();
		require_once('Views/Producto/register.php');
	}
	// ---------- Guardar producto en DB ----------
	public function save(){
		if ($_FILES["Imagen_Prod"]["error"] > 0){ }else{
			$nom_archivo=$_FILES['Imagen_Prod']['name'];	//nombre de la imagen
			$ruta = "images_upload/productos/" . $nom_archivo;	//ruta donde se almacena la nueva imagen
			$archivo = $_FILES['Imagen_Prod']['tmp_name'];	//ruta de donde proviene la imagen a subir
			$subir=move_uploaded_file($archivo, $ruta); //se sube el archivo
			$NombreProd = $_POST['Nombre_Prod'];
			$producto= new Producto(null,$_POST['Nombre_Prod'],$_POST['Descripcion_Prod'],$ruta,$_POST['Precio_Prod'],$_POST['Tipo_Prod'],$_POST['Familia_Prod'], date("Y-m-d H:i:s") ,$_SESSION['usuario_alias']);
			Producto::save($producto);
			$_SESSION['mensaje']='Producto guardado satisfactoriamente';
			$this->show($NombreProd);
		}
	}
	// ---------- Mostrar información de un producto determinado ----------
	public function show($NombreProd){
		$producto=Producto::getById($NombreProd);
		require_once('Views/Producto/show.php');
	}
	/* ----------------------------------------
	-------- ACTUALIZACIÓN DE PRODUCTO --------
	---------------------------------------- */
	// ---------- Mostrar listado con buscador para actualizar producto ----------
	public function showsearchupdate(){
		$productos=Producto::all();
		$lista_productos=$productos;
		require_once('Views/Producto/showupdate.php');
	}
	// ---------- Buscar y obtener productos por Id para modificarlos ----------
	public function searchupdate(){
		if (!empty($_POST['Id_Prod'])) {
			$buscador = Producto::getById($_POST['Id_Prod']);
			$id = $buscador->getId_Prod();
			if (isset($id)) {
				$lista_productos[]=Producto::getById($_POST['Id_Prod']);
				$_SESSION['mensaje']='Existe este producto en el sistema';
				require_once('Views/Producto/showupdate.php');
			}else{
				$_SESSION['mensaje']='No existe este producto en el sistema';
				$this->showsearchupdate();
			}
		}else{
			$this->showsearchupdate();
		}
	}
	// ---------- Mostrar formulario para actualizar producto ----------
	public function showupdate(){
		$Id_Prod=$_GET['Id_Prod'];
		$producto=Producto::getById($Id_Prod);
		$tipo=$_GET['Tipo_Prod'];
		$tipo_producto=Producto::allTipoProd();
		$familia=$_GET['Familia_Prod'];
		$familia_producto=Producto::getByTipoFamiliaProd($tipo);
		require_once('Views/Producto/update.php');
	}
	// ---------- Modificar producto en DB ----------
	public function update(){
		$ruta = $_POST['Imagen_Producto'];
		if(isset($_FILES['Imagen_Prod']['tmp_name'])){
			if ($_FILES["Imagen_Prod"]["error"] > 0){ }else{
				$archivo = $_FILES['Imagen_Prod']['tmp_name'];	//ruta de donde proviene la imagen a subir
				$nom_archivo=$_FILES['Imagen_Prod']['name'];	//nombre de la imagen
				$ruta = "images_upload/productos/" . $nom_archivo;	//ruta donde se almacena la nueva imagen
				$subir=move_uploaded_file($archivo, $ruta); //se sube el archivo

				$imagen_old = Producto::getById($_POST['Id_Prod']);
				$deleteimg = $imagen_old->getImagen_Prod();
				if (isset($deleteimg)) {
					if (!unlink($deleteimg)){
						echo "No se pudo borrar la imagen: ".$deleteimg;
					}
				}
			}
		}

		$producto= new Producto($_POST['Id_Prod'],$_POST['Nombre_Prod'],$_POST['Descripcion_Prod'],$ruta,$_POST['Precio_Prod'],$_POST['Tipo_Prod'],$_POST['Familia_Prod'],date("Y-m-d H:i:s"),$_SESSION['usuario_alias']);
		Producto::update($producto);
		$_SESSION['mensaje']='Producto actualizado satisfactoriamente';
		$this->show($_POST['Id_Prod']);
	}
	/* ----------------------------------------
	--------- ELIMINACIÓN DE PRODUCTO ---------
	---------------------------------------- */
	// ---------- Mostrar listado con buscador para eliminar producto ----------
	public function showsearchdelete(){
		$productos=Producto::all();
		$lista_productos=$productos;
		require_once('Views/Producto/showdelete.php');
	}
	// ---------- Buscar y obtener productos por Id para eliminarlos ----------
	public function searchdelete(){
		if (!empty($_POST['Id_Prod'])) {
			$buscador = Producto::getById($_POST['Id_Prod']);
			$id = $buscador->getId_Prod();
			if (isset($id)) {
				$lista_productos[]=Producto::getById($_POST['Id_Prod']);
				$_SESSION['mensaje']='Existe este producto en el sistema';
				require_once('Views/Producto/showdelete.php');
			}else{
				$_SESSION['mensaje']='No existe este producto en el sistema';
				$this->showsearchdelete();
			}
		}else{
			$this->showsearchdelete();
		}
	}
	// ---------- Eliminar producto en DB ----------
	public function delete(){
		if(isset($_FILES['Imagen_Prod']['tmp_name'])){
			if ($_FILES["Imagen_Prod"]["error"] > 0){ }else{
				$imagen_old = Producto::getById($_POST['Id_Prod']);
				$deleteimg = $imagen_old->getImagen_Prod();
				if (isset($deleteimg)) {
					if (!unlink($deleteimg)){
						echo "No se pudo borrar la imagen: ".$deleteimg;
					}
				}
			}
		}
		Producto::delete($_POST['Id_Prod']);
		$_SESSION['mensaje']='Producto eliminado satisfactoriamente';
		$this->showsearchdelete();
	}
	/* ----------------------------------------
	-------- VISUALIZACIÓN DE PRODUCTOS -------
	---------------------------------------- */
	// ---------- Mostrar información de todos los productos ----------
	function getConn(){
	  $mysqli = mysqli_connect('localhost', 'root', '', "db_ms");
	  if (mysqli_connect_errno($mysqli))
	    echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
	  $mysqli->set_charset('utf8');
	  return $mysqli;
	}

	public function showall(){
		//$productos=Producto::all();
		//$lista_productos=$productos;
		//$tipo=$_GET['Tipo_Prod'];
		//$lista_productos=Producto::getByTipo($tipo);
		$lista_tipos_productos=Producto::allTipoProd();

		//$listaProductos =[];
		//$db=Db::getConnect();
		//('SELECT * FROM producto WHERE Tipo_Prod=".$tipo." ORDER BY Id_Prod');
		$mysqli = getConn();
		$sql=("SELECT Nombre_Prod, Imagen_Prod, Familia_Prod, Precio_Prod FROM producto ORDER BY FechaSubida_Prod");
		$Paginacion= new Paginacion($sql);
		$sql=$Paginacion->sql;
		$lista_productos = $mysqli->query($sql);
		require_once('Views/Producto/showall.php');
	}
	// ---------- Buscar y obtener producto por Id, Nombre, Tipo, Familia ----------
	public function search(){
		if (!empty($_POST['Search_Prod'])) {
			$buscador = Producto::getByNombre($_POST['Search_Prod']);
			//$id = $buscador->getId_Prod();
			if (isset($buscador)) {
				$lista_productos[]=Producto::getByNombre($_POST['Search_Prod']);
				$_SESSION['mensaje']='Existe este producto en el sistema';
				require_once('Views/Producto/showupdate.php');
			}else{
				$_SESSION['mensaje']='No existe este producto en el sistema';
				$this->showsearchupdate();
			}
		}else{
			$this->showsearchupdate();
		}
		/*
		if (!empty($_POST['Search_Prod'])) {
			$lista_productos[]=Producto::getById($_POST['Search_Prod']);
			$botones=0;
			require_once('Views/Producto/showall.php');
		}else{
			$this->show();
		}*/
	}
	// ---------- Mostrar información de un producto determinado en PDF ----------
	public function productoPdf(){
		header('Location: Controllers/ProductoPdf.php?producto='.$_GET['producto']);
	}
	// ---------- Mostrar información de los productos en PDF ----------
	public function productosPdf(){
		header('Location: Controllers/ProductosPdf.php?producto='.$_GET['producto']);
	}
	// ---------- Mostrar información de todos los instrumentos ----------
	public function showInstrumento(){
		$tipo = "Instrumento";
		$producto=Producto::getByTipo($tipo);
		require_once('Views/Producto/showInstrumento.php');
	}
	// ---------- Mostrar información de todos los accesorios ----------
	public function showAccesorio(){
		$tipo = "Accesorio";
		$producto=Producto::getByTipo($tipo);
		$accesorio=Producto::all();
		require_once('Views/Producto/showAccesorio.php');
	}
	// ---------- Mostrar información de todos los equipos de amplificación ----------
	public function showAmplificacion(){
		$tipo = "Equipo de Amplificación";
		$producto=Producto::getByTipo($tipo);
		require_once('Views/Producto/showAmplificacion.php');
	}
	// ---------- Mostrar información de todos los equipos de DJ ----------
	public function showDj(){
		$tipo = "Equipo de DJ";
		$producto=Producto::getByTipo($tipo);
		require_once('Views/Producto/showDj.php');
	}
	// ---------- Mostrar información de todos los equipos para estudio de grabación ----------
	public function showEstudio(){
		$tipo = "Estudio de Grabación";
		$producto=Producto::getByTipo($tipo);
		require_once('Views/Producto/showEstudio.php');
	}
	// ---------- Mostrar información de todos los equipos de iluminación ----------
	public function showIluminacion(){
		$tipo = "Iluminación";
		$producto=Producto::getByTipo($tipo);
		require_once('Views/Producto/showIluminacion.php');
	}
}