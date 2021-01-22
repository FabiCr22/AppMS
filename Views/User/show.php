<?php
if(!isset($_SESSION))
{
	session_start();
} ?>
<section>
	<?php if (isset($_SESSION['mensaje'])) {	//cuando realiza alguna acción crud ?>
		<div class="container" name="cuerpo">
			<div class="alert alert-success">
				<strong><?php echo $_SESSION['mensaje']; ?></strong>
			</div>
		</div>
	<?php }
	unset($_SESSION['mensaje']);
	?>
	<div class="login-card">
		<img src="assets/img/empresa/avatar_2x.png" class="profile-img-card">
		<p class="profile-name-card">USUARIO</p>
		<form class="form-signin">
			<span class="reauth-email"></span>
            <div class="form-row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-sm">
                        	<tr><th>Cédula / RUC:</th></tr>
                        	<tr><td><?php echo $usuario->getCiRuc_User(); ?></td></tr>
                        	<tr><th>Nombres y Apellidos:</th></tr>
                        	<tr><td><?php echo $usuario->getNombre_User();?></td></tr>
                        	<tr><th>Teléfono / Celular:</th></tr>
                        	<tr><td><?php echo $usuario->getTelefono_User();?></td></tr>
                        	<tr><th>Correo Electrónico:</th></tr>
                        	<tr><td><?php echo $usuario->getEmail_User();?></td></tr>
                        	<tr><th>Dirección / Domicilio:</th></tr>
                        	<tr><td><?php echo $usuario->getDireccion_User();?></td></tr>
                        	<tr><th>Descripción:</th></tr>
                        	<tr><td><?php echo $usuario->getDescripcion_User();?></td></tr>
                        </table>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                    	<button type="button" class="btn btn-success" onclick="location.href='?controller=usuario&action=showupdate&Id_User=<?php echo $usuario->getId_User();?>'"><i class="fa fa-edit"></i> Actualizar</button>
                    </div>
                    <div class="col">
                    	<button type="button" class="btn btn-info" onclick="location.href='?controller=usuario&action=usuarioPdf&usuario=<?php echo $usuario->getId_User(); ?>'"><i class="fa fa-file-pdf-o"></i> Descargar Info. PDF</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>