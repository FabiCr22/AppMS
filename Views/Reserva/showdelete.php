<?php
if(!isset($_SESSION))
{
	session_start();
} ?>
<section class="bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2 class="text-uppercase section-heading">Listado de Seminarios Registrados</h2>
		        <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
		            <div class="container">
		            	<a href="#" class="navbar-brand">Seminarios</a>
		            	<button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
		                <div class="collapse navbar-collapse" id="navcol-1">
		                    <form target="_self" class="form-inline mr-auto" action="?controller=reserva&action=searchdelete" method="post">
		                        <div class="form-group">
		                        	<label for="search-field"></label>
		                        	<input type="search" name="Id_Sem" placeholder="Seminario" class="form-control search-field" id="search-field" />
		                        	<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Buscar</button>
		                        </div>
		                    </form>
		                </div>
		            </div>
		        </nav>
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
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id.</th>
						<th>Título</th>
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
							<td><?php echo $seminario->getFecha_Sem(); ?></td>
							<td><?php echo $seminario->getHora_Sem(); ?></td>
							<td><?php echo $seminario->getPrecio_Sem(); ?></td>
							<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#resdelete"><i class="fa fa-trash"></i> Eliminar</button></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<hr />
			<nav aria-label="Page navigation example">
			  <ul class="pagination pagination-circle pg-blue justify-content-center">
			  	<li class='paginador-current btn btn-primary'>Página $pagina de $last</li>
			    <li class="page-item disabled">
			    	<a class="page-link" aria-label="First">
			    		<span aria-hidden="true"><i class="fa fa-step-backward"></i></span>
			    		<span class="sr-only">First</span>
			    	</a>
			    </li>
			    <li class="page-item disabled">
			      <a class="page-link" aria-label="Previous">
			        <span aria-hidden="true"><i class="fa fa-backward"></i></span>
			        <span class="sr-only">Previous</span>
			      </a>
			    </li>
			    <li class="page-item active"><a class="page-link">1</a></li>
			    <li class="page-item"><a class="page-link">2</a></li>
			    <li class="page-item"><a class="page-link">3</a></li>
			    <li class="page-item"><a class="page-link">4</a></li>
			    <li class="page-item"><a class="page-link">5</a></li>
			    <li class="page-item">
			      <a class="page-link" aria-label="Next">
			        <span aria-hidden="true"><i class="fa fa-forward"></i></span>
			        <span class="sr-only">Next</span>
			      </a>
			    </li>
			    <li class="page-item">
			    	<a class="page-link" aria-label="Last">
			    		<span aria-hidden="true"><i class="fa fa-step-forward"></i></span>
			    		<span class="sr-only">Last</span>
			    	</a>
			    </li>
			  </ul>
			</nav>
			<ul class ="pagination">
				<!-- <?php for ($i=1;$i<=$botones;$i++){ ?>
					<li><a href="?controller=producto&action=show&boton=<?php echo $i ?>"><?php echo $i; ?></a></li>
				<?php }?> -->
			</ul>
		</div>
	</div>
</section>
<div class="modal fade" id="resdelete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title">Confirmar Eliminación</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      	<p>¿Está seguro que desea eliminar su registro en este seminario?</p>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-danger" onclick="location.href='?controller=reserva&action=delete&Id_Sem=<?php echo $seminario->getId_Sem();?>'"><i class="fa fa-trash"></i> Eliminar</button>
      	<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->