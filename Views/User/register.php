<?php if(!isset($_SESSION))
{
	session_start();
} ?>
<section>
	<div class="login-card"><img src="assets/img/empresa/avatar_2x.png" class="profile-img-card">
		<p class="profile-name-card">REGISTRO</p>
		<form action='?controller=usuario&action=save' method='post' class="form-signin" id="eventForm">
			<span class="reauth-email"> </span>
			<label for="ciruc">Cédula / RUC:</label>
			<input type="number" class="form-control" id="CiRuc_User" name="CiRuc_User" placeholder="Cédula / RUC" required="true" maxlength="13" autocomplete="off">
			<label for="nombre">Nombres y Apellidos:</label>
			<input type="text" class="form-control" id="Nombre_User" name="Nombre_User" placeholder="Nombres y Apellidos" required="true" autocomplete="off">
			<label for="telefono">Teléfono / Celular:</label>
			<input type="tel" class="form-control" id="Telefono_User" name="Telefono_User" placeholder="Teléfono / Celular" required="true" autocomplete="off">
			<label for="email">Correo Electrónico:</label>
			<input type="email" class="form-control" id="Email_User" name="Email_User" placeholder="Correo Electrónico" required="true" autocomplete="off">
			<label for="direccion">Dirección / Domicilio:</label>
			<input type="text" class="form-control" id="Direccion_User" name="Direccion_User" placeholder="Dirección / Domicilio" required="true" autocomplete="off">
			<label for="descripcion">Descripción:</label>
			<textarea class="form-control" id="Descripcion_User" name="Descripcion_User" placeholder="Descripción (Información adicional)" style="margin-bottom: 10px;"></textarea>
			<label for="pass">Contraseña:</label>
			<input type="password" class="form-control" id="Pass_User" name="Pass_User" placeholder="Contraseña" required="true">
			<button type="submit" class="btn btn-primary btn-block btn-lg btn-signin"><i class="fa fa-pencil"></i> Registrarse</button>
		</form>
		<a href="?controller=empresa&action=showTerminos" class="forgot-password">Al registrarte, aceptas nuestros <strong>Términos y Condiciones</strong>.<br></a>
	</div>
</section>