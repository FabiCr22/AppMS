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
							<td><?php
							$t = $producto->getTipo_Prod();
							$tipo_producto=Tipo_Producto::getByIdTipoProd($t);
							echo $tipo_producto->getNombre_TipoProd(); ?></td>
							<td><?php
							$f = $producto->getFamilia_Prod();
							$familia_producto=Familia_Producto::getByIdFamiliaProd($f);
							echo $familia_producto->getNombre_FamiliaProd(); ?></td>
							<td><?php echo $producto->getPrecio_Prod(); ?></td>
							<td><button type="button" class="btn btn-success" onclick="location.href='?controller=producto&action=showupdate&Id_Prod=<?php echo $producto->getId_Prod();?>&Tipo_Prod=<?php echo $producto->getTipo_Prod();?>&Familia_Prod=<?php echo $producto->getFamilia_Prod();?>'"><i class="fa fa-edit"></i> Actualizar</button></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>