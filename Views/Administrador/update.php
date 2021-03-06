<?php
if(!isset($_SESSION))
{
	session_start();
} ?>
<section>
	<div class="login-card">
		<img src="assets/img/empresa/avatar_2x.png" class="profile-img-card">
		<p class="profile-name-card">ACTUALIZACIÓN DE INFORMACIÓN</p>
		<form action='?controller=administrador&action=update' method='post' class="form-signin">
			<span class="reauth-email"> </span>
			<input type='hidden' name='Id_Admin' id="Id_Admin" value='<?php echo $administrador->getId_Admin(); ?>'>
			<label for="ciruc">Cédula / RUC:</label>
			<input type="number" class="form-control" name="CI_Admin" id="CI_Admin" required="true" step="1" readonly="false" value="<?php echo $administrador->getCI_Admin(); ?>" autocomplete="off">
			<label for="email">Correo Electrónico:</label>
			<input type="email" class="form-control" id="Email_Admin" name="Email_Admin" required="true" readonly="false" value="<?php echo $administrador->getEmail_Admin(); ?>">
			<label for="nombre">Nombres y Apellidos:</label>
			<input type="text" class="form-control" id="Nombre_Admin" name="Nombre_Admin" required="true" value="<?php echo $administrador->getNombre_Admin(); ?>">
			<label for="pass">Contraseña:</label>
			<input type="password" class="form-control" id="Pass_Admin" name="Pass_Admin" required="true" value="<?php echo $administrador->getPass_Admin(); ?>">
			<div class="form-row" style="padding-top: 10px;">
				<div class="col">
					<button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-save"></i> Guardar información</button>
				</div>
				<div class="col">
					<button type="button" class="btn btn-danger btn-block btn-lg" onclick="location.href='?controller=administrador&action=welcome'"><i class="fa fa-close"></i> Cancelar</button>
				</div>
			</div>
		</form>
	</div>
</section>