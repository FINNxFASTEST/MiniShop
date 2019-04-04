<?php    
           
           include('connectdb.php');
                $orderID = $_GET['order'];
                $proID = $_GET['product']; 
              $sql = "DELETE FROM `ordercomp` WHERE `pro_id` = '$proID' AND `order_id` = '$orderID';";       
               mysqli_query($conn,$sql);
               header('location:mycart.php');
    

    ?>