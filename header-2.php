<?php
include 'db_connection.php';
include 'admin2/includes/data.php';
?>
<header id="header" class="tra-menu navbar-dark white-scroll">
				<div class="header-wrapper">


					<!-- MOBILE HEADER -->
				    <div class="wsmobileheader clearfix">	  	
				    	<span class="smllogo">
				    		<a href="demo-9.php" class="logo-black"><img src="images/demo-beauty-studio.webp" alt="mobile-logo"></a>
				    		<a href="demo-9.php" class="logo-white"><img src="images/demo-beauty-studio.webp" alt="mobile-logo"></a>
				    	</span>
				    	<a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>	
				 	</div>


				 	<!-- NAVIGATION MENU -->
				  	<div class="wsmainfull menu clearfix">
	    				<div class="wsmainwp clearfix">


	    					<!-- HEADER BLACK LOGO -->
	    					<div class="desktoplogo">
	    						<a href="demo-9.php" class="logo-black"><img src="<?php echo $brand_logo; ?>" alt="logo"  class="brand-image img-circle elevation-2"
							style="width: 100px; height: 110px; object-fit: contain;  background-color: white; "></a>
	    					</div>


	    					<!-- HEADER WHITE LOGO -->
	    					<div class="desktoplogo">
	    						<a href="demo-9.php" class="logo-white"><img src="<?php echo $brand_logo; ?>" alt="logo"  class="brand-image img-circle elevation-2"
							style="width: 100px; height: 100px; object-fit: contain;  background-color: white; "></a>
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

									<!-- <li class="nl-simple" aria-haspopup="true"><a href="about.php" class="h-link">About</a></li> -->



								    <!-- SIMPLE NAVIGATION LINK -->
							    	<!-- <li class="nl-simple" aria-haspopup="true"><a href="pricing-2.php" class="h-link">Services</a></li> -->
									<?php
								$sql = "SELECT c_id, c_service FROM category_service"; 
$result = mysqli_query($conn, $sql);
?>

<li aria-haspopup="true">
    <a href="#" class="h-link">Services<span class="wsarrow"></span></a>
    <ul class="sub-menu">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            // echo '<li aria-haspopup="true"><a href="pricing-' . $row['c_id'] . '">' . htmlspecialchars($row['c_service']) . '</a></li>';
			// echo '<li aria-haspopup="true"><a href="pricing">' . htmlspecialchars($row['c_service']) . '</a></li>';
			echo '<li aria-haspopup="true"><a href="pprice?c_id=' . $row['c_id'] . '">' . htmlspecialchars($row['c_service']) . '</a></li>';
        }
        ?>
    </ul>
</li>

									<!-- <li aria-haspopup="true"><a href="#" class="h-link">Services<span class="wsarrow"></span></a>
	            						<ul class="sub-menu">
	            							<li aria-haspopup="true"><a href="pricing-1.php">Hair Services</a></li>
	            							<li aria-haspopup="true"><a href="pricing-2.php">Beauty Services</a></li>
											<li aria-haspopup="true"><a href="pricing-3.php">Hands & Feet</a></li>
						           		</ul>
								    </li> -->

								    <!-- DROPDOWN MENU -->
						        	<!-- <li aria-haspopup="true"><a href="#" class="h-link">Pages <span class="wsarrow"></span></a>
						        		<div class="wsmegamenu clearfix halfmenu">
						              		<div class="container-fluid">
						                		<div class="row">

						                			
									                <ul class="col-lg-6 link-list">		
									                	<li><a href="about.php">About Salon</a></li>					
									                    <li><a href="pricing-1.php">Salon Menu #1</a></li>
									                    <li><a href="pricing-2.php">Salon Menu #2</a></li>
									                    <li><a href="pricing-3.php">Salon Menu #3</a></li>
									                    <li><a href="gift-cards.php">Gift Cards</a></li>  
									                    <li><a href="team.php">Artists + Staff</a></li>  
									                    <li><a href="artist-details.php">Artist Details</a></li>  
									                    <li><a href="gallery.php">Gallery Page</a></li>
									                </ul>

								                  	
									                <ul class="col-lg-6 link-list">	
									                	<li><a href="reviews.php">Testimonials</a></li> 
									                	<li><a href="faqs.php">FAQs Page</a></li>		               
									                    <li><a href="blog-listing.php">Blog Listing</a></li>
									                    <li><a href="single-post.php">Blog Post</a></li>
									                    <li><a href="booking.php">Booking Page</a></li>
									                    <li><a href="contact.php">Contact Us</a></li>
									                    <li><a href="location.php">Our Locations</a></li>
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


							    	<!-- SIMPLE NAVIGATION LINK -->
							    	<!-- <li class="nl-simple" aria-haspopup="true"><a href="blog-listing.php" class="h-link">Blog</a></li> -->


								    <!-- SIGN UP BUTTON -->
								    <li class="nl-simple" aria-haspopup="true">
								    	<a href="booking" class="btn btn--tra-white hover--white last-link book">Book Online</a>
								    </li> 
	<li class="nl-simple" aria-haspopup="true">
									<a href="login_page"  class="h-link">Login</a>
							</li>

	        					</ul>
	        				</nav>
							<!-- END MAIN MENU -->


	    				</div>
	    			</div>	<!-- END NAVIGATION MENU -->


				</div>     <!-- End header-wrapper -->
			</header>