<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'motelreservation';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: reserve.html");
        exit();
    } else {
        echo "Invalid username or password. Please try again";
        echo '<meta http-equiv="refresh" content="1;URL=\'login.html\'" />';
    }

    $stmt->close();
}

$conn->close();
?>
