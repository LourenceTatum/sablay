<?php
require_once "../api/db_connect.php";

// Fetch all products
$sql = "SELECT * FROM products ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin – Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #111;
            color: white;
            padding: 20px;
        }
        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #222;
        }
        table th, table td {
            padding: 12px;
            border: 1px solid #333;
        }
        table th {
            background: #444;
        }
        img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
        }
        .btn {
            padding: 6px 12px;
            background: #444;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 6px;
        }
        .btn:hover {
            background: #666;
        }
        .top-bar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<h1>Admin – Product List</h1>

<div class="top-bar">
    <a href="add_product.php">
        <button class="btn">+ Add New Product</b
