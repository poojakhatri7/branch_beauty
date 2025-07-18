<?php
include 'db_connection.php';
include 'admin2/includes/data.php';
?>
	
	<!-- HEADER
			============================================= -->
		<header id="header" class="tra-menu navbar-light white-scroll">
			<div class="header-wrapper">


				<!-- MOBILE HEADER -->
				<div class="wsmobileheader clearfix">
					<span class="smllogo">
						<a href="./" class="logo-black"><img src="<?php echo $brand_logo; ?>" alt="mobile-logo"  class="brand-image img-circle elevation-2"
							style="width: 100px; height: 50px; object-fit: contain;  background-color: white;"></a>
						<a href="./" class="logo-white"><img src="<?php echo $brand_logo; ?>" alt="mobile-logo"  class="brand-image img-circle elevation-2"
							style="width: 100px; height: 50px; object-fit: contain;  background-color: white;"></a>
					</span>
					<a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
				</div>


				<!-- NAVIGATION MENU -->
				<div class="wsmainfull menu clearfix">
					<div class="wsmainwp clearfix">


						<!-- HEADER BLACK LOGO -->
						<div class="desktoplogo">
							<a href="./" class="logo-black"><img src="<?php echo $brand_logo; ?>" alt="logo"  class="brand-image img-circle elevation-2"
							style="width: 100px; height: 100px; object-fit: contain;  background-color: white;"></a>
						</div>


						<!-- HEADER WHITE LOGO -->
						<div class="desktoplogo">
							<a href="./" class="logo-white"><img src="<?php echo $brand_logo; ?>" alt="logo" class="brand-image img-circle elevation-2" 
  style="width: 100px; height: 100px; object-fit: contain;  background-color: white;"></a>
						</div>


						<!-- MAIN MENU -->
						<nav class="wsmenu clearfix">
							<ul class="wsmenu-list">


								<li class="nl-simple" aria-haspopup="true"><a href="./" class="h-link">Home</a></li>
								

								<li aria-haspopup="true"><a href="#" class="h-link">About <span class="wsarrow"></span></a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="about">About Us</a></li>
										<li aria-haspopup="true"><a href="artist_and_staff">Artist + Staff</a></li>
									   </ul>
								</li>

								<!-- <li class="nl-simple" aria-haspopup="true"><a href="about" class="h-link">About</a></li> -->



								<!-- SIMPLE NAVIGATION LINK -->
								<!-- <li class="nl-simple" aria-haspopup="true"><a href="pricing-2" class="h-link">Services</a></li> -->
								 <?php
								$sql = "SELECT c_id, c_service FROM category_service"; 
$result = mysqli_query($conn, $sql);
?>

<li aria-haspopup="true">
    <a href="#" class="h-link">Services<span class="wsarrow"></span></a>
    <ul class="sub-menu">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            // echo '<li aria-haspopup="true"><a href="pricing' . $row['c_id'] . '">' . htmlspecialchars($row['c_service']) . '</a></li>';
			// echo '<li aria-haspopup="true"><a href="pricing">' . htmlspecialchars($row['c_service']) . '</a></li>';
			echo '<li aria-haspopup="true"><a href="pprice?c_id=' . $row['c_id'] . '">' . htmlspecialchars($row['c_service']) . '</a></li>';
        }
        ?>
    </ul>
</li>



								<!-- <li aria-haspopup="true"><a href="#" class="h-link">Services<span class="wsarrow"></span></a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="pricing-1">Hair Services</a></li>
										<li aria-haspopup="true"><a href="pricing-2">Beauty Services</a></li>
										<li aria-haspopup="true"><a href="pricing-3">Hands & Feet</a></li>
									   </ul>
								</li> -->

								<!-- DROPDOWN MENU -->
								<!-- <li aria-haspopup="true"><a href="#" class="h-link">Pages <span class="wsarrow"></span></a>
									<div class="wsmegamenu clearfix halfmenu">
										  <div class="container-fluid">
											<div class="row">

												
												<ul class="col-lg-6 link-list">		
													<li><a href="about">About Salon</a></li>					
													<li><a href="pricing-1">Salon Menu #1</a></li>
													<li><a href="pricing-2">Salon Menu #2</a></li>
													<li><a href="pricing-3">Salon Menu #3</a></li>
													<li><a href="gift-cards">Gift Cards</a></li>  
													<li><a href="team">Artists + Staff</a></li>  
													<li><a href="artist-details">Artist Details</a></li>  
													<li><a href="gallery">Gallery Page</a></li>
												</ul>

												  
												<ul class="col-lg-6 link-list">	
													<li><a href="reviews">Testimonials</a></li> 
													<li><a href="faqs">FAQs Page</a></li>		               
													<li><a href="blog-listing">Blog Listing</a></li>
													<li><a href="single-post">Blog Post</a></li>
													<li><a href="booking">Booking Page</a></li>
													<li><a href="contact">Contact Us</a></li>
													<li><a href="location">Our Locations</a></li>
												</ul>

											</div>
										  </div>
									</div>
								  </li>	 -->
								<!-- END DROPDOWN MENU -->
								 


								<!-- SIMPLE NAVIGATION LINK -->
								 <li class="nl-simple" aria-haspopup="true"><a href="package" class="h-link">Packages</a></li>

								<li class="nl-simple" aria-haspopup="true"><a href="gallery" class="h-link">Gallery</a></li>

								<li class="nl-simple" aria-haspopup="true"><a href="contact" class="h-link">Contact</a></li>

<li class="nl-simple" aria-haspopup="true"><a href="branches" class="h-link">Branches</a></li>
								<!-- SIMPLE NAVIGATION LINK -->
								<!-- <li class="nl-simple" aria-haspopup="true"><a href="blog-listing" class="h-link">Blog</a></li> -->


								<!-- SIGN UP BUTTON -->
								<li class="nl-simple" aria-haspopup="true">
									<a href="booking" class="btn btn--tra-white hover--white last-link">Book Online</a>
								</li> 
								<li class="nl-simple" aria-haspopup="true">
									<a href="login_page"  class="h-link">Login</a>
							</li>
								<!-- <li class="nl-simple" aria-haspopup="true"><a href="admin2" target="_blank" class="h-link">admin</a></li> -->
							</ul>
						</nav>

						<!-- END MAIN MENU -->


					</div>
				</div> <!-- END NAVIGATION MENU -->


			</div> <!-- End header-wrapper -->
		</header> 
		
		<!-- END HEADER -->