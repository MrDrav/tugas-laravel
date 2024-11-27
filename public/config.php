<?php

$conn = mysqli_connect('localhost', 'root', '') or die('Connection failed');

// Create database if it doesn't exist
$db_create_query = "CREATE DATABASE IF NOT EXISTS shop_db";
if (mysqli_query($conn, $db_create_query)) {
    mysqli_select_db($conn, 'shop_db');
} else {
    die('Database creation failed: ' . mysqli_error($conn));
}

// Create tables if they don't exist
$table_create_queries = [
    "CREATE TABLE IF NOT EXISTS cart (
        id INT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        user_id INT(100) NOT NULL,
        name VARCHAR(100) NOT NULL,
        price INT(100) NOT NULL,
        quantity INT(100) NOT NULL,
        image VARCHAR(100) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",

    "CREATE TABLE IF NOT EXISTS message (
        id INT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        user_id INT(100) NOT NULL,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        number VARCHAR(12) NOT NULL,
        message VARCHAR(500) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",

    "CREATE TABLE IF NOT EXISTS orders (
        id INT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        user_id INT(100) NOT NULL,
        name VARCHAR(100) NOT NULL,
        number VARCHAR(12) NOT NULL,
        email VARCHAR(100) NOT NULL,
        method VARCHAR(50) NOT NULL,
        address VARCHAR(500) NOT NULL,
        total_products VARCHAR(1000) NOT NULL,
        total_price INT(100) NOT NULL,
        placed_on VARCHAR(50) NOT NULL,
        payment_status VARCHAR(20) NOT NULL DEFAULT 'pending'
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",

    "CREATE TABLE IF NOT EXISTS products (
        id INT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        price INT(100) NOT NULL,
        image VARCHAR(100) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",

    "CREATE TABLE IF NOT EXISTS users (
        id INT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        password VARCHAR(100) NOT NULL,
        user_type VARCHAR(20) NOT NULL DEFAULT 'user'
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
];

foreach ($table_create_queries as $query) {
    if (!mysqli_query($conn, $query)) {
        die('Table creation failed: ' . mysqli_error($conn));
    }
}

?>