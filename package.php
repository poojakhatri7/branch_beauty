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
	<meta name="keywords"
		content="DSAThemes, Beauty, Salon, Beauty Parlour, Health Care, Makeup, Nail Salon, Therapy, Treatment">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- SITE TITLE -->
	<title> Package | <?php echo $brand_name ;   ?></title>

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
	<link href="https://fonts.googleapis.com/css2?family=Vollkorn:wght@400;500;600;700&amp;display=swap"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&amp;display=swap"
		rel="stylesheet">

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

<style>
body.theme--dark .card {
  background-color: #2c2c2c !important;
  color: #ffffff !important;
}
body.theme--dark .discount-text {
  color:rgb(156, 210, 226) !important; /* or any color you like */
}

</style>


		<!-- INNER PAGE TITLE
			============================================= -->
			<section id="team-page" class="inner-page-hero division">
				<div class="container">	
					<div class="row">	
						<div class="col">
							<div class="page-hero-txt color--white">
								<h2>Let's Talk Beauty!</h2>
								<p>Got Questions? Please, don't hesitate to get in touch with us</p>
							</div>	
						</div>
					</div>
				</div>	   <!-- End container --> 
			</section>	<!-- END INNER PAGE HERO -->
<?php
// $sql = "SELECT MIN(id) as id, package_name , file ,price_after_discount, discount ,price, description, package_number
//         FROM package
//         GROUP BY package_name, description order BY id DESC";
// $sql = "SELECT 
//     p.id AS package_id,
//     p.package_name,
//     p.file AS package_image,
//     p.description,
//     p.discount,
//     SUM(ps.price) AS total_price,
//     SUM(ps.price_after_discount) AS total_price_after_discount
	
// FROM 
//     package1 p
// LEFT JOIN 
//     package_services ps 
// ON 
//     p.id = ps.package_id
// GROUP BY 
//     p.id";
//  $sql = "SELECT 
//     p.id AS package_id,
//     p.package_name,
//     p.file AS package_image,
//     p.description,
//     p.discount,
//     ps.service_name,
//     ps.price,
//     ps.price_after_discount
// FROM 
//     package1 p
// LEFT JOIN 
//     package_services ps 
// ON 
//     p.id = ps.package_id ";
$sql ="SELECT 
    p.id AS package_id,
    p.package_name,
    p.file AS package_image,
    p.description,
    p.discount,
    GROUP_CONCAT(ps.service_name SEPARATOR ',') AS services,
    SUM(ps.price) AS total_price,
    SUM(ps.price_after_discount) AS total_price_after_discount
FROM 
    package1 p
LEFT JOIN 
    package_services ps 
ON 
    p.id = ps.package_id
GROUP BY 
    p.id " ;


$services = [];
$result_subcategories = mysqli_query($conn, $sql);

if (mysqli_num_rows($result_subcategories) > 0) {

?>

 <div style="display: flex; flex-wrap: wrap; gap: 3 rem; justify-content: center; padding: 0 2rem;">
<?php
    while ($s = mysqli_fetch_assoc($result_subcategories)) {
		
			 $imagePath = $web_link.$s['package_image']; 
          $services[] = $s['services'];
    //          $total_price += $s['price'];
    //         $total_discount += $s['discount'];
    //         $total_price_after_discount += $s['price_after_discount'];
	//  $imagePath = "/beauty_parlour_management_system/admin2/" . $s['file']; 
        // $s_id = $row['s_id'];
?>
<?php $serviceList = implode(',', $services); ?>
        <div class="card mx-4 mt-5" style="width: 15rem; font-size: 0.875rem;" >
          <div class="card-body">
            <h5 class="card-title" style="font-size: 1.5rem;"><?php echo $s['package_name']; ?></h5>

 <img src="<?php echo $imagePath; ?>" class="card-img-top img-fluid " alt="..." style="width: 240px; height: 250px; object-fit: cover; ">


<p class="card-text" style="font-size: 0.95rem; margin: 0;"> <strong>Price : </strong> <s> Rs <?php echo $s['total_price']; ?> </s> </p>
<p class="card-text discount-text"  style="font-size: 0.99rem; margin: 0; color:rgb(78, 46, 92);"> <strong>Discount (%) : </strong> <?php echo $s['discount']; ?> </p>
<p class="card-text discount-text" style="font-size: 0.99rem; margin: 0; color:rgb(81, 46, 97);  "><strong>Price after discount : </strong> Rs <?php echo $s['total_price_after_discount']; ?> </p>
<?php $services = explode(',', $s['services']);  ?>
    <p class="card-text" style="font-size: 0.98rem; margin: 0;">
        <strong>Services available :</strong>
    </p>
	
    <ol style="padding-left: 20px; margin-top: 4px; font-size: 0.9rem; ">
        <?php foreach ($services as $service): ?>
            <li><?php echo htmlspecialchars($service); ?></li>
        <?php endforeach; ?>
    </ol>
<p class="card-text" style="font-size: 0.95rem; margin: 0;"> <strong>Description : </strong> <?php echo $s['description']; ?> </p>




          </div>
        </div>
<?php
    }
?>
    </div> <!-- Flex container ends -->
<?php
}
?>

		<!-- CONTACTS-3
			============================================= -->
	


		
	


		<!-- FOOTER-2
			============================================= -->
			
			<?php include 'footer.php'; ?>
		
		<!-- END FOOTER-2 -->




	</div> <!-- END PAGE CONTENT -->




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
	<!-- <script src="js/contact-form.js"></script> -->
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
			"mousedown": function (e) {
				console.log("normal mouse down:", e.which);
			},
			"mouseup": function (e) {
				console.log("normal mouse up:", e.which);
			}
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



<!-- Mirrored from dsathemes.com/html/r_eine_1.1/files/contact.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Dec 2024 10:24:07 GMT -->

</html>