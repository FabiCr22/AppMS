<?php
/**
	* Controlador ReservaController
	* Autor: Erick Cruz
	* Sitio Web: https://github.com/ecruz22
	* Copyright © Macro Show 2020
*/
if(!isset($_SESSION))
{
	session_start();
}
class ReservaController
{
	// ---------- Constructor ----------
	function __construct(){}
	// ---------- Mostrar mensaje de error en el acceso a vistas de reserva ----------
	public function error(){
		require_once('Views/Reserva/error.php');
	}
	/* ----------------------------------------
	----------- REGISTRO DE RESERVA -----------
	---------------------------------------- */
	// ---------- Mostrar listado con buscador para registrarse en un seminario ----------
	public function showsearchregister(){
		$seminarios=Seminario::all();
		$lista_seminarios=$seminarios;
		require_once('Views/Reserva/showregister.php');
	}
	// ---------- Buscar y obtener seminarios por Id, Título, Descrpción, Precio para registrarse ----------
	public function searchregister(){
		if (!empty($_POST['Id_Sem'])) {
			$buscador = Reserva::getById($_POST['Id_Sem']);
			$id = $buscador->getId_Sem();
			if (isset($id)) {
				$lista_seminarios[]=Seminario::getById($_POST['Id_Sem']);
				$_SESSION['mensaje']='Existe este seminario en el sistema';
				require_once('Views/Seminario/showupdate.php');
			}else{
				$_SESSION['mensaje']='No existe este seminario en el sistema';
				$this->showsearchregister();
			}
		}else{
			$this->showsearchregister();
		}
	}
	// ---------- Guardar reserva en DB ----------
	public function save(){
		$reserva= new Reserva($_SESSION['usuario_alias'], $_POST['Id_Sem']);
		Reserva::save($reserva);
		$_SESSION['mensaje']='Registro guardado satisfactoriamente';
		$this->show();
	}
	// ---------- Mostrar información de una reserva determinada ----------
	public function show(){
		$reservas=Reserva::all();
		$lista_reservas="";
		$registros=2; // debe ser siempre par
		if (count($reservas)>$registros) { // solo página si el número de registros mostrados es menor que los registros de la bd
			if ((count($reservas)%$registros)==0) {
				$botones=count($reservas)/$registros;
			}else{//si el total de registros de la bd es impar
				$botones=(count($reservas)/$registros+1);
			}
			
			if (!isset($_GET['boton'])) {//la primera vez carga los registros del botón 1
				$res=$registros*1;
				for ($i=0; $i < $res ; $i++) { 
					$lista_reservas[]=$reservas[$i];
				}
			}else{
				//multiplica el número de botón por el número de registros mostrados
				$res=$registros*$_GET['boton'];
				//resta el valor mayor de registros a mostrar menos el número de registros mostrados
				for ($i=$res-$registros; $i < $res; $i++) { 
					if ($i<count($reservas)) {
						$lista_reservas[]=$reservas[$i];
					}				
				}
			}
		}else{// si no se presenta el paginador
			$botones=0;
			$lista_reservas=$reservas;
		}

		require_once('Views/Reserva/show.php');
	}
	/* ----------------------------------------
	---------- ELIMINACIÓN DE RESERVA ---------
	---------------------------------------- */
	// ---------- Mostrar listado con buscador para eliminar reserva ----------
	public function showsearchdelete(){
		$seminarios=Seminario::all();
		$lista_seminarios=$seminarios;
		require_once('Views/Reserva/showdelete.php');
		/*$lista_seminarios="";
		$registros=2;
		if (count($seminarios)>$registros) {
			if ((count($seminarios)%$registros)==0) {
				$botones=count($seminarios)/$registros;
			}else{
				$botones=(count($seminarios)/$registros+1);
			}
			if (!isset($_GET['boton'])) {
				$res=$registros*1;
				for ($i=0; $i < $res ; $i++) { 
					$lista_seminarios=$seminarios[$i];
				}
			}else{
				$res=$registros*$_GET['boton'];
				for ($i=$res-$registros; $i < $res; $i++) { 
					if ($i<count($seminarios)) {
						$lista_seminarios[]=$seminarios[$i];
					}				
				}
			}
		}else{
			$botones=0;
			$lista_seminarios=$seminarios;
		}
		require_once('Views/Seminario/showdelete.php');*/
	}
	// ---------- Buscar y obtener seminarios por Id, Título, Descrpción, Precio para eliminar el registro ----------
	public function searchdelete(){
		if (!empty($_POST['Id_Sem'])) {
			$buscador = Reserva::getById($_POST['Id_Sem']);
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
	// ---------- Eliminar reserva en DB ----------
	public function delete(){
		Reserva::delete($_GET['Id_Sem']);
		$_SESSION['mensaje']='Su reserva fue eliminada satisfactoriamente';
		$this->showsearchdelete();
		//header('Location: index.php');
	}
	/* ----------------------------------------
	- VISUALIZACIÓN DE RESERVAS DE UN USUARIO -
	---------------------------------------- */
	// ---------- Mostrar información de todos los usuarios registrados en seminarios ----------
	public function showsearchUser(){
		$reserva=Reserva::all();
		require_once('Views/Reserva/showallUser.php');
	}
	// ---------- Buscar y obtener seminarios de un usuario determinado por Id, CI/RUC, Nombre, Email, Descripción ----------
	public function searchUser(){
		//obtener reservas por cedula
		if (!empty($_POST['CiRuc_User'])) {
			$usuario=Usuario::getCiRuc_User($_POST['CiRuc_User']);
			$lista_reservas=Reserva::getCiRuc_User($usuario->getCiRuc_User());
			$botones=0;
			require_once('Views/Reserva/show.php');
		}else{
			$this->show();
		}
	}
	// ---------- Mostrar información de una reserva de un usuario determinado en PDF ----------
	public function reservaUserPdf(){
		header('Location: Controllers/RecetaPdf.php?fecha='.$_GET['fecha'].'&paciente='.$_GET['paciente']);	
	}
	// ---------- Mostrar información de todas las reservas de un usuario determinado en PDF ----------
	public function reservasUserPdf(){
		header('Location: Controllers/RecetaPdf.php?fecha='.$_GET['fecha'].'&paciente='.$_GET['paciente']);	
	}
	/* ------------------------------------------------------
	- VISUALIZACIÓN DE USUARIOS REGISTRADOS EN UN SEMINARIO -
	------------------------------------------------------ */
	// ---------- Mostrar información de todos los seminarios con sus usuarios registrados ----------
	public function showsearchSem(){
		$reserva=Reserva::all();
		require_once('Views/Reserva/showallSem.php');
		/*if (!empty($_POST['Id_Sem'])) {
			$lista_seminarios[]=Seminario::getById($_POST['Id_Sem']);
			$botones=0;
			require_once('Views/Reserva/showallSem.php');
		}else{
			$this->show();
		}*/
	}
	// ---------- Buscar y obtener usuarios registrados en un seminario determinado por Id, Título, Descripción, Precio ----------
	public function searchSem(){
		//obtener reservas por id del semnario
		if (!empty($_POST['Id_Sem'])) {
			$seminario=Seminario::getId_Sem($_POST['Id_Sem']);
			$lista_reservas=Reserva::getId_Sem($seminario->getId_Sem());
			$botones=0;
			require_once('Views/Reserva/show.php');
		}else{
			$this->show();
		}
	}
	// ---------- Mostrar información de todos los usuarios registrados en un seminario determinado en PDF ----------
	public function userSemPdf(){
		header('Location: Controllers/RecetaPdf.php?fecha='.$_GET['fecha'].'&paciente='.$_GET['paciente']);	
	}
}