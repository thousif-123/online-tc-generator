<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: login.html");
    exit();
}

$name = $_SESSION['user_name'];
$email = $_SESSION['user_email'];
$initial = strtoupper($name[0]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Profile</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to right, #1e3c72, #2a5298);
      color: white;
      margin: 0;
      padding: 20px;
    }
    .container {
      max-width: 500px;
      margin: 50px auto;
      background-color: rgba(0,0,0,0.6);
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px #000;
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
    }
    .info {
      font-size: 18px;
      margin-bottom: 15px;
    }
    .back {
      display: block;
      text-align: center;
      margin-top: 30px;
      color: #00e5ff;
      text-decoration: none;
      font-weight: bold;
    }
    .back:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>My Profile</h2>
    <div class="info"><strong>Username:</strong> <?php echo htmlspecialchars($name); ?></div>
    <div class="info"><strong>Email:</strong> <?php echo htmlspecialchars($email ?? "Not set"); ?></div>
    <a class="back" href="index.php">← Back to Home</a>
  </div>
</body>
</html>
