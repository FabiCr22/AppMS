<?php
/**
	* Controlador SeminarioController
	* Autor: Erick Cruz
	* Sitio Web: https://github.com/ecruz22
	* Copyright © Macro Show 2020
*/
if(!isset($_SESSION))
{
	session_start();
} 
class SeminarioController
{
	// ---------- Constructor ----------
	function __construct(){}
	// ---------- Mostrar mensaje de error en el acceso a vistas de seminario ----------
	public function error(){
		require_once('Views/Seminario/error.php');
	}
	/* ----------------------------------------
	----------- INGRESO DE SEMINARIO ----------
	---------------------------------------- */
	// ---------- Mostrar formulario para ingresar seminario ----------
	public function register(){
		require_once('Views/Seminario/register.php');
	}
	// ---------- Guardar seminario en DB ----------
	public function save(){
		if ($_FILES["Imagen_Sem"]["error"] > 0){ }else{
			$nom_archivo=$_FILES['Imagen_Sem']['name'];	//nombre de la imagen
			$ruta = "images_upload/seminarios/" . $nom_archivo;	//ruta donde se almacena la nueva imagen
			$archivo = $_FILES['Imagen_Sem']['tmp_name'];	//ruta de donde proviene la imagen a subir
			$subir=move_uploaded_file($archivo, $ruta); //se sube el archivo
			$TituloSem = $_POST['Titulo_Sem'];
			$seminario= new Seminario(null,$_POST['Titulo_Sem'],$_POST['Descripcion_Sem'],$ruta,$_POST['Fecha_Sem'],$_POST['Hora_Sem'],$_POST['Precio_Sem'],$_SESSION['usuario_alias']);
			Seminario::save($seminario);
			$_SESSION['mensaje']='Seminario guardado satisfactoriamente';
			$this->show($TituloSem);
		}
	}
	// ---------- Mostrar información de un seminario determinado ----------
	public function show($TituloSem){
		$seminario=Seminario::getById($TituloSem);
		require_once('Views/Seminario/show.php');
	}
	/* ----------------------------------------
	-------- ACTUALIZACIÓN DE SEMINARIO -------
	---------------------------------------- */
	// ---------- Mostrar listado con buscador para actualizar seminario ----------
	public function showsearchupdate(){
		$seminarios=Seminario::all();
		$lista_seminarios=$seminarios;
		require_once('Views/Seminario/showupdate.php');
	}
	// ---------- Buscar y obtener seminarios por Id para modificarlos ----------
	public function searchupdate(){
		if (!empty($_POST['Id_Sem'])) {
			$buscador = Seminario::getById($_POST['Id_Sem']);
			$id = $buscador->getId_Sem();
			if (isset($id)) {
				$lista_seminarios[]=Seminario::getById($_POST['Id_Sem']);
				$_SESSION['mensaje']='Existe este seminario en el sistema';
				require_once('Views/Seminario/showupdate.php');
			}else{
				$_SESSION['mensaje']='No existe este seminario en el sistema';
				$this->showsearchupdate();
			}
		}else{
			$this->showsearchupdate();
		}
	}
	// ---------- Mostrar formulario para actualizar seminario ----------
	public function showupdate(){
		$Id_Sem=$_GET['Id_Sem'];
		$seminario=Seminario::getById($Id_Sem);
		require_once('Views/Seminario/update.php');
	}
	// ---------- Modificar seminario en DB ----------
	public function update(){
		$ruta = $_POST['Imagen_Seminario'];
		if(isset($_FILES['Imagen_Sem']['tmp_name'])){
			if ($_FILES["Imagen_Sem"]["error"] > 0){ }else{
				$archivo = $_FILES['Imagen_Sem']['tmp_name'];	//ruta de donde proviene la imagen a subir
				$nom_archivo=$_FILES['Imagen_Sem']['name'];	//nombre de la imagen
				$ruta = "images_upload/seminarios/" . $nom_archivo;	//ruta donde se almacena la nueva imagen
				$subir=move_uploaded_file($archivo, $ruta); //se sube el archivo

				$imagen_old = Seminario::getById($_POST['Id_Sem']);
				$deleteimg = $imagen_old->getImagen_Sem();
				if (isset($deleteimg)) {
					if (!unlink($deleteimg)){
						echo "No se pudo borrar la imagen: ".$deleteimg;
					}
				}
			}
		}

		$seminario= new Seminario($_POST['Id_Sem'],$_POST['Titulo_Sem'],$_POST['Descripcion_Sem'],$ruta,$_POST['Fecha_Sem'],$_POST['Hora_Sem'],$_POST['Precio_Sem'],$_SESSION['usuario_alias']);
		Seminario::update($seminario);
		$_SESSION['mensaje']='Seminario actualizado satisfactoriamente';
		$this->show($_POST['Id_Sem']);
	}
	/* ----------------------------------------
	--------- ELIMINACIÓN DE SEMINARIO --------
	---------------------------------------- */
	// ---------- Mostrar listado con buscador para eliminar seminario ----------
	public function showsearchdelete(){
		$seminarios=Seminario::all();
		$lista_seminarios=$seminarios;
		require_once('Views/Seminario/showdelete.php');
	}
	// ---------- Buscar y obtener seminarios por Id para eliminarlos ----------
	public function searchdelete(){
		if (!empty($_POST['Id_Sem'])) {
			$buscador = Seminario::getById($_POST['Id_Sem']);
			$id = $buscador->getId_Sem();
			if (isset($id)) {
				$lista_seminarios[]=Seminario::getById($_POST['Id_Sem']);
				$_SESSION['mensaje']='Existe este seminario en el sistema';
				require_once('Views/Seminario/showdelete.php');
			}else{
				$_SESSION['mensaje']='No existe este seminario en el sistema';
				$this->showsearchdelete();
			}
		}else{
			$this->showsearchdelete();
		}
	}
	// ---------- Eliminar seminario en DB ----------
	public function delete(){
		if(isset($_FILES['Imagen_Sem']['tmp_name'])){
			if ($_FILES["Imagen_Sem"]["error"] > 0){ }else{
				$imagen_old = Seminario::getById($_POST['Id_Sem']);
				$deleteimg = $imagen_old->getImagen_Sem();
				if (isset($deleteimg)) {
					if (!unlink($deleteimg)){
						echo "No se pudo borrar la imagen: ".$deleteimg;
					}
				}
			}
		}
		Seminario::delete($_GET['Id_Sem']);
		$_SESSION['mensaje']='Seminario eliminado satisfactoriamente';
		$this->showsearchdelete();
	}
	/* ----------------------------------------
	-------- VISUALIZACIÓN DE SEMINARIOS ------
	---------------------------------------- */
	// ---------- Mostrar información de todos los seminarios ----------
	public function showall(){
		$seminarios=Seminario::all();
		$lista_seminarios=$seminarios;
		//$mysqli = $this->getConn();
		//$sql=("SELECT Titulo_Sem, Imagen_Sem, Fecha_Sem, Hora_Sem, Precio_Sem FROM seminario ORDER BY Fecha_Sem");
		//$Paginacion= new Paginacion($sql);
		require_once('Views/Seminario/showall.php');
	}
	// ---------- Buscar y obtener seminario por Id, Título, Descrpción, Precio ----------
	public function search(){
		if (!empty($_POST['Id_Sem'])) {
			$lista_seminarios[]=Seminario::getById($_POST['Id_Sem']);
			$botones=0;
			require_once('Views/Seminario/showall.php');
		}else{
			$this->show();
		}
	}
	// ---------- Mostrar información de un seminario determinado en PDF ----------
	public function seminarioPdf(){
		header('Location: Controllers/SeminarioPdf.php?seminario='.$_GET['seminario']);
	}
	// ---------- Mostrar información de los seminarios en PDF ----------
	public function seminariosPdf(){
		header('Location: Controllers/SeminarioPdf.php?seminario='.$_GET['seminario']);
	}
}