<?php if (!isset($_SESSION['mensaje'])) { //mensaje, cuando realiza alguna acción crud ?>
    <section style="padding-top: 165px; padding-bottom: 0px;">
        <div class="container" name="cuerpo">
            <div class="alert alert-success">
            	<p>Bienvenido a la App de la Casa Musical Macro Show</p>
            </div>
        </div>
    </section>
<?php }
unset($_SESSION['mensaje']); ?>
<header class="masthead" style="background-image:url('assets/img/empresa/instalaciones_dentro.jpg');">
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in"></div>
            <div class="intro-heading text-uppercase"><span style="font-size: 50px;color: rgba(38,27,27,0.5);"><br></span></div></div>
    </div>
</header>
<section id="seminarios">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="text-uppercase section-heading">Seminarios</h2>
                <h3 class="text-muted section-subheading">Aprende y diviértete con nosotros.</h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-music fa-stack-1x fa-inverse"></i></span>
                <h4 class="section-heading">Interpretación Musical</h4>
                <p class="text-muted">Conoce las técnicas y tips que utilizan músicos profesionales para un excelente desempeño en los escenarios.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-volume-up fa-stack-1x fa-inverse"></i></span>
                <h4 class="section-heading">Sonido y Producción</h4>
                <p class="text-muted">Entérate de las últimas novedades tecnológicas de sistemas de audio, sonido y producción musical.</p>
            </div>
            <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-headphones fa-stack-1x fa-inverse"></i></span>
                <h4 class="section-heading">Control y Mezcla</h4>
                <p class="text-muted">Domina sistemas y herramientas de DJ para que tus remixes suenen cada vez mejor en vivo.</p>
            </div>
        </div>
    </div>
</section>
<section id="productos" class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="text-uppercase section-heading">Productos</h2>
                <h3 class="section-subheading text-muted">Explora nuestro catálogo.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4 productos-item">
                <a href="?controller=producto&action=showall&Tipo_Prod=6" class="productos-link">
                    <div class="productos-hover">
                        <div class="productos-hover-content"><i class="fa fa-plus fa-3x"></i></div>
                    </div>
                    <img class="img-fluid" src="assets/img/productos/instalaciones_dentro6.jpg">
                </a>
                    <div class="productos-caption">
                        <h4 style="font-size: 22px;">Instrumentos Musicales</h4>
                        <p class="text-muted">Guitarras, teclados, baterías y más...</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 productos-item">
                <a href="?controller=producto&action=showall&Tipo_Prod=1" class="productos-link" >
                    <div class="productos-hover">
                        <div class="productos-hover-content"><i class="fa fa-plus fa-3x"></i></div>
                    </div>
                    <img class="img-fluid" src="assets/img/productos/accesorios.jpg" style="height: 233px;">
                </a>
                <div class="productos-caption">
                    <h4 style="font-size: 22px;">Accesorios Musicales</h4>
                    <p class="text-muted">Cuerdas, cables, pedestales y más...</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 productos-item">
                <a href="?controller=producto&action=showall&Tipo_Prod=2" class="productos-link">
                    <div class="productos-hover">
                        <div class="productos-hover-content"><i class="fa fa-plus fa-3x"></i></div>
                    </div>
                    <img class="img-fluid" src="assets/img/productos/amplificacion.jpg" style="height: 233px;width: 349px;">
                </a>
                <div class="productos-caption">
                    <h4 style="font-size: 22px;">Equipos de Amplificación</h4>
                    <p class="text-muted">Consolas, parlantes,&nbsp;<em>potencias</em>&nbsp;y más...</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 productos-item">
                <a href="?controller=producto&action=showall&Tipo_Prod=3" class="productos-link">
                    <div class="productos-hover">
                        <div class="productos-hover-content"><i class="fa fa-plus fa-3x"></i></div>
                    </div>
                    <img class="img-fluid" src="assets/img/productos/dj.jpg" style="height: 233px;">
                </a>
                <div class="productos-caption">
                    <h4 style="font-size: 22px;">Equipos de DJ</h4>
                    <p class="text-muted">Mezcladoras, controladores y más...</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 productos-item">
                <a href="?controller=producto&action=showall&Tipo_Prod=4" class="productos-link">
                    <div class="productos-hover">
                        <div class="productos-hover-content"><i class="fa fa-plus fa-3x"></i></div>
                    </div>
                    <img class="img-fluid" src="assets/img/productos/est_grabacion.jpg">
                </a>
                <div class="productos-caption">
                    <h4 style="font-size: 22px;">Estudio de Grabación</h4>
                    <p class="text-muted">Monitores, interfaces y más...</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 productos-item">
                <a href="?controller=producto&action=showall&Tipo_Prod=5" class="productos-link">
                    <div class="productos-hover">
                        <div class="productos-hover-content"><i class="fa fa-plus fa-3x"></i></div>
                    </div>
                    <img class="img-fluid" src="assets/img/productos/iluminacion0.jpg">
                </a>
                <div class="productos-caption">
                    <h4 style="font-size: 22px;">Iluminación</h4>
                    <p class="text-muted">Luces laser, cámaras de humo y más...</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center" style="height: 100px;">
                <h2 class="text-uppercase">NUESTRA EMPRESA</h2>
                <h3 class="text-muted section-subheading">Conoce nuestra historia.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-group timeline">
                    <li class="list-group-item" style="height: 228px;">
                        <div class="timeline-image" style="background-color: rgb(54,110,254);width: 170px;background-image: url(&quot;assets/img/about/dj_general.jpg&quot;);background-position: center;background-size: cover;"></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2009</h4>
                                <h4 class="subheading">Nuestros inicios</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Macro Show inicia sus actividades en las calles Villaroel y Bolivia, dedicándose a la venta de equipos de DJ y de equipos de amplificación de medio uso.</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item timeline-inverted" style="height: 250px;">
                        <div class="timeline-image" style="background-color: rgb(54,110,254);background-image: url(&quot;assets/img/about/instalaciones_dentro3.jpg&quot;);background-position: center;background-size: cover;"></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2010</h4>
                                <h4 class="subheading">Ampliamos nuestra oferta</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Macro Show se traslada a la avenida Unidad Nacional y Juan de Lavalle e incrementa su oferta comercial añadiendo instrumentos y accesorios musicales a su catálogo de productos.</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="timeline-image" style="background-color: rgb(54,110,254);background-image: url(&quot;assets/img/about/instalaciones_dentro4.jpg&quot;);background-position: center;background-size: cover;"></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2014</h4>
                                <h4 class="subheading">Expandimos nuestras instalaciones</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Macro Show establece sus instalaciones en la avenida Daniel León Borja y Juan de Lavalle.</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item timeline-inverted">
                        <div class="timeline-image" style="background-color: rgb(54,110,254);background-image: url(&quot;assets/img/about/seminario3-3.jpg&quot;);background-position: center;background-size: cover;"></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2015</h4>
                                <h4 class="subheading">Aprende en nuestros seminarios</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Macro Show ofrece seminarios y talleres relacionados con el fascinante mundo del espectáculo.</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item timeline-inverted">
                        <div class="timeline-image" style="background-color: rgb(54,110,254);">
                            <h4 style="font-size: 17px;"><strong>Forma parte de nuestro mundo...&nbsp;</strong>!!!</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="team" class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="team-member"><img class="rounded-circle mx-auto" src="assets/img/team/gerente_wilson_tamami.jpg">
                    <h4>Tnlgo. Wilson Tamami</h4>
                    <p class="text-muted">Gerente General</p>
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item"><a href="https://www.youtube.com/channel/UCv3pcvy-_8jrCs-1rzOZviA"><i class="fa fa-youtube"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.facebook.com/wilson.tamami"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="https://soundcloud.com/macro-show-casa-musical"><i class="fa fa-soundcloud"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3"><a href="https://es.yamaha.com/index.html"><img class="img-fluid d-block mx-auto" src="assets/img/marcas/logo_yamaha.png" style="height: 100px;"></a></div>
            <div class="col-sm-6 col-md-3"><a href="https://meinlpercussion.com/"><img class="img-fluid d-block mx-auto" src="assets/img/marcas/logo_meinl.png" style="height: 100px;"></a></div>
            <div class="col-sm-6 col-md-3"><a href="https://www.cortguitars.com/"><img class="img-fluid d-block mx-auto" src="assets/img/marcas/logo_cort.png" style="height: 100px;"></a></div>
            <div class="col-sm-6 col-md-3"><a href="https://www.numark.com/"><img class="img-fluid d-block mx-auto" src="assets/img/marcas/logo_numark.png" style="height: 100px;"></a></div>
        </div>
    </div>
</section>