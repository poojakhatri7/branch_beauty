<?php
include 'session.php';

// if (isset($_POST['request_type'] ==""))

$request_type = isset($_POST['request_type']) ? $_POST['request_type'] : '';
// if($_POST['request_type']=="")
if ($request_type == "service_data")
{
    // print_r($_POST);
    // $request_type = $_POST['request_type'];
    $sql = "SELECT * from category_service";

$query = mysqli_query($conn,$sql);
// echo "pooja";
$str = '<option value="">Select Category </option>';
$str .= '</select>';
while ($row = mysqli_fetch_assoc($query) )
{
  echo $row['c_id'] ;
 echo  $row['c_service'];
    $str.="<option value= '{$row['c_id']}'>{$row['c_service']}</option>";
}
echo $str;
}
else
if($_POST['request_type']=="sub_service_data")
{
    $sql = "SELECT * from sub_category_service WHERE sub_service = {$_POST['id']}";

    $query = mysqli_query($conn,$sql);
    // echo "pooja";
    // $str = '<option value="">Select Service</option>';
    $str = '<option value="">Select a Sub Service</option>';
    while ($row = mysqli_fetch_assoc($query) )
    {
      echo $row['s_id'] ;
     echo  $row['s_name'];
        $str.="<option value= '{$row['s_id']}'>{$row['s_name']} </option>";
    }
    echo $str;
}


if (isset($_POST['sub_service'])) {
    $sub_service = $_POST['sub_service']; // Get sub_service value from AJAX request
    
    // Prevent SQL injection
    $service_number = mysqli_real_escape_string($conn, $sub_service);

    // Fetch data based on the selected sub-service
    $query = "SELECT * FROM all_services WHERE service_number = '$service_number' order BY a_id DESC";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
     
        // echo "<table border='1' cellspacing='0' cellpadding='10'>
        // <thead style='background-color: rgb(51, 139, 139);'>
        //         <tr>
                
        //             <th>Service Name</th>
        //             <th>Price</th>
        //             <th>service_number</th>
        //              </thead>
        //         </tr>";
        echo '<div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead style="background-color: rgb(51, 139, 139);">
                <tr>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">S No.</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Service Name</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Service Price</th>
                     <th style="color: rgb(238, 230, 217); font-weight: 500;">Discount</th>
                        <th style="color: rgb(238, 230, 217); font-weight: 500;">Discount</th>
                      <th style="color: rgb(238, 230, 217); font-weight: 500;">Image</th>
                       <th style="color: rgb(238, 230, 217); font-weight: 500;">Actions</th>
                </tr>
            </thead>
            <tbody>
            ';

        $sno = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$sno}</td>
                    <td>{$row['all_service']}</td>
                    <td>{$row['price']}</td>
                     <td>{$row['discount_percentage']}</td>
                      <td>{$row['price_after_discount']}</td>
                      
<td><img src='{$row['file']}' alt='Service Image' style='width: 50px; height: 50px; object-fit: cover;'></td>
 <td><img src='{$row['file1']}' alt='Service Image' style='width: 50px; height: 50px; object-fit: cover;'></td>
  <td><img src='{$row['file2']}' alt='Service Image' style='width: 50px; height: 50px; object-fit: cover;'></td>

  
                   <td>
                   
                   
        <div style='display: inline-block; margin-right: 20px;'>
            <a href='edit_services?id=" . $row['a_id'] . "'>
                <i class='fas fa-pencil-alt' style='color:rgb(18, 110, 40);'></i> <!-- Edit icon -->
            </a> 
        </div>
        <div style='display: inline-block;'>
            <a href='delete_data?id=" . $row['a_id'] . "&table=all_services'>
                <i class='fa fa-trash' style='color: red;'></i> <!-- Trash icon -->
            </a>
        </div>

        
    </td>
                 
                  </tr>";
            $sno++;
        }
       
        // echo "</table>";
        echo '  </tbody>
        </table>
      </div>';
    } else {
        echo "<p>No services found.</p>";
    }
}
?>


