<?php
include 'koneksi.php';
session_start();

$id = $_POST["id"];
$item = $_POST["item"];
$stock = $_POST["stock"];
$used = $_POST["used"];
$total = $stock + $used;

mysqli_query($conn, "UPDATE item set item='$item', stock='$stock', used='$used', total='$total' where id='$id'");
header("location:index.php");

mysqli_close($conn);