<?php
include 'connection.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $new_password = $_POST['new_password'];

    $check_query = "SELECT * FROM admin_users WHERE username='$username'";
    $result = mysqli_query($db, $check_query);

    if (mysqli_num_rows($result) > 0) {
        $update_query = "UPDATE admin_users SET password='$new_password' WHERE username='$username'";
        if (mysqli_query($db, $update_query)) {
            $message = "<span style='color: green;'>Password updated successfully. <a href='login_form.php'>Login here</a></span>";
        } else {
            $message = "<span style='color: red;'>Error updating password.</span>";
        }
    } else {
        $message = "<span style='color: red;'>Username not found.</span>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #667eea, #764ba2);
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }
        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }
        label {
            font-weight: bold;
            color: #555;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin: 10px 0 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #667eea;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #5a67d8;
        }
        .message {
            text-align: center;
            font-size: 15px;
            margin-top: 15px;
        }
        a {
            color: #667eea;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Reset Your Password</h2>
        <form method="POST" action="">
            <label>Username:</label>
            <input type="text" name="username" required>

            <label>New Password:</label>
            <input type="password" name="new_password" required>

            <input type="submit" value="Reset Password">
        </form>

        <div class="message"><?php echo $message; ?></div>
    </div>

</body>
</html>
