<?php 
    //Database connection
    
    $host = "localhost";
    $dbusername = "u785536991_DCVMS";
    $dbpassword = "!School@123";
    $dbname = "u785536991_DCVMS";
    
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    
    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }

// Fetch data
$sql = "SELECT CONCAT(first_name, ' ', last_name) AS name, id_number, vio_date, appeal_date, vio_status, admin_remarks, appeal_reason,id FROM admin_table";
$result = $conn->query($sql);

// Display as HTML table
if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["name"]) . "</td>
                <td>" . htmlspecialchars($row["id"]) . "</td>
                <td>" . htmlspecialchars($row["id_number"]) . "</td>
                <td>" . htmlspecialchars($row["vio_date"]) . "</td>
                <td>" . htmlspecialchars($row["appeal_date"]) . "</td>
                <td>" . htmlspecialchars($row["vio_status"]) . "</td>
                <td>" . htmlspecialchars($row["appeal_reason"]) . "</td>
                <td>" . htmlspecialchars($row["admin_remarks"]) . "</td>
                <td>
                <a class = 'btn btn-primary' href='AdminViewRecordPage.php?id=$row[id]'>Update</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>