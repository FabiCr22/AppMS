<section>
	<div class="login-card"><img src="assets/img/empresa/avatar_2x.png" class="profile-img-card">
		<p class="profile-name-card">REGISTRO</p>
		<form action='?controller=administrador&action=save' method='post' class="form-signin">
			<span class="reauth-email"> </span>
			<label for="ci">Cédula:</label>
			<input type="number" class="form-control" id="CI_Admin" name="CI_Admin" placeholder="Cédula" autofocus="" required="true" step="1" min="0" max="9999999999" maxlength="10" autocomplete="off">
			<label for="nombre">Nombres y Apellidos:</label>
			<input type="text" class="form-control" id="Nombre_Admin" name="Nombre_Admin" placeholder="Nombres y Apellidos" required="true" autocomplete="off">
			<label for="email">Correo Electrónico:</label>
			<input type="email" class="form-control" id="Email_Admin" name="Email_Admin" placeholder="Correo Electrónico" required="true" autocomplete="off">
			<label for="pass">Contraseña:</label>
			<input type="password" class="form-control" id="Pass_Admin" name="Pass_Admin" placeholder="Contraseña" required="true">
			<button type="submit" class="btn btn-primary btn-block btn-lg btn-signin"><i class="fa fa-pencil"></i> Registrarse</button>
		</form>
		<a href="?controller=empresa&action=showTerminos" class="forgot-password">Al registrarte, aceptas nuestros <strong>Términos y Condiciones</strong>.<br></a>
	</div>
</section>