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
	<div class="login-card" style="width: 750px;max-width: 750px;">
		<span class="fa-stack fa-4x" style="margin-right: 271px;margin-left: 271px;">
			<i class="fa fa-circle fa-stack-2x text-primary"></i>
			<i class="fa fa-users fa-stack-1x fa-inverse"></i>
		</span>
		<p class="profile-name-card">SEMINARIO</p>
		<form class="form-signin"><span class="reauth-email"></span>
            <div class="form-row" style="width: 670px;">
            	<div class="col" style="width: 390px;">
                	<label>Imagen:</label>
                	<img src="<?php echo $seminario->getImagen_Sem(); ?>" style="width: 380px;height: 380px;"/>
                </div>
                <div class="col" style="width: 280px;">
                    <div class="table-responsive">
                        <table class="table table-sm">
                        	<tr><th>Título:</th></tr>
                        	<tr><td><?php echo $seminario->getTitulo_Sem(); ?></td></tr>
                        	<tr><th>Descripción:</th></tr>
                        	<tr><td><?php echo $seminario->getDescripcion_Sem(); ?></td></tr>
                        	<tr><th>Fecha:</th></tr>
                        	<tr><td><?php echo $seminario->getFecha_Sem(); ?></td></tr>
                        	<tr><th>Hora:</th></tr>
                        	<tr><td><?php echo $seminario->getHora_Sem(); ?></td></tr>
                        	<tr><th>Precio:</th></tr>
                        	<tr><td><?php echo $seminario->getPrecio_Sem(); ?></td></tr>
                        </table>
                    </div>
                </div>
                <div class="form-row" style="width: 670px;">
                    <div class="col">
                    	<button type="button" class="btn btn-success" onclick="location.href='?controller=seminario&action=showupdate&Id_Sem=<?php echo $seminario->getId_Sem();?>'"><i class="fa fa-edit"></i> Actualizar</button>
                    </div>
                    <div class="col">
                    	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#semdelete"><i class="fa fa-trash"></i> Eliminar</button>
                    </div>
                    <div class="col">
                    	<button type="button" class="btn btn-info" onclick="location.href='?controller=seminario&action=seminarioPdf&seminario=<?php echo $seminario->getId_Sem(); ?>'"><i class="fa fa-file-pdf-o"></i> Descargar Información PDF</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<div class="modal fade" id="semdelete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title">Confirmar Eliminación</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      	<p>¿Está seguro que desea eliminar este seminario?</p>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-danger" onclick="location.href='?controller=seminario&action=delete&Id_Sem=<?php echo $seminario->getId_Sem();?>'"><i class="fa fa-trash"></i> Eliminar</button>
      	<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->