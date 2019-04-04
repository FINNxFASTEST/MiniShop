        <?php  
        session_start();
        include("script.php");
        include("navbar.php");
        include("connectdb.php");
        $sql2 = "SELECT * FROM ordercomp  a INNER JOIN (product b ,orders c ) on a.order_id = c.order_id and a.pro_id = b.pro_id WHERE a.order_id = '".$_SESSION['order']."' ";
        //$sql2 = "SELECT * FROM ordercomp INNER JOIN product ON ordercomp.pro_id = product.pro_id  WHERE order_id = '".$_SESSION['order']."'   ;";
        // echo $sql2;
        $result = mysqli_query($conn,$sql2);
        ?> 
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>mycart</title>
        </head>
        <body>


       <?php  
              /*  if( isset($_POST['edit'])){
                    echo  $qty = $_POST['qty'];

              }  */    
       ?>


<div class = "container">
           <div class = "row">
              <div class = "col-md-10 mx-auto mt-5">
                <div class = "card">
                <form action="EditCart.php" method ="GET">
                    <div class = "card-header text-center">
                    <font color = "Red">    <h5>My cart</h5> </font>
                    </div>
                    <div class = "card-body">
                     <!-- ส่วนบอดี้การล็อคอิน -->
                     <!-- ส่วนยูสเซอร์เนม -->
                        <div class = "text-center" >
                            <h5>  รหัสการสั่งซื้อ  </h5>     
                            <font color = "Orange">  <h5>#<?php  echo $_SESSION['order'] ?> </h5>  </font> 
                        </div>
                        <div class = "text-center">
                            <h5> สินค้า </h5>
                        </div>
                           <div class = "container">
                            <table class="table">           
                                    <thead>
                                        <tr> 
                                        <th scope="col" class ="text-center">อันดับ</th>
                                        <th scope="col" class ="text-center">ชื่อสินค้า</th>
                                        <th scope="col" class ="text-center">ราคา</th>
                                        <th scope="col" class ="text-center">จำนวน</th>    
                                        <th scope="col" class ="text-center">แก้ไข</th>
                                        <th scope="col" class ="text-center">ลบ</th>                          
                                        </tr>
                                    </thead>          


                                    <?php $i = 1; ?> 
                            <?php while($row = mysqli_fetch_array($result))  { ?>
                                    <tbody>
                                        <tr>
                                        <th scope="row" class ="text-center">  <?php echo $i; ?></th>
                                        <td scope="row" class ="text-center">  <?php echo $row['pro_Name']; ?></td>               
                                        <td scope="row" class ="text-center">  <?php echo number_format($row['pro_Price'],2,'.',','); ?></td>     
                                        <td scope="row" class ="text-center">  <?php echo$row['orderc_qty']  ?></td>   
                                        <td><a  href= "EditCart.php?order=<?php  echo $row['order_id']."&product=".$row['pro_id'] ?>"    class="btn btn-warning" role="button" style = "width:100%" >Edit</a> </td>  </td> 
                                        <td><a  href= "DeleteCart.php?order=<?php  echo $row['order_id']."&product=".$row['pro_id'] ?>"    class="btn btn-danger" role="button" style = "width:100%" >Delete</a> </td>                                                        
                                        </tr>                              
                            <?php   $i++; }?>
                                    </table>
                                    
                                    </div>       
                                    </form>

                    <div class = "card-footer text-center">
                    <a  href= "payment.php"    class="btn btn-success" role="button" style = "width:20%" >หน้าจ่ายเงิน</a>
                    </div>
                 
                </div>
              </div> 
           </div>     
        </div>



</body>
</html>

