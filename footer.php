<?php
include 'db_connection.php';

// Fetch business hours
$sql = "SELECT day, TIME_FORMAT(open_time, '%h:%i %p') AS open_time, TIME_FORMAT(close_time, '%h:%i %p') AS close_time FROM business_hours";
$result = mysqli_query($conn, $sql);

$business_hours = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $business_hours[] = $row;
    }
}
$sql = "SELECT * FROM tb_contact_us";
// Step 2: Execute the query
$result = mysqli_query($conn, $sql);
// Step 3: Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
    // Step 4: Fetch the data from the database and display it inside the <h1> tag
    while ($row = mysqli_fetch_assoc($result)) {
       
$mobile = $row['mobile_number'];
$address = $row['address'];
$email_us = $row['email_us'];
$time = $row['time'];

    }
} else {
    // If no record is found, display a message
    echo "<p>No record found.</p>";
}

?>
<style>
.footer-address {
    white-space: pre-line; /* Allows line breaks */
	word-wrap: break-word;
}
</style>
<hr>
		<!-- FOOTER-1
			============================================= -->
			<footer id="footer-3" class="pt-2 footer division">
				<div class="container text-center">


					<!-- FOOTER CONTENT -->
					<div class="row">


						<!-- FOOTER CONTACTS -->
						<div class="col-sm-6 col-lg-4">
							<div class="footer-contacts">
							
								<!-- Title -->
								<h5 class="h5-md">Quick Links</h5>

							<p><a href="./">Home</a></p>
								

								<!-- Address -->
								
								<p><a href="about">About us</a></p>
								<p><a href="contact">Contact us</a></p>
								<p><a href="artist_and_staff">Staff Section</a></p>
								<p><a href="gallery">Gallery Section</a></p> 
								<p><a href="booking">Book now</a></p>

							</div>	
						</div>	


						<!-- FOOTER CONTACTS -->
						<div class="col-sm-6 col-lg-4">
							<div class="footer-info">
								
								<!-- Title -->
								<h5 class="h5-md">Get in Touch</h5>

								<!-- Phone -->
								<p class="footer-phone"><i class="fas fa-phone" aria-hidden="true" style="margin-right: 8px;"></i><a href=""><?php echo $mobile; ?></a></p>

								<!-- Email -->
								<p class="footer-email"><i class="fa fa-envelope" aria-hidden="true" style="margin-right: 8px;"></i><a href=""><?php echo $email_us ; ?></a></p>
								
								<!-- Address -->
								<p class="footer-address"> <i class="fas fa-home" aria-hidden="true" style="margin-right: 8px;"></i><?php echo nl2br($address); ?><br>
									</p>

								<!-- List -->
								<ul class="foo-socials ico-20 text-center clearfix">									
									<li><a target="_blank" href="https://www.facebook.com/codermaniaalab/" class="ico-facebook"><span class="flaticon-facebook"></span></a></li>
									<li><a  target="_blank" href="http://x.com/coder_maniaa" class="ico-twitter"><span class="flaticon-twitter"></span></a></li>	
									<li><a target="_blank" href="https://www.linkedin.com/in/coder-maniaa/" class="ico-youtube"><span class="flaticon-instagram"></span></a></li>
									
										<li><a target="_blank" href="https://www.linkedin.com/in/coder-maniaa/" class="ico-youtube"><span class="fab fa-linkedin-in"></span></a></li>
										<li><a target="_blank" href="https://www.linkedin.com/in/coder-maniaa/" class="ico-youtube"><span class="flaticon-youtube"></span></a></li>
								</ul>

							</div>
						</div>


						<!-- FOOTER CONTACTS -->
						<div class="col-sm-6 col-lg-4">
							<div class="footer-info">
								
								<!-- Title -->
								<h5 class="h5-md">Working Hours</h5>
								 <!-- List of working hours -->
    <ul style="list-style: none;  mb-0 ">
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
								<!-- <p>Mon-Fri: <span>10:00AM - 9:00PM</span></p>
								<p>Saturday: <span>10:00AM - 7:00PM</span></p>
								<p>Sunday: <span>10:00PM - 7:00PM</span></p> -->

							</div>
						</div>


					</div>	  <!-- END FOOTER CONTENT -->


					<hr>	<!-- FOOTER DIVIDER LINE -->


					<!-- FOOTER COPYRIGHT -->
					<div class="bottom-footer">
						<div class="row">
							<div class="col">
								<div class="footer-copyright"><p>&copy; 2025 <?php echo  $brand_name   ?>. All Rights Reserved. Developed by <a target="_blank" href="https://tvssolution.in/">TVS SOLUTION.</a></p>
							
							</div>
							</div>
						</div>  
					</div>
						<!-- BOTTOM FOOTER -->


				</div>	   <!-- End container -->
				<script>
  // Apply saved theme BEFORE user interaction
//   document.addEventListener("DOMContentLoaded", function () {
//     if (localStorage.getItem("theme") === "dark") {
//       document.body.classList.add("theme--dark");
//     }
//   });

//   $(document).ready(function () {
//     $(".switch").click(function (e) {
//       e.preventDefault();
//       $("body").toggleClass("theme--dark");

//       if ($("body").hasClass("theme--dark")) {
//         localStorage.setItem("theme", "dark");
//       } else {
//         localStorage.setItem("theme", "light");
//       }
//     });
//   });
// Apply saved theme on page load
document.addEventListener("DOMContentLoaded", function () {
  // Check if user previously selected dark mode
  if (localStorage.getItem("theme") === "dark") {
    document.body.classList.add("theme--dark");
  }

  // Handle toggle click
  const switchElement = document.querySelector(".switch");

  if (switchElement) {
    switchElement.addEventListener("click", function (e) {
      e.preventDefault(); // Prevent <a href="#"> from jumping

      // Toggle dark mode class
      document.body.classList.toggle("theme--dark");

      // Save preference to localStorage
      if (document.body.classList.contains("theme--dark")) {
        localStorage.setItem("theme", "dark");
      } else {
        localStorage.setItem("theme", "light");
      }
    });
  }
});
</script>										
			</footer>
			<?php mysqli_close($conn); // Close database connection ?>
		<!-- END FOOTER-1 -->