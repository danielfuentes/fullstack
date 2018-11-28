<!--Documento web creado con el Framework Boostrap
La animaciones estan creadas con JavaScript, por lo tanto 
de momento no las tomen en cuenta mas adelante Rodo y Yo les
daremos JS. De aquí pueden tomar ciertas ideas de como se puede 
trabajar con este Framework, espero les resulte de utilidad
Todas las clases utilizadas estan documentadas en la página de 
https://getbootstrap.com/ Lo he trabajado para ustedes-->
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Hamburguesas Cedaviluin, C.A.</title>
		<!-- bootstrap -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- ion-icons -->
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- our-own-styles -->
		<link rel="stylesheet" href="css/styles.css">
		<!-- Soporte para IE 9 e inf. -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body id="top">
		<!-- nav-bar -->
		<div class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a href="#top" class="navbar-brand page-scroll">
						<img src="images/logo.png" alt="logo">
					</a>
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-links">
					<span class="glyphicon glyphicon-menu-hamburger"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="nav-links">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#services" class="page-scroll">Servicios</a>
						</li>
						<li>
							<a href="#promos" class="page-scroll">Promociones</a>
						</li>
						<li>
							<a href="#about" class="page-scroll">Nosotros</a>
						</li>
						<li>
							<a href="#contact" class="page-scroll">Contacto</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
		<!-- banner -->
		<section id="banner">
			<div class="container">
				<div class="row">
				 <!--Aquí forzo a que siempre se vea en 12 columnas 
				 aunque sea cualquier dispositivo como lo que realice
				 en el formulario que les envie-->
					<div class="col-xs-12">
						<div class="intro-text text-center">
							<h2>Bienvenidos</h2>
							<h1>Hamburguesas Daniel</h1>
							<a href="#services" class="btn btn-lg">Quienes somos?</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- servicios -->
		<!--Pendiente aquí conel id services le llego desde el menú 
		ya que como vimos en clase esta sería mi ancla, pero observe que
		todo el código lo tengo en la carpeta plantillas y lo estoy
		incorporando usando el include de php visto en clase-->
        <section id="services">	
            <?php include('plantillas/servicios.php');?>
        
        </section>
		


		<!-- promociones -->
        <section id="promos">
            <div class="container">
                <?php include('plantillas/promociones.php');?>                
            </div>
        </section>


		<!-- nosotros -->
		<section id="about">
			<div class="container">
                <?php include('plantillas/nosotros.php');?>                				
			</div>
		</section>

		<!-- contacto -->
		<section id="contact">
			<div class="container">
			    <?php include('plantillas/contacto.php');?>                					
			</div>
		</section>

		<!-- footer -->
		<footer>
			<div class="container">
				<div class="row text-center">
					<div class="col-md-4">
						<span class="copyright"> Todos los derechos reservados MSc. Ángel Daniel Fuentes </span>
					</div>
					<div class="col-md-4">
						<ul class="list-inline social-links">
							<li><a href="#"><span class="ion-social-twitter"></span></a></li>
							<li><a href="#"><span class="ion-social-facebook"></span></a></li>
							<li><a href="#"><span class="ion-social-linkedin"></span></a></li>
						</ul>
					</div>
					<div class="col-md-4">
						<ul class="list-inline footer-links">
							<li><a href="#">Políticas de Privacidad</a></li>
							<li><a href="#">Terminos de uso</a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>


		<!-- modal-content(oculto) -->
		<!--Este modal de boostrap en el que uso para mostrar 
		el detalle de los combos de las hamburguesas-->
		<div class="modal fade" id="promos-01">
			<div class="modal-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<div class="modal-body text-center">
								<h2>Combo 1</h2>
								<img class="img-responsive" src="images/promos/img-promos_01.png" alt="promos" style="margin: auto;">
								<br>
								<p class="text-info">Descripción del combo.</p>
								<ul class="list-inline">
									<li>Precio: $80.00</li>
									<li>Incluye: Hamburguesa + Papas + Gaseosa a elección</li>
									<li>Category: Graphic Design</li>
								</ul>
								<button type="button" class="btn btn-warning" data-dismiss="modal">
								<span class="glyphicon glyphicon-remove"></span>
								Cerrar
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="promos-02">
			<div class="modal-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<div class="modal-body text-center">
								<h2>Combo 2</h2>
								<img class="img-responsive" src="images/promos/img-promos_02.png" alt="promos" style="margin: auto;">
								<br>
								<p class="text-info">Descripción del combo.</p>
								<ul class="list-inline">
									<li>Precio: $95.99</li>
									<li>Incluye: Hamburguesa + Papas + Gaseosa a elección</li>
									<li>Category: Graphic Design</li>
								</ul>
								<button type="button" class="btn btn-warning" data-dismiss="modal">
								<span class="glyphicon glyphicon-remove"></span>
								Cerrar
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="promos-03">
			<div class="modal-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<div class="modal-body text-center">
								<h2>Combo 3</h2>
								<img class="img-responsive" src="images/promos/img-promos_03.png" alt="promos" style="margin: auto;">
								<br>
								<p class="text-info">Descripción del combo.</p>
								<ul class="list-inline">
									<li>Precio: $125.99</li>
									<li>Incluye: Hamburguesa + Papas + Gaseosa a elección</li>
									<li>Category: Graphic Design</li>
								</ul>
								<button type="button" class="btn btn-warning" data-dismiss="modal">
								<span class="glyphicon glyphicon-remove"></span>
								Cerrar
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="promos-04">
			<div class="modal-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<div class="modal-body text-center">
								<h2>Combo 4</h2>
								<img class="img-responsive" src="images/promos/img-promos_04.png" alt="promos" style="margin: auto;">
								<br>
								<p class="text-info">Descripción del combo.</p>
								<ul class="list-inline">
									<li>Precio: $165.99</li>
									<li>Incluye: Hamburguesa + Papas + Gaseosa a elección</li>
									<li>Category: Graphic Design</li>
								</ul>
								<button type="button" class="btn btn-warning" data-dismiss="modal">
								<span class="glyphicon glyphicon-remove"></span>
								Cerrar
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="promos-05">
			<div class="modal-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<div class="modal-body text-center">
								<h2>Combo 5</h2>
								<img class="img-responsive" src="images/promos/img-promos_05.png" alt="promos" style="margin: auto;">
								<br>
								<p class="text-info">Descripción del combo.</p>
								<ul class="list-inline">
									<li>Precio: $199.99</li>
									<li>Incluye: Hamburguesa + Papas + Gaseosa a elección</li>
									<li>Category: Graphic Design</li>
								</ul>
								<button type="button" class="btn btn-warning" data-dismiss="modal">
								<span class="glyphicon glyphicon-remove"></span>
								Cerrar
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
				<div class="modal fade" id="promos-06">
			<div class="modal-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<div class="modal-body text-center">
								<h2>Combo 6</h2>
								<img class="img-responsive" src="images/promos/img-promos_06.png" alt="promos" style="margin: auto;">
								<br>
								<p class="text-info">Descripción del combo.</p>
								<ul class="list-inline">
									<li>Precio: $170.99</li>
									<li>Incluye: Hamburguesa + Papas + Gaseosa a elección</li>
									<li>Category: Graphic Design</li>
								</ul>
								<button type="button" class="btn btn-warning" data-dismiss="modal">
								<span class="glyphicon glyphicon-remove"></span>
								Cerrar
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Penientes mis amigos, aquí hay librerias que no deben utilizar 
		para este primer nivel, yo se las daré cuando estemosen JavaScript-->

		<!-- librería-jQuery  esta es la que trae por defecto cuando uno monta
		Boostrap-->
		<script src="js/jquery-1.12.3.min.js"></script>

		<!-- js-de-bootstrap  esta es la libreria por defecto que trae boostrap-->
		<script src="js/bootstrap.min.js"></script>

		<!-- Animate-Scroll esta es la libreria que efectua las animaciones-->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
		<!-- Custom-Scripts -->
		<script src="js/master.js"></script>
	</body>
</html>