<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');

$id = $_GET ['id'];
if (isset($_POST["submit"])) {

//   $image1 = $_FILES["image1"]["name"];
// $tmp1 = $_FILES["image1"]["tmp_name"];
// $path1 = "upload-images/" . $image1;
// move_uploaded_file($tmp1, $path1);

// $image2 = $_FILES["image2"]["name"];
// $tmp2 = $_FILES["image2"]["tmp_name"];
// $path2 = "upload-images/" . $image2;
// move_uploaded_file($tmp2, $path2);

// $image3 = $_FILES["image3"]["name"];
// $tmp3 = $_FILES["image3"]["tmp_name"];
// $path3 = "upload-images/" . $image3;
// move_uploaded_file($tmp3, $path3);
$imageUpdates = [];

if (!empty($_FILES["image1"]["name"])) {
    $image1 = $_FILES["image1"]["name"];
    $tmp1 = $_FILES["image1"]["tmp_name"];
    $path1 = "upload-images/" . $image1;
    move_uploaded_file($tmp1, $path1);
    $imageUpdates[] = "file = '$path1'";
}

if (!empty($_FILES["image2"]["name"])) {
    $image2 = $_FILES["image2"]["name"];
    $tmp2 = $_FILES["image2"]["tmp_name"];
    $path2 = "upload-images/" . $image2;
    move_uploaded_file($tmp2, $path2);
    $imageUpdates[] = "file1 = '$path2'";
}

if (!empty($_FILES["image3"]["name"])) {
    $image3 = $_FILES["image3"]["name"];
    $tmp3 = $_FILES["image3"]["tmp_name"];
    $path3 = "upload-images/" . $image3;
    move_uploaded_file($tmp3, $path3);
    $imageUpdates[] = "file2 = '$path3'";
}

    $service_name = $_POST["service_name"];
    $service_price = $_POST["service_price"];
    $description = $_POST["description"];
    $discount_percentage = $_POST["discount_percentage"];
    // $discount_percentage = $_POST["discount_percentage"];
    $price_after_discount = $_POST["price_after_discount"];
      // move_uploaded_file($photo2, $uploadPath);
    // SQL query to insert data
  //  $query = "UPDATE tb_services  SET  service_name='$service_name', service_price = '$service_price' WHERE id={$id}";
    // $query = "UPDATE `all_services` SET all_service='$service_name', price='$service_price', discount_percentage='$discount_percentage' ,price_after_discount='$price_after_discount', description='$description',  file='$path1',file1='$path2',file2='$path3' WHERE a_id=$id";
$mainUpdate = "
    all_service = '$service_name',
    price = '$service_price',
    discount_percentage = '$discount_percentage',
    price_after_discount = '$price_after_discount',
    description = '$description'
";
if (!empty($imageUpdates)) {
    $mainUpdate .= ", " . implode(", ", $imageUpdates);
}

$query = "UPDATE all_services SET $mainUpdate WHERE a_id = $id";

    // Execute the query and check for success
    if (mysqli_query($conn, $query)) {
        echo "<script> alert('SERVICE UPDATED SUCCESFULLY'); </script>";
    } else {
        echo "<script> alert('Something went wrong'); </script>";
    }
}
//$id = $_GET ['id'];
$sql = "SELECT * FROM all_services WHERE a_id={$id}";
// Step 3: Execute the query
$result = mysqli_query($conn, $sql);
// Step 4: Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
  // Step 5: Use a while loop to fetch each row of data
  while ($row = mysqli_fetch_assoc($result)) {
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/">Home</a></li> -->
              <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
<div class="card card-info">  
              <div class="card-header" style="background-color: rgb(51, 139, 139); color: white;">
                <h3 style=" align-items: center" class="card-title">UPDATE SERVICES</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method= "post"  enctype="multipart/form-data">
                <div class="card-body">
                  <!-- <div class="form-group row"> -->
                    <!-- <label for="inputEmail3" class="col-sm-2 col-form-label">S.NO</label> -->
                    <!-- <div class="col-sm-10">
                      <input type="text" name="id" class="form-control" id="inputEmail3" placeholder="ENTER SERIAL NUMBER ">
                    </div> -->
                  
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">SERVICE NAME</label>
                    <div class="col-sm-10">
                      <input type="text" name="service_name" class="form-control" id="inputPassword3" placeholder="ENTER SERVICE NAME" value = "<?php echo $row['all_service'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">SERVICE PRICE (Rs)</label>
                    <div class="col-sm-10">
                      <input type="text" id="service_price" name="service_price" class="form-control" id="inputPassword3" placeholder="ENTER NEW PRICE" value = "<?php echo $row['price'] ?>">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> DISCOUNT (%)</label>
                    <div class="col-sm-10">
                      <input type="text" id="discount_percentage" name="discount_percentage" class="form-control" id="inputPassword3" placeholder="ENTER DISCOUNT AMOUNT" value = "<?php echo $row['discount_percentage'] ?>">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> OFFER PRICE (Rs) </label>
                    <div class="col-sm-10">
                      <input type="text" id="price_after_discount" name="price_after_discount" class="form-control" id="inputPassword3" placeholder="ENTER OFFER PRICE" value = "<?php echo $row['price_after_discount'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">DESCRIPTION</label>
                    <div class="col-sm-10">
                      <input type="text" name="description" class="form-control" id="inputPassword3" placeholder="ENTER DESCRIPTION" value = "<?php echo $row['description'] ?>">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">IMAGE 1</label>
                    <div class="col-sm-10">
                      <input type="file" name="image1" class="form-control" id="inputPassword3" placeholder="ENTER DESCRIPTION" value = "<?php echo $row['file'] ?>">
                    </div>
                  </div>
                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">IMAGE 2</label>
                    <div class="col-sm-10">
                      <input type="file" name="image2" class="form-control" id="inputPassword3" placeholder="ENTER DESCRIPTION" value = "<?php echo $row['file1'] ?>">
                    </div>
                  </div>
                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">IMAGE 3</label>
                    <div class="col-sm-10">
                      <input type="file" name="image3" class="form-control" id="inputPassword3" placeholder="ENTER DESCRIPTION" value = "<?php echo $row['file2'] ?>">
                    </div>
                  </div>
                 
                  <!-- <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                      </div>
                    </div>
                  </div>
                </div>  -->
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn" style="background-color:rgb(51, 139, 139); font-weight: 500; font-size: 16px;  padding: 7px 20px;  color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px; ">UPDATE</button>
                  <button type="submit" class="btn btn-danger float-right">CANCEL</button>
                </div>
                <!-- /.card-footer -->
              </form>
              <?php     
              }
              }  ?>

            </div>
</div>

<script>
const priceInput = document.getElementById('service_price');
const discountInput = document.getElementById('discount_percentage');
const offerPriceInput = document.getElementById('price_after_discount');

function calculateOfferPrice() {
    const price = parseFloat(priceInput.value);
    const discount = parseFloat(discountInput.value);

    if (!isNaN(price) && !isNaN(discount)) {
        const discountAmount = (price * discount) / 100;
        const finalPrice = price - discountAmount;
        offerPriceInput.value = finalPrice.toFixed(2); // Round to 2 decimals
    } else {
        offerPriceInput.value = ''; // Clear if invalid input
    }
}

priceInput.addEventListener('input', calculateOfferPrice);
discountInput.addEventListener('input', calculateOfferPrice);
</script>
</body>
</html>
<?php
include('includes/footer.php');
?>