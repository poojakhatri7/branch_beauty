<?php
include 'session.php';


// Handle deletion based on `package_number`
if (isset($_GET['package_number']) && is_numeric($_GET['package_number'])) {
    $package_number = (int)$_GET['package_number'];

    $sql = "DELETE FROM package1 WHERE package_number = $package_number";

    if (mysqli_query($conn, $sql)) {
        header("Location: admin_available_package");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
        exit;
    }
}

// Handle deletion based on `id` and `table`

if (isset($_GET['id'], $_GET['table']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    $table = $_GET['table'];

    if ($table == 'portfolio' || $table == 'enquiry_message' || $table == 'tb_appointment' || $table == 'all_services' || $table == 'banner_management' || $table == 'staff_designation'|| $table == 'staff_gallery' || $table == 'admin_login_details'|| $table == 'sub_category_service' || $table == 'category_service' || $table == 'reviews' || $table == 'branch_details') {
     
    //   if ($table == 'all_services') {
    //     $column = 'a_id';
    // } else {
    //     $column = 'id';
    // }
         if ($table == 'all_services') 
         {
        $column = 'a_id';
        } 
      else if ($table == 'category_service')
      {
        $column = 'c_id';
      }
     else if ($table == 'sub_category_service')
      {
        $column = 's_id';
      }
    else {
       $column = 'id';
     }
     
        // $sql = "DELETE FROM `$table` WHERE a_id = $id OR id = $id";
 $sql = "DELETE FROM `$table` WHERE `$column` = $id";

        if (mysqli_query($conn, $sql)) {
            if ($table == 'portfolio') {
                header("Location: portfolio");
            } elseif ($table == 'enquiry_message') {
                header("Location: admin_enquiry_message");
            } elseif ($table == 'tb_appointment') {
                header("Location: admin_appointment");
            } elseif ($table == 'all_services') {
                 header("Location: manage_service");
            }
            elseif ($table == 'banner_management') {
                 header("Location:top_slider");
            }
             elseif ($table == 'staff_designation') {
                 header("Location:staff_gallery");
            }
            elseif ($table == 'staff_gallery') {
                 header("Location:staff_gallery");
            }
              elseif ($table == 'admin_login_details') {
                 header("Location: staff_details");
            }
             elseif ($table == 'category_service') {
                 header("Location: add_category");
            }
             elseif ($table == 'sub_category_service') {
                 header("Location: add_category");
            }
             elseif ($table == 'reviews') {
                 header("Location: admin_review");
            }
             elseif ($table == 'branch_details') {
                 header("Location: available_branches");
            }
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: Invalid table name.";
    }
}
?>








