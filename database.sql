CREATE DATABASE IF NOT EXISTS motelReservation;

USE motelReservation;

CREATE TABLE IF NOT EXISTS reserveForm (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(100) NOT NULL,
    phoneNumber VARCHAR(100) NOT NULL,
    roomNumber VARCHAR(255) NOT NULL,
    checkInDate  DATE NOT NULL,
    checkOutDate DATE NOT NULL

);

CREATE TABLE IF NOT EXISTS admin (
    username VARCHAR(20) NOT NULL,
    password VARCHAR(20) NOT NULL
);

INSERT INTO admin (username, password) VALUES ('admin', 'admin123');
