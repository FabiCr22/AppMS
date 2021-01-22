<?php
if(!isset($_SESSION))
{
  session_start();
} ?>
<section>
  <div class="login-card">
    <span class="fa-stack fa-4x" style="margin-left: 70px;">
      <i class="fa fa-circle fa-stack-2x text-primary"></i>
      <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
    </span>
    <p class="profile-name-card">REGISTRO DE PRODUCTO</p>
    <form class="form-signin" action="?controller=producto&action=save" method="post" id="eventForm" enctype="multipart/form-data">
      <span class="reauth-email"> </span>
      <label class="control-label col-sm-2" for="nombre">Nombre:</label>
      <input type="text" class="form-control" id="Nombre_Prod" name="Nombre_Prod" placeholder="Nombre" required="true" autocomplete="off">
      <label class="control-label col-sm-2" for="descripcion">Descripción:</label>
      <textarea class="form-control" id="Descripcion_Prod" name="Descripcion_Prod"  placeholder="Descripción" style="margin-bottom: 10px;"></textarea>
      <label class="control-label col-sm-2" for="imagen">Imagen:</label>
      <input type="file" class="form-control" id="Imagen_Prod" name="Imagen_Prod" placeholder="Imagen" accept="image/png, .jpg, .jpeg, .pjpeg, .jpe, .jfif, .bmp, .dib, .tif, .tiff, .ico, .3mf, .stl, .ply, .obj, .glb, .fbx, image/gif" required="true" style="margin-bottom: 10px;font-size: 11px;">
      <label class="control-label col-sm-2" for="tipo">Tipo:</label>
      <select id="Tipo_Prod" name="Tipo_Prod" class="form-control" style="margin-bottom: 10px;">
          <option value="0">Seleccione una opción</option>
            <?php foreach($lista_tipos_productos as $tipo_producto) { ?>
              <option value="<?php echo $tipo_producto->getId_TipoProd(); ?>"><?php echo $tipo_producto->getNombre_TipoProd(); ?></option>
            <?php } ?>
      </select>
      <label class="control-label col-sm-2" for="familia">Familia:</label>
      <select id="Familia_Prod" name="Familia_Prod" class="form-control" style="margin-bottom: 10px;">
      </select>
      <label class="control-label col-sm-2" for="precio">Precio:</label>
      <input type="number" class="form-control" id="Precio_Prod" name="Precio_Prod" required="true" min="0" max="9999.99" step="0.01" placeholder="Precio" style="margin-bottom: 10px;">
      <div class="form-row">
        <div class="col"><button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-save"></i> Guardar</button>
        </div>
        <div class="col"><button type="button" class="btn btn-danger btn-block btn-lg" onclick="location.href='?controller=empresa&action=showInicio'"><i class="fa fa-close"></i> Cancelar</button>
        </div>
      </div>
    </form>
  </div>
</section>