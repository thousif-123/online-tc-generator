<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header("Location: login.php");
  exit();
}
$name = $_SESSION['user_name'];
$email = $_SESSION['user_email'];
$initial = strtoupper($name[0]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online TC Generator - Home</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      min-height: 100vh;
      background: linear-gradient(to right, #1e3c72, #2a5298);
      color: #fff;
      display: flex;
      flex-direction: column;
    }

    .navbar {
      background: rgba(0, 0, 0, 0.75);
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .logo {
      font-size: 26px;
      font-weight: 700;
    }

    .nav-links {
      list-style: none;
      display: flex;
      gap: 25px;
    }

    .nav-links li a {
      color: #fff;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    .nav-links li a:hover {
      color: #00e5ff;
    }

    .home-content {
      flex-grow: 1;
      padding: 100px 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      animation: fadeIn 1s ease-out;
    }

    .home-content h1 {
      font-size: 42px;
      font-weight: 700;
      background: linear-gradient(90deg, #ff6a00, #ee0979);
      background-size: 200% auto;
      background-clip: text;
      -webkit-background-clip: text;
      color: transparent;
      -webkit-text-fill-color: transparent;
      animation: gradientShift 3s infinite linear;
    }

    .home-content p {
      margin-top: 20px;
      font-size: 18px;
      max-width: 700px;
    }

    .footer {
      background-color: rgba(0, 0, 0, 0.8);
      text-align: center;
      padding: 20px 10px;
    }

    .footer p {
      font-size: 14px;
      margin: 6px 0;
    }

    .user-dropdown {
      position: relative;
      cursor: pointer;
    }

    .initial {
      background-color: #00e5ff;
      color: #000;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      font-size: 18px;
      transition: transform 0.3s ease;
    }

    .initial:hover {
      transform: scale(1.1);
    }

    .dropdown-content {
      display: none;
      position: absolute;
      top: 50px;
      right: 0;
      background-color: #ffffff;
      color: #333;
      padding: 12px 16px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
      min-width: 200px;
      z-index: 1000;
      text-align: left;
      opacity: 0;
      transform: translateY(-10px);
      transition: all 0.3s ease;
    }

    .user-dropdown.active .dropdown-content {
      display: block;
      opacity: 1;
      transform: translateY(0);
    }

    .dropdown-content p {
      margin: 6px 0;
      font-size: 15px;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    @media (max-width: 600px) {
      .navbar {
        flex-direction: column;
        align-items: flex-start;
      }
      .nav-links {
        flex-direction: column;
        gap: 15px;
      }
    }
  </style>
</head>
<body>

  <nav class="navbar">
    <div class="logo">Online TC</div>
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="Tc.php">TC Generator</a></li>
      <!-- <li><a href="http://localhost/lms_project/Admin_/index.php" target="_blank">Go to Library Management System</a></li> -->
      <li><a href="logout.php" class="logout-btn">Logout</a></li>
    </ul>

    <div class="user-dropdown" onclick="toggleDropdown()">
      <div class="initial"><?php echo $initial; ?></div>
      <div class="dropdown-content" id="userDropdown">
        <p><strong><?php echo $name; ?></strong></p>
        <p><?php echo $email; ?></p>
      </div>
    </div>
  </nav>

  <section class="home-content">
    <h1>Welcome to Online TC Generator</h1>
    <p>This platform helps schools and institutions to easily generate and manage Transfer Certificates (TC) online.</p>
  </section>

  <footer class="footer">
    <!-- <p><strong>Email:</strong> Skthousif474@gmail.com</p> -->
    <!-- <p><strong>Phone:</strong> +91 9059684780</p> -->
    <br />
    <p>&copy; 2025 Online TC Generator. All rights reserved.</p>
  </footer>

  <script>
    function toggleDropdown() {
      const dropdown = document.querySelector('.user-dropdown');
      dropdown.classList.toggle('active');
    }

    // Optional: Close dropdown if clicked outside
    window.addEventListener('click', function (e) {
      const dropdown = document.querySelector('.user-dropdown');
      if (!dropdown.contains(e.target)) {
        dropdown.classList.remove('active');
      }
    });

    // Optional: Close dropdown on Escape key
    window.addEventListener('keydown', function (e) {
      if (e.key === "Escape") {
        document.querySelector('.user-dropdown').classList.remove('active');
      }
    });
  </script>

</body>
</html>
