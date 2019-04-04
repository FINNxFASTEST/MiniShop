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
<div class = "image-container">
        <img scr="cover\slide2.jpg"; \>
        </div>

<!--ส่วนของสไลด์ภาพ  -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner  mt-10">
    <div class="carousel-item active">
        <div class = "simple-linear" > 
          <div class = "hero-image">
          <img src="cover\slide2.jpg"  width = "1000" height = "600"  class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            <a href="product.php" class="btn btn-warning btn-lg"> เลือกชมสินค้า </a>
         <h5>  <p class="text-light">Etude House </p> </h5>
            <p class="text-light" >พัฒนาเครื่องสำอางให้เป็นเครื่องสำอางชั้นนำ </p>
            </div>
        </div>   
    </div>
</div>
    <div class="carousel-item">
    <div class = "hero-image">
      <img src="cover\slide4.jpg"   width = "1000" height = "600"  class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <a href="product.php" class="btn btn-warning btn-lg"> เลือกชมสินค้า </a>
          <h5> <p class="text-light">Etude House </p></h5> 
          <p class="text-light">ดีไซต์เก๋ไก๋ ที่ไม่ได้มาพร้อมกับความน่ารักของสินค้า แต่ราคายังสบายกระเป๋า</p>
        </div>
        </div>
    </div>
    <div class="carousel-item">
    <div class = "hero-image">
      <img src="cover\slide3.jpg" width = "1000" height = "600"  class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
       <a href="product.php" class="btn btn-warning btn-lg"> เลือกชมสินค้า </a>
       <h5> <p class="text-light">Etude House</p></h5> 
          <p class="text-light">ผลิตภัณฑ์ใหม่ล่าสุด ผ่านกระบวนการคัดสรรอย่างดี</p>
        </div>
        </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


</body>
</html>