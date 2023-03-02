<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Hospital - Home</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/list-p.css"> 
</head>
<?php 
    include_once 'c:/xampp/htdocs/API/config/param.php';
    $path = PARAMS['domain'] . PARAMS['components_path'];
?>
<?php include $path."/header.php"?>
<?php include $path."/navbar.php"?>
<body>
  <?php include $path."/about.php"?>
  <?php include $path."/tags-section.php"?>
  <?php include $path."/team.php"?>  
  <?php include $path."/footer.php"?>
  <script src="../assets/getRequests.js"></script>
  <script src="../assets/cart.js"></script>
  <script src="../assets/script.js"></script>
</body>
</html>

