<?php
include 'db_connection.php';
include 'asset.php';
if(isset($_POST["submit"])) {
	$name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
	$appointment_for = $_POST['service'];
	$datetime = $_POST['date'];
	$date = date("Y-m-d", strtotime($datetime));  // Converts to "2025-03-04"
    $time = date("H:i", strtotime($datetime)); 
	$staff = $_POST['staff']; // Converts to "14:30:00"
    $query1 = "INSERT INTO tb_appointment values ('','$name','$email','$mobile','$address','$date','$time','$appointment_for','$staff')";
     if(mysqli_query($conn, $query1))
     {
        echo "<script>
        alert('Appointment successful');
    </script>";
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }

//   $check_user = "SELECT * FROM users WHERE mobile = '$mobile'";
//   $result_user = mysqli_query($conn, $check_user);

//   if(mysqli_num_rows($result_user) > 0) {
//       // Update the user record (no success/error message)
//       $query2 = "UPDATE users 
//                  SET name='$name', email='$email', address='$address',password='123' 
//                  WHERE mobile='$mobile'";
//       mysqli_query($conn, $query2);
//   } else {
//     $pass = 123;
//       $query2 = "INSERT INTO users values ('','$name','$mobile','$email','$address','$pass','')";
//       mysqli_query($conn, $query2);
//   }
$check_user = "SELECT * FROM users WHERE mobile = '$mobile'";
$result_user = mysqli_query($conn, $check_user);

if(mysqli_num_rows($result_user) > 0) {
	// Update the user record (no success/error message)
	$query2 = "UPDATE users 
			   SET name='$name', email='$email', address='$address',password='123' 
			   WHERE mobile='$mobile'";
	mysqli_query($conn, $query2);
} else {
  $pass = 123;
	$query2 = "INSERT INTO users values ('','$name','$mobile','$email','$address','$pass','')";
	mysqli_query($conn, $query2);
}
echo "<script>window.location.href='".$_SERVER['PHP_SELF']."';</script>";
}
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
		<title> Booking | <?php echo $brand_name ;   ?></title>
							
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
			
			<?php include 'header-1.php'; ?>
			
			<!-- END HEADER -->




			<!-- INNER PAGE HERO
			============================================= -->	
			<section id="booking-page" class="inner-page-hero division">
				<div class="container">	
					<div class="row">	
						<div class="col">
							<div class="page-hero-txt color--white">
								<h2>Book an Appointment</h2>	
								<p>Please fill out the appointment form below to make appointment</p>
							</div>	
						</div>
					</div>
				</div>	   <!-- End container --> 
			</section>	<!-- END INNER PAGE HERO -->




			<!-- BOOKING-1
			============================================= -->
			<div id="booking-1" class="pt-8 pb-7 booking-section division">
				<div class="container">
 <span id="mobileError" style="color: red; display: block; margin-left: 180px"></span>

					<!-- BOOKING FORM -->
					<div class="row justify-content-center">	
						<div class="col-lg-10 col-xl-9">
							<form name="bookinkform" class="row booking-form" action="" method="post" onsubmit="return validateMobile();">

								<!-- Form Input -->
				                <div class="col-lg-6">
				                	<input type="text" name="name" pattern="[A-Za-z\s]+" class="form-control firstname" placeholder=" Name*" required>
				                </div>

				                <!-- Form Input -->
				                <div class="col-lg-6">
				                	<input type="email" name="email" class="form-control lastname" placeholder="Email Address*" required>
				                </div>
				                  
				                <!-- Form Input -->        
				                <div class="col-lg-6">
				                	<input type="number" id="mobile" name="mobile" class="form-control lastname" placeholder="Phone Number*" required> 
				                </div>

				                <!-- Form Input -->   
				                <div class="col-lg-6">
				                	<input type="tel" name="address" class="form-control phone" placeholder="Address*" required> 
				                </div>
								<?php
$sql = "SELECT c_id, c_service FROM category_service"; 
$result = mysqli_query($conn, $sql);
?>



   
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            // echo '<li aria-haspopup="true"><a href="pprice.php?c_id=' . $row['c_id'] . '">' . htmlspecialchars($row['c_service']) . '</a></li>';
        }
        ?>
<!-- Form Select -->
<div class="col-lg-6">
    <select name="service" class="form-select service" aria-label="Service Select" required>
        <option  value="" selected disabled>Select Service</option>
        <?php
        // Reset the result pointer and fetch again for the select box
        mysqli_data_seek($result, 0);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['c_service'] . '">' . htmlspecialchars($row['c_service']) . '</option>';
        }
        ?>
    </select>
</div>

				                <!-- Form Select -->
				                <div class="col-lg-6">
				                	<select name="staff" class="form-select staff" aria-label="Staff Select" required>
				                		<option value="" selected>Select Staff</option>
				                      	<option>Veronica Aaron</option>
				                      	<option>Olivia Grosh</option>
				                      	<option>Eva Anderson</option>
				                      	<option>Jessica Priston</option>
				                      	<option>Evelyn Sanchez</option>
				                      	<option>Kristin Cortes</option>
				                      	<option>Any Available Staff</option>
				                    </select>
				                </div>

				                <!-- Form Input -->
				                <div class="col-md-12">
				                	<input id="date" type="date" name="date" class="form-control date" placeholder=" Appointment Date*" required>
				                </div>
								 <div class="col-md-12">
				                	<input id="time" type="time" name="date" class="form-control date" placeholder="Appointment Time*" required>
				                </div>
								
				                                            
				                <!-- Form Button -->
				                <div class="col-md-12 text-center">  
				                	<button type="submit" name="submit" class="btn btn--tra-black hover--black submit">Book Appointment</button> 
				                </div>
				                                                              
				                <!-- Form Message -->
				                <!-- <div class="col-md-12 booking-form-msg">
				                	<div class="sending-msg"><span class="loading"></span></div>
				                </div>	 -->
																						
							</form>
						</div>	
					</div>    <!-- END BOOKING FORM -->


				</div>     <!-- End container -->
			</div>	<!-- END BOOKING-1 -->




			<!-- GALLERY-3
			============================================= -->		
			<section id="gallery-3" class="bg--stone py-8 gallery-section division">
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
									<img class="img-fluid" src="images/gallery/woman_08.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/woman_08.jpg">
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
											<a class="video-popup1" href="https://www.youtube.com/embed/SZEflIVnhH8">
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
											<a class="image-link" href="images/gallery/woman_07.jpg">
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
											<a class="image-link" href="images/gallery/beauty_01.jpg">
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
											<a class="video-popup2" href="https://www.youtube.com/watch?v=7e90gBu4pas">
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



			<!-- FOOTER-5
			============================================= -->
			
			<?php include 'footer.php'; ?>
			
			<!-- END FOOTER-5 -->




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
		<!-- <script src="js/booking-form.js"></script>	 -->
		<script src="js/jquery.validate.min.js"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>	
		<script src="js/popper.min.js"></script>
		<script src="js/lunar.js"></script>
		<script src="js/wow.js"></script>
				
		<!-- Custom Script -->		
		<script src="js/custom.js"></script>

		<script>
function validateMobile() {
    var mobile = document.getElementById("mobile").value;
    var error = document.getElementById("mobileError");

    if (!/^\d{10}$/.test(mobile)) {
        error.textContent = "Please enter exactly 10 digits for mobile number ";
        return false; // prevent form submission
    }

    error.textContent = ""; // clear error if valid
    return true;
}
</script>
    <script>
    // Set today's date as min value
    document.addEventListener('DOMContentLoaded', function () {
        const dateInput = document.getElementById('date');
        const today = new Date().toISOString().split('T')[0];
        dateInput.setAttribute('min', today);
    });
</script>

		<script>
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
		</script>

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



<!-- Mirrored from dsathemes.com/html/r_eine_1.1/files/booking.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Dec 2024 10:24:07 GMT -->
</html>