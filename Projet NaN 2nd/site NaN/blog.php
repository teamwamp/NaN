<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Scholar Vision an education Category Bootstrap Responsive website Template | Blog :: w3layouts</title>
<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Scholar Vision Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta-Tags -->
<!-- Custom-Stylesheet-Links -->
<!-- Bootstrap-CSS --> <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- Font-awesome-CSS --> <link href="css/font-awesome.css" rel="stylesheet"> 
<!-- Index-Page-CSS --><link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom-Stylesheet-Links -->
<!--web-fonts-->
<!-- Headings-font --><link href="//fonts.googleapis.com/css?family=Hind+Vadodara:300,400,500,600,700" rel="stylesheet">
<!-- Body-font --><link href="//fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
<!--font-Diplomata--><link href="https://fonts.googleapis.com/css?family=Diplomata" rel="stylesheet">
<!--w3 school--><link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!--//fonts-->
<!-- js -->
</head>
<body>
<!-- banner -->
<div class="banner inner-banner-w3-agileits" id="home">
	<div class="banner-overlay-agileinfo">
	<div class="top-header-agile">
		<h1><a class="col-md-4 navbar-brand" href="index.php">Not a Number<span>  </span></a></h1>
		<div class="col-md-4 top-header-agile-right">
				<ul>
					<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="https://www.facebook.com/ecolenan"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<!--<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>-->
				</ul>
			</div>
			<div class="col-md-4 top-header-agile-left">
				<ul class="num-w3ls">
					<li><i class="fa fa-phone" aria-hidden="true"></i></li>
					<li><a href="contact.php" data-hover="Mail Us">Contact</a></li>
				</ul>
				<div class="w3ls_search">
													<div class="cd-main-header">
														<ul class="cd-header-buttons">
															<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
														</ul> <!-- cd-header-buttons -->
													</div>
													<div id="cd-search" class="cd-search">
														<form action="#" method="post">
															<input name="Search" type="search" placeholder="Search...">
														</form>
													</div>
												</div>
					</div>
			
			<div class="clearfix"></div>
		</div>

		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="link-effect-3" id="link-effect-3">
						<ul class="nav navbar-nav">
							<li><a href="index.php" data-hover="Home">Accueil</a></li>
							<li><a href="about.php" data-hover="About Us">A propos</a></li>
							<li><a href="gallery.php" data-hover="Gallery">Communauté</a></li>
							<li class="dropdown menu__item">
								<a href="#" class="dropdown-toggle menu__link"  data-toggle="dropdown" data-hover="Pages" role="button" aria-haspopup="true" aria-expanded="false">Etudiants<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="gallery.php">Life-Story</a></li>
									<li><a href="icons.php">Projet open-sources</a></li>
								</ul>
							</li>
							<li class="active"><a href="blog.php" data-hover="Blog">Actualités</a></li>
							<li><a href="entreprise.php" data-hover="About Us">Entreprises</a></li>
							
						</ul>
					</nav>
				</div>
			</nav>	
				<h2 class="inner-tittle-w3layouts"  style="font-family: 'Diplomata', cursive;">News</h2>
		</div>
	</div>
</div>
<!-- //banner -->

<!--contenu-->
<?php 

		require 'admin/database.php';		
		$db = Database::connect();
		$statement = $db->query('SELECT items.id, items.date, items.title, items.idea, items.detail, items.image FROM  items ORDER BY items.id DESC');

		echo '<div class="blog">';
		echo '<div class="container-fluid">';
		echo '<h3 class="tittle-agileits-w3layouts text-center">Tous sur l\'Actualités NaN</h3>';
		while ($item = $statement->fetch()){

			echo '<div class="col-md-4">';
			echo '<div class="blog-info">';
			echo '<h6>' . $item['date'] . '</h6>';
			echo '<h4><a>' . $item['title'] . '</a></h4>';
			echo '<p>' . $item['idea'] . '</p>';
			echo '<a class="button-w3layouts hvr-rectangle-out"  onclick="document.getElementById(\'menu\').style.display=\'block\'">' . 'Plus de Detail' . '</a>';

			//modal

			echo '<div id="menu" class="w3-modal">';
			echo '<div class="w3-modal-content w3-animate-zoom">';
			echo '<div class="w3-container w3-black w3-display-container">';
			echo '<span onclick="document.getElementById(\'menu\').style.display=\'none\'" class="w3-button w3-display-topright w3-large">' . 'x' . '</span>';
			echo '</div>';
			echo '<div class="w3-container">';
			echo $item['detail'];
			echo '</div>';
			echo '</div>';
			echo '</div>';

			//Menu Modal

			echo '<div class="blog-btm-w3">';
			echo '<div class="blog-right-w3ls">';
			echo '<i class="fa fa-comments-o" aria-hidden="true" >' . '</i>' . '<a href="#">' . '1 commentaire' . '</a>';
			echo '</div>';
			echo '<div class="clearfix">' . '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="blog-image-agileits-w3layouts">';
			echo '<a href="#" data-toggle="modal" data-target="#myModal1">' . '<img src="images/' . $item['image'] .'"' . 'alt="image">' . '</a>';
			echo '</div>';
			echo '<div style="margin: 5px;">';
			echo '<button class="share_twitter" style="background-color: #55acee; border-radius: 10px" data-url="file:///Users/nan/Desktop/site%20NaN/blog.html" >' . '<i class="fa fa-twitter" aria-hidden="true">' . '</i>' . 'Partager sur twitter' . '</button>';
			echo '<button class="share_facebook" style="background-color:#6d84b4; border-radius: 10px;" data-url="file:///Users/nan/Desktop/site%20NaN/blog.html">' . '<i class="fa fa-facebook" aria-hidden="true">' . '</i>' . 'Partager sur facebook' . '</button>';
			echo '</div>';
			echo '</div>';
		}

		echo '</div>';
		echo '<div class="clearfix"></div>';
		echo '</div>';


		Database::disconnect();



?>
			
			
				 
				 
			
		
	
	







<!--//javascripts partage -->
<script>
	(function(){

var popupCenter = function(url, title, width, height){
	var popupWidth = width || 640;
	var popupHeight = height || 320;
	var windowLeft = window.screenLeft || window.screenX;
	var windowTop = window.screenTop || window.screenY;
	var windowWidth = window.innerWidth || document.documentElement.clientWidth;
	var windowHeight = window.innerHeight || document.documentElement.clientHeight;
	var popupLeft = windowLeft + windowWidth / 2 - popupWidth / 2 ;
	var popupTop = windowTop + windowHeight / 2 - popupHeight / 2;
	var popup = window.open(url, title, 'scrollbars=yes, width=' + popupWidth + ', height=' + popupHeight + ', top=' + popupTop + ', left=' + popupLeft);
	popup.focus();
	return true;
};

document.querySelector('.share_twitter').addEventListener('click', function(e){
	e.preventDefault();
	var url = this.getAttribute('data-url');
	var shareUrl = "https://twitter.com/intent/tweet?text=" + encodeURIComponent(document.title) +
		"&via=Not_a_Number" +
		"&url=" + encodeURIComponent(url);
	popupCenter(shareUrl, "Partager sur Twitter");
});

document.querySelector('.share_facebook').addEventListener('click', function(e){
	e.preventDefault();
	var url = this.getAttribute('data-url');
	var shareUrl = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(url);
	popupCenter(shareUrl, "Partager sur facebook");
});
}) ();
</script>
<!--//javascripts partage -->

<!--//reviews-->

<!--footer-->
	<div class="footer w3layouts">
		<div class="container">
			<div class="footer-row w3layouts-agile">
				<div class="col-md-4 footer-grids w3l-agileits">
					<p class="footer-one-w3ls">Nous rejoindre sur les reseaux sociaux</p>
					<div class="top-header-agile-right">
						<ul>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="https://www.facebook.com/ecolenan"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-md-3 footer-grids w3l-agileits">
					<h3>Contact Info</h3>
					<p>Not a Number, CI</p>
					<p>+225 </p>
					<p>Besoin d'aide ? veuillez nous contacter</p>
					<p><a href="info@nan.ci">info@nan.ci</a></p>
				</div>
				<div class="col-md-3 footer-grids w3l-agileits">	
					<h3>Newsletter</h3>
					<p>Veuiller vous abonner a notre news letter afin d'etre informer en temp reel.<p>
					 <form action="#" method="post">		 
							<input type="email" class="text" required="" />
							<input type="submit" value="Go" />					 
				     </form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!--//footer-->	
<!-- copy-right -->
			<div class="copyright-wthree">
				<p>&copy; 2018 . Organisme à but non lucratif | Design by Teem Wamp <a href="#"> Not a Number </a></p>
			</div>
<!-- //copy-right -->
	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->

<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

<!--search-bar-->
		<script src="js/main.js"></script>	
<!--//search-bar-->
 <!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<!--js for bootstrap working-->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>