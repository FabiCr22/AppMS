<?php if (isset($_SESSION['mensaje'])) { //mensaje, cuando realiza alguna acción crud ?>
    <section style="padding-top: 165px; padding-bottom: 0px;">
        <div class="container" name="cuerpo">
            <div class="alert alert-success">
                <p><?php echo $_SESSION['mensaje']; ?></p>
            </div>
        </div>
    </section>
<?php }
unset($_SESSION['mensaje']); ?>
<section>
	<div class="login-card"><img src="assets/img/empresa/avatar_2x.png" class="profile-img-card">
		<p class="profile-name-card"> </p>
		<form class="form-signin" action="?controller=administrador&action=login" method="post">
			<span class="reauth-email"> </span>
			<label for="email">	Usuario:	</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico" required="true" autofocus="" autocomplete="off">
			<label for="pwd"> Contraseña:</label>
			<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Contraseña" required="true">
			<button type="submit" class="btn btn-primary btn-block btn-lg btn-signin"><i class="fa fa-sign-in"></i> Iniciar sesión</button>
		</form>
		<a href="?controller=administrador&action=register" class="forgot-password">¿No tienes una cuenta? <strong>Regístrate</strong><br></a>
	</div>
</section>