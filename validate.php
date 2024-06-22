<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user WHERE username= '$username' AND password= '$password'";
    $validate = $conn->query($sql);

    if($validate->num_rows > 0){
        $_SESSION['login'] = true;
        setcookie("login",time(), time() + (86400 * 30), "/");
        header("location: index.php");
        exit();
        
    } else {
        $_SESSION['error_message'] = "Username atau Password salah.";
        header("location: login.php");
        exit();

    }
}

$conn->close();
?>