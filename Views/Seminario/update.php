<?php
if(!isset($_SESSION))
{
	session_start();
} ?>
<section>
	<div class="login-card" style="width: 750px;max-width: 750px;">
		<span class="fa-stack fa-4x" style="margin-right: 271px;margin-left: 271px;">
			<i class="fa fa-circle fa-stack-2x text-primary"></i>
			<i class="fa fa-users fa-stack-1x fa-inverse"></i>
		</span>
		<p class="profile-name-card">ACTUALIZACIÓN DE SEMINARIO</p>
        <form class="form-signin" action='?controller=seminario&action=update' method='post' id="eventForm" enctype="multipart/form-data"><span class="reauth-email"></span>
        	<input type="hidden" id="Id_Sem" name="Id_Sem" value="<?php echo $seminario->getId_Sem(); ?>">
        	<input type="hidden" id="Imagen_Seminario" name="Imagen_Seminario" value="<?php echo $seminario->getImagen_Sem(); ?>">
            <div class="form-row" style="width: 670px;">
                <div class="col" style="width: 390px;">
                	<label>Imagen:</label>
                	<img src="<?php echo $seminario->getImagen_Sem(); ?>" style="width: 380px;height: 380px;" />
                	<input type="file" class="form-control" id="Imagen_Sem" name="Imagen_Sem" placeholder="Imagen" accept="image/png, .jpg, .jpeg, .pjpeg, .jpe, .jfif, .bmp, .dib, .tif, .tiff, .ico, .3mf, .stl, .ply, .obj, .glb, .fbx, image/gif" />
                </div>
                <div class="col" style="width: 280px;">
                	<label>Título:</label>
                	<input type="text" class="form-control" id="Titulo_Sem" name="Titulo_Sem" value="<?php echo $seminario->getTitulo_Sem(); ?>" required="true" autocomplete="off" />
                	<label>Descripción:</label>
                	<textarea class="form-control" id="Descripcion_Sem" name="Descripcion_Sem"><?php echo $seminario->getDescripcion_Sem(); ?></textarea>
                	<label>Fecha:</label>
                	<input type="date" class="form-control" id="Fecha_Sem" name="Fecha_Sem" value="<?php echo $seminario->getFecha_Sem(); ?>" required="true" autocomplete="off">
                	<label>Hora:</label>
                	<input type="time" class="form-control" id="Hora_Sem" name="Hora_Sem" value="<?php echo $seminario->getHora_Sem(); ?>" required="true" autocomplete="off">
                	<label>Precio:</label>
                	<input type="number" class="form-control" id="Precio_Sem" name="Precio_Sem" value="<?php echo $seminario->getPrecio_Sem(); ?>" required="true" min="0" max="9999.99" step="0.01">
                    <div class="form-row" style="padding-top: 10px;">
                        <div class="col">
                        	<button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                        <div class="col">
                        	<button type="button" class="btn btn-danger btn-block btn-lg" onclick="location.href='?controller=seminario&action=showsearchupdate'"><i class="fa fa-close"></i> Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
	<!-- <div class="container">
		<form class="form-horizontal" action='?controller=seminario&action=update' method='post' id="eventForm" enctype="multipart/form-data">
			<div class="col-sm-2">
				<div class="form-group">
					<img src="<?php //echo $seminario->getImagen_Sem(); ?>" />
					<div class="col-sm-10">
						<input type="file" class="form-control" id="Imagen_Sem" name="Imagen_Sem" placeholder="Imagen" accept="image/png, .jpg, .jpeg, .pjpeg, .jpe, .jfif, .bmp, .dib, .tif, .tiff, .ico, .3mf, .stl, .ply, .obj, .glb, .fbx, image/gif" style="margin-bottom: 10px;font-size: 11px;">
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<input type="hidden" id="Id_Sem" name="Id_Sem" value="<?php //echo $seminario->getId_Sem(); ?>">
				<input type="hidden" id="Imagen_Seminario" name="Imagen_Seminario" value="<?php //echo $seminario->getImagen_Sem(); ?>">
				<div class="form-group">
					<label class="control-label col-sm-2" for="titulo">Título:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Titulo_Sem" name="Titulo_Sem" value="<?php //echo $seminario->getTitulo_Sem(); ?>" required="true" autocomplete="off">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="descripcion">Descripción:</label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="5" id="Descripcion_Sem" name="Descripcion_Sem"><?php //echo $seminario->getDescripcion_Sem(); ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="fecha">Fecha:</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="Fecha_Sem" name="Fecha_Sem" value="<?php //echo $seminario->getFecha_Sem(); ?>" required="true" autocomplete="off">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="hora">Hora:</label>
					<div class="col-sm-10">
						<input type="time" class="form-control" id="Hora_Sem" name="Hora_Sem" value="<?php //echo $seminario->getHora_Sem(); ?>" required="true" autocomplete="off">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="precio">Precio:</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="Precio_Sem" name="Precio_Sem" value="<?php //echo $seminario->getPrecio_Sem(); ?>" required="true" min="0" max="9999.99" step="0.01">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2">
					<button type="submit" class="btn btn-success"> <span class="glyphicon glyphicon-save"></span> Guardar</button>
				</div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-danger" onclick="location.href='?controller=seminario&action=showupdate'"><span class="glyphicon glyphicon-hand-left"></span> Cancelar</button>
				</div>
			</div>
		</form>
	</div> -->