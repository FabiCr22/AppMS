<?php
/**
	* Controlador EmpresaController
	* Autor: Erick Cruz
	* Sitio Web: https://github.com/ecruz22
	* Copyright © Macro Show 2020
*/
if(!isset($_SESSION))
{
	session_start();
}
class EmpresaController
{
	// ---------- Constructor ----------
	function __construct(){}
	//mostrar página de inicio
	public function showInicio(){
		require_once('Views/Empresa/inicio.php');
	}
	//mostrar página de antecedentes de la empresa
	public function showAntecedentes(){
		require_once('Views/Empresa/antecedentes.php');
	}
	//mostrar página de misión y visión de la empresa
	public function showMisionVision(){
		require_once('Views/Empresa/misionvision.php');
	}
	//mostrar página de contactos
	public function showContactos(){
		require_once('Views/Empresa/contactos.php');
	}
	//mostrar página de ayuda
	public function showAyuda(){
		require_once('Views/Empresa/ayuda.php');
	}
	//mostrar página de politica de privacidad
	public function showPolitica(){
		require_once('Views/Empresa/politica.php');
	}
	//mostrar página de terminos y condiciones
	public function showTerminos(){
		require_once('Views/Empresa/terminos.php');
	}
}