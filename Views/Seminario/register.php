<?php
if(!isset($_SESSION))
{
	session_start();
} ?>
<section>
	<div class="login-card">
		<span class="fa-stack fa-4x" style="margin-left: 70px;">
			<i class="fa fa-circle fa-stack-2x text-primary"></i>
			<i class="fa fa-users fa-stack-1x fa-inverse"></i>
		</span>
		<p class="profile-name-card">REGISTRO DE SEMINARIO</p>
		<form class="form-signin" action='?controller=seminario&action=save' method='post' id="eventForm" enctype="multipart/form-data">
			<span class="reauth-email"> </span>
			<label class="control-label col-sm-2" for="titulo">Título:</label>
			<input type="text" class="form-control" id="Titulo_Sem" name="Titulo_Sem" placeholder="Título" required="true" autocomplete="off">
			<label class="control-label col-sm-2" for="descripcion">Descripción:</label>
			<textarea class="form-control" id="Descripcion_Sem" name="Descripcion_Sem" placeholder="Descripción" style="margin-bottom: 10px;"></textarea>
			<label class="control-label col-sm-2" for="imagen">Imagen:</label>
			<input type="file" class="form-control" id="Imagen_Sem" name="Imagen_Sem" placeholder="Imagen" accept="image/png, .jpg, .jpeg, .pjpeg, .jpe, .jfif, .bmp, .dib, .tif, .tiff, .ico, .3mf, .stl, .ply, .obj, .glb, .fbx, image/gif" required="true" style="margin-bottom: 10px;font-size: 11px;">
			<label class="control-label col-sm-2" for="fecha">Fecha:</label>
			<input type="date" class="form-control" id="Fecha_Sem" name="Fecha_Sem" placeholder="Fecha" required="true" style="margin-bottom: 10px;">
			<label class="control-label col-sm-2" for="hora">Hora:</label>
			<input type="time" class="form-control" id="Hora_Sem" name="Hora_Sem" placeholder="Hora" required="true" style="margin-bottom: 10px;">
			<label class="control-label col-sm-2" for="precio">Precio:</label>
			<input type="number" class="form-control" id="Precio_Sem" name="Precio_Sem" required="true" min="0" max="9999.99" step="0.01" placeholder="Precio" style="margin-bottom: 10px;">
			<div class="form-row">
				<div class="col"><button class="btn btn-primary btn-block btn-lg" type="submit"><i class="fa fa-save"></i> Guardar</button></div>
				<div class="col"><button class="btn btn-danger btn-block btn-lg" type="button" onclick="location.href='?controller=empresa&action=showInicio'"><i class="fa fa-close"></i> Cancelar</button></div>
			</div>
		</form>
	</div>
</section>