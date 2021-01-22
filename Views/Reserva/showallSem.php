<?php
if(!isset($_SESSION))
{
	session_start();
} ?>
<section class="bg-light">
	<div class="container">
		<div class="row">
		    <div class="col-lg-12 text-center">
		        <h2 class="text-uppercase section-heading">Participantes de un Seminario</h2>
		        <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
		            <div class="container">
		            	<a href="#" class="navbar-brand">Seminarios</a>
		            	<button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
		                <div class="collapse navbar-collapse" id="navcol-1">
		                    <form target="_self" class="form-inline mr-auto" action="?controller=reserva&action=searchSem" method="post">
		                        <div class="form-group">
		                        	<label for="search-field"></label>
		                        	<input type="search" name="searchSem" placeholder="Seminario" class="form-control search-field" id="search-field" />
		                        	<button class="btn btn-primary" type="button"><i class="fa fa-search"></i> Buscar</button>
		                        </div>
		                    </form>
		                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#users"><i class="fa fa-info-circle"></i> Info. Participantes Seminario</button>
		                    <button type="button" class="btn btn-info" onclick="location.href='?controller=reserva&action=userSemPdf'"><i class="fa fa-file-pdf-o"></i> Participantes Seminario PDF</button>
		                </div>
		            </div>
		        </nav>
		    </div>
		</div>

		<!-- <h2>Listado de Usuarios</h2>
		<nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
			<form class="form-inline" action="?controller=usuario&action=search" method="post">
				<div class="container">
					<a href="#" class="navbar-brand" style="font-size: 18px;">Usuarios</a>
					<button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toogle Navegation</span><span class="navbar-toggler-icon"></span></button>
					<div class="collapse navbar-collapse show" id="navcol-1">
						<form target="_self" class="form-inline mr-auto" action="?controller=usuario&action=search" method="post">
							<div class="form-group">
								<label for="search-field"></label>
								<input type="search" name="search" placeholder="Usuario" class="form-control search-field" id="search-field" />
								<button class="btn btn-primary" type="button"><i class="fa fa-search"></i> Buscar</button>
							</div>
						</form>
						<button type="button" class="btn btn-info" onclick="location.href='?controller=usuario&action=usuariosPdf'"><span class="glyphicon glyphicon-cloud-download"></span> Info. Usuarios PDF</button>
					</div>
				</div>
			</form>
		</nav> -->

		
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
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id.</th>
						<th>Seminario</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>CI/RUC Usuario</th>
						<th>Nombre Usuario</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody id="users">
					<?php foreach ($lista_reservas as $reserva) {?>
						<tr>
							<td><?php echo $reserva->getId_Sem(); ?></td>
							<td><?php echo $reserva->getTitulo_Sem();?></td>
							<td><?php echo $reserva->getFecha_Sem();?></td>
							<td><?php echo $reserva->getHora_Sem();?></td>
							<td><?php echo $reserva->getCiRuc_User(); ?></td>
							<td><?php echo $reserva->getNombre_User();?></td>
							<td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#user"><i class="fa fa-info-circle"></i> Más Info.</button></td>
							<td><button type="button" class="btn btn-info" onclick="location.href='?controller=reserva&action=reservaUserPdf&reserva=<?php echo $reserva->getId_User(); ?>'"><i class="fa fa-file-pdf-o"></i> Info. PDF</button></td>
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
<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title">Registro de Usuario en Seminario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      	<form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <h5>Información de Usuario</h5>
	      	<div class="table-responsive">
	            <table class="table table-sm table-borderless">
	            	<tr><th>CI / RUC:</th><td><?php echo $usuario->getCiRuc_User(); ?></td></tr>
	            	<tr><th>Nombres y Apellidos:</th><td><?php echo $usuario->getNombre_User(); ?></td></tr>
	            	<tr><th>Teléfono:</th><td><?php echo $usuario->getTelefono_User(); ?></td></tr>
	            	<tr><th>Correo Electrónico:</th><td><?php echo $usuario->getEmail_User(); ?></td></tr>
	            	<tr><th>Dirección:</th><td><?php echo $usuario->getDireccion_User(); ?></td></tr>
	            	<tr><th>Descripción:</th><td><?php echo $usuario->getDescripcion_User(); ?></td></tr>
	            </table>
	        </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <h4>Información de Seminario</h4>
	      	<div class="table-responsive">
	            <table class="table table-sm table-borderless">
	            	<tr><th>CI/RUC:</th><td><?php echo $usuario->getCiRuc_User(); ?></td></tr>
	            	<tr><th>Nombre:</th><td><?php echo $usuario->getNombre_User(); ?></td></tr>
	            	<tr><th>Teléfono:</th><td><?php echo $usuario->getTelefono_User(); ?></td></tr>
	            	<tr><th>Email:</th><td><?php echo $usuario->getEmail_User(); ?></td></tr>
	            	<tr><th>Dirección:</th><td><?php echo $usuario->getDireccion_User(); ?></td></tr>
	            </table>
	        </div>
          </div>
        </form>

      <div class="modal-footer">
      	<button type="button" class="btn btn-info" onclick="location.href='?controller=reserva&action=reservaUserPdf&reserva=<?php echo $reserva->getId_User(); ?>'"><i class="fa fa-file-pdf-o"></i> Descargar Información PDF</button>
      	<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->