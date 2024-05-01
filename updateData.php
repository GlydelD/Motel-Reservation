<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "motelreservation";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $fullName = $_POST['fullName'];
    $phoneNumber = $_POST['phoneNumber'];
    $roomNumber = $_POST['roomNumber'];
    $checkInDate = $_POST['checkInDate'];
    $checkOutDate = $_POST['checkOutDate'];
    
    $sql = "UPDATE reserveform SET fullName='$fullName', phoneNumber='$phoneNumber', roomNumber='$roomNumber',
     checkInDate='$checkInDate', checkOutDate='$checkOutDate' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // echo "Record updated successfully";
        echo '<meta http-equiv="refresh" content="1.0;URL=\'data.php\'" />';

    } else {
        echo "Error updating record: " . $conn->error;
        echo '<meta http-equiv="refresh" content="1;URL=\'updateReserveForm.php\'" />';

    }
}

$conn->close();
?>
