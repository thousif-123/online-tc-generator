<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['name'])) {
    header("Location: login.html");
    exit();
}

$name = $_SESSION['name'];
$initial = strtoupper($name[0]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online TC Generator - Home</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      min-height: 100vh;
      background: url('https://images.unsplash.com/photo-1496307653780-42ee777d4833?auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .navbar {
      background-color: rgba(0, 0, 0, 0.7);
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      position: sticky;
      top: 0;
      z-index: 10;
    }

    .navbar .logo {
      font-size: 24px;
      font-weight: bold;
    }

    .nav-links {
      list-style: none;
      display: flex;
      gap: 20px;
      align-items: center;
    }

    .nav-links li a {
      color: #fff;
      text-decoration: none;
      font-weight: 500;
    }

    .nav-links li a:hover {
      color: #00e5ff;
    }

    .user-icon {
      background-color: #00e5ff;
      color: black;
      border-radius: 50%;
      width: 35px;
      height: 35px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      cursor: pointer;
      position: relative;
    }

    .user-dropdown {
      display: none;
      position: absolute;
      top: 45px;
      right: 0;
      background-color: rgba(255, 255, 255, 0.95);
      color: black;
      padding: 10px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      z-index: 99;
      width: 200px;
    }

    .user-dropdown p {
      margin: 5px 0;
      font-size: 14px;
    }

    .user-icon:hover .user-dropdown {
      display: block;
    }

    .home-content {
      flex-grow: 1;
      text-align: center;
      padding: 80px 20px;
      color: white;
      backdrop-filter: blur(8px);
      background: rgba(255, 255, 255, 0.1);
      margin: 40px;
      border-radius: 20px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
      animation: fadeIn 1.5s ease-in-out;
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .home-content h1 {
      font-size: 38px;
      margin-bottom: 20px;
      animation: colorBlink 1s infinite;
    }

    @keyframes colorBlink {
      0% { color: red; }
      25% { color: orange; }
      50% { color: yellow; }
      75% { color: limegreen; }
      100% { color: cyan; }
    }

    .home-content p {
      font-size: 18px;
      color: #f1f1f1;
      margin-top: 10px;
    }

    .footer {
      background-color: rgba(0, 0, 0, 0.7);
      color: #fff;
      text-align: center;
      padding: 25px 10px;
    }

    .footer p {
      margin: 6px 0;
      font-size: 14px;
    }

    @media (max-width: 600px) {
      .navbar {
        flex-direction: column;
        text-align: center;
      }
      .nav-links {
        flex-direction: column;
        gap: 10px;
        margin-top: 10px;
      }
      .home-content h1 {
        font-size: 28px;
      }
      .home-content {
        margin: 20px;
        padding: 40px 15px;
      }
    }
  </style>
</head>
<body>
  <nav class="navbar">
    <div class="logo">TC Generator</div>
    <ul class="nav-links">
      <li><a href="homepage.php">Home</a></li>
      <li><a href="logout.php">Logout</a></li>
      <li>
        <div class="user-icon">
          <?php echo $initial; ?>
          <div class="user-dropdown">
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Username:</strong> <?php echo $_SESSION['username']; ?></p>
            <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
          </div>
        </div>
      </li>
    </ul>
  </nav>

  <section class="home-content">
    <h1>Welcome to Online TC Generator</h1>
    <p>This platform helps schools/institutions to easily generate and manage Transfer Certificates (TC) online.</p>
  </section>

  <footer class="footer">
    <div class="footer-content">
      <p><strong>Email:</strong> Skthousif474@gmail.com</p>
      <p><strong>Phone:</strong> +91 9059684780</p><br>
      <p>&copy; 2025 Online TC Generator. All rights reserved.</p>
      <p><code>Designed by Tarun kumar</code></p>
    </div>
  </footer>
</body>
</html>
