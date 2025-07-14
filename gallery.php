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
		<title> Portfolio | <?php echo $brand_name ;   ?></title>
							
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
			
			<?php include 'header-2.php'; ?>	
			
			<!-- END HEADER -->




			<!-- INNER PAGE TITLE
			============================================= -->	
			<section id="reviews-page" class="pb-6 inner-page-title division">
				<div class="container">	
					<div class="row">	
						<div class="col">
							<div class="page-title-txt">
								<h2>It’s Time For a Change</h2>	
								<p>The perfect combination of beauty and relaxation</p>
							</div>	
						</div>
					</div>
				</div>	   <!-- End container --> 
			</section>	<!-- END INNER PAGE TITLE -->
			
		
		
			<!-- GALLERY-1
			============================================= -->
			<div id="gallery-1" class="gallery-section division">
				<div class="container">	


					<!-- IMAGES WRAPPER -->	
					<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3">
					<?php
			$sql = "SELECT * FROM portfolio";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    //   echo $row['file'];
	 $imagePath = $web_link.$row['file']; 
	//   echo '<img src="' . $imagePath . '" width="400" height="400" style="margin:10px;">';
	
        ?>

						<!-- IMAGE #1 -->
					  	<div class="col">
					  		<div class="gallery-image">
					  			<div class="hover-overlay"> 

						  			<!-- Image -->
									<img class="img-fluid" src="<?php echo $imagePath ?>" alt="about-image" style="width: 450px; height: 450px; object-fit: cover;">
								
			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href=<?php echo $imagePath ?>>
												
												<span class="flaticon-visibility"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div>
						<?php }}?>

						<!-- IMAGE #2 -->
					  	<!-- <div class="col">
					  		<div class="gallery-image">
					  			<div class="hover-overlay">  -->

						  			<!-- Image -->
									<!-- <img class="img-fluid" src="images/gallery/hair_02.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				 -->
									
									<!-- Image Zoom -->
									<!-- <div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/hair_02.jpg">
												<span class="flaticon-visibility"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div> -->


						<!-- IMAGE #3 -->
					  	<!-- <div class="col">
					  		<div class="gallery-image">
					  			<div class="hover-overlay">  -->

						  			<!-- Image -->
									<!-- <img class="img-fluid" src="images/gallery/hair_03.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				 -->
									
									<!-- Image Zoom -->
									<!-- <div class="image-data gallery-video">
										<div class="gallery-link ico-40 color--white">
											<a class="video-popup1" href="https://www.youtube.com/embed/SZEflIVnhH8">
												<span class="flaticon-play"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div> -->


						<!-- IMAGE #4 -->
					  	<!-- <div class="col">
					  		<div class="gallery-image">
					  			<div class="hover-overlay">  -->

						  			<!-- Image -->
									<!-- <img class="img-fluid" src="images/gallery/hair_04.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									 -->
									<!-- Image Zoom -->
									<!-- <div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/hair_04.jpg">
												<span class="flaticon-visibility"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div> -->


						<!-- IMAGE #5 -->
					  	<!-- <div class="col">
					  		<div class="gallery-image">
					  			<div class="hover-overlay">  -->

						  			<!-- Image -->
									<!-- <img class="img-fluid" src="images/gallery/nail_06.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				 -->
									
									<!-- Image Zoom -->
									<!-- <div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="video-popup2" href="https://www.youtube.com/watch?v=7e90gBu4pas">
												<span class="flaticon-play"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div> -->


						<!-- IMAGE #6 -->
					  	<!-- <div class="col">
					  		<div class="gallery-image">
					  			<div class="hover-overlay">  -->

						  			<!-- Image -->
									<!-- <img class="img-fluid" src="images/gallery/hair_06.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				 -->
									
									<!-- Image Zoom -->
									<!-- <div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/hair_06.jpg">
												<span class="flaticon-visibility"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div> -->


						<!-- IMAGE #7 -->
					  	<!-- <div class="col">
					  		<div class="gallery-image">
					  			<div class="hover-overlay">  -->

						  			<!-- Image -->
									<!-- <img class="img-fluid" src="images/gallery/hair_07.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									 -->
									<!-- Image Zoom -->
									<!-- <div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/hair_07.jpg">
												<span class="flaticon-visibility"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div> -->


						<!-- IMAGE #8 -->
					  	<!-- <div class="col">
					  		<div class="gallery-image">
					  			<div class="hover-overlay">  -->

						  			<!-- Image -->
									<!-- <img class="img-fluid" src="images/gallery/hair_08.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									 -->
									<!-- Image Zoom -->
									<!-- <div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/hair_08.jpg">
												<span class="flaticon-visibility"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div> -->


						<!-- IMAGE #9 -->
					  	<!-- <div class="col">
					  		<div class="gallery-image">
					  			<div class="hover-overlay">  -->

						  			<!-- Image -->
									<!-- <img class="img-fluid" src="images/gallery/nail_01.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				 -->
									
									<!-- Image Zoom -->
									<!-- <div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/nail_01.jpg">
												<span class="flaticon-visibility"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div> -->


						<!-- IMAGE #10 -->
					  	<!-- <div class="col">
					  		<div class="gallery-image">
					  			<div class="hover-overlay">  -->

						  			<!-- Image -->
									<!-- <img class="img-fluid" src="images/gallery/hair_10.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									 -->
									<!-- Image Zoom -->
									<!-- <div class="image-data gallery-video">
										<div class="gallery-link ico-40 color--white">
											<a class="video-popup2" href="https://www.youtube.com/embed/7e90gBu4pas">
												<span class="flaticon-play"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div> -->


						<!-- IMAGE #11 -->
					  	<!-- <div class="col">
					  		<div class="gallery-image">
					  			<div class="hover-overlay">  -->

						  			<!-- Image -->
									<!-- <img class="img-fluid" src="images/gallery/nail_04.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				 -->
									
									<!-- Image Zoom -->
									<!-- <div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/nail_04.jpg">
												<span class="flaticon-visibility"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div> -->


						<!-- IMAGE #12 -->
					  	<!-- <div class="col">
					  		<div class="gallery-image">
					  			<div class="hover-overlay">  -->

						  			<!-- Image -->
									<!-- <img class="img-fluid" src="images/gallery/hair_11.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									 -->
									<!-- Image Zoom -->
									<!-- <div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/hair_11.jpg">
												<span class="flaticon-visibility"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div> -->


						<!-- IMAGE #13 -->
					  	<!-- <div class="col">
					  		<div class="gallery-image">
					  			<div class="hover-overlay">  -->

						  			<!-- Image -->
									<!-- <img class="img-fluid" src="images/gallery/nail_02.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									 -->
									<!-- Image Zoom -->
									<!-- <div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/nail_02.jpg">
												<span class="flaticon-visibility"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div> -->


						<!-- IMAGE #14 -->
					  	<!-- <div class="col">
					  		<div class="gallery-image">
					  			<div class="hover-overlay">  -->

						  			<!-- Image -->
									<!-- <img class="img-fluid" src="images/gallery/hair_05.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				 -->
									
									<!-- Image Zoom -->
									<!-- <div class="image-data gallery-video">
										<div class="gallery-link ico-40 color--white">
											<a class="video-popup3" href="https://www.youtube.com/embed/0gv7OC9L2s8">
												<span class="flaticon-play"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div> -->


						<!-- IMAGE #15 -->
					  	<!-- <div class="col">
					  		<div class="gallery-image">
					  			<div class="hover-overlay">  -->

						  			<!-- Image -->
									<!-- <img class="img-fluid" src="images/gallery/hair_09.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				 -->
									
									<!-- Image Zoom -->
									<!-- <div class="image-data color--white">
										<div class="gallery-link ico-40">
											<a class="image-link" href="images/gallery/hair_09.jpg">
												<span class="flaticon-visibility"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div> -->


					</div>	<!-- END IMAGES WRAPPER -->	


					<!-- INSTAGRAM LINK -->		
			 		<div class="row">
			 			<div class="col">
			 				<div class="more-btn">
								<a href="" class="btn btn--tra-black hover--black">Visit Our Instagram</a>
							</div>
						</div>
					</div>	<!-- END BUTTON -->	



				</div>	 <!-- End container -->
			</div>	<!-- END GALLERY-1 -->




			<!-- BANNER-1
			============================================= -->
			<section class="pt-8 banner-1 banner-section">
				<div class="container">
					<div class="banner-1-wrapper banner-1-hair bg--fixed">
						<div class="row">
							<div class="col">
								<div class="banner-1-txt text-center color--white">

									<!-- Section ID -->	
						 			<span class="section-id">This Week Only</span>

									<!-- Title -->	
									<h2>Get <span>30% OFF</span></h2>
									<h3>Custom Color Service</h3>

									<!-- Button -->	
									<a href="booking" class="btn btn--tra-white hover--white">Book an Appointment</a>

								</div>
							</div>
						</div>   <!-- End row -->	
					</div>    <!-- End banner wrapper -->
				</div>     <!-- End container -->	
			</section>	<!-- END BANNER-1 -->



			<!-- FOOTER-1
			============================================= -->
			<?php include 'footer.php'; ?>
			<!-- END FOOTER-1 -->
			



		</div>	<!-- END PAGE CONTENT -->	




		<!-- EXTERNAL SCRIPTS
		============================================= -->	
		<script src="js/jquery-3.7.0.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<script src="js/modernizr.custom.js"></script>
		<script src="js/jquery.easing.js"></script>
		<script src="js/menu.js"></script>
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

		<!-- <script>
			$(function() {
			  $(".switch").click(function() {
			  	 $("body").toggleClass("theme--dark");
			  });
			});
		</script> -->

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


	</body>



<!-- Mirrored from dsathemes.com/html/r_eine_1.1/files/gallery.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Dec 2024 10:23:59 GMT -->
</html>