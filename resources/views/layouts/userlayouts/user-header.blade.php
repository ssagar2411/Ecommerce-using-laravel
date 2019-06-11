 <!-- ##### Header Area Start ##### -->
 <header class="header_area">
	<div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
		<!-- Classy Menu -->
		<nav class="classy-navbar" id="essenceNav">
			<!-- Logo -->
			<a class="nav-brand" href="index.html"><img src="{{ asset('images/frontend_images/core-img/logo-1.png') }}" alt=""></a>
			<!-- Navbar Toggler -->
			<div class="classy-navbar-toggler">
				<span class="navbarToggler"><span></span><span></span><span></span></span>
			</div>
			<!-- Menu -->
			<div class="classy-menu">
				<!-- close btn -->
				<div class="classycloseIcon">
					<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
				</div>
				<!-- Nav Start -->
				<div class="classynav">
					<ul>
						<li><a href="#">Shop</a>
							<div class="megamenu">
								<ul class="single-mega cn-col-4">
									<li class="title">Women's Collection</li>
									<li><a href="shop.html">Dresses</a></li>
									<li><a href="shop.html">Blouses &amp; Shirts</a></li>
									<li><a href="shop.html">T-shirts</a></li>
									<li><a href="shop.html">Rompers</a></li>
									<li><a href="shop.html">Bras &amp; Panties</a></li>
								</ul>
								<ul class="single-mega cn-col-4">
									<li class="title">Men's Collection</li>
									<li><a href="shop.html">T-Shirts</a></li>
									<li><a href="shop.html">Polo</a></li>
									<li><a href="shop.html">Shirts</a></li>
									<li><a href="shop.html">Jackets</a></li>
									<li><a href="shop.html">Trench</a></li>
								</ul>
								<ul class="single-mega cn-col-4">
									<li class="title">Kid's Collection</li>
									<li><a href="shop.html">Dresses</a></li>
									<li><a href="shop.html">Shirts</a></li>
									<li><a href="shop.html">T-shirts</a></li>
									<li><a href="shop.html">Jackets</a></li>
									<li><a href="shop.html">Trench</a></li>
								</ul>
								<div class="single-mega cn-col-4">
									<img src="{{ asset('images/frontend_images/bg-img/bg-6.jpg') }}" alt="">
								</div>
							</div>
						</li>
						<li><a href="#">Pages</a>
							<ul class="dropdown">
								<li><a href="index.html">Home</a></li>
								<li><a href="shop.html">Shop</a></li>
								<li><a href="single-product-details.html">Product Details</a></li>
								<li><a href="checkout.html">Checkout</a></li>
								<li><a href="blog.html">Blog</a></li>
								<li><a href="single-blog.html">Single Blog</a></li>
								<li><a href="regular-page.html">Regular Page</a></li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
				<!-- Nav End -->
			</div>
		</nav>

		<!-- Header Meta Data -->
		<div class="header-meta d-flex clearfix justify-content-end">
			<!-- Search Area -->
			<div class="search-area">
				<form action="#" method="post">
					<input type="search" name="search" id="headerSearch" placeholder="Type for search">
					<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				</form>
			</div>
			<!-- User Login Info -->
			<div class="user-login-info">
				<a href="{{ route('user.getRegister') }}"><img src="{{ asset('images/frontend_images/core-img/user.svg') }}" alt=""></a>
			</div>
			<!-- Cart Area -->
			<div class="cart-area">
				<a href="#" id="essenceCartBtn"><img src="{{ asset('images/frontend_images/core-img/bag.svg') }}" alt=""> <span id="cartcount"></span></a>
			</div>
		</div>

	</div>
</header>
<!-- ##### Header Area End ##### -->

<!-- ##### Right Side Cart Area ##### -->
<div class="cart-bg-overlay"></div>

<div class="right-side-cart-area">

	<!-- Cart Button -->
	<div class="cart-button">
		<a href="#" id="rightSideCart"><img src="{{ asset('images/frontend_images/core-img/bag.svg') }}" alt=""> <span id="#cartcount"></span></a>
	</div>

	<div class="cart-content d-flex" id="cart-content">

		<!-- Cart List Area -->
		<div class="cart-list">
		</div>

		<!-- Cart Summary -->
		<div class="cart-amount-summary">

			<h2>Summary</h2>
			<ul class="summary-table">
				<li><span>subtotal:</span> <span>$274.00</span></li>
				<li><span>delivery:</span> <span>Free</span></li>
				<li><span>discount:</span> <span>-15%</span></li>
				<li><span>total:</span> <span>$232.00</span></li>
			</ul>
			<div class="checkout-btn mt-100">
				<a href="{{ route('public.viewcart') }}" class="btn essence-btn">View Cart</a>
			</div>
		</div>
	</div>
</div>
<!-- ##### Right Side Cart End ##### -->
