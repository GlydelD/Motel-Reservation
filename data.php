<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "motelreservation";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM reserveform";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reserve.style.css">
    <title>MOTEL RESERVATION SYSTEM</title>
</head>
<body style="background-image:url('media/motel.png');"> 
    <nav>
        <p style="margin-left:3vw; color:white;"> MOTEL RESERVATION SYSTEM</p>
        <div class="nav-links">
            <a href="reserve.html">RESERVE</a>
            <a href="data.php">DATA</a>
            <a href="about.html">ABOUT</a>
        </div>
        <div class="logout">
        <a href="login.html"> <button class="button-logout">LOGOUT</button></a> 
        </div>
    </nav>
    <div class="table">
        <div class="tableContent">
            <table>
                <tr>
                    <th>Update</th>
                    <th>Delete</th>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Phone Number</th>
                    <th>Room Number </th>
                    <th>Check In Date</th>
                    <th>Check Out Date</th>
                </tr>

                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><button class="updatebutton"> <a href="updateReserveForm.php?updateid=<?php echo $row['id'] ?>">Update</a> </button></td>
                            <td><button class="deletebutton"><a href="deleteData.php?deleteid=<?php echo $row['id'] ?>">Delete</a></button></td>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['fullName']); ?></td>
                            <td><?php echo htmlspecialchars($row['phoneNumber']); ?></td>
                            <td><?php echo htmlspecialchars($row['roomNumber']); ?></td>
                            <td><?php echo htmlspecialchars($row['checkInDate']); ?></td>
                            <td><?php echo htmlspecialchars($row['checkOutDate']); ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='10'>No data found</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
    </div>
</body>
</html>
    <?php
$conn->close();
?>