<?php
/**
	* Layout AppMS
	* Autor: Erick Cruz
	* Sitio Web: https://github.com/ecruz22
	* Copyright © Macro Show 2020
*/
ob_start();
if(!isset($_SESSION)){
	session_start(); 
} ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>App - Macro Show</title>

	<!-- Librerias Boostrap -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!--DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>

    <!--<link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css"/>-->

    <!--datables estilo bootstrap 4 CSS
    <link rel="stylesheet"  type="text/css" href="assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">-->
	
	<!-- Custom Validador de cedula
	<script type="text/javascript" src="assets/custom/nick-test.js"></script>  -->

	<!-- Inclusion de la fuente Monserrat -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
	<!-- Inclusion de la fuente Kaushan -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
	<!-- Inclusion de la fuente Droid+Serif -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <!-- Inclusion de la fuente Roboto+Slab -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <!-- Inclusion del fondo font-awesome -->
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <!-- Inclusion del formulario de autenticación de Google -->
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
</head>
<body id="page-top">
	<header>
		<?php require_once('cabecera.php'); ?>
	</header>
	<?php require_once('routing.php'); ?>
	<footer>
		<?php include_once('footer.php'); ?>
	</footer>

	<!-- JQuery - JavaScript 
	<script src="assets/js/jquery.min.js"></script>-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

	<!-- Bootstrap - JavaScript -->
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- jQuery Agency: Menú ensanchado -->
    <script src="assets/js/agency.js"></script>
      
    <!-- datatables JS -->
    <!--<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <!--<script type="text/javascript" src="assets/datatables/datatables.min.js"></script>-->
    <!-- Incluir js DataTables
	<script type="text/javascript" src="assets/js/main.js"></script> -->

	<!-- Incluir js propio para select dinámicos -->
	<script type="text/javascript" src="assets/js/index.js"></script>
</body>
</html>
<?php
ob_end_flush();
?>