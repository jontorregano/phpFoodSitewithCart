<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contact Page</title>
    <!-- Favicons-->

    <!-- Web Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400i" rel="stylesheet">
    <!-- Bootstrap core CSS-->
    <link href="Content/bootstrap.min.css" rel="stylesheet">
    <!-- Icon Fonts-->
    <link href="Content/font-awesome.min.css" rel="stylesheet">
    <link href="Content/linea-arrows.css" rel="stylesheet">
    <link href="Content/linea-icons.css" rel="stylesheet">
    <!-- Plugins-->
    <link href="Content/owl.carousel.css" rel="stylesheet">
    <link href="Content/magnific-popup.css" rel="stylesheet">
    <link href="Content/vertical.min.css" rel="stylesheet">
    <link href="Content/pace-theme-minimal.css" rel="stylesheet">
    <link href="Content/animate.css" rel="stylesheet">
    <!-- Template core CSS-->
    <link href="Content/template.css" rel="stylesheet">
</head>
<body>
    <!-- Layout-->
    <div class="layout">
        <!-- Header-->
        <header class="header header-center">
            <div class="container-fluid">
                <!-- Logos-->
              <!--  <div class="inner-header">
                    <a class="inner-brand" href="index.html">
                        <img class="brand-dark" src="Content/images/logo.png" width="77px" alt="">
                        <img class="brand-light" src="Content/images/logo-light.png" width="77px" alt="">
                    </a>
                </div> -->
                <!-- Navigation-->
                <div class="inner-navigation collapse">
                    <div class="inner-navigation-inline">
                        <div class="inner-nav">
                            <ul>
                                <!-- Home-->
                                <li class="menu-item-has-children menu-item-has-mega-menu">
                                    <a href="index.php">Home</a>
                                    <div class="mega-menu">
                                        <ul class="sub-menu mega-menu-row">
                                            <!-- Column 1-->
                                        </ul>
                                    </div>
                                </li>
                                <!-- Home end-->
                                <!-- Contact Us-->
                                <li class="menu-item-has-children">
                                    <a href="contact.php">Contact Us</a>
                                </li>
                                <!-- Read php-->
                                <li class="menu-item-has-children">
                                    <a href="Content/downloads/grabngomenu.pdf">Menu Download</a>
                                </li>
                                <!-- Mega menu-->
                                <li class="menu-item-has-children menu-item-has-mega-menu">
                                    <a href="menu.php">Menu</a>
                                </li>
                                <!-- Mega menu end-->
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Extra menu-->
                <div class="extra-nav">
                    <ul>
                        <li><a href="cart.php"><span>Cart</span><span class="fa fa-bars"></span></a></li>
                    </ul>
                </div>
                <!-- Mobile menu-->
                <div class="nav-toogle"><a href="#" data-toggle="collapse" data-target=".inner-navigation"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a></div>
            </div>
        </header>
        <!-- Header end-->
        <!-- Wrapper-->
        <div class="wrapper">
            <!-- Page Header-->
            <section class="module-header full-height parallax bg-dark bg-gradient" data-background="Content/images/chicken.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <img class="brand-dark" src="Content/images/GING.png" alt="">
                            <h1 class="h1 m-b-15">Food Mart</h1>


                         <!--   <p class="m-b-30">Start with co-working way in our studio.</p> -->
                            <p>
                                <a class="btn btn-lg btn-circle btn-white" href="#">Online Ordering Coming Soon</a>
                        <!--        <a class="btn btn-lg btn-outline btn-circle btn-white" href="#">Learn More</a> -->
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Page Header end-->
			
				<!-- Contact-->
				<section class="module">
					<div class="container">
						<div class="row">
							<div class="col-md-8 offset-md-2">
								<div class="module-title text-center">
									<h2>Let´s Talk</h2>
									<p class="font-serif">Please feel free to get in touch anytime.</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8 offset-md-2">
								<form id="contact-form" method="post" novalidate>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input class="form-control" type="text" name="name" placeholder="Name" required="">
												<p class="help-block text-danger"></p>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input class="form-control" type="email" name="email" placeholder="E-mail" required="">
												<p class="help-block text-danger"></p>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control" type="text" name="subject" placeholder="Subject" required="">
												<p class="help-block text-danger"></p>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<textarea class="form-control" name="message" placeholder="Message" rows="12" required=""></textarea>
											</div>
										</div>
										<div class="col-md-12">
											<div class="text-center">
												<input class="btn btn-round btn-brand" type="submit" value="Send Request">
											</div>
										</div>
									</div>
								</form>
								<!-- Ajax response-->
								<div class="ajax-response text-center" id="contact-response"></div>
							</div>
						</div>
					</div>
				</section>
				<!-- Contact end-->
			
			
			
            <!-- Footer-->
            <footer class="footer">
                <div class="footer-copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <span class="copyright">© 2017 Grab It N Go, All Rights Reserved.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Footer end-->
            <a class="scroll-top" href="#top"><i class="fa fa-angle-up"></i></a>
        </div>
        <!-- Wrapper end-->
    </div>
    <!-- Layout end-->
    <!-- Off canvas-->
    <div class="off-canvas-sidebar">
        <div class="off-canvas-sidebar-wrapper">
            <div class="off-canvas-header">
            <a class="close-offcanvas" href="#"><span class="arrows arrows-arrows-remove"></span></a>
            </div>
            <div class="off-canvas-content">
                <!-- Text widget-->
                <aside class="widget widget_text">
                    <div class="textwidget">
                        <p class="text-center"><img src="Content/images/GING.png" alt=""></p>
                    </div>
                </aside>
                <!-- Navmenu widget-->
                <aside class="widget widget_nav_menu">
                    <ul class="menu">
                        <li class="menu-item menu-item-has-children"><a href="index.php">Home</a></li>
                        <li class="menu-item"><a href="contact.php">Contact Us</a></li>
                        <li class="menu-item"><a href="#">Menu</a></li>
                    </ul>
                </aside>
                <ul class="social-icons">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Off canvas end-->
    <!-- Scripts-->
    <script src="Scripts/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.1.1/js/tether.min.js"></script>
    <script src="Scripts/bootstrap.min.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA0rANX07hh6ASNKdBr4mZH0KZSqbHYc3Q"></script>
    <script src="Scripts/plugins.min.js"></script>
    <script src="Scripts/custom.min.js"></script>
</body>
</html>