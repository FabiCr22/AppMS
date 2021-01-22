<?php
if(!isset($_SESSION))
{
	session_start();
} ?>
<section class="bg-light">
	<div class="container">
		<div class="row">
		    <div class="col-lg-12 text-center">
		        <h2 class="text-uppercase section-heading">Listado de Productos</h2>
		    </div>
		</div>
		<?php if (isset($_SESSION['mensaje'])) { //mensaje, cuando realiza alguna acción crud ?>
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
						<th>Nombre</th>
						<th hidden="true">Descripción</th>
						<th>Tipo</th>
						<th>Familia</th>
						<th>Precio</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($lista_productos as $producto) {?>
						<tr>
							<td><?php echo $producto->getId_Prod(); ?></td>
							<td><?php echo $producto->getNombre_Prod(); ?></td>
							<td hidden="true"><?php echo $producto->getDescripcion_Prod(); ?></td>
							<td><?php $tipo_producto=Tipo_Producto::getByIdTipoProd($producto->getTipo_Prod()); echo $tipo_producto->getNombre_TipoProd();?></td>
							<td><?php $familia_producto=Familia_Producto::getByIdFamiliaProd($producto->getFamilia_Prod()); echo $familia_producto->getNombre_FamiliaProd(); ?></td>
							<td><?php echo $producto->getPrecio_Prod(); ?></td>
							<td><button class="btn btn-danger btnElimProd" data-id="<?php echo $producto->getId_Prod(); ?>" data-toggle="modal" data-target="#proddelete"><i class="fa fa-trash"></i> Eliminar</button></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<div class="modal fade" id="proddelete" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title">Confirmar Eliminación</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      	<p>¿Está seguro que desea eliminar este producto?</p>
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-danger eliminarp"><i class="fa fa-trash"></i> Eliminar</button>
      	<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->