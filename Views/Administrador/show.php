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
		<p class="profile-name-card">ADMINISTRADOR</p>
		<form class="form-signin">
			<span class="reauth-email"></span>
            <div class="form-row">
                <div class="col">
					<div class="table-responsive">
						<table class="table table-sm">
							<tr><th>Cédula:</th></tr>
                        	<tr><td><?php echo $administrador->getCI_Admin(); ?></td></tr>
                        	<tr><th>Nombres y Apellidos:</th></tr>
                        	<tr><td><?php echo $administrador->getNombre_Admin();?></td></tr>
                        	<tr><th>Correo Electrónico:</th></tr>
                        	<tr><td><?php echo $administrador->getEmail_Admin();?></td></tr>
						</table>
					</div>
				</div>
				<div class="form-row">
                    <div class="col">
                    	<button type="button" class="btn btn-success" onclick="location.href='?controller=administrador&action=showupdate&Id_Admin=<?php echo $administrador->getId_Admin();?>'"><i class="fa fa-edit"></i> Actualizar</button>
                    </div>
                    <div class="col">
                    	<button type="button" class="btn btn-info" onclick="location.href='?controller=administrador&action=administradorPdf&administrador=<?php echo $administrador->getId_Admin(); ?>'"><i class="fa fa-file-pdf-o"></i> Descargar Info. PDF</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>