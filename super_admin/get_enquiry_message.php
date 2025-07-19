<?php
include 'session.php';

if (isset($_GET['branch_details_id'])) {
    $branch_id = intval($_GET['branch_details_id']);

    // Example: get enquiries for selected branch
    $sql = "SELECT * FROM enquiry_message WHERE branch_details_id = $branch_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<table id="example1" class="table table-bordered table-striped">';
        echo '<thead style="background-color: rgb(51, 139, 139) ">
        <tr>
      
        <th> Branch Name</th>
        <th>Name</th>
        <th>Email</th>
         <th>Mobile</th>
          <th>Message</th>
           <th>Date and Time</th>
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
                    
                  </tr>';
        }
        echo '</tbody></table>';
    } else {
        echo '<p style="color: red; font-weight: bold;">No enquiries found for this branch.</p>';
    }
} else {
    echo '<p style="color: red;">Invalid request.</p>';
}
?>



