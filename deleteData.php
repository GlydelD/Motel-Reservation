<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "motelreservation";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['deleteid']) && !empty($_GET['deleteid'])) {
    $deleteid = $_GET['deleteid'];

    $stmt = $conn->prepare("DELETE FROM reserveform WHERE id = ?");
    $stmt->bind_param("i", $deleteid);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
        echo '<meta http-equiv="refresh" content="0.1;URL=\'data.php\'" />';
    } else {
        echo "Error deleting record: " . $conn->error;
        echo '<meta http-equiv="refresh" content="1;URL=\'data.php\'" />';

    }

    $stmt->close();
} else {
    echo "Invalid request";
}

$conn->close();
?>
