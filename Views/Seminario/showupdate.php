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
							<td><?php echo $seminario->getFecha_Sem(); ?></td>
							<td><?php echo $seminario->getHora_Sem(); ?></td>
							<td><?php echo $seminario->getPrecio_Sem(); ?></td>
							<td><button type="button" class="btn btn-success" onclick="location.href='?controller=seminario&action=showupdate&Id_Sem=<?php echo $seminario->getId_Sem();?>'"><i class="fa fa-edit"></i> Actualizar</button></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>