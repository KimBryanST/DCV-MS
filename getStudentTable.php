<?php
  include "connection.php";
  
    $student_id = $_REQUEST["id_number"];
    $sql = "SELECT student_login.id_number, CONCAT(admin_table.first_name, ' ', admin_table.last_name) AS name, admin_table.id_number, admin_table.vio_date, admin_table.appeal_date, admin_table.vio_status, admin_table.admin_remarks, admin_table.appeal_reason,admin_table.id,student_login.id_number FROM student_login JOIN admin_table ON student_login.id_number = admin_table.id_number WHERE student_login.id_number = '$student_id' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
   if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["name"]) . "</td>
                <td>" . htmlspecialchars($row["id"]) . "</td>
                <td>" . htmlspecialchars($row["vio_date"]) . "</td>
                <td>" . htmlspecialchars($row["appeal_date"]) . "</td>
                <td>" . htmlspecialchars($row["appeal_reason"]) . "</td>
                <td>" . htmlspecialchars($row["vio_status"]) . "</td>
                <td>" . htmlspecialchars($row["admin_remarks"]) . "</td>
                <td> <a class = 'btn btn-primary' href='StudentViewRecordPage.php?id=$row[id]'>Appeal</a> </td>
              </tr>";
        
    }
} 

$conn->close();
?>

