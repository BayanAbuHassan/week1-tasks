<?php
require_once 'User.php';

$user = new User("Bayan", "bayan2001ib@gmail.com");
$details = $user->getDetails();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>User Details</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background: #f0f4f8;
    color: #2c3e50;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }
  .container {
    background: white;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    max-width: 400px;
    text-align: center;
  }
  h1 {
    color: #3498db;
    margin-bottom: 20px;
  }
  p {
    font-size: 18px;
    line-height: 1.4;
  }
</style>
</head>
<body>
  <div class="container">
    <h1>User Info</h1>
    <p><?php echo htmlspecialchars($details); ?></p>
  </div>
</body>
</html>
