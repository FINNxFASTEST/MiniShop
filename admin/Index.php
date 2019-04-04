<?php  
session_start();
include('../connectdb.php');
?>
<!-- สคริปในการดึงไฟล์ bootstarp -->
<script> scr = "../node_modules/bootstrap/dist/css/bootstrap.min.css" </script>
  <script language="JavaScript" type="text/javascript" src="../node_modules/jquery/dist/jquery.js"></script>
  <script language="JavaScript" type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../DataTables/datatables.min.js"></script>
  <!-- Carousel -->
  <script language="JavaScript" type="text/javascript">
  $(document).ready(function(){
    $('.carousel').carousel({
      interval: 3000
    })
  });    
</script>

<link rel = "stylesheet" href = "../node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel = "stylesheet" href = "../css\grad.css">
<link rel = "stylesheet" href = "../css\font.css">
<link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>





<!--ส่วนของของเฮดเดอร์  เนวิเกเตอร์บาร์  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
</head>


<br>
<form action="" method = "GET">
<ul class="nav justify-content-center">
  <li class="nav-item ">
  <input type="submit" name = "product" class="btn btn-outline-primary"  value = "Product">  <br>
  </li>
  <li class="nav-item" >
  <input type="submit" name = "customer"  class="btn btn-outline-warning" value = "Customer" >  <br>
  </li>
  <li class="nav-item" >
  <a class="btn btn btn-outline-danger " href="../product.php">Ourproduct</a> <br>
  </li>
</ul>
</form>
<body  style="background-color:#353a40">


    <?php   

        if(isset($_GET['product'])) {
    /*     $sqlpro = "SELECT * FROM `product` INNER JOIN `category` ON product.cate_id = category.cate_id;";
    $resultpro = mysqli_query($conn,$sqlpro);*/  ?>  
          <div class = text-center> 
          <a class="btn btn btn-outline-success " href="insertData.php" role="button" >เพิ่มสินค้า</a>
          <a class="btn btn btn-outline-warning " href="newcategory.php" role="button" >เพิ่มประเถทสินค้า</a>
           <br>
             <br>
 
    <div class = "container text-center">
        <table id = "product_table"class="table table-borderless table-dark">           
                <thead>
                    <tr> 
                    <th scope="col">Product No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                    <th scope="col">Category</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>   

                <?php   
                $rowShowPro = 10;
                $page = $_GET['page'];
                  if($page =="") $page = 1;
                $total_data = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM product"));
                $total_page = ceil($total_data / $rowShowPro);
             $start = ($page-1) * $rowShowPro;
                $sqlPage ="SELECT * FROM `product` INNER JOIN `category` ON product.cate_id = category.cate_id Limit $start,10";
        
             //   echo $sqlPage;
                $query = mysqli_query($conn,$sqlPage);
                while ($row = mysqli_fetch_array($query)){
                  $j++;
            ?>
                <tbody>
                    <tr>
                    <td><font color ="White"> <?php echo $row['pro_id']; ?>  </font></td>
                    <td><font color ="White"><?php echo $row['pro_Name']; ?> </font></td>
                    <td><font color ="White"><?php echo $row['pro_Detail']; ?></font></td>
                    <td><font color ="White"> <?php echo number_format($row['pro_Price'],2,'.',',') ; ?></font></td>
                    <td><font color ="White"><?php echo $row['pro_Total']; ?></font></td>
                    <td><font color ="White"><?php echo $row['cate_Name']; ?></font></td>
                    <td> <a  href= "EditPro.php?id=<?php echo $row['pro_id'];?>&Name=<?php echo $row['pro_Name'];?>&Detail=<?php echo $row['pro_Detail'];?>&Price=<?php echo $row['pro_Price'];?>&Total=<?php  echo $row['pro_Total'];?>&Cate=<?php echo $row['cate_Name']; ?>&img=<?php echo $row['pro_img']; ?> "   
                            class="btn btn-outline-warning" role="button" style = "width:100%">Edit</a> </td>
                    <td><a  href= "Delete.php?idPro=<?php echo $row['pro_id'];?>&No=2"   class="btn btn-outline-danger" role="button" style = "width:100%">Delete</a> </td>           
                    </tr> 
        <?php    }  ?>
                </table>

          <div class = "col-md-2 mx-auto mt-1">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="<?php if($page==1) echo "disabled " ?>page-item">
                    <a class="page-link" href="Index.php?product=Product&page=<?php echo $page-1 ?>" aria-label="Previous"> Previous </a>
                      
                  
                  </li>
                  <?php for($z=1;$z<=$total_page;$z++){ ?>
                  <li class="page-item"><a class="page-link" href="Index.php?product=Product&page=<?php echo $z ?>"  >  <?php echo $z ?></a></li>              
                  <?php } ?>
                  <li class="<?php if($page==$total_page) echo "disabled " ?>page-item">
                    <a class="page-link" href="Index.php?product=Product&page=<?php echo $page+1 ?> " aria-label="Next"> Next </a>
                     
                  
                  </li>
                </ul>
            </nav>
                </div>
              </div>
        <?php   } ?>














    <?php    if(isset($_GET['customer'])){   
            $sql = "SELECT * FROM `customer`;";
            $result = mysqli_query($conn,$sql);  ?>

    <div class = "container">    
        <table id= "customer" class="table table-borderless table-dark">
                
                <thead>
                    <tr>
                    
                    <th scope="col">Email</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>


                <?php   
                $rowShowCus = 10;
                $page = $_GET['page'];
                  if($page =="") $page = 1;
                $total_data = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM customer"));
                $total_page = ceil($total_data / $rowShowCus);
             $start = ($page-1) * $rowShowCus;
                $sqlPage ="SELECT * FROM `customer` Limit $start,10";
             //   echo "<br>".$total_data."<<< >>>".$total_page."<br>";
             //   echo $sqlPage;
              
                $query = mysqli_query($conn,$sqlPage);
                while ($rowCus = mysqli_fetch_array($query)){
                  $k++;
            ?>
                    
                <tbody>
                    <tr>
                 
                    <td><font color ="White"> <?php echo $rowCus['cus_Email']; ?>  </font> </td>
                    <td><font color ="White"> <?php echo $rowCus['cus_Name']; ?>   </font> </td>
                    <td><font color ="White"> <?php echo $rowCus['cus_Adress']; ?> </font> </td>
                    <td><a  href= "Edit.php?Email=<?php echo $rowCus['cus_Email'];?>&Name=<?php echo $rowCus['cus_Name'];?>&Tel=<?php echo $rowCus['cus_Tel'];?>&Pass=<?php echo $rowCus['cus_Pass'];?>&Address=<?php echo $rowCus['cus_Adress']; ?>"     class="btn btn-outline-warning" role="button" style = "width:100%">Edit</a> </td>
                    <td><a  href= "Delete.php?Email=<?php echo $rowCus['cus_Email'];?>&No=1"   class="btn btn-outline-danger" role="button" style = "width:100%">Delete</a> </td>
                   
                    </tr>
                   
        <?php   }  ?>
                </table>

                <div class = "col-md-2 mx-auto mt-1">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="<?php if($page==1) echo "disabled " ?>page-item">
                    <a class="page-link" href="Index.php?customer=Customer&page=<?php echo $page-1 ?>" aria-label="Previous"> Previous </a>
                      
                  
                  </li>
                  <?php for($u=1;$u<=$total_page;$u++){ ?>
                  <li class="page-item"><a class="page-link" href="Index.php?customer=Customer&page=<?php echo $u ?>"  >  <?php echo $u ?></a></li>              
                  <?php } ?>
                  <li class="<?php if($page==$total_page) echo "disabled " ?>page-item">
                    <a class="page-link" href="Index.php?customer=Customer&page=<?php echo $page+1 ?> " aria-label="Next"> Next </a>
                     
                  
                  </li>
                </ul>
            </nav>
                </div>



                </div>
        <?php    } ?>
            



</body>
</html>