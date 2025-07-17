<?php
include 'db_connection.php';
include 'asset.php';
$sql = "SELECT * FROM tb_contact_us";
// Step 2: Execute the query
$result = mysqli_query($conn, $sql);
// Step 3: Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
    // Step 4: Fetch the data from the database and display it inside the <h1> tag
    while ($row = mysqli_fetch_assoc($result)) {
        // Display page title inside an <h1> tag
        // echo "<h4><strong>Mobile number</strong></h4>";
        // echo "<p>" . htmlspecialchars($row['mobile_number']) . "</p>";
        // // Optionally, you can display the page description or other data below the heading
        // echo "<h4><strong>Address</strong></h4>";
        // echo "<p>" . nl2br(htmlspecialchars($row['address'])) . "</p>";
        // echo "<h4><strong>Email us</strong></h4>";
        // echo "<p>" . nl2br(htmlspecialchars($row['email_us'])) . "</p>";
        // echo "<h4><strong>TIME</strong></h4>";
        // echo "<p>" . nl2br(htmlspecialchars($row['time'])) . "</p>";

$mobile = $row['mobile_number'];
$address = $row['address'];
$email_us = $row['email_us'];
$time = $row['time'];

    }
} else {
    // If no record is found, display a message
    echo "<p>No record found.</p>";
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $about = $_POST['subject'];
    $message = $_POST['message'];
	$branch_id = $_POST['branch'];

// Fetch branch name using ID
$query = "SELECT branch_name FROM branch_details WHERE id = '$branch_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$branch_name = $row['branch_name'];


    $query = "INSERT INTO enquiry_message values ('','$branch_id','$branch_name','$name','$email','$about','$message',NOW())";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // echo "<span style='color: black; font-weight:650;'>Appointment booked successfully!</span>";
		echo"<script> alert('message send successfully') </script>";
    } else {
        // echo "<span style='color: red;'>Failed to book appointment!</span>";
		echo"<script> alert('Unable to send the message') </script>";
    }
}
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
<title> Contact | <?php echo $brand_name ;   ?></title>

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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




		<!-- CONTACTS-3
			============================================= -->
		<section id="contacts-3" class="pt-8 contacts-section division">
			<div class="container">
				<div class="row">


					<!-- CONTACT INFO -->
					<div class="col-lg-4">

						<!-- LOCATION -->
						<div class="cbox-2 cb-1 mb-5">

							<!-- Title -->
							<h4>Our Location :</h4>

							<!-- Address -->
							<p> <i class="fas fa-home" aria-hidden="true" style="margin-right: 8px;"></i> <?php echo nl2br($address); ?></p>
							

							<!-- Contacts -->
							<div class="cbox-2-contacts">
								<p><i class="fas fa-phone" aria-hidden="true" style="margin-right: 8px;"></i><a href=""><?php echo $mobile; ?></a></p>
								<p><i class="fa fa-envelope" aria-hidden="true" style="margin-right: 8px;"></i><a href="mailto:yourdomain@mail.com"> <?php echo $email_us ; ?></a></p>
							</div>

						</div>

						<!-- LOCATION -->
						<div class="cbox-2 cb-2">

							<!-- Title -->
							<h4> <i class="fas fa-clock" style="margin-right: 8px; color: rgb(145, 135, 209);"></i> Parlour Hours:</h4>
							<ul>
							<?php
							// Fetch business hours
$sql = "SELECT day, TIME_FORMAT(open_time, '%h:%i %p') AS open_time, TIME_FORMAT(close_time, '%h:%i %p') AS close_time FROM business_hours";
$result1 = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_assoc($result1)) {
    echo "<li>" . $row['day'] . " : " . $row['open_time'] . " - " . $row['close_time'] . "</li>";
}
?>
	</ul>
							<!-- Text -->
							<!-- <p>Mon – Wed: <span>10:00AM - 9:00PM</span></p>
							<p>Thursday: <span>10:00AM - 7:30PM</span></p>
							<p>Friday: <span>10:00AM - 9:00PM</span></p>
							<p>Sun - Sun: <span>11:00AM - 5:00PM</span></p> -->

						</div>

					</div> <!-- END CONTACT INFO -->


					<!-- CONTACT FORM -->
					<div class="col-lg-8">
						<div class="contact-form-wrapper">

							<!-- Title -->
							<h4>Send a Message</h4>


							<form id="contactForm" class="row contact-form" action="" method="post" onsubmit="return validateMobile();">

								<!-- Form Input -->
								<div class="col-lg-6">
									<input type="text" name="name" pattern="[A-Za-z\s]+" class="form-control name" placeholder="Your Name*"required>
								</div>

								<!-- Form Input -->
								<div class="col-lg-6">
									<input type="email" name="email" class="form-control email"
										placeholder="Email Address*"required>
								</div>

								<!-- Form Input -->
								<div class="col-md-12">
									<input type="mobile" name="subject" id="mobile" class="form-control subject"
										placeholder="Mobile Number"required>
								</div>
 <span id="mobileError" style="color: red;"></span>



								</div>
								<!-- Form Textarea -->
								<div class="col-md-12">
									<textarea name="message" class="form-control message" rows="6"
										placeholder="Your Message ..."required></textarea>
								</div>
								<br>
<?php
$sql = "SELECT * FROM branch_details"; 
$result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            // echo '<li aria-haspopup="true"><a href="pprice.php?c_id=' . $row['c_id'] . '">' . htmlspecialchars($row['c_service']) . '</a></li>';
        }
      ?>  

                                 <div class="col-md-12">
		<select name="branch" class="form-select message" aria-label="Service Select" required>
        <option  value="" selected disabled>Select Branch</option>
        <?php
        // Reset the result pointer and fetch again for the select box
        mysqli_data_seek($result, 0);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['branch_name']) . '</option>';
        }
        ?>
    </select>
	<br>
								<!-- Form Button -->
								<div class="col-md-12 text-end">
									<button type="submit" name="submit" class="btn btn--tra-black hover--black submit">Send
										Message</button>
								</div>

								<!-- Form Message -->
								<!-- <div class="col-md-12 contact-form-msg">
									<div class="sending-msg"><span class="loading"></span></div>
								</div> -->

							</form>
						</div>
					</div> <!-- END CONTACT FORM -->


				</div> <!-- End row -->
			</div> <!-- End container -->
		</section> <!-- END CONTACTS-3 -->

<br>
		
		<!-- CONTACTS-1
			============================================= -->
			<div id="contacts-1" class="contacts-section division">
				<div class="container">
	
	
					<!-- GOOGLE MAP -->
					<div class="row">
						<div class="col">
							<div class="google-map">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3560.1198788435363!2d80.82633237535462!3d26.836139163377318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bff3e34dd1d4f%3A0xc5d69250c13efe61!2sTVS%20SOLUTIONS!5e0!3m2!1sen!2sin!4v1751522471677!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							</div>
						</div>
					</div> <!-- END GOOGLE MAP -->
	
	
				</div> <!-- End container -->
			</div> <!-- END CONTACTS-1 -->


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

	<!-- <script>
		$(function () {
			$(".switch").click(function () {
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
function validateMobile() {
    var mobile = document.getElementById("mobile").value;
    var error = document.getElementById("mobileError");

    if (!/^\d{10}$/.test(mobile)) {
        error.textContent = "Please enter exactly 10 digits.";
        return false; // prevent form submission
    }

    error.textContent = ""; // clear error if valid
    return true;
}
</script>

</body>



<!-- Mirrored from dsathemes.com/html/r_eine_1.1/files/contact.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Dec 2024 10:24:07 GMT -->

</html>