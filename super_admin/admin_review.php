<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');

if (isset($_POST['submit'])) {
    // Get the form data
    $name = $_POST['name'];  
    $comment = $_POST['comment']; 
    // $rating = $_POST['rating'];
    echo $name;
    echo $comment;
    // echo $rating;
    $query = "INSERT INTO reviews values ('','$name','$comment')"; 
    // $query = "INSERT INTO reviews (name, rating, comment,created_at) VALUES ('$name', '$rating','$comment',currenttimestamp())";
    // $query = "INSERT INTO reviews (id,name, rating, comment, created_at) VALUES ('','$name', '$rating', '$comment', currenttimestamp())";

    if(mysqli_query($conn,$query));
    {
   echo"<script> alert('Review added Successfully ') </script>";
    }
    // Execute the query directly
    // if ($conn->query($sql) === TRUE) {
    //     echo "Data updated successfully!";
    // } else {
    //     echo "Error updating data: " . $conn->error;
    // }
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style type="text/css">
.admin_review{
  /* background : #157daf !important; */
  background :rgb(33, 70, 77) !important;
}
</style>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0"></h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/">Home</a></li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
    <div class="container-fluid">
  
<div class="card card-info">
              <div class="card-header"style="background-color: rgb(51, 139, 139);">
                <h3 class="card-title">Add Comments and Reviews</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method= "post">
                <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-4">
                      <input type="text"name="name" class="form-control" id="inputEmail3" placeholder="Enter name of the customer" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="comment" class="col-sm-2 col-form-label">Comment</label>
                    <div class="col-sm-4">
                      <textarea name="comment" class="form-control" id="inputEmail3" placeholder="" required></textarea>
                    </div>
                  </div>
                  <!-- <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Rating</label>
                    <div class="col-sm-10">
<select id="rating" name = "rating">
<option value="0">Select </option>
    <option value="1">(1 Stars)</option>
    <option value="2">(2 Stars)</option>
    <option value="3"> (3 Stars)</option>
    <option value="4"> (4 Stars)</option>
    <option value="5"> (5 Star)</option>
</select>

                    
                  </div> -->
                 
                
                  <!-- <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">TIME</label>
                    <div class="col-sm-10">
                      <input type="time" name="time" class="form-control" id="inputPassword3" placeholder="Enter Time ">
                    </div>
                  </div> -->
                  <!-- <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                      </div>
                    </div>
                  </div> -->
                <!-- </div> -->
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" name="submit" class="btn btn-info">UPDATE</button> -->
                  <button type="submit" name="submit" class="btn" style="background-color: rgb(51, 139, 139); color: rgb(244, 247, 230);; font-weight: 500; font-size: 16px;  padding: 7px 15px; ">Add Review</button>
                  <button type="reset" class="btn btn-danger float-right">CANCEL</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
</div>
  <section class="content">
 <div class="container-fluid">
<div class="card">
              <div class="card-header">
                <h5 class="m-0">  Update Comments and Reviews</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: rgb(51, 139, 139)">
                  <tr>
                    <th style="color: rgb(39, 30, 21); font-weight: 500;">S no.</th>
                    <th style="color: rgb(29, 27, 24); font-weight: 500;">Name</th>
                    <th style="color: rgb(27, 25, 23); font-weight: 500;">Comments</th>
                    <th style="color: rgb(39, 36, 30); font-weight: 500;">Action</th>
                    <!-- <th>Actions</th> -->
                  </tr>
                  </thead>
                  <tbody>
                  <?php
$sql = "SELECT * FROM reviews order BY id DESC";
$result = mysqli_query($conn, $sql);
$count = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
      
        ?>
        <tr>
            <th scope='row'><?php echo $count; ?></th>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['comment']; ?></td>
         
         

<td>
    <div style="display: inline-block;">
        <a href='delete_data?id=<?php echo $row["id"]; ?>&table=reviews'
         onclick="return confirm('Are you sure you want to delete this?')">
          
            <i class='fa fa-trash' style='color: red;'></i> <!-- Trash icon -->
        </a>
    </div>
</td>
        </tr>
        <?php
    }
} 
?>

                  </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>




</body>
</html>
<?php
include('includes/footer.php');
?>

