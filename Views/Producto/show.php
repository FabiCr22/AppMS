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
			<i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
		</span>
		<p class="profile-name-card">PRODUCTO</p>
		<form class="form-signin"><span class="reauth-email"></span>
			<div class="form-row" style="width: 670px;">
                <div class="col" style="width: 390px;">
                	<label>Imagen:</label>
                	<img src="<?php echo $producto->getImagen_Prod(); ?>" style="width: 380px;height: 380px;"/>
                </div>
                <div class="col" style="width: 280px;">
                    <div class="table-responsive">
                        <table class="table table-sm">
                        	<tr><th>Nombre:</th></tr>
                        	<tr><td><?php echo $producto->getNombre_Prod(); ?></td></tr>
                        	<tr><th>Descripción:</th></tr>
                        	<tr><td><?php echo $producto->getDescripcion_Prod(); ?></td></tr>
                        	<tr><th>Tipo de Producto:</th></tr>
                        	<tr><td><?php $tipo_producto=Tipo_Producto::getByIdTipoProd($producto->getTipo_Prod()); echo $tipo_producto->getNombre_TipoProd(); ?></td></tr>
                        	<tr><th>Familia de Producto:</th></tr>
                        	<tr><td><?php $familia_producto=Familia_Producto::getByIdFamiliaProd($producto->getFamilia_Prod()); echo $familia_producto->getNombre_FamiliaProd(); ?></td></tr>
                        	<tr><th>Precio:</th></tr>
                        	<tr><td><?php echo $producto->getPrecio_Prod(); ?></td></tr>
                        </table>
                    </div>
                </div>
                <div class="form-row" style="width: 670px;">
                	<div class="col">
                		<button type="button" class="btn btn-primary btn-block btn-lg" onclick="location.href='?controller=producto&action=register'"><i class="fa fa-plus"></i> Nuevo producto</button>
                	</div>
                    <div class="col">
                    	<button type="button" class="btn btn-success" onclick="location.href='?controller=producto&action=showupdate&Id_Prod=<?php echo $producto->getId_Prod();?>&Tipo_Prod=<?php echo $producto->getTipo_Prod();?>&Familia_Prod=<?php echo $producto->getFamilia_Prod();?>'"><i class="fa fa-edit"></i> Actualizar</button>
                    </div>
                    <div class="col">
                    	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#proddelete"><i class="fa fa-trash"></i> Eliminar</button>
                    </div>
                    <!--<div class="col">
                    	<button type="button" class="btn btn-info" onclick="location.href='?controller=producto&action=productoPdf&producto=<?php echo $producto->getId_Prod(); ?>'"><i class="fa fa-file-pdf-o"></i> Descargar Información PDF</button>
                    </div>-->
                </div>
            </div>
        </form>
    </div>
</section>
<div class="modal fade" id="proddelete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
      	<button type="button" class="btn btn-danger" onclick="location.href='?controller=producto&action=delete&Id_Prod=<?php echo $producto->getId_Prod();?>'"><i class="fa fa-trash"></i> Eliminar</button>
      	<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- <div class="row">
	<div class="col-sm-2">
		<div class="table-responsive">
			<table class="table table-hover">
				<tr>
					<th>Id.</th><td><?php //echo $producto->getId_Prod(); ?></td>
				</tr>
				<tr>
					<th>Nombre</th><td><?php //echo $producto->getNombre_Prod(); ?></td>
				</tr>
				<tr>
					<th>Descripción</th><td><?php //echo $producto->getDescripcion_Prod(); ?></td>
				</tr>
				<tr>
					<th>Tipo</th><td><?php //$tipo_producto=Producto::getByIdTipoProd($producto->getTipo_Prod()); echo $tipo_producto->getNombre_TipoProd(); ?></td>
				</tr>
				<tr>
					<th>Familia</th><td><?php //$familia_producto=Producto::getByIdFamiliaProd($producto->getFamilia_Prod()); echo $familia_producto->getNombre_FamiliaProd(); ?></td>
				</tr>
				<tr>
					<th>Precio</th><td><?php //echo $producto->getPrecio_Prod(); ?></td>
				</tr>
			</table>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		<button type="button" class="btn btn-success" onclick="location.href='?controller=producto&action=showupdate&Id_Prod=<?php //echo $producto->getId_Prod();?>&Tipo_Prod=<?php //echo $producto->getTipo_Prod();?>&Familia_Prod=<?php //echo $producto->getFamilia_Prod(); ?>'"><span class="glyphicon glyphicon-edit"></span>Editar</button>
	</div>
	<div class="col-sm-2">
		<button type="button" class="btn btn-danger" onclick="location.href='?controller=producto&action=delete&Id_Prod=<?php //echo $producto->getId_Prod(); ?>'"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
	</div>
	<div class="col-sm-2">
		<button type="button" class="btn btn-info" onclick="location.href='?controller=producto&action=productoPdf&producto=<?php //echo $producto->getId_Prod(); ?>'"><span class="glyphicon glyphicon-cloud-download"></span> Descargar Info. PDF</button>
	</div>
</div> -->