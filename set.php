<?php
include 'koneksi.php';
session_start();

$id = $_POST["id"];
$item = $_POST["item"];
$stock = $_POST["stock"];
$used = $_POST["used"];
$total = $stock + $used;

mysqli_query($conn, "INSERT INTO item (item, stock, used, total) VALUES ('$item', '$stock', '$used', '$total');");
header("location:index.php");

mysqli_close($conn);