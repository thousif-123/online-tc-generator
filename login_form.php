<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Glassmorphism Login Form | CodingNepal</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="wrapper">
    <form method="POST" action="login.php">
      <h2>Login</h2>
    
      <div class="input-field">
        <input type="email" name="email" required />
        <label>Enter your email</label>
      </div>
    
      <div class="input-field">
        <input type="password" name="password" required />
        <label>Enter your password</label>
      </div>
    
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <a href="forgot.php">Forgot password?</a>
      </div>
    
      <button type="submit">Log In</button>
    
      <div class="register">
        <p>Don't have an account? <a href="register.html">Register</a></p>
      </div>
    </form>    
  </div>
</body>
</html>