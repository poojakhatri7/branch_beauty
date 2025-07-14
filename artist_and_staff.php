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
		
		<title> Team | <?php echo $brand_name ;   ?></title>	
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
				<!-- Bootstrap 5 JS and Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

<style>
.plus-sign i {
  font-size: 20px;
  color: rgb(106, 90, 205); /* Blue color */
  background-color: #e6f0ff; /* Light blue background */
  padding: 10px;
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
.h5-lg
{
	text-transform: capitalize;

}


    </style>


			<!-- INNER PAGE HERO
			============================================= -->	
			<section id="team-page" class="inner-page-hero division">
				<div class="container">	
					<div class="row">	
						<div class="col">
							<div class="page-hero-txt color--white">
								<h2>Meet Our Team</h2>	
								<p>We want to make every girl pretty, happy and loved</p>
							</div>	
						</div>
					</div>
				</div>	   <!-- End container --> 
			</section>	<!-- END INNER PAGE HERO -->

			

<!-- Modal start -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Staff details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
		 <p><strong>Name :</strong> <span id="modalStaffName"></span></p>   
        <p><strong>Availability :</strong> <span id="modalAvailability"></span></p>
		 <p><strong> Bios :</strong> <span id="modalServiceBio"></span></p>
		  <p><strong>Experience :</strong> <span id="modalServiceExperience"></span> years</p>
		   <a href="booking" style="text-decoration: none;">
		<div style="display: flex; justify-content: center; align-items: center; margin-top: 20px;">
  <button type="submit" name="submit" class="btn" style="background-color: rgb(42, 35, 90); color: rgb(238, 230, 217); font-weight: 500; font-size: 15px; border-radius: 15px; padding: 7px 20px;">
    BOOK NOW
  </button> 
   </a>
</div>
      </div>
	  
    </div>
	
  </div>
  
</div>
<!-- Modal ends -->


			<!-- TEAM-3
			============================================= -->
			<section id="team-3" class="pt-8 pb-5 team-section division">
				<div class="container text-center">


					<!-- TEAM MEMBERS CATEGORY -->	
					<div class="team-members-category">


						<!-- CATEGORY TITLE -->
						<div class="row">	
							<div class="col">
								<div class="category-title mb-6">	
									<h2 class="h2-lg">Our Staff Members</h2>	
								</div>	
							</div>
						</div>


						<!-- TEAM MEMBERS WRAPPER -->	
						<div class="row">
						<?php
			// $sql = "SELECT * FROM staff_gallery where staff_designation_id = 1 ";
			$sql = "SELECT sg.id, sg.name, sd.designation, sg.file 
        FROM staff_gallery sg
        JOIN staff_designation sd ON sg.staff_designation_id = sd.id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    //   echo $row['file'];
	 $imagePath = $web_link.$row['file']; 
	//  $name =$row['name'];
	//   echo '<img src="' . $imagePath . '" width="400" height="400" style="margin:10px;">';
	
        ?>	
										
							<!-- TEAM MEMBER #1 -->
							<div class="col-md-6 col-lg-4">
								<div class="team-member wow fadeInUp">
							
									<!-- Team Member Photo -->
									<div class="team-member-photo">
										<div class="hover-overlay"> 
											
											<img class="img-fluid" src="<?php echo $imagePath; ?>" alt="Image" style="width: 600px; height: 500px; object-fit: cover;" alt="content-image" alt="content-image" alt="team-member-foto">
											<div class="item-overlay"></div>
										</div>
									</div>
																																						
									<!-- Team Member Data -->		
									<div class="team-member-data">
<!-- <span class="plus-sign" data-bs-toggle="modal" data-bs-target="#exampleModal"  data-package_number="' . $row["package_number"] . '"  style="cursor: pointer; " >
  <i class="fa fa-eye" ></i>
</span> -->
<span class="plus-sign" 
      data-bs-toggle="modal" 
      data-bs-target="#exampleModal" 
      data-id="<?php echo $row['id']; ?>" 
      style="cursor: pointer;">
  <i class="fa fa-eye"></i>
</span>


								<h5 class="h5-lg" style="display: inline;">	  <?php echo $row['name']; ?> </h5>


										<!-- Title -->		
										<!-- <span class="section-id">Founder & Director</span>	 -->
										
										<!-- Link -->
										<!-- <p class="tra-link"><a href="artist-details.php">View Profile</a></p>	 -->

									</div>	
									<p><?php echo $row['designation']; ?></p>
										

	
								</div>									
							</div>	<!-- END TEAM MEMBER #1 -->
							<?php }}?>	
							
						

						</div>	<!-- END TEAM MEMBERS WRAPPER -->	


					</div>	<!-- END TEAM MEMBERS CATEGORY -->	


				</div>     <!-- End container -->
			</section>	<!-- END TEAM-3 -->




			<!-- TEXT CONTENT
			============================================= -->
			<section class="bg--stone py-8 ct-01 content-section division">
				<div class="container">
					<div class="row d-flex align-items-center">


						<!-- TEXT BLOCK -->	
						<div class="col-lg-6 order-last order-lg-2">
							<div class="txt-block left-column wow fadeInRight">

								<!-- Section ID -->	
						 		<span class="section-id">You Are Beauty</span>

								<!-- Title -->
								<h2 class="h2-md">Look more natural with Demo studio</h2>

								<!-- Text -->	
								<p class="mb-0">Discover the beauty of simplicity at Demo Studio. Our expert team enhances your natural charm with subtle, personalized treatments that highlight your unique features, leaving you looking effortlessly beautiful and confident every day.
								</p>

								<!-- Button -->
								<div class="txt-block-btn">
									<a href="booking" class="btn btn--tra-black hover--black">Book Now</a>
								</div>		

							</div>
						</div>	<!-- END TEXT BLOCK -->	


						<!-- IMAGE BLOCK -->
						<div class="col-lg-6 order-first order-lg-2">
							<div class="img-block right-column wow fadeInLeft">
								<img class="img-fluid" src="images/woman_02.jpg" alt="content-image">
							</div>
						</div>


					</div>    <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END TEXT CONTENT -->


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
<script>
// $(document).on('click', '.plus-sign', function () {
//     const package_number = $(this).data('id');
//   console.log("Clicked Package id:", id ); // Check if ID is correct
//     $.ajax({
//         url: 'get_staff_details.php',
//         type: 'POST',
//         data: { id: id },
//         dataType: 'json',
//         success: function (data) {
//             if (data.error) {
//                 alert(data.error);
//             } else {
//                 // $('#modalPackageName').text(data.package_name);
//                 // $('#modalDescription').text(data.description);
//                 // $('#modalServices').text(data.selected_services); // coming directly from package table
//                 // $('#modalPrice').text(data.total_price_after_discount);
//                  $('#modalStaffName').text(data.package_name);
//         $('#modalServiceDesignation').text(data.description);
//         $('#modalAvailability').text(data.selected_services);
//         $('#modalServiceBio').text(data.price);
//         $('#modalServiceExperience').text(data.discount);     
//             }
//         },
//         error: function () {
//             alert('Error fetching package details.');
//         }
//     });
// });
$('.plus-sign').on('click', function () {

  const id = $(this).data('id'); 
 console.log("Clicked Package package_number:", id ); // Check if ID is correct
  $.ajax({
    url: 'get_staff_details.php',
    type: 'POST',
    data: { id: id },
    dataType: 'json',
    success: function (response) {
      if (response.status === 'success') {
        $('#modalStaffName').text(response.name);
        $('#modalAvailability').text(response.Availability);
        $('#modalServiceBio').text(response.bios);
		 $('#modalServiceExperience').text(response.experience);
      } else {
        alert(response.message);
      }
    }
  });
});

</script>

	</body>



<!-- Mirrored from dsathemes.com/html/r_eine_1.1/files/team.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Dec 2024 10:23:57 GMT -->
</html>