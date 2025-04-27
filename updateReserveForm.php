<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "motelreservation";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['updateid'])) {
    $updateId = $_GET['updateid'];
    
    $sql = "SELECT * FROM reserveform WHERE id = $updateId";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
    </div>

    <div class="container">
        <h2>Update Motel Reservation Form </h2>
        <form action="updateData.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" name="fullName" required value="<?php echo $row['fullName']; ?>">
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number:</label>
                <input type="tel" id="phoneNumber" name="phoneNumber"  required value="<?php echo $row['phoneNumber']; ?>">
            </div>
            <div class="form-group">
                <label for="roomNumber">Room Number:</label>
                <input type="text" id="roomNumber" name="roomNumber" required value="<?php echo $row['roomNumber']; ?>">
            </div>
            <div class="form-group">
                <label for="checkInDate">Check-in Date:</label>
                <input type="date" id="checkInDate" name="checkInDate" required value="<?php echo $row['checkInDate']; ?>">
            </div>
            <div class="form-group">
                <label for="checkOutDate">Check-out Date:</label>
                <input type="date" id="checkOutDate" name="checkOutDate" required value="<?php echo $row['checkOutDate']; ?>">
            <div class="form-group">
                <input type="submit" name="submit" value="Update">
            </div>
        </form>
    </div>
</body>
</html>