<?php session_start(); 
include_once('script.php');
include("connectdb.php");
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


<!--ส่วนของการแสดงรายระเอียดสินค้า-->
<?php  
    $pro_id = $_GET['p_id'];
    $sql = "SELECT * FROM `product` WHERE `pro_id` = '$pro_id'";
//echo $sql;
    $result = mysqli_query($conn,$sql) or die ("ERROR int query: $sql" . mysqli_error());
    $row = mysqli_fetch_array($result);
   // print_r($row);
   extract($row);
     $id = $_SESSION['id']; 
     $date1 = date("Ymd");
     $orderid = ($_SESSION['order']);;
     $qty = $_POST['qty'];
    if(isset($_POST['submit'])){
      //   $buy = "INSERT INTO `orders`(`oder_id`, `date`, `cus_email`) VALUES ('$orderid','CAST($date1 as datetime)','$id')";
      //   echo $buy; 


      if($_POST['qty'] == null || $_POST['qty'] == 0){
        $message = "โปรดใส่จำนวน";
                        echo "<script type='text/javascript'>alert('$message');</script>";
      }
      else if($_POST['qty'] > $row['pro_Total']){
        $message = "จำนวนสินค้ามีไม่เพียงพอ";
        echo "<script type='text/javascript'>alert('$message');</script>";

      }
      else{   


        $sqlTotal = "SELECT product.pro_price FROM product WHERE pro_id = '$pro_id' ";
        $resultTotal = mysqli_query($conn,$sqlTotal);
        $rowTotal = mysqli_fetch_array($resultTotal);
        $price = $rowTotal['pro_price'];

       (double)$total = (double)$price * (double)$qty;
        $openorder = "INSERT INTO `orders`(`order_id`, `cus_Email`) VALUES ('$orderid','$id')";
        $addcart = "INSERT INTO `ordercomp` (`pro_id`, `order_id`,`orderc_qty`,`total`) VALUES ('$pro_id', '$orderid','$qty','$total')";
        mysqli_query($conn,$openorder); 
        mysqli_query($conn,$addcart); 

          $message = "Add too cart complete";
                        echo "<script type='text/javascript'>alert('$message');</script>";
      }
     // echo  $_SESSION['qty'];
        
}
      
?>
  <br><br>
<div class = "container">
    <div class = "row">
        <div class = "col-md-6">
        <form action="" method ="POST">
        <img src= "resource/<?php echo $row['pro_img']; ?>" width ="100%" class="rounded mx-auto d-block img-thumbnail" >
        </div>
        <div class = "col-md-6">
            <h4> <?php echo $row['pro_Name']; ?> 
            <font color ="red"> <br>  ราคา <?php echo number_format($row['pro_Price'],2,'.',','); ?>  </font> 
            </h4>
            <h5>เหลือจำนวน  <?php echo $row['pro_Total'] ?>  ชิ้น </h5>
            <p>
            <?php echo $row['pro_Detail']; ?> 
            </p>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
               <span class="input-group-text" id="inputGroup-sizing-sm">จำนวน</span>
              </div>
                  <input type="number" name = "qty" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
          </div>
           
           <a href="product.php" class="btn btn-warning btn-lg"> เลือกชมสินค้า </a>
           <?php  if($id != ''){  ?><input type = "submit" name = "submit" class = "btn btn-success btn-lg" value ="ซื้อสินค้า"  >    
           <?php } ?> 
        </div>
        </form>
    </div>
</div>




</body>
</html>