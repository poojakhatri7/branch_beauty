<?php
include 'db_connection.php';
include 'asset.php';

$c_id = $_GET ['c_id'];
// echo $c_id;
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
	<title> Service | <?php echo $brand_name ;   ?></title>
							
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

<?php
$sql = "SELECT * FROM  category_service  WHERE c_id = $c_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    //   echo $row['file'];
	 $imagePath = $web_link.$row['file']; 
	//   echo '<img src="' . $imagePath . '" width="400" height="400" style="margin:10px;">';
	
        ?>

<?php } } ?>
			<!-- INNER PAGE HERO
			============================================= -->	  
			<section id="pricing-page-1" class="inner-page-hero division" style="background-image: url('<?php echo $imagePath; ?>');">
				
			<div class="container">	
					<div class="row">	
						<div class="col">
							<div class="page-hero-txt color--white">
							<?php 
$sql = "Select * from category_service WHERE c_id={$c_id}";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0)
While ($row = mysqli_fetch_assoc($result))
{
$c_service = $row ['c_service'];
$description = $row ['description'];
?>
								<h2><?php echo $c_service  ?> </h2>	
								<p> <?php echo $description ?>  </p>
							</div>	
						</div>
					</div>
				</div>	   <!-- End container --> 
			</section>	<!-- END INNER PAGE HERO -->

<?php }?>

<style>
.price-dots {
  position: relative;
  /* display: table-cell; */
  height: 4px;
  width: 70%;
  z-index: 2;
  background-image: radial-gradient(circle closest-side,#878889 99%,transparent 100%);
  background-position: 30% 100%;
  background-size: 5px 2px;
  background-repeat: repeat-x;
  flex-grow: 1;
  
}
.plus-sign i {
  /* color: black;
  margin-right: 15px;
  font-weight: bold; */
   /* display: inline-block;
  width: 19px;
  height: 20px;
  background-color:rgb(25, 122, 151); /* Bootstrap primary blue */
  /* color: white;
  font-weight: light;
  border-radius: 100%;
  text-align: center; */
  /* line-height: 20px;
  margin-right: 8px;
  font-size: 16px;
  transition: background-color 0.3s ease; */ 
    /* color:rgb(24, 51, 80);           Bootstrap primary color */
  /* font-size: 17px;         
  background-color:rgb(217, 235, 245);
  padding: 1px;            
  border-radius: 50%;      
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15); 
  transition: 0.3s ease;
  cursor: pointer; */
  
font-size: 20px ;
  color: rgb(97, 83, 190); /* Blue color */
  background-color: #e6f0ff; /* Light blue background */
  padding: 8px;
  border-radius: 50%;
  transition: 0.3s ease;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);

}
.plus-sign i:hover {
  /* background-color:rgb(189, 31, 44);
  cursor: pointer; */
    /* background-color:rgb(176, 203, 231);
  color: green; */
    color: #fff;
  background-color:rgb(47, 43, 75);
  transform: scale(1.1);
  cursor: pointer;
}
.carousel-control-prev-icon,
.carousel-control-next-icon {
    filter: invert(1); /* makes white icon black */
}
body.theme--dark .card {
  background-color: #2c2c2c !important;
  color: #ffffff !important;
}
	</style>

	
<!-- CARD BOOTSTRAP
			============================================= -->
<?php
$sql_subcategories = "SELECT scs.s_id, scs.s_name, scs.file, scs.description  AS subcategory_description
                      FROM sub_category_service scs
                      WHERE scs.sub_service = $c_id"; 

$result_subcategories = mysqli_query($conn, $sql_subcategories);

if (mysqli_num_rows($result_subcategories) > 0) {
?>
    <!-- Flex container starts -->
    <div style="display: flex; flex-wrap: wrap; gap: 3 rem; justify-content: center; padding: 0 2rem;">
<?php
    while ($row = mysqli_fetch_assoc($result_subcategories)) {
	 $imagePath = $web_link.$row['file']; 
        $s_id = $row['s_id'];
?>
        <div class="card mx-4 mt-5" style="width: 15rem; font-size: 0.875rem;" onclick="scrollToSubCategory()">
       
          <div class="card-body">
            <h5 class="card-title" style="font-size: 1.5rem;"><?php echo $row['s_name']; ?></h5>
			  <img src="<?php echo $imagePath; ?> " class="card-img-top" alt="...">
            <p class="card-text" style="font-size: 0.85rem;"><?php echo $row['subcategory_description']; ?></p>
          </div>
        </div>
<?php

    }
?>
    </div> <!-- Flex container ends -->
<?php
}
?>

<!-- ============================================= -->
<div id="sub_category_service" >
		
			<!-- PRICING-5
			============================================= -->
			<div class="container pt-8 pricing-5 pricing-section">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
			
            <?php
            $sql_subcategories = "SELECT scs.s_id, scs.s_name, scs.description AS subcategory_description
                                  FROM sub_category_service scs
                                  WHERE scs.sub_service = $c_id"; 

            $result_subcategories = mysqli_query($conn, $sql_subcategories);

            if (mysqli_num_rows($result_subcategories) > 0) {
                while ($subcategory = mysqli_fetch_assoc($result_subcategories)) {
                    $s_id = $subcategory['s_id'];
            ?>
                    <div class="pricing-5-category mb-4 mt-4">
                        <h3 class="text-center "><?php echo $subcategory['s_name']; ?></h3>
                      
                    </div>

                    <?php
                    $sql_services = "SELECT asv.a_id, asv.all_service, asv.price, asv.description AS service_description
                                     FROM all_services asv
                                     WHERE asv.service_number = $s_id"; 

                    $result_services = mysqli_query($conn, $sql_services);

                    if (mysqli_num_rows($result_services) > 0) {
                    ?>
                        <ul class="pricing-list">
                            <?php while ($service = mysqli_fetch_assoc($result_services)) { ?>
                                <li class="pricing-5-item d-flex  justify-content-between align-items-center flex-wrap gap-2">
                                    <div class="price-name flex-grow-1 ">
																		
                                       
										 <p class="mb-0">
										
<!-- <i class="fa fa-eye eye-icon" ></i> -->
  <span class="plus-sign" data-bs-toggle = "modal" data-bs-target = "#exampleModal" data-service_number="<?php echo $service['a_id']; ?>" ><i class="fa fa-eye" ></i></span>
  <span class="service-text"><?php echo $service['all_service']; ?></span>
</p> 
                                    </div>
									<div class="price-dots "></div> <!-- Dots appear here -->
                                    <div class="price-number">
                                        <p class="fw-bold mb-0"> Rs  <?php echo $service['price']; ?></p>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } else { ?>
                        <p class="text-center text-danger">No services available for this subcategory.</p>
                    <?php } ?>
            <?php
                }
            } else {
                echo '<p class="text-center text-danger">No subcategories available for this category.</p>';
            }
            ?>
        </div>
    </div>
</div>
		</div>

<!-- Modal for services -->
<!-- <div class="modal fade" id="modal-default1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Service Information</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="serviceform">
          <div class="form-group">
            <p><strong>Service Name:</strong> <span id="modalServiceName"></span></p>
            <p><strong>Price:</strong> <span id="modalPrice"></span></p>
            <p><strong>Description:</strong> <span id="modalDescription"></span></p>
          </div>
        </form>
        <div id="message"></div>
      </div>

      <div class="modal-footer justify-content-between">                
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div> -->
<!-- Modal starts -->
<!-- <script>
  document.querySelectorAll('.plus-sign').forEach(function(element) {
    element.addEventListener('click', function() {
      console.log("Service Number:", this.getAttribute('data-service_number'));
    });
  });
</script> -->




	<!-- Modal starts  -->

 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

		<!-- Modal ends  -->
<?php
$sql = "SELECT * FROM portfolio  LIMIT 6";
$result = mysqli_query($conn, $sql);
$images = [];

if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					$image[] = $web_link.$row['file'];
				

?>
<?php 
				}}
?>


			<!-- GALLERY-4
			============================================= -->		
			<div id="gallery-4" class="py-8 gallery-section division">
				<div class="container-fluid">


					<!-- GALLERY-4 WRAPPER -->
					<div class="gallery-4-wrapper">
						<div class="row">


							<!-- IMAGE #1 -->
							<div class="col-md-6 col-lg-2">
								<div id="img-4-1" class="gallery-image">
							  		<div class="hover-overlay"> 

							  			<!-- Image -->
										<img class="img-fluid " src="<?php echo $image[0]; ?>"  style="width: 100%; height: 350px; object-fit: cover;"alt="gallery-image">			
										<div class="item-overlay"></div>				
										
										<!-- Image Zoom -->
										<div class="image-data">
											<div class="gallery-link ico-30 color--white">
												<a class="image-link" href="<?php echo $image[0]; ?>">
													<span class="flaticon-visibility"></span>
												</a>
											</div>																					 
										</div> 

							  		</div>
								</div>
							</div>


							<!-- IMAGE #2 -->
							<div class="col-md-6 col-lg-5">
								<div id="img-4-2" class="gallery-image">
							  		<div class="hover-overlay"> 

							  			<!-- Image -->
										<img class="img-fluid" src="<?php echo $image[1]; ?>" alt="Image" style="width: 500px; height: 650px; object-fit: cover;" alt="gallery-image">			
										<div class="item-overlay"></div>				
										
										<!-- Image Zoom -->
										<div class="image-data">
											<div class="gallery-link ico-40 color--white">
												<a class="image-link" href="<?php echo $image[1]; ?>">
													<span class="flaticon-visibility"></span>
												</a>
											</div>																					 
										</div> 

							  		</div>
								</div>
							</div>


							<!-- IMAGE #1 -->
							<div class="col-lg-3">


								<!-- IMAGE #3 -->
								<div id="img-4-3" class="gallery-image">
							  		<div class="hover-overlay"> 

							  			<!-- Image -->
										<img class="img-fluid" src="<?php echo $image[2]; ?>" alt="Image" style="width: 320px; height: 400px; object-fit: cover;" alt="gallery-image" alt="gallery-image">			
										<div class="item-overlay"></div>				
										
										<!-- Image Zoom -->
										<div class="image-data">
											<div class="gallery-link ico-40 color--white">
												<a class="image-link" href="<?php echo $image[2]; ?>">
													<span class="flaticon-visibility"></span>
												</a>
											</div>																					 
										</div> 

							  		</div>
								</div>


								<!-- IMAGE #4 -->
								<div id="img-4-4" class="gallery-image">
							  		<div class="hover-overlay"> 

							  			<!-- Image -->
										<img class="img-fluid" src="<?php echo $image[3]; ?>" alt="Image" style="width: 400px; height: 400px; object-fit: cover;" alt="gallery-image" alt="gallery-image" alt="gallery-image">			
										<div class="item-overlay"></div>				
										
										<!-- Image Zoom -->
										<div class="image-data">
											<div class="gallery-link ico-40 color--white">
												<a class="image-link" href="<?php echo $image[3]; ?>">
													<span class="flaticon-visibility"></span>
												</a>
											</div>																					 
										</div> 

							  		</div>
								</div>

							</div>	


							<div class="col-lg-2">


								<!-- IMAGE #5 -->
								<div id="img-4-5" class="gallery-image">
							  		<div class="hover-overlay"> 

							  			<!-- Image -->
										<img class="img-fluid" src="<?php echo $image[4]; ?>" alt="Image" style="width: 100%; height: 300px; object-fit: cover;" alt="gallery-image" alt="gallery-image" alt="gallery-image" alt="gallery-image">			
										<div class="item-overlay"></div>				
										
										<!-- Image Zoom -->
										<div class="image-data">
											<div class="gallery-link ico-30 color--white">
												<a class="image-link" href="<?php echo $image[4]; ?>">
													<span class="flaticon-visibility"></span>
												</a>
											</div>																					 
										</div> 

							  		</div>
								</div>


								<!-- IMAGE #5 -->
								<div id="img-4-6" class="gallery-image">
							  		<div class="hover-overlay"> 

							  			<!-- Image -->
										<img class="img-fluid" src="<?php echo $image[5]; ?>" alt="Image" style="width: 100%; height: 200px; object-fit: cover;" alt="gallery-image" alt="gallery-image" alt="gallery-image" alt="gallery-image" alt="gallery-image">			
										<div class="item-overlay"></div>				
										
										<!-- Image Zoom -->
										<div class="image-data">
											<div class="gallery-link ico-30 color--white">
												<a class="image-link" href="<?php echo $image[5]; ?>">
													<span class="flaticon-visibility"></span>
												</a>
											</div>																					 
										</div> 

							  		</div>
								</div>


							</div>


						</div>  <!-- End row -->	
					</div>	<!-- END GALLERY-4 WRAPPER -->	
					

					<!-- BUTTON -->		
			 		<div class="row">
			 			<div class="col">
			 				<div class="more-btn">
								<a href="gallery" class="btn btn--tra-black hover--black">Visit Our Gallery</a>
							</div>
						</div>
					</div>	<!-- END BUTTON -->	


				</div>	   <!-- End container -->
			</div>	<!-- END GALLERY-4 -->




			<!-- BANNER-1
			============================================= -->
			<section class="banner-1 banner-section mb-40">
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






			<!-- GALLERY-3
			============================================= -->		
			<section id="gallery-3" class="gallery-section division">
				<div class="container">


					<!-- SECTION TITLE -->
					<div class="row justify-content-center">	
						<div class="col-lg-10 col-xl-8">
							<div class="section-title">
								<h3 class="h3-lg color--black">Follow: <a href="#">@reine_studio</a></h3>	
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
									<img class="img-fluid" src="images/gallery/hair_01.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/hair_01.jpg">
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
									<img class="img-fluid" src="images/gallery/hair_02.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/hair_02.jpg">
												<span class="flaticon-visibility"></span>
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
									<img class="img-fluid" src="images/gallery/hair_03.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data gallery-video">
										<div class="gallery-link ico-40 color--white">
											<a class="video-popup1" href="https://www.youtube.com/embed/RzVvThhjAKw">
												<span class="flaticon-play"></span>
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
									<img class="img-fluid" src="images/gallery/hair_04.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/hair_04.jpg">
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
									<img class="img-fluid" src="images/gallery/hair_05.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data gallery-video">
										<div class="gallery-link ico-40 color--white">
											<a class="video-popup2" href="https://www.youtube.com/watch?v=RzVvThhjAKw">
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
									<img class="img-fluid" src="images/gallery/hair_06.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/hair_06.jpg">
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
			
			<!-- END MODAL-2 -->



			<!-- FOOTER-3
			============================================= -->
			<?php include 'footer.php'; ?>
			
			<!-- END FOOTER-3 -->




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

		<script>
			$(function() {
			  $(".switch").click(function() {
			  	 $("body").toggleClass("theme--dark");
			  });
			});
		</script>
		<script>
function scrollToSubCategory() {
  document.getElementById('sub_category_service').scrollIntoView({ behavior: 'smooth' });
}
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
<!-- <script>
  document.querySelectorAll('.plus-sign').forEach(function(element) {
    element.addEventListener('click', function() {
      console.log("Service Number:", this.getAttribute('data-service_number'));
    });
  });
</script> -->
	</body>



<!-- Mirrored from dsathemes.com/html/r_eine_1.1/files/pricing-1.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Dec 2024 10:23:52 GMT -->
</html>