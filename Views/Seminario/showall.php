<?php
if(!isset($_SESSION))
{
	session_start();
}
/*function getConn(){
  $mysqli = mysqli_connect('localhost', 'root', '', "db_ms");
  if (mysqli_connect_errno($mysqli))
    echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
  $mysqli->set_charset('utf8');
  return $mysqli;
}*/
?>
<section id="productos" class="bg-light">
	<div class="container">
		<div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="text-uppercase section-heading">Seminarios</h2>
        <h3 class="section-subheading text-muted">Aprende y diviértete con nosotros.</h3>
      </div>
    </div>
    <?php if (isset($_SESSION['mensaje'])) { ?>
      <div class="container" name="cuerpo">
        <div class="alert alert-success">
          <strong><?php echo $_SESSION['mensaje']; ?></strong>
        </div>
      </div>
    <?php } unset($_SESSION['mensaje']); ?><br>
    <div class="row">
      <?php foreach ($lista_seminarios as $seminario) { ?>
      	<div class="col-sm-6 col-md-4 productos-item">
      		<a href="#semModal" class="productos-link" data-toggle="modal" data-target="#semModal">
            <div class="productos-hover">
              <div class="productos-hover-content"><i class="fa fa-plus fa-3x"></i></div>
            </div>
            <img src="<?php echo $seminario->getImagen_Sem(); ?>" class="img-fluid" />
          </a>
          <div class="productos-caption">
            <h4 style="font-size: 22px;"><?php echo $seminario->getTitulo_Sem(); ?></h4>
            <p class="text-muted">Fecha: <?php echo $seminario->getFecha_Sem(); ?>&nbsp;&nbsp; Hora: <?php echo $seminario->getHora_Sem(); ?></p>
            <p class="text-center">Costo: $ <?php echo $seminario->getPrecio_Sem(); ?></p>
          </div>
        </div>
      <?php } ?>
    </div><hr />
    <!--<div><?php //echo $Paginacion->ver_pagina("Views/Seminario/showall.php")?></div>-->
    <div class="row" data-aos="fade-up">
      <div class="col-md-12 text-center">
        <div class="site-block-27">
          <ul>
            <?php 
              if(isset($_GET['limite'])){
                if($_GET['limite']>0){
                  echo ' <li><a href="?controller=seminario&action=showall?limite='.($_GET['limite']-6).'">&lt;</a></li>';
                }
              }
              for($k=0;$k<$totalBotones;$k++){
                echo  '<li><a href="index.php?limite='.($k*6).'">'.($k+1).'</a></li>';
              }
              if(isset($_GET['limite'])){
                if($_GET['limite']+6 < $totalBotones*6){
                  echo ' <li><a href="index.php?limite='.($_GET['limite']+6).'">&gt;</a></li>';
                }
              }else{
                echo ' <li><a href="index.php?limite=6">&gt;</a></li>';
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
	</div>
</section>
<!--Modal -->
<div class="modal fade" id="semModal" tabindex="-1" role="dialog" aria-labelledby="semModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title">Información de Seminario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      	<div class="form-row" style="width: 670px;">
            	<div class="col" style="width: 390px;">
                	<img src="<?php echo $seminario->getImagen_Sem(); ?>" style="width: 380px;height: 380px;"/>
                </div>
                <div class="col" style="width: 280px;">
                    <div class="table-responsive">
                        <table class="table table-sm table-borderless">
                        	<tr><th>Título:</th></tr>
                        	<tr><td id="tituloModal"></td></tr>
                        	<tr><th>Descripción:</th></tr>
                        	<tr><td id="descripcionModal"></td></tr>
                        	<tr><th>Fecha:</th></tr>
                        	<tr><td id="fechaModal"></td></tr>
                        	<tr><th>Hora:</th></tr>
                        	<tr><td id="horaModal"></td></tr>
                        	<tr><th>Precio:</th></tr>
                        	<tr><td id="precioModal"></td></tr>
                        </table>
                    </div>
                </div>
            </div>

	    <div class="table-responsive">
	    	<table class="table table-sm table-borderless">
	    		<tr><th>CI/RUC:</th><td id="cirucModal"></td></tr>
	    		<tr><th>Nombre:</th><td id="nombreModal"></td></tr>
	    		<tr><th>Teléfono:</th><td id="telefonoModal"></td></tr>
	    		<tr><th>Correo Electrónico:</th><td id="emailModal"></td></tr>
	    		<tr><th>Dirección:</th><td id="direccionModal"></td></tr>
	    		<tr><th>Descripción:</th><td id="descripcionModal"></td></tr>
	    	</table>
	    </div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-success" onclick="location.href='?controller=seminario&action=showupdate&Id_Sem=<?php echo $seminario->getId_Sem();?>'"><i class="fa fa-edit"></i> Actualizar</button>
      	<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->