<?php
if(!isset($_SESSION))
{
	session_start();
} ?>
<section>
	<div class="login-card">
		<img src="assets/img/empresa/avatar_2x.png" class="profile-img-card">
		<p class="profile-name-card">ACTUALIZACIÓN DE INFORMACIÓN</p>
		<form action='?controller=usuario&action=update' method='post' class="form-signin">
			<span class="reauth-email"> </span>
			<input type='hidden' name='Id_User' id="Id_User" value='<?php echo $usuario->getId_User(); ?>'>
			<label for="ciruc">Cédula / RUC:</label>
			<input type="number" class="form-control" name="CiRuc_User" id="CiRuc_User" required="true" step="1" readonly="false" value="<?php echo $usuario->getCiRuc_User(); ?>" autocomplete="off">
			<label for="email">Correo Electrónico:</label>
			<input type="email" class="form-control" id="Email_User" name="Email_User" required="true" readonly="false" value="<?php echo $usuario->getEmail_User(); ?>">
			<label for="nombre">Nombres y Apellidos:</label>
			<input type="text" class="form-control" id="Nombre_User" name="Nombre_User" required="true" value="<?php echo $usuario->getNombre_User(); ?>">
			<label for="telefono">Teléfono / Celular:</label>
			<input type="tel" class="form-control" id="Telefono_User" name="Telefono_User" required="true" value="<?php echo $usuario->getTelefono_User(); ?>">
			<label for="direccion">Dirección / Domicilio:</label>
			<input type="text" class="form-control" id="Direccion_User" name="Direccion_User" required="true" value="<?php echo $usuario->getDireccion_User(); ?>">
			<label for="descripcion">Descripción:</label>
			<textarea class="form-control" rows="5" id="Descripcion_User" name="Descripcion_User" ><?php echo $usuario->getDescripcion_User(); ?></textarea>
			<label for="pass">Contraseña:</label>
			<input type="password" class="form-control" id="Pass_User" name="Pass_User" required="true" value="<?php echo $usuario->getPass_User(); ?>">
			<div class="form-row" style="padding-top: 10px;">
				<div class="col">
					<button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-save"></i> Guardar información</button>
				</div>
				<div class="col">
					<button type="button" class="btn btn-danger btn-block btn-lg" onclick="location.href='?controller=usuario&action=welcome'"><i class="fa fa-close"></i> Cancelar</button>
				</div>
			</div>
		</form>
	</div>
</section>