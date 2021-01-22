<?php
if(!isset($_SESSION))
{
  session_start();
} ?>
<section>
  <div class="login-card" style="width: 750px;max-width: 750px;">
    <span class="fa-stack fa-4x" style="margin-right: 271px;margin-left: 271px;">
      <i class="fa fa-circle fa-stack-2x text-primary"></i>
      <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
    </span>
    <p class="profile-name-card">ACTUALIZACIÓN DE PRODUCTO</p>
    <form class="form-signin" action='?controller=producto&action=update' method='post' id="eventForm" enctype="multipart/form-data"><span class="reauth-email"></span>
      <input type="hidden" id="Id_Prod" name="Id_Prod" value="<?php echo $producto->getId_Prod(); ?>">
      <input type="hidden" id="Imagen_Producto" name="Imagen_Producto" value="<?php echo $producto->getImagen_Prod(); ?>">
      <div class="form-row" style="width: 670px;">
        <div class="col" style="width: 390px;">
          <label>Imagen:</label>
          <img src="<?php echo $producto->getImagen_Prod(); ?>" style="width: 380px;height: 380px;" />
          <input type="file" class="form-control" id="Imagen_Prod" name="Imagen_Prod" placeholder="Imagen" accept="image/png, .jpg, .jpeg, .pjpeg, .jpe, .jfif, .bmp, .dib, .tif, .tiff, .ico, .3mf, .stl, .ply, .obj, .glb, .fbx, image/gif" />
        </div>
        <div class="col" style="width: 280px;">
          <label>Nombre:</label>
          <input type="text" class="form-control" id="Nombre_Prod" name="Nombre_Prod" value="<?php echo $producto->getNombre_Prod(); ?>" required="true" autocomplete="off" />
          <label>Descripción:</label>
          <textarea class="form-control" id="Descripcion_Prod" name="Descripcion_Prod"><?php echo $producto->getDescripcion_Prod(); ?></textarea>
          <label>Tipo:</label>
          <select class="form-control" id="Tipo_Prod" name="Tipo_Prod">
            <?php foreach ($tipo_producto as $rowT) { ?>
              <option value="<?php echo $rowT->getId_TipoProd(); ?>" <?php if($rowT->getId_TipoProd()==$tipo) { echo 'selected'; } ?>><?php echo $rowT->getNombre_TipoProd(); ?></option>
            <?php } ?>
          </select>
          <label>Familia:</label>
          <select class="form-control" id="Familia_Prod" name="Familia_Prod">
            <?php foreach ($familia_producto as $rowF) { ?>
              <option value="<?php echo $rowF->getId_FamiliaProd(); ?>" <?php if($rowF->getId_FamiliaProd()==$familia) { echo 'selected'; } ?>><?php echo $rowF->getNombre_FamiliaProd(); ?></option>
            <?php } ?>
          </select>
          <label>Precio:</label>
          <input type="number" class="form-control" id="Precio_Prod" name="Precio_Prod" value="<?php echo $producto->getPrecio_Prod(); ?>" required="true" min="0" max="9999.99" step="0.01">
          <div class="form-row" style="padding-top: 10px;">
            <div class="col">
              <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-save"></i> Guardar</button>
            </div>
            <div class="col">
              <button type="button" class="btn btn-danger btn-block btn-lg" onclick="location.href='?controller=producto&action=showsearchupdate'"><i class="fa fa-close"></i> Cancelar</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>