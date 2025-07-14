<?php
include 'session.php';


// if (isset($_POST['request_type'] ==""))

$request_type = isset($_POST['request_type']) ? $_POST['request_type'] : '';
// if($_POST['request_type']=="")
if ($request_type == "service_data")
{
    print_r($_POST);
    $request_type = $_POST['request_type'];
    $sql = "SELECT * from category_service";

$query = mysqli_query($conn,$sql);
// echo "pooja";
$str = '<option value="">Select Category</option>';
while ($row = mysqli_fetch_assoc($query) )
{
  echo $row['c_id'] ;
 echo  $row['c_service'];
    $str.="<option value= '{$row['c_id']}'>{$row['c_service']}";
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
        $str.="<option value= '{$row['s_id']}'>{$row['s_name']}";
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
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Service Image</th>
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
                    <td> <img src='{$row['file']}' width='50' height='50' alt='service image'> </td>
                 
            
              
    <td>
                <input 
                    type='checkbox' 
                    class='service-checkbox' 
                    name='services[]' 
                    value='" . $row['all_service'] . "' 
                    data-name='" . $row['all_service'] . "' 
                    data-price='" . $row['price'] . "' 
                    data-image='" . $row['file'] . "'>
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

