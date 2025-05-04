<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM admin_users WHERE email = '$email'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            // ✅ Set session variables correctly
            $_SESSION['user_name'] = $user['username'];   // used in index.php
            $_SESSION['user_email'] = $user['email'];     // used in index.php

            // ✅ Redirect to index.php using header
            header("Location: index.php");
            exit();

            // OR if you prefer JavaScript-based redirect (not recommended):
            // echo "<script>alert('Login successful!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Incorrect password.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('No user found with this email.'); window.history.back();</script>";
    }
}
?>
