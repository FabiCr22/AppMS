<?php
/**
	* Cabecera AppMS
	* Autor: Erick Cruz
	* Sitio Web: https://github.com/ecruz22
	* Copyright © Macro Show 2020
*/
if(!isset($_SESSION)){ 
	session_start();
}?>
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
	<div class="container">
		<a class="navbar-brand text-left" href="?controller=empresa&action=showInicio" style="width: 100px;font-size: 8px;height: 100px;background-image: url(&quot;assets/img/empresa/LogoTran.png&quot;);background-position: center;background-size: cover;"></a>
		<button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="nav navbar-nav ml-auto text-uppercase" style="font-size: 16px;">
				<!-- INICIO -->
				<li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="?controller=empresa&action=showInicio">inicio</a></li>
				<!-- EMPRESA -->
				<li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">empresa&nbsp;</a>
					<div class="dropdown-menu" role="menu">
						<a class="dropdown-item" role="presentation" href="?controller=empresa&action=showAntecedentes">antecedentes</a>
						<a class="dropdown-item" role="presentation" href="?controller=empresa&action=showMisionVision">misión y visión</a>
					</div>
				</li>
				<!-- PRODUCTO -->
				<li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">productos&nbsp;</a>
					<div class="dropdown-menu" role="menu">
						<a class="dropdown-item" role="presentation" href="?controller=producto&action=showall&Tipo_Prod=6">instrumentos musicales</a>
						<a class="dropdown-item" role="presentation" href="?controller=producto&action=showall&Tipo_Prod=1">accesorios musicales</a>
						<a class="dropdown-item" role="presentation" href="?controller=producto&action=showall&Tipo_Prod=2">equipos de amplificación</a>
						<a class="dropdown-item" role="presentation" href="?controller=producto&action=showall&Tipo_Prod=3">equipos de dj</a>
						<a class="dropdown-item" role="presentation" href="?controller=producto&action=showall&Tipo_Prod=4">estudio de grabacion</a>
						<a class="dropdown-item" role="presentation" href="?controller=producto&action=showall&Tipo_Prod=5">iluminación</a>
						<?php if (isset($_SESSION['usuario'])){ if ($_SESSION['usuario_tipo']==1){?>
							<a class="dropdown-item" role="presentation" href="?controller=producto&action=register">registrar</a>
							<a class="dropdown-item" role="presentation" href="?controller=producto&action=showsearchupdate">actualizar</a>
							<a class="dropdown-item" role="presentation" href="?controller=producto&action=showsearchdelete">eliminar</a>
						<?php } }?>
					</div>
				</li>
				<!-- SEMINARIO -->
				<li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">seminarios&nbsp;</a>
					<div class="dropdown-menu" role="menu">
						<a class="dropdown-item" role="presentation" href="?controller=seminario&action=showall&limite=1">seminarios</a>
						<?php if (isset($_SESSION['usuario'])){ if ($_SESSION['usuario_tipo']==1){?>
							<a class="dropdown-item" role="presentation" href="?controller=seminario&action=register">registrar</a>
							<a class="dropdown-item" role="presentation" href="?controller=seminario&action=showsearchupdate">actualizar</a>
							<a class="dropdown-item" role="presentation" href="?controller=seminario&action=showsearchdelete">eliminar</a>
						<?php } }?>
					</div>
				</li>
				<?php if (isset($_SESSION['usuario'])){ if ($_SESSION['usuario_tipo']==1){ ?>
					<!-- REPORTES -->
					<li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">usuarios&nbsp;</a>
						<div class="dropdown-menu" role="menu">
							<a class="dropdown-item" role="presentation" href="?controller=reserva&action=showsearchUser">seminarios de usuario</a>
							<a class="dropdown-item" role="presentation" href="?controller=reserva&action=showsearchSem">usuarios de seminario</a>
							<a class="dropdown-item" role="presentation" href="?controller=usuario&action=showall">listado de usuarios</a>
						</div>
					</li>
				<?php } elseif($_SESSION['usuario_tipo']==2){ ?>
					<!-- RESERVA -->
					<li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">reserva&nbsp;</a>
						<div class="dropdown-menu" role="menu">
							<a class="dropdown-item" role="presentation" href="?controller=reserva&action=showsearchregister">registrar</a>
							<a class="dropdown-item" role="presentation" href="?controller=reserva&action=showsearchdelete">eliminar</a>
							<a class="dropdown-item" role="presentation" href="?controller=usuario&action=showsearchusersesion">mis seminarios</a>
						</div>
					</li>
				<?php } }?>
				<!-- CONTACTOS -->
				<li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="?controller=empresa&action=showContactos">contactos</a></li>
				<!-- AYUDA -->
				<li class="nav-item" role="presentation"><a class="nav-link" href="?controller=empresa&action=showAyuda">ayuda</a></li>
			</ul>
			<ul class="nav navbar-nav"></ul>
			<ul class="nav navbar-nav text-uppercase">
				<?php if (isset($_SESSION['usuario'])){?>
					<li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fa fa-user-o"></i> cuenta</a>
						<div class="dropdown-menu" role="menu">
							<?php if ($_SESSION['usuario_tipo']==1){?>
								<a class="dropdown-item" role="presentation" href="?controller=administrador&action=showupdate&Id_Admin=<?php echo $_SESSION['usuario_id'] ?>"><i class="fa fa-cog"></i> configuración</a>
							<?php } elseif($_SESSION['usuario_tipo']==2){?>
								<a class="dropdown-item" role="presentation" href="?controller=usuario&action=showupdate&Id_User=<?php echo $_SESSION['usuario_id'] ?>"><i class="fa fa-cog"></i> configuración</a>
							<?php }?>
							<a class="dropdown-item" role="presentation" href="?controller=usuario&action=logout"><i class="fa fa-sign-out"></i> cerrar sesión</a>
						</div>
					</li>
				<?php } else{?>
					<!-- REGISTRO DE USUARIO -->
					<li class="nav-item" role="presentation"><a class="nav-link" href="?controller=usuario&action=register">REGISTRARSE</a></li>
				</ul>
				<!-- INICIO DE SESIÓN -->
				<a class="btn btn-primary" role="button" href="?controller=usuario&action=showLogin"><i class="fa fa-sign-in"></i> Acceder</a>
			<?php }?>
		</div>
	</div>
</nav>