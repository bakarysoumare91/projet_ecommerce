<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<style>
  .image-container {
    max-width: 300px; /* Définissez la largeur maximale souhaitée */
    max-height: 200px; /* Définissez la hauteur maximale souhaitée */
  }

  .image-container img {
    width: 30%;
    height: auto;
  }
  			.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>

		<title>Listes des produits</title>

 		<!-- Google font -->
         <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<!-- Bootstrap -->
 <!-- Bootstrap CSS -->
 <link type="text/css" rel="stylesheet" href="{{ asset('client_front/css/bootstrap.min.css') }}"/>

<!-- Slick -->
<link type="text/css" rel="stylesheet" href="{{ asset('client_front/css/slick.css') }}"/>
<link type="text/css" rel="stylesheet" href="{{ asset('client_front/css/slick-theme.css') }}"/>

<!-- Nouislider -->
<link type="text/css" rel="stylesheet" href="{{ asset('client_front/css/nouislider.min.css') }}"/>

<!-- Font Awesome Icon -->
<link rel="stylesheet" href="{{ asset('client_front/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<!-- Custom stylesheet -->
<link type="text/css" rel="stylesheet" href="{{ asset('client_front/css/style.css') }}"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href=""><i class="fa fa-user-o"></i> Deconnection</a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->	
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								
									</a>
									
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
					
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">{{$clientExist->nom}}</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Date :{{date('Y-m-d H:s:i')}}</a></li>
							
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Historique des commandes</h3>

							</div>
                            <!-- Section Table -->
							<table class="table">
  <thead>
    <tr>
      <th scope="col">Prix</th>
      <th scope="col">Designation</th>
      <th scope="col">Produit</th>
	    <th scope="col">Quantité</th>
		  <th scope="col">Date</th>
	    <th scope="col">Total</th>
		  <th scope="col">Status</th>
	    <th scope="col">Retirer</th>
    </tr>
  </thead>
  <tbody>
  @foreach($commande as $prod)
    <tr>
        <form method="POST" action="#">
            @csrf
            <th scope="row">{{ $prod->prix }}-Fcfa</th>
            <td>{{ $prod->designation }}</td>
            <td class="image-container">
                <img src="{{ asset('storage/'.$prod->photo_first) }}" alt="vide">
            </td>
            <td> {{ $prod->qte_commande }}     </td>
			<td> {{ $prod->date }}     </td>
            <td> {{ $prod->qte_commande * $prod->prix}}     </td>
			<td>{{ $prod->stat}}</td>
			@if($prod->stat=="Valider") 
			<td>🎉</td>
			@else
			<td>
    <a  href="#" class="btn btn-primary">
        <i class="bi bi-trash3"></i>
    </a>
</td>
  @endif
    </tr>
@endforeach
  </tbody>
</table>
{{$commande->links()}}

							<div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="create-account">
									<label for="create-account">
										<span></span>
									</label>
									<div class="caption">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
										<input class="input" type="password" name="password" placeholder="Enter Your Password">
									</div>
								</div>
							</div>
						</div>
						<!-- /Billing Details -->

						<!-- Shiping Details -->
						<div class="shiping-details">
							<div class="section-title">
							</div>
							<div class="input-checkbox">
								
								<div class="caption">									
										
							
								
								</div>
							</div>
						</div>
						<!-- /Shiping Details -->

						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" placeholder="Order Notes"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">VOS INFORMATIONS</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>NOM</strong></div>
								<div><strong>EMAIL</strong></div>
							</div>
							
							<div class="order-col">
								<div>{{$clientExist->nom}}</div>
								<div><strong>{{$clientExist->email}}</strong></div>
							</div>
							<div class="order-col">
								<div><strong>ADRESSE</strong></div>
								<div><strong class="order-total"> {{$clientExist->adresse}}</strong></div>
							</div>
						</div>
						<div class="payment-method">
							     <h4>Modification des informations</h4>
								<form action="" method="POST">
									@csrf
										<div class="form-group">
											<span>NOM</span>
											<input class="input" type="text" name="nom" value="{{$clientExist->nom}}" placeholder="mettez votre nom" required>
										</div>
										<div class="form-group">
										<span>Phone</span>
											<input class="input" type="text" name="tel" value="{{$clientExist->tel}}" placeholder="mettez votre numero telephone" required>
										</div>
										<div class="form-group">
										<span>Email</span>
											<input class="input" type="email" name="email" value="{{$clientExist->email}}" placeholder="mettez votre Email">
										</div>
										<div class="form-group">
										<span>Adresse</span>
											<input class="input" type="text" name="addresse" value="{{$clientExist->adresse}}" placeholder="mettez votre Addresse">
										</div>
							<input type="hidden" name="id" value="{{$clientExist->id}}" placeholder="mettez votre Addresse">

										<div class="form-group"> 
											<button type="submit" value="Modifier" class="btn btn-primary">Modification</button>
										</div>
										</form>
							
						<div class="input-checkbox">
							<form action="	" method="POST">
										@csrf
										<h4>Modification des mots de passes</h4>
										<div class="form-group">
										<span>Mot de passe</span>
											<input class="input" type="password" name="password" placeholder="mettez votre Mot de passe" required>
										</div>
										<div class="form-group">
										<span>Entrer le nouveau mot de passe</span>
											<input class="input" type="password" name="confirmation_password" placeholder="Confirmation votre mot de passe" required>
										</div>

										<span>Confirmation mot de passes</span>
											<input class="input" type="password" name="new_passe" placeholder="Confirmation votre mot de passe" required>
										</div>
										<input type="hidden" name="id" value="{{$clientExist->id}}" placeholder="mettez votre Addresse">

										<div class="form-group"> 
											<input type="submit" value="Envoyer" class="btn btn-primary" required>
										</div>
										</form>
						</div>
					</div>
					<!-- /Order Details -->


					<div id="myModal" class="modal">

				<!-- Modal login client -->
				

           </div>
 
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
				<!-- jQuery Plugins -->
                <script src="{{ asset('client_front/js/jquery.min.js')}}"></script>
		<script src="{{ asset('client_front/js/bootstrap.min.js')}}"></script>
		<script src="{{ asset('client_front/js/slick.min.js')}}"></script>
		<script src="{{ asset('client_front/js/nouislider.min.js')}}"></script>
		<script src="{{ asset('client_front/js/jquery.zoom.min.js')}}"></script>
		<script src="{{ asset('client_front/js/main.js')}}"></script>


 <script>
			var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
		</script>

		 <script>
    function confirmDelete(deleteUrl) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet élément ?")) {
            window.location.href = deleteUrl;
        }
    }
</script>
	</body>
</html>

