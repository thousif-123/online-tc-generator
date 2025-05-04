<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs to prevent SQL injection
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Securely hash password

    // Insert query
    $query = "INSERT INTO admin_users (name, email, username, password)
              VALUES ('$name', '$email', '$username', '$password')";

    if (mysqli_query($db, $query)) {
        echo "<script>alert('Registration successful!'); window.location.href='login_form.php';</script>";
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
?>
