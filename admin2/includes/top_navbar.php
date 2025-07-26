<?php include 'data.php'; 
$defaultImage = "../user/assets/dist/img/dp.webp"; 
$imagePath = $defaultImage;
 $mobile = $_SESSION["mobile"];
        $sql = "SELECT file FROM admin_login_details WHERE mobile = '$mobile'";
        $result = mysqli_query($conn, $sql);
             if ($result && mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
                // Check if image file is not empty and exists
    if (!empty($row['file']) && file_exists($row['file'])) {
        $imagePath = $row['file'];
    }
        }
        ?>
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo $brand_logo; ?>" alt="Loading..." height="80" width="80">
  </div>

<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background :rgb(247, 231, 206)">
<ul class="navbar-nav d-flex align-items-center">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
            <i class="fas fa-bars"></i>
        </a>
    </li>
    <li class="nav-item">
       
        <?php
    // $role = (int) $_SESSION["role"]; // Convert role to integer
    if ($_SESSION['user_role'] == 1)
    {
        // if (isset($_SESSION['role']) && $_SESSION['role'] == 1)
        // if (session_name() == "admin_session")  {
        // echo "Admin";
        echo '<span class="ml-2" style="color: rgb(19, 16, 16); font-size: 18px; font-weight: 500;">
        Welcome, ' . ucwords($_SESSION["name"]) . ' - '."Admin";
    echo '</span>';
    }
    else
    {
      echo '<span class="ml-2" style="color: rgb(19, 16, 16); font-size: 18px; font-weight: 500;">
      Welcome, ' . ucwords($_SESSION["name"]) . ' - '."Staff";
  echo '</span>';
    }

?>

    </li>
</ul>

    <!-- Left navbar links -->
    <!-- <ul class="navbar-nav">
      <li class="nav-item">
        
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        
      </li> -->
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="/beauty_parlour_management_system/" class="nav-link">Home</a>
      </li> -->
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    <!-- </ul> -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <!-- <a href="/beauty_parlour_management_system/admin2/admin_logout.php">
       <button class="btn btn-block btn-dark btn-sm" type="button">LOGOUT</button>
       </a> -->
      <!-- Navbar Search -->
         <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
  <img src="<?php echo $imagePath;?>" class="img-circle elevation-2 " alt="User Image" style="width: 30px; height: 30px; object-fit: cover;" alt="gallery-image">
</a>
  <div class="dropdown-menu  dropdown-menu-right">
          <a href="admin_logout" class="dropdown-item">
            <i class="fa fa-sign-out-alt "></i> Logout
          </a>
          </div> 
</li>
          <!-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      
      </li>
      <li class="nav-item">
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <!-- <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a> -->
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <!-- <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle"> -->
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        
        <!-- <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a> -->
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>