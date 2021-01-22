<?php
if(!isset($_SESSION))
{
	session_start();
} ?>
<section class="bg-light">
	<div class="container">
		<div class="row">
		    <div class="col-lg-12 text-center">
		        <h2 class="text-uppercase section-heading">Listado de Seminarios</h2>
		    </div>
		</div>
		<?php if (isset($_SESSION['mensaje'])) {	//cuando realiza alguna acción crud ?>
			<div class="container" name="cuerpo">
				<div class="alert alert-success">
					<strong><?php echo $_SESSION['mensaje']; ?></strong>
				</div>
			</div>
		<?php }
		unset($_SESSION['mensaje']);
		?><br>
		<div class="table-responsive">
			<table id="dtbl" class="table table-striped table-bordered table-condensed" style="width: 100%">
				<thead class="text-center">
					<tr>
						<th>Id.</th>
						<th>Título</th>
						<th hidden="true">Descripción</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Costo</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($lista_seminarios as $seminario) {?>
						<tr>
							<td><?php echo $seminario->getId_Sem(); ?></td>
							<td><?php echo $seminario->getTitulo_Sem(); ?></td>
							<td hidden="true"><?php echo $seminario->getDescripcion_Sem(); ?></td>
							<td><?php echo $seminario->getFecha_Sem();?></td>
							<td><?php echo $seminario->getHora_Sem(); ?></td>
							<td><?php echo $seminario->getPrecio_Sem(); ?></td>
							<td><button class="btn btn-danger btnElimSem" data-id="<?php echo $seminario->getId_Sem(); ?>" data-toggle="modal" data-target="#semdelete"><i class="fa fa-trash"></i> Eliminar</button></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<div class="modal fade" id="semdelete" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
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
      	<button type="submit" class="btn btn-danger eliminars"><i class="fa fa-trash"></i> Eliminar</button>
      	<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->