<?php
if(!isset($_SESSION))
{
	session_start();
} ?>
<section class="bg-light">
	<?php if (isset($_SESSION['mensaje'])) {	//cuando realiza alguna acción crud ?>
		<div class="container" name="cuerpo">
			<div class="alert alert-success">
				<strong><?php echo $_SESSION['mensaje']; ?></strong>
			</div>
		</div>
	<?php }
	unset($_SESSION['mensaje']);
	?><br>
	<div class="container">
		<div class="row">
			<button type="button" class="btn btn-info" onclick="location.href='?controller=usuario&action=usuariosPdf'"><i class="fa fa-file-pdf-o"></i> Usuarios registrados en el sistema</button>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive">
					<table id="dtbl" class="table table-striped table-bordered table-condensed" style="width:100%">
						<thead class="text-center">
							<tr>
								<th hidden="true">Id.</th>
								<th>CI / RUC</th>
								<th>Nombre</th>
								<th>Teléfono</th>
								<th>Correo Electrónico</th>
								<th hidden="true">Dirección</th>
                                <th hidden="true">Descripción</th>
                                <th></th>
                                <th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($lista_usuarios as $usuario) {?>
								<tr>
									<td hidden="true"><?php echo $usuario->getId_User();?></td>
									<td><?php echo $usuario->getCiRuc_User(); ?></td>
									<td><?php echo $usuario->getNombre_User();?></td>
									<td><?php echo $usuario->getTelefono_User();?></td>
									<td><?php echo $usuario->getEmail_User();?></td>
									<td hidden="true"><?php echo $usuario->getDireccion_User();?></td>
									<td hidden="true"><?php echo $usuario->getDescripcion_User();?></td>
									<td><button type="button" class="btn btn-success btnModalUser" data-toggle="modal" data-target="#modalDatos" data-id="<?php echo $usuario->getId_User(); ?>" data-ciruc="<?php echo $usuario->getCiRuc_User(); ?>" data-nombre="<?php echo $usuario->getNombre_User(); ?>" data-telefono="<?php echo $usuario->getTelefono_User(); ?>" data-email="<?php echo $usuario->getEmail_User(); ?>" data-direccion="<?php echo $usuario->getDireccion_User(); ?>" data-descripcion="<?php echo $usuario->getDescripcion_User(); ?>"><i class="fa fa-info-circle"></i> Más Info.</button></td>
									<td><button type="button" class="btn btn-info" onclick="location.href='?controller=usuario&action=usuarioPdf&Id_User=<?php echo $usuario->getId_User(); ?>'"><i class="fa fa-file-pdf-o"></i> Info. PDF</button></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<!--Modal -->
<div class="modal fade" id="modalDatos" tabindex="-1" role="dialog" aria-labelledby="modalDatos" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title">Información de Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
	    <div class="table-responsive">
	    	<table class="table table-sm table-borderless">
	    		<tr><th>CI/RUC:</th><td id="cirucModal"></td></tr>
	    		<tr><th>Nombre:</th><td id="nombreModal"></td></tr>
	    		<tr><th>Teléfono:</th><td id="telefonoModal"></td></tr>
	    		<tr><th>Correo Electrónico:</th><td id="emailModal"></td></tr>
	    		<tr><th>Dirección:</th><td id="direccionModal"></td></tr>
	    		<tr><th>Descripción:</th><td id="descripcionModal"></td></tr>
	    	</table>
	    </div>
      </div>
      <div class="modal-footer">
      	<!--<form action='?controller=usuario&action=usuarioPdf' method='GET'>
      		<input type="hidden" id="Id_User" name="Id_User">
      		<button type="submit" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Descargar Información PDF</button>
      		<button type="button" class="btn btn-info btnBorrar"><i class="fa fa-file-pdf-o"></i> Descargar Información PDF</button>
      	</form>-->
      	<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->