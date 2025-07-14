<?php 
include 'db_connection.php';
include 'asset.php';
?>
<!doctype html>
<html lang="en">
<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="author" content="DSAThemes">	
		<meta name="description" content="Reine - Beauty Salon HTML5 Template">
		<meta name="keywords" content="DSAThemes, Beauty, Salon, Beauty Parlour, Health Care, Makeup, Nail Salon, Therapy, Treatment">
		<meta name="viewport" content="width=device-width, initial-scale=1">
				
  		<!-- SITE TITLE -->
		<title> Home | <?php  echo $brand_name ; ?></title>
							
		<!-- FAVICON AND TOUCH ICONS -->
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="152x152" href="images/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="120x120" href="images/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="images/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
		<link rel="icon" href="images/apple-touch-icon.png" type="image/x-icon">

		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css2?family=Alex+Brush&amp;display=swap" rel="stylesheet">	
		<link href="https://fonts.googleapis.com/css2?family=Vollkorn:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>



		<!-- BOOTSTRAP CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
				
		<!-- FONT ICONS -->
		<link href="css/flaticon.css" rel="stylesheet">

		<!-- PLUGINS STYLESHEET -->
		<link href="css/menu.css" rel="stylesheet">	
		<link id="effect" href="css/dropdown-effects/fade-down.css" media="all" rel="stylesheet">
		<link href="css/magnific-popup.css" rel="stylesheet">	
		<link href="css/owl.carousel.min.css" rel="stylesheet">
		<link href="css/owl.theme.default.min.css" rel="stylesheet">
		<link href="css/datetimepicker.min.css" rel="stylesheet">
		<link href="css/lunar.css" rel="stylesheet">

		<!-- ON SCROLL ANIMATION -->
		<link href="css/animate.css" rel="stylesheet">

		<!-- TEMPLATE CSS -->
		<link href="css/style.css" rel="stylesheet"> 
		
		<!-- RESPONSIVE CSS -->
		<link href="css/responsive.css" rel="stylesheet">

	</head>
	<body>




		<!-- PRELOADER SPINNER
		============================================= -->
		
		<?php include 'preloader.php'; ?>


		<!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page">




			<!-- HEADER
			============================================= -->
			<?php include 'header-1.php'; ?>
			
			<!-- END HEADER -->




			<!-- HERO-9
			============================================= -->	
			<!-- <div id="hero-9" class="bg--fixed hero-section"> -->
            <?php
$sql = "SELECT * FROM banner_management ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<?php if (mysqli_num_rows($result) > 0): ?>
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php 
    $active = true;
    while ($row = mysqli_fetch_assoc($result)) { 
        $imagePath = $web_link.$row['file'];
        $title = $row['content'];
		$Button_name = $row['buttonName'];
		$Button_Link = $row['buttonLink'];
    ?>
      <div class="carousel-item <?php echo $active ? 'active' : ''; ?>" data-interval ="4000">
        <div class="carousel-bg" style="background-image: url('<?php echo $imagePath; ?>'); ">
        <!-- <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-10 col-lg-9">
        <h1 class="hero-9-txt color--white text-center mt-70"></h1>
        <a href="pprice.php?c_id=1" class="btn btn--tra-white hover--white">View Salon Menu</a>
        </div>
    </div>
    </div> -->
          <!-- Optional overlay text -->
           <!-- HERO-9 TEXT -->	
				 <!-- <div class="container">  -->
					<div class="row justify-content-center">
						<div class="col-md-10 col-lg-9">
							<div class="hero-10-txt color--white text-center mt-70"> 

								<!-- Title -->
								<h2><?php echo $title; ?></h2>

								<!-- Button -->
								<?php if (!empty($Button_Link)) { ?>
								<a href="<?php echo $Button_Link; ?>" class="btn btn--tra-white hover--white"><?php echo $Button_name; ?></a>
								<?php } ?>
							 </div>
						</div>	
					 </div>	
				<!-- </div>   -->
        </div>
      </div>
    <?php 
      $active = false;
    } 
    ?>
  </div>

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    <span class="sr-only"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
    <span class="sr-only"></span>
  </button>
</div>
<?php endif; ?>

<style>
    
.carousel-bg {
	min-height: 550px;
    text-align: center;
  background: no-repeat center center;
  background-size: cover;
  background-attachment: scroll!important;
  padding-top: 200px;
  padding-bottom: 170px;

}
.carousel-control-prev-icon,
.carousel-control-next-icon {
    /* filter: invert(1); makes white icon black */
}
@media (max-width: 768px) {
  .carousel-bg {
    min-height: 300px;
    padding-top: 200px;
    padding-bottom: 100px;
  }

  .hero-10-txt h2 {
    font-size: 1.5rem;
  }

  .btn {
    font-size: 0.9rem;
    padding: 8px 16px;
  }
  .carousel-control-prev,
  .carousel-control-next {
    top: 50%; /* Move even further down on small screens */
  }

}

.plus-sign i {
  font-size: 18px;
  color: rgb(106, 90, 205); /* Blue color */
  background-color: #e6f0ff; /* Light blue background */
  padding: 8px;
  border-radius: 50%;
  transition: 0.3s ease;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}
.plus-sign i:hover {
  color: #fff;
  background-color:rgb(47, 43, 75);
  transform: scale(1.1);
  cursor: pointer;
}
body.theme--dark .modal-content {
  background-color: #2c2c2c !important;
  color: #fff !important;
}

body.theme--dark .modal-header,
body.theme--dark .modal-body,
body.theme--dark .modal-footer

 {
  background-color: #2c2c2c !important;
  color: #fff !important;
  border-color: #444 !important; /* optional: dark border */
}


/* body.theme--dark .changingmodal {
  background-color: #2c2c2c !important;
  color:rgb(95, 37, 37) !important;
} */
/* body.theme--dark .discount-text {
  color:rgb(156, 210, 226) !important; or any color you like */


    </style>

				<!-- HERO-9 TEXT -->	
				<!-- <div class="container">
					<div class="row justify-content-center">
						<div class="col-md-10 col-lg-9">
							<div class="hero-9-txt color--white text-center mt-70"> -->

								<!-- Title -->
								<!-- <h2>Unleash your beauty with Demo Beauty Studio</h2> -->

								<!-- Button -->
								<!-- <a href="pprice.php?c_id=1" class="btn btn--tra-white hover--white">View Salon Menu</a> -->

							<!-- </div>
						</div>	
					 </div>	End row -->
				<!-- </div>  END HERO-9 TEXT --> 


				<!-- TRANSPARENT TEXT  -->
				 <div class="tra-header">
					<h2 class="color--white">Naturally you</h2>
				</div>


			</div>	<!-- END HERO-9 -->




			<!-- ABOUT-1
			============================================= -->
			<section class="pt-8 about-1 about-section">
				<div class="container">
					<div class="row justify-content-center">	


						<!-- TEXT BLOCK -->	
						<div class="col-lg-10 col-xl-9">
							<div class="txt-block text-center">

								<!-- Section ID -->	
					 			<span class="section-id">Indulge Yourself</span>

					 			<!-- Transparent Title -->	
								<h2 class="tra-title">Come, Relax and Enjoy</h2>	

								<!-- Title -->	
								<h2 class="h2-title">Your Secret Place of Beauty</h2>

								<!-- Text -->	
								<p class="mb-0">Discover your haven of beauty and tranquility. Relax, rejuvenate, and let us enhance your natural glow in your secret place of peace and elegance.
								</p>

							</div>
						</div>	<!-- END TEXT BLOCK -->	


					</div>    <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END ABOUT-1 -->




			<!-- SERVICES-3
			============================================= -->
			<div id="services-3" class="pt-6 pb-8 services-section division">
				<div class="container">


			 		<!-- SERVICES-3 WRAPPER -->
			 		<div class="sbox-3-wrapper text-center">
			 			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6">


			 				<!-- SERVICES BOX #1 -->
							<div class="col">
								<div class="sbox-3 sb-1 wow fadeInUp">
									
									<!-- Icon -->
									<div class="sbox-ico ico-65">
										<span class="flaticon-facial-treatment color--black"></span>
									</div>

									<!-- Text -->
									<div class="sbox-txt">
										<p>Facials</p>
									</div>
																																				
								</div>							
							</div>	<!-- END SERVICES BOX #1 -->	


				 			<!-- SERVICES BOX #2 -->
							<div class="col">
								<div class="sbox-3 sb-2 wow fadeInUp">
								
									<!-- Icon -->
									<div class="sbox-ico ico-65">
										<span class="flaticon-eyelashes color--black"></span>
									</div>

									<!-- Text -->
									<div class="sbox-txt">
										<p>Eyelash</p>
									</div>
										
								</div>							
							</div>	<!-- END SERVICES BOX #2 -->
								
								
							<!-- SERVICES BOX #3 -->
							<div class="col">
								<div class="sbox-3 sb-3 wow fadeInUp">

									<!-- Icon -->
									<div class="sbox-ico ico-65">
										<span class="flaticon-eyebrow color--black"></span>
									</div>

									<!-- Text -->
									<div class="sbox-txt">
										<p>Eyebrow</p>
									</div>
		
								</div>							
							</div>	<!-- END SERVICES BOX #3 -->


							<!-- SERVICES BOX #4 -->
							<div class="col">
								<div class="sbox-3 sb-4 wow fadeInUp">

									<!-- Icon -->
									<div class="sbox-ico ico-65">
										<span class="flaticon-wax color--black"></span>
									</div>

									<!-- Text -->
									<div class="sbox-txt">
										<p>Waxing</p>
									</div>
						
								</div>							
							</div>	<!-- END SERVICES BOX #4 -->


							<!-- SERVICES BOX #5 -->
							<div class="col">
								<div class="sbox-3 sb-5 wow fadeInUp">

									<!-- Icon -->
									<div class="sbox-ico ico-65">
										<span class="flaticon-foundation color--black"></span>
									</div>

									<!-- Text -->
									<div class="sbox-txt">
										<p>Nails</p>
									</div>

								</div>							
							</div>	<!-- END SERVICES BOX #5 -->


							<!-- SERVICES BOX #6 -->
							<div class="col">
								<div class="sbox-3 sb-6 wow fadeInUp">

									<!-- Icon -->
									<div class="sbox-ico ico-65">
										<span class="flaticon-cosmetics color--black"></span>
									</div>

									<!-- Text -->
									<div class="sbox-txt">
										<p>Make-Up</p>
									</div>

								</div>							
							</div>	<!-- END SERVICES BOX #6 -->


			 			</div>	 <!-- End row -->
			 		</div>	 <!-- END SERVICES-3 WRAPPER -->


			 		<!-- MORE BUTTON -->		
			 		<div class="row">
			 			<div class="col">
			 				<div class="more-btn">
								<a href="pprice?c_id=2" class="btn btn--tra-black hover--black">View Our Menu</a>
							</div>
						</div>
					</div>	


			 	</div>	   <!-- End container -->		
			</div>	<!-- END SERVICES-3 -->




			<!-- TEXT CONTENT
			============================================= -->
			
			<section class="shape--01 poudre--shape py-7 ct-01 content-section division">
				<div class="container">
					<div class="row d-flex align-items-center">
					<?php

$sql = "SELECT * FROM tb_about_us";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      
        $image = $web_link.$row['file1'];
		$page_titile=$row['page_title'];
		$page_description=$row['text_area'];
		//$sql = "SELECT * FROM portfolio ORDER BY id DESC LIMIT 1 OFFSET 1";

        ?>

						<!-- TEXT BLOCK -->	
						<div class="col-lg-6 order-last order-lg-2">
							<div class="txt-block left-column wow fadeInRight">

								<!-- Section ID -->	
						 		<span class="section-id">Mind, Body and Soul</span>
	
								<!-- Title -->	
								<h2 class="h2-md"><?php echo $page_titile ?></h2>

								<!-- Text -->	
								<!-- <p class="mb-0 " style="text-align:justify"> <?php echo $page_description ?>
								</p> -->
								<div class="mb-0" style="text-align: justify;">
  <?php echo $page_description ?>
</div>

							</div>
						</div>	<!-- END TEXT BLOCK -->	


						<!-- IMAGE BLOCK -->
						<div class="col-lg-6 order-first order-lg-2">
							<div class="img-block right-column wow fadeInLeft">
								<img class="img-fluid" src="<?php echo $image ?>" alt="Image" style="width: 650px; height: 650px; object-fit: cover;" alt="gallery-image" alt="content-image">
							</div>
						</div>


					</div>    <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END TEXT CONTENT -->

			<?php }} ?>


			<!-- PRICING-1
			============================================= -->
			<div class="py-8 pricing-1 pricing-section division">
				<div class="container">


					<!-- SECTION TITLE -->
					<div class="row justify-content-center">	
						<div class="col-lg-10 col-xl-8">
							<div class="section-title text-center mb-6">	

								<!-- Section ID -->	
					 			<span class="section-id">Focus On Beauty</span>	

					 			<!-- Transparent Title -->	
								<h2 class="tra-title">Our Service Menu</h2>

								<!-- Title -->	
								<h2 class="h2-title">Enhance Your Beauty</h2>	
									
							</div>	
						</div>
					</div>


					<!-- PRICING-1 WRAPPER -->
					<div class="pricing-1-wrapper">
						<div class="row">

<?php 
$sql = "SELECT * FROM all_services limit 10";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      
        $service_name =  $row['all_service'];
		$price =  $row['price'];
		$description =  $row['description'];
		
		//$sql = "SELECT * FROM portfolio ORDER BY id DESC LIMIT 1 OFFSET 1";

        ?>


							<!-- PRICING-1 TABLE -->
							<div class="col-lg-6">
								<div class="pricing-1-table left-column wow fadeInUp">
									<ul class="pricing-list">

										<!-- PRICING ITEM #1 -->
										<li class="pricing-1-item">

											<!-- Title & Price -->
											<div class="detail-price">
												<!-- <i class="fa fa-eye"  style="margin-right: 10px;"></i> -->
												 <span class="plus-sign" style="margin-right: 10px;" data-bs-toggle = "modal" data-bs-target = "#exampleModal" data-service_number="<?php echo $row['a_id']; ?>" > <i class="fa fa-eye" ></i></span>
												<div class="price-name"><p><?php echo  $service_name ?></p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p><?php echo "Rs  ".$price ?></p></div>
											</div>

											<!-- Description -->
											<div class="price-txt">
												<p><?php echo $description ?></p>
											</div>
											
										</li>
<br>
										<!-- MENU ITEM #2 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Deep Cleaning Facial</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹130</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 55 minutes</p>
											</div>

										</li> -->

										<!-- MENU ITEM #3 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Organic Facial</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹185</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 1,5 hours</p>
											</div>

										</li> -->

										<!-- PRICING ITEM #4 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Four Layer Facial</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹140</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 1,5 hours</p>
											</div>
											
										</li> -->

										<!-- PRICING ITEM #5 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Biolight Facial</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹165</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 1,5 hours</p>
											</div>
											
										</li> -->

										<!-- MENU ITEM #6 -->
										<!-- <li class="pricing-1-item resp-lst"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Oxygen Blast Facial</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹265</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 60 minutes</p>
											</div> -->

										<!-- </li> -->

									<!-- </ul>	END PRICING LIST -->
								</div>
							</div>	<!-- END PRICING-1 TABLE -->

							<?php }} ?>
							<!-- PRICING-1 TABLE -->
							<!-- <div class="col-lg-6">
								<div class="pricing-1-table right-column wow fadeInUp">	
									<ul class="pricing-list"> -->

										<!-- PRICING ITEM #1 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Eyebrow Tinting</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹15+</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 40 minutes</p>
											</div>
											
										</li> -->

										<!-- MENU ITEM #2 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Eyelash Tinting</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹25+</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 2 hours</p>
											</div>

										</li> -->

										<!-- MENU ITEM #3 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Lash Application</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹45+</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 50 minutes</p>
											</div>

										</li> -->

										<!-- PRICING ITEM #4 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Eyebrow Shaping</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹50 - ₹97</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 1,5 hours</p>
											</div>
											
										</li> -->

										<!-- MENU ITEM #5 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Brow Tint</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>From ₹50</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 1 hour</p>
											</div>

										</li> -->

										<!-- MENU ITEM #6 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Lash Tint</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>From ₹50</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 50 minutes</p>
											</div>

										</li> -->

									<!-- </ul>	END PRICING LIST -->
								<!-- </div> -->
							<!-- </div>	END PRICING-1 TABLE -->


						</div>
					</div>	<!-- END PRICING-1 WRAPPER -->


					<!-- BUTTON -->		
			 		<div class="row">
			 			<div class="col">
			 				<div class="more-btn mt-5">
								<a href="pprice?c_id=1" class="btn btn--tra-black hover--black">View All Prices</a>
							</div>
						</div>
					</div>


				</div>  <!-- End container -->
			</div>	<!-- END PRICING-1 -->




			<!-- WIDE IMAGE
			============================================= -->
			<div class="bg--05 bg--scroll ct-12 content-section"></div>




			<!-- BRANDS-1
			============================================= -->
			<div id="brands-1" class="pt-8 brands-section">
				<div class="container">	


					<!-- BRANDS CAROUSEL -->				
					<div class="row">
						<div class="col text-center">	
							<div class="owl-carousel brands-carousel-5">

												
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-1.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-2.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-3.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-4.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-5.png" alt="brand-logo"></a>
								</div>

													
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-6.png" alt="brand-logo"></a>
								</div>


								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-7.png" alt="brand-logo"></a>
								</div>

															
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-8.png" alt="brand-logo"></a>
								</div>

								
								<!-- BRAND LOGO IMAGE -->
								<div class="brand-logo">
									<a href="#"><img class="img-fluid" src="images/brand-9.png" alt="brand-logo"></a>
								</div>


							</div>	
						</div>
					</div>  <!-- END BRANDS CAROUSEL -->


				</div>	<!-- End container -->
			</div>	<!-- END BRANDS-1 -->




			<!-- GALLERY-4
			============================================= -->		
			<!-- <div id="gallery-4" class="py-8 gallery-section division">
				<div class="container-fluid">


					<div class="row justify-content-center">	
						<div class="col-md-10 col-lg-8">
							<div class="section-title text-center mb-6">	

					 			<span class="section-id">Be a more perfect</span>	

					 			
								<h2 class="tra-title">A Whole New You</h2>
	
								<h2 class="h2-title">Redefine Your Beauty</h2>	
									
							</div>	
						</div>
					</div>


					<div class="gallery-4-wrapper">
						<div class="row">


							<div class="col-md-6 col-lg-2">
								<div id="img-4-1" class="gallery-image">
							  		<div class="hover-overlay"> 

										<img class="img-fluid" src="images/gallery/woman_04.jpg" alt="gallery-image">			
										<div class="item-overlay"></div>				
										
										<div class="image-data">
											<div class="gallery-link ico-30 color--white">
												<a class="image-link" href="images/gallery/woman_04.jpg">
													<span class="flaticon-visibility"></span>
												</a>
											</div>																					 
										</div> 

							  		</div>
								</div>
							</div>


							<div class="col-md-6 col-lg-5">
								<div id="img-4-2" class="gallery-image">
							  		<div class="hover-overlay"> 

										<img class="img-fluid" src="images/gallery/woman_01.jpg" alt="gallery-image">			
										<div class="item-overlay"></div>				
										
										<div class="image-data">
											<div class="gallery-link ico-40 color--white">
												<a class="image-link" href="images/gallery/woman_01.jpg">
													<span class="flaticon-visibility"></span>
												</a>
											</div>																					 
										</div> 

							  		</div>
								</div>
							</div>


							<div class="col-lg-3">


								<div id="img-4-3" class="gallery-image">
							  		<div class="hover-overlay"> 

										<img class="img-fluid" src="images/gallery/woman_03.jpg" alt="gallery-image">			
										<div class="item-overlay"></div>				
										
										<div class="image-data">
											<div class="gallery-link ico-40 color--white">
												<a class="image-link" href="images/gallery/woman_03.jpg">
													<span class="flaticon-visibility"></span>
												</a>
											</div>																					 
										</div> 

							  		</div>
								</div>


								<div id="img-4-4" class="gallery-image">
							  		<div class="hover-overlay"> 

										<img class="img-fluid" src="images/gallery/woman_02.jpg" alt="gallery-image">			
										<div class="item-overlay"></div>				
										
										<div class="image-data">
											<div class="gallery-link ico-40 color--white">
												<a class="image-link" href="images/gallery/woman_02.jpg">
													<span class="flaticon-visibility"></span>
												</a>
											</div>																					 
										</div> 

							  		</div>
								</div>

							</div>	


							<div class="col-lg-2">


								<div id="img-4-5" class="gallery-image">
							  		<div class="hover-overlay"> 

										<img class="img-fluid" src="images/gallery/woman_05.jpg" alt="gallery-image">			
										<div class="item-overlay"></div>				
										
										<div class="image-data">
											<div class="gallery-link ico-30 color--white">
												<a class="image-link" href="images/gallery/woman_05.jpg">
													<span class="flaticon-visibility"></span>
												</a>
											</div>																					 
										</div> 

							  		</div>
								</div>


								<div id="img-4-6" class="gallery-image">
							  		<div class="hover-overlay"> 

										<img class="img-fluid" src="images/gallery/woman_06.jpg" alt="gallery-image">			
										<div class="item-overlay"></div>				
										
										<div class="image-data">
											<div class="gallery-link ico-30 color--white">
												<a class="image-link" href="images/gallery/woman_06.jpg">
													<span class="flaticon-visibility"></span>
												</a>
											</div>																					 
										</div> 

							  		</div>
								</div>


							</div>


						</div>  	
					</div>	
					
					

	
			 		<div class="row">
			 			<div class="col">
			 				<div class="more-btn">
								<a href="gallery" class="btn btn--tra-black hover--black">Visit Our Gallery</a>
							</div>
						</div>
					</div>	
					
				

				</div>	  
			</div>	 -->
			<!-- END GALLERY-4 -->




			<!-- TEXT CONTENT
			============================================= -->
			<section class="shape--02 poudre--shape py-7 ct-02 content-section division">
				<div class="container">
					<div class="row d-flex align-items-center">


						<!-- IMAGE BLOCK -->
						<div class="col-lg-6">
							<div class="img-block left-column wow fadeInRight">
								<img class="img-fluid" src="images/woman_02.jpg" alt="content-image">
							</div>
						</div>


						<!-- TEXT BLOCK -->	
						<div class="col-lg-6">
							<div class="txt-block right-column wow fadeInLeft">

								<!-- Section ID -->	
						 		<span class="section-id">Time to be beautiful</span>
	
								<!-- Title -->	
								<h2 class="h2-md">Give the pleasure of beautiful to yourself</h2>

								<!-- ACCORDION WRAPPER -->	
								<div class="accordion accordion-wrapper mt-5">
									<ul class="accordion">


										<!-- ACCORDION ITEM #1 -->
										<li class="accordion-item is-active">

											<!-- Title -->
											<div class="accordion-thumb"><p>Certified Stylists</p></div>

											<!-- Text -->
											<div class="accordion-panel">
									      		<p class="mb-0">Experience the art of beauty with our certified stylists, delivering expert care and personalized perfection every time.
												</p>
											</div>

										</li>	<!-- END ACCORDION ITEM #1 -->


										<!-- ACCORDION ITEM #2 -->
										<li class="accordion-item">

											<!-- Title -->
											<div class="accordion-thumb"><p>100% Organic Cosmetics</p></div>

											<!-- Text -->	
											<div class="accordion-panel">
												<p class="mb-0">Enhance your natural beauty with our 100% organic cosmetics, crafted to nourish your skin with pure, eco-friendly ingredients.
												</p>
											</div>			

										</li>	<!-- END ACCORDION ITEM #2 -->


										<!-- ACCORDION ITEM #3 -->
										<li class="accordion-item">

											<!-- Title -->
											<div class="accordion-thumb"><p>Easy Online Booking</p></div>

											<!-- Text -->	
											<div class="accordion-panel">
									      		<p class="mb-0">Experience convenience with our online booking system. Schedule your beauty treatments anytime, anywhere, at your convenience!
												</p> 
											</div>
											
										</li>	<!-- END ACCORDION ITEM #3 -->
	<a href="booking" class="btn btn--tra-black hover--black">BOOK AN APPOINTMENT</a>

									</ul>
								</div>	<!-- END ACCORDION WRAPPER -->	

							</div>
						</div>	<!-- END TEXT BLOCK -->	


					</div>    <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END TEXT CONTENT -->




			<!-- WORKING HOURS
			============================================= -->
			<section class="py-8 ct-table content-section division">
				<div class="container">
					<div class="row d-flex align-items-center">


						<!-- TEXT -->
						<div class="col-lg-6">
							<div class="left-column wow fadeInRight">
								
								<!-- Section ID -->	
						 		<span class="section-id">Time Schedule</span>
	
								<!-- Title -->	
								<h2 class="h2-md">Working Hours</h2>

								<!-- Text -->	
								<p class="mb-0">Check our easy-to-read time table for your convenience! Our working hours are clearly displayed for each day, ensuring you can quickly find the best time to book your appointment. With detailed slots available, you can plan your visit around your schedule and enjoy a seamless beauty experience!
								</p>

							</div>
						</div>
						<?php
        $sql = "SELECT * FROM business_hours";
$result1 = mysqli_query($conn, $sql);

?>					

						<!-- TABLE -->	
						<div class="col-lg-6">
							<div class="txt-table right-column wow fadeInLeft">
								<table class="table">
								<tbody>
                            <?php while ($row = mysqli_fetch_assoc($result1)) { ?>
                            <tr>
                                <td><?php echo $row['day']; ?></td>
                                <td>-</td>
                                <td class="text-end">
                                    <?php 
                                    echo date("h:i A", strtotime($row['open_time'])) . " - " . 
                                         date("h:i A", strtotime($row['close_time'])); 
                                    ?>
                                </td>
                            </tr>
                            <?php }  ?>
                        </tbody>
								</table>
							</div>
						</div>	<!-- END TABLE -->	
					

					</div>    <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END WORKING HOURS -->




			<!-- ABOUT-6
			============================================= -->
			<section class="about-6 about-section">
				<div class="container">


					<!-- SECTION TITLE -->
					<div class="row justify-content-center">	
						<div class="col-md-10 col-lg-8">
							<div class="section-title text-center mb-6">	

								<!-- Section ID -->	
					 			<span class="section-id">It’s your time to shine</span>	

					 			<!-- Transparent Title -->	
								<h2 class="tra-title">Get Ready to Shine</h2>

								<!-- Title -->	
								<h2 class="h2-title">Unleash your inner beauty with our salon magic</h2>	
									
							</div>	
						</div>
					</div>
					<?php
$sql = "SELECT * FROM portfolio  LIMIT 5 OFFSET 1";
$result = mysqli_query($conn, $sql);
$images = [];

if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					$image_home[] = $web_link.$row['file'];
				

?>
<?php 
				}}
?>

					<!-- ABOUT-6 CONTENT -->
					<div class="row">


						<!-- ABOUT-6 IMAGE -->
						<div class="col-md-6 col-lg-4">
							<div id="a6-img-1" class="about-6-img">
								<img class="img-fluid" src="<?php echo $image_home[0]; ?>" alt="Image" style="width: 515px; height: 620px; object-fit: cover;"alt="gallery-image" alt="about-image">
							</div>
						</div>


						<!-- ABOUT-6 TEXT -->
						<div class="col-lg-4 order-first order-lg-1">
							<div class="about-6-txt">

								<!-- TEXT -->
								<div class="a6-txt bg--salmon">

									<!-- Title -->
									<h4 class="h4-md">Don’t be ordinary, be extraordinary</h4>

									<!-- Text -->	
									<p class="mb-0">Embrace the extraordinary with our premium beauty services, designed to enhance your natural beauty and boost your confidence. 
									</p>

								</div>

								<!-- IMAGE -->
								<div class="a6-img">
									<img class="img-fluid" src="<?php echo $image_home[3]; ?>" alt="about-image">
								</div>

							</div>
						</div>


						<!-- ABOUT-6 IMAGE -->
						<div class="col-md-6 col-lg-4 order-last order-lg-2">
							<div id="a6-img-2" class="about-6-img">
								<img class="img-fluid" src="<?php echo $image_home[4]; ?>" alt="Image" style="width: 515px; height: 620px; object-fit: cover;"alt="gallery-image" alt="about-image" alt="about-image">
							</div>
						</div>


					</div>	<!-- END ABOUT-6 CONTENT -->


				</div>	   <!-- End container -->
			</section>	<!-- END ABOUT-6 -->
			<?php

?>
<?php
$sql = "SELECT * FROM reviews ";
$result = mysqli_query($conn, $sql);

?>
				
				

<!-- TESTIMONIALS SECTION -->
<div id="reviews-2" class="py-8 reviews-section">
    <div class="container">

        <!-- SECTION TITLE -->
        <div class="row justify-content-center">    
            <div class="col-md-10 col-lg-8">
                <div class="section-title text-center mb-6">
                    <span class="section-id">Testimonials</span>
                    <h2 class="tra-title">Our Happy Clients</h2>    
                    <h2 class="h2-title">Comments & Reviews</h2>    
                </div>    
            </div>
        </div>

        <!-- TESTIMONIALS CONTENT -->
        <div class="row">
            <div class="col">                    
                <div class="owl-carousel owl-theme reviews-2-wrapper">

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <!-- TESTIMONIAL ITEM -->
                    <div class="review-2">
                        <div class="review-txt">


						<div class="star-rating ico-20 color--yellow clearfix">
											<span class="flaticon-star-1"></span>
											<span class="flaticon-star-1"></span>
											<span class="flaticon-star-1"></span>
											<span class="flaticon-star-1"></span>
											<span class="flaticon-star-1"></span>	
										</div>
                            <!-- Name -->
                            <p><strong><?php echo $row['name']; ?></strong></p>

                            <!-- Comment -->
                            <p><?php echo $row['comment']; ?></p>
							
                        </div>
                    </div> <!-- END TESTIMONIAL ITEM -->

                    <?php }} else { ?>
                        <p class="text-center">No reviews available.</p>
                    <?php } ?>

                </div> <!-- END OWL CAROUSEL -->
            </div>
        </div>

    </div> <!-- END CONTAINER -->
</div> <!-- END TESTIMONIALS SECTION -->


		


			<!-- BANNER-2
			============================================= -->
			<section class="bg--03 bg--scroll py-8 banner-2 banner-section">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="banner-2-txt text-center color--white">

								<!-- Section ID -->	
						 		<span class="section-id">This Week Only</span>

								<!-- Title -->	
								<h2>Get <span>30% OFF</span></h2>
								<h3>Quick Face Makeup</h3>

								<!-- Button -->	
								<a href="booking" class="btn btn--tra-white hover--white">Book an Appointment</a>

							</div>
						</div>
					</div>   <!-- End row -->	
				</div>     <!-- End container -->	
			</section>	<!-- END BANNER-2 -->





			<!-- TEXT CONTENT
			============================================= -->
			<section class="py-8 ct-09 content-section division">
				<div class="container text-center">


					<!-- SECTION TITLE -->
					<div class="row justify-content-center">	
						<div class="col-md-10 col-lg-8">
							<div class="section-title text-center mb-6">	

								<!-- Section ID -->	
					 			<span class="section-id">Our Locations</span>	

								<!-- Title -->	
								<h2 class="h2-title">Visit Demo Beauty Studio</h2>	
									
							</div>	
						</div>
					</div>


					<div class="row d-flex align-items-center">


						<!-- TEXT BLOCK -->	
						<div class="col-md-6">
							<div class="left-column wow fadeInRight">

								<!-- IMAGE -->	
								<div class="ct-09-img">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="images/salon_02.jpg" alt="location-photo">
										<div class="item-overlay"></div>
									</div>
								</div>

								<!-- TEXT -->	
								<div class="ct-09-txt">
	
									<!-- Title -->	
									<h3>Visit Demo Beauty Studio </h3>

									<!-- <p class="ct-09-address">8721 Central Ave, Los Angeles, CA 90036</p> -->

									<!-- Advantages List -->
									<ul class="advantages ico-30 clearfix">
										<!-- <li><p class="me-3">est. 2018</p></li> -->
										<!-- <li><p><a href="contact">Learn More</a></p></li>
										<li class="advantages-links-divider"><p><span class="flaticon-vertical-line"></span></p></li> -->
										<li><p><a href="booking">Book Now</a></p></li>
									</ul>

								</div>	<!-- END TEXT -->	

							</div>
						</div>	<!-- END TEXT BLOCK -->	


						<!-- TEXT BLOCK -->	
						<div class="col-md-6">
							<div class="right-column wow fadeInLeft">

								<!-- IMAGE -->	
								<div class="ct-09-img">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="images/salon_03.jpg" alt="location-photo">
										<div class="item-overlay"></div>
									</div>
								</div>

								<!-- TEXT -->	
								<div class="ct-09-txt">
	
									<!-- Title -->	
									<h3>Visit Demo Beauty Studio</h3>

									<!-- <p class="ct-09-address">8493 Sunset Blvd, Los Angeles, CA 90069</p> -->

									<!-- Advantages List -->
									<ul class="advantages ico-30 clearfix">
										<!-- <li><p class="me-3">est. 2021</p></li> -->
										<!-- <li><p><a href="contact">Learn More</a></p></li> -->
										<!-- <li class="advantages-links-divider"><p><span class="flaticon-vertical-line"></span></p></li> -->
										<li><p><a href="booking">Book Now</a></p></li>
									</ul>

								</div>	<!-- END TEXT -->	

							</div>
						</div>	<!-- END TEXT BLOCK -->	


					</div>    <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END TEXT CONTENT -->

  <!-- <div class="text-center">
    <span class="arrow style" onclick="previous()" style="color: black; font-size: 24px;"><
    </span>
    <span class="arrow" onclick="next()" style="color: black; font-size: 24px;">>
    </span>
  </div> -->
  <!-- <div id="imageModal" class="modal" style="display:none;">
  <span class="close" onclick="closeModal()">&times;</span>

  <span class="arrow left" onclick="previousImage()">&#10094;</span>
  <img id="modalImage" src="" class="modal-content" />
  <span class="arrow right" onclick="nextImage()">&#10095;</span>
</div> -->






			<!-- GALLERY-3
			============================================= -->		
			<section id="gallery-3" class="bg--poudre py-8 gallery-section division">
				<div class="container">


					<!-- SECTION TITLE -->
					<div class="row justify-content-center">	
						<div class="col-lg-10 col-xl-8">
							<div class="section-title">
								<h3 class="h3-lg color--black">Follow: <a href="#">@demo_beauty_studio</a></h3>	
							</div>	
						</div>
					</div>


					<!-- IMAGES WRAPPER -->
					<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6">


						<!-- IMAGE #1 -->
					  	<div class="col">
					  		<div id="img-3-1" class="gallery-image">
						  		<div class="hover-overlay"> 

						  			<!-- Image -->
									<img class="img-fluid" src="images/gallery/woman_08.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data">
										 
										<div class="gallery-link ico-40 color--white">
											<a class="image-link"
											 href="images/gallery/woman_08.jpg" data-lightbox="gallery" >
												<span class="flaticon-visibility"></span>
											</a>
										</div>																					 
									</div> 

						  		</div>
							</div>
						</div>


						<!-- IMAGE #2 -->
					  	<div class="col">
					  		<div id="img-3-2" class="gallery-image">
						  		<div class="hover-overlay"> 

						  			<!-- Image -->
									<img class="img-fluid" src="images/gallery/beauty_01.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data gallery-video">
										<div class="gallery-link ico-40 color--white">
											<a class="video-popup1" href="https://www.youtube.com/watch?v=KJwYBJMSbPI">
												<span class="flaticon-play"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div>	


						<!-- IMAGE #3 -->
					  	<div class="col">
					  		<div id="img-3-3" class="gallery-image">
						  		<div class="hover-overlay"> 

						  			<!-- Image -->
									<img class="img-fluid" src="images/gallery/woman_07.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" 
											  href="images/gallery/woman_07.jpg" data-lightbox="gallery"  >
												<span class="flaticon-visibility"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div>


						<!-- IMAGE #4 -->
					  	<div class="col">
					  		<div id="img-3-4" class="gallery-image">
						  		<div class="hover-overlay"> 

						  			<!-- Image -->
									<img class="img-fluid" src="images/gallery/beauty_02.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/beauty_01.jpg" data-lightbox="gallery" >
												<span class="flaticon-visibility"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div>


						<!-- IMAGE #5 -->
					  	<div class="col">
					  		<div id="img-3-5" class="gallery-image">
						  		<div class="hover-overlay"> 

						  			<!-- Image -->
									<img class="img-fluid" src="images/gallery/beauty_03.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data gallery-video">
										<div class="gallery-link ico-40 color--white">
											<a class="video-popup2" href="https://www.youtube.com/watch?v=KJwYBJMSbPI">
												<span class="flaticon-play"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div>


						<!-- IMAGE #6 -->
					  	<div class="col">
					  		<div id="img-3-6" class="gallery-image">
						  		<div class="hover-overlay"> 

						  			<!-- Image -->
									<img class="img-fluid" src="images/gallery/woman_09.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/woman_09.jpg">
												<span class="flaticon-visibility"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div>


					</div>	<!-- END IMAGES WRAPPER -->


				</div>	   <!-- End container -->
			</section>	<!-- END GALLERY-3 -->




			<!-- MODAL-2
			============================================= -->
			<!-- <div id="modal-2" class="modal fade" tabindex="-1">
				 <div class="modal-dialog modal-xl modal-dialog-centered">
			        <div class="modal-content">


			            <button type="button" class="modal-close color--black ico-20" data-bs-dismiss="modal" aria-label="Close">
			            	<span class="flaticon-246"></span>
			            </button>
			            

			            <div class="modal-body">
			            	<div class="container">
                  				 <div class="row">


                  				 	<div class="col-md-6 bg-img d-none d-sm-flex align-items-end"></div>


                  				 	<div class="col-md-6">
                  				 		<div class="modal-body-content">

                  			
                  				 			<div class="request-form-title">

		                  				 
												<h3 class="h3-md">Get <span>10% OFF</span></h3>
												<h4 class="h4-md">New Guest Offer</h4>		

												
												<p>Experience Reine Studio and enjoy 10% off your first salon service</p>

											</div>
	                  				 		
											
	                  				 		<form name="requestForm" class="row request-form">

	                  				 		     
								                <div class="col-md-12">
								                	<input type="email" name="email" class="form-control email" placeholder="Enter Your Email*" autocomplete="off" required> 
								                </div>
							                                            
								             
								                <div class="col-md-12 form-btn">  
								                	<button type="submit" class="btn btn--black hover--tra-black submit">Get Started Now</button>
								                </div>	
								               
												<div class="request-form-msg"><span class="loading"></span></div>	
								                                              
								            </form>			

								        </div>
                  				 	</div>	
		            		

                  				 </div>
                  			</div>
			            </div>	


					 </div>
			    </div>
			</div>	 -->

				<!-- Modal starts  -->

 <div class="modal fade changingmodal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Service details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body"> 
		
		<!-- <img id="modalServiceImage" src="" alt="Service Image" class="d-block mx-auto" style="max-width: 50%;">			 -->
        <div id="serviceCarousel" class="carousel slide mb-3" data-bs-ride="carousel">
  <div class="carousel-inner" id="carouselImages"></div>
  <button class="carousel-control-prev" type="button" data-bs-target="#serviceCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#serviceCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

        <p><strong>Service Name:</strong> <span id="modalServiceName"></span></p>
        <!-- <p><strong>Price : </strong>  <span id="modalServicePrice"></span></p> -->
		 <p><strong>Price :</strong> <span id="modalServicePrice"></span> <span id="modalDiscount" style="color: rgb(106, 90, 205); font-weight: bold;"></span></p>
		 <p><strong>Offer Price : </strong>  <span id="modalOfferPrice"></span></p>
        <p><strong>Description:</strong> <span id="modalServiceDescription"></span></p>
 <a href="booking" style="text-decoration: none;">
		<div style="display: flex; justify-content: center; align-items: center; margin-top: 20px;">
  <button type="submit" name="submit" class="btn" style="background-color: rgb(42, 35, 90); color: rgb(238, 230, 217); font-weight: 500; font-size: 16px; border-radius: 10px; padding: 7px 20px;">
    BOOK NOW
  </button>
   </a>
</div>

      </div>

       <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div> 
    </div>
  </div>
</div>

		<!-- Modal ends  -->	

			<!-- END MODAL-2 -->

			<!-- FOOTER-1
			============================================= -->

					
						
						<!-- END FOOTER NEWSLETTER FORM -->	


					



		</div>	<!-- END PAGE CONTENT -->	




		<!-- EXTERNAL SCRIPTS
		============================================= -->	
		<script src="js/jquery-3.7.0.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<script src="js/modernizr.custom.js"></script>
		<script src="js/jquery.easing.js"></script>
		<script src="js/menu.js"></script>
		<script src="js/materialize.js"></script>
		<script src="js/tweenmax.min.js"></script>	
		<script src="js/slideshow.js"></script>	
		<script src="js/datetimepicker.js"></script>	
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/request-form.js"></script>	
		<script src="js/jquery.validate.min.js"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>	
		<script src="js/popper.min.js"></script>
		<script src="js/lunar.js"></script>
		<script src="js/wow.js"></script>
				
		<!-- Custom Script -->		
		<script src="js/custom.js"></script>

		<!-- <script>
			$(document).on({
			    "contextmenu": function (e) {
			        console.log("ctx menu button:", e.which); 

			        // Stop the context menu
			        e.preventDefault();
			    },
			    "mousedown": function(e) { 
			        console.log("normal mouse down:", e.which); 
			    },
			    "mouseup": function(e) { 
			        console.log("normal mouse up:", e.which); 
			    }
			});
		</script> -->

		<script>
			// $(function() {
			//   $(".switch").click(function() {
			//   	 $("body").toggleClass("theme--dark");
			//   });
			// });
// 			  $(document).ready(function () {
//     // Apply saved theme on page load
//     if (localStorage.getItem("theme") === "dark") {
//       $("body").addClass("theme--dark");
//     }

//     // Toggle theme on switch click
//     $(".switch").click(function (e) {
//       e.preventDefault(); // Prevent default anchor behavior
//       $("body").toggleClass("theme--dark");

//       // Save theme preference
//       if ($("body").hasClass("theme--dark")) {
//         localStorage.setItem("theme", "dark");
//       } else {
//         localStorage.setItem("theme", "light");
//       }
//     });
//   });
		</script>

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->															
		<!--
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-XXXXX-X']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
		-->	
<script>
$(document).on('click', '.plus-sign', function () {
    const service_number = $(this).data('service_number');

    $.ajax({
        url: 'get_price.php',
        type: 'POST',
        data: { service_number: service_number },
        dataType: 'json',
        success: function (data) {
            if (data.error) {
                alert(data.error);
            } else {
                $('#modalServiceName').text(data.all_service);
              $('#modalServicePrice').html('<s>Rs ' + data.price + '</s>'); 
			//    $('#modalOfferPrice').html('Rs ' + data.price_after_discount ); 
			$('#modalOfferPrice').html('<strong>Rs ' + data.price_after_discount + '</strong>');
			   $('#modalDiscount').html('(' + data.discount_percentage + '% OFF)' ); 
                $('#modalServiceDescription').text(data.description);

                const images = data.images;
                const carouselInner = $('#carouselImages');
                carouselInner.empty();

                images.forEach((src, index) => {
                    const activeClass = index === 0 ? 'active' : '';
                    carouselInner.append(`
                        <div class="carousel-item ${activeClass}">
                            <img src="${src}" class="d-block mx-auto" style="width: 200px; height: 250px; object-fit: cover;" alt="Service Image ${index + 1}">
                        </div>
                    `);
                });

                // const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                // modal.show();
            }
        },
        error: function () {
            alert('Error fetching service details.');
        }
    });
});
</script>



	</body>

<?php include 'footer.php'; ?>

<!-- Mirrored from dsathemes.com/html/r_eine_1.1/files/demo-9 by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Dec 2024 10:23:07 GMT -->
</html>