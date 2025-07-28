<?php
include 'session.php';

if (isset($_GET['branch_details_id'])) {
    $branch_id = intval($_GET['branch_details_id']);

    // Fetch enquiries for selected branch
    $sql = "SELECT * FROM enquiry_message WHERE branch_details_id = $branch_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h5 class="m-0">Enquiry Details for Selected Branch</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="branchTable" class="table table-bordered table-striped">
                  <thead style="background-color: rgb(51, 139, 139); color: white;">
                    <tr>
                      <th>Branch Name</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Message</th>
                      <th>Date and Time</th>
                       <th>Select Enquiry Status </th>
                    </tr>
                  </thead>
                  <tbody>';
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . htmlspecialchars($row['branch_name']) . '</td>
                    <td>' . htmlspecialchars($row['name']) . '</td>
                    <td>' . htmlspecialchars($row['email']) . '</td>
                    <td>' . htmlspecialchars($row['mobile']) . '</td>
                    <td>' . htmlspecialchars($row['message']) . '</td>
                    <td>' . htmlspecialchars($row['created_at']) . '</td>
        <td>
<select name="enquiry_status" id="enquiry_status" class="form-control" required>
  <option value="" selected disabled>Select Status</option>
  <option value="complete">Complete</option>
  <option value="pending">Pending</option>
  <option value="cancelled">Cancelled</option>
</select>

</td>
                  </tr>';
        }

        echo '      </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>';
    } else {
        echo '<p style="color: red; text-align: center; font-weight: bold;">No Enquiry found for this Branch.</p>';
    }
} else {
    echo '<p style="color: red;">Invalid request.</p>';
}
?>





