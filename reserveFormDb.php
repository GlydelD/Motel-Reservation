<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "motelreservation";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO reserveform (fullName, phoneNumber, roomNumber, 
    checkInDate, checkOutDate) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fullName, $phoneNumber, $roomNumber, $checkInDate, $checkOutDate);

    $fullName = $_POST['fullName'];
    $phoneNumber = $_POST['phoneNumber'];
    $roomNumber = $_POST['roomNumber'];
    $checkInDate = $_POST['checkInDate'];
    $checkOutDate = $_POST['checkOutDate'];

    if ($stmt->execute()) {
        echo "New records saved successfully";
        echo '<meta http-equiv="refresh" content="0.1;URL=\'reserve.html\'" />';
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

?>
