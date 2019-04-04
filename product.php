<?php session_start(); 
include_once('script.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <link rel = "stylesheet" href = "node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "css\grad.css">

</head>
<body>
<?php include("navbar.php"); ?>
<!-- ดึงไฟล์ listpro.php เข้ามาเพื่อแสดงสินค้า -->
<?php include('listPro.php');?>
  
  </body>
 
</body>
</html>