<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($conn, "delete from item where id='$id'");

header("location:index.php");