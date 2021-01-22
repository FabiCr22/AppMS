<?php
if(!isset($_SESSION))
{
	session_start();
} ?>
<section id="productos" class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="text-uppercase section-heading">Productos</h2>
                <h3 class="section-subheading text-muted">Explora nuestro catálogo.</h3>
            </div>
        </div>
        <!--<nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
            <div class="container">
                <a href="#" class="navbar-brand"></a>
                <button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <form target="_self" class="form-inline mr-auto" action="?controller=producto&action=searchupdate" method="post">
                        <div class="form-group">
                            <label style="color: rgb(134,142,150);" for="tipo">Tipo:</label>
                            <select id="Tipo_Prod" name="Tipo_Prod" class="form-control" onchange="location.href='?controller=producto&action=showall&Tipo_Prod='$this.value'">
                                <?php foreach($lista_tipos_productos as $tipo_producto) { ?>
                                    <option value="<?php echo $tipo_producto->getId_TipoProd(); ?>" <?php if ($tipo_producto->getId_TipoProd()==$tipo) {
                                        echo 'selected';
                                    } ?>><?php echo $tipo_producto->getNombre_TipoProd(); ?></option>
                                <?php } ?>
                            </select>
                            <label style="color: rgb(134,142,150);" for="familia">Familia:</label>
                            <select id="Familia_Prod" name="Familia_Prod" class="form-control">
                            </select>
                            <label for="search-field"></label>
                            <input type="search" name="Id_Prod" placeholder="Producto" class="form-control search-field" id="search-field" />
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>-->
        <?php if (isset($_SESSION['mensaje'])) { //mensaje, cuando realiza alguna acción crud ?>
            <div class="container" name="cuerpo">
                <div class="alert alert-success">
                    <strong><?php echo $_SESSION['mensaje']; ?></strong>
                </div>
            </div>
        <?php }
        unset($_SESSION['mensaje']);
        ?><br>

        <div class="row">
            <?php while($producto = $lista_productos->fetch_array()) {
            ?>
                <div class="col-sm-6 col-md-4 productos-item">
                    <a href="#portfolioModal1" class="productos-link" data-toggle="modal">
                        <div class="productos-hover">
                            <div class="productos-hover-content"><i class="fa fa-plus fa-3x"></i></div>
                        </div><img src="<?php echo $producto[1]; ?>" class="img-fluid" /></a>
                    <div class="productos-caption">
                        <h4 style="font-size: 22px;"><?php echo $producto[0]; ?></h4>
                        <p class="text-muted"><?php $f = $producto[2];
                            $familia_producto=Familia_Producto::getByIdFamiliaProd($f);
                            echo $familia_producto->getNombre_FamiliaProd(); ?></p>
                        <p class="text-center">$ <?php echo $producto[3]; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <hr />
        <div><?php echo $Paginacion->ver_pagina("Views/Producto/showall.php")?></div>
            <!--<nav aria-label="Search results pages">
              <ul class="pagination pagination-circle pg-blue justify-content-center">
                <?php
                if(isset($_GET['limite'])){
                    if($_GET['limite']>0){
                        echo ' <li><a href="index.php?limite='.($_GET['limite']-10).'">&lt;</a></li>';
                    }
                }
                for($k=0;$k<$totalBotones;$k++){
                    echo  '<li><a href="index.php?limite='.($k*10).'">'.($k+1).'</a></li>';
                }
                if(isset($_GET['limite'])){
                    if($_GET['limite']+10 < $totalBotones*10){
                        echo ' <li><a href="index.php?limite='.($_GET['limite']+10).'">&gt;</a></li>';
                    }
                }else{
                    echo ' <li><a href="index.php?limite=10">&gt;</a></li>';
                }
                ?>
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
            </nav>-->
            <!-- <ul class ="pagination">
                <?php for ($i=1;$i<=$botones;$i++){ ?>
                    <li><a href="?controller=producto&action=show&boton=<?php echo $i ?>"><?php echo $i; ?></a></li>
                <?php }?>
            </ul>-->
    </div>
</section>