<?php if (isset($_SESSION['mensaje'])) { //mensaje, cuando realiza alguna acción crud ?>
    <section style="padding-top: 165px; padding-bottom: 0px;">
        <div class="container" name="cuerpo">
            <div class="alert alert-success">
                <p><?php echo $_SESSION['mensaje']; ?></p>
            </div>
        </div>
    </section>
<?php }
unset($_SESSION['mensaje']); ?>
<!--<section>-->
	<div class="modal fade" id="closesion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title">Confirmar Sesión</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      	<p>¿Está seguro que desea cerrar su sesión de usuario?</p>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-danger" onclick="location.href='?controller=usuario&action=logout'"><i class="fa fa-sign-out"></i> Cerrar Sesión</button>
      	<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--</section>-->