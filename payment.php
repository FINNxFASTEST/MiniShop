<?php  
        session_start();
        include("script.php");
        include("navbar.php");
        include("connectdb.php");
        $sql2 = "SELECT * FROM ordercomp  a INNER JOIN (product b ,orders c ) on a.order_id = c.order_id and a.pro_id = b.pro_id WHERE a.order_id = '".$_SESSION['order']."' ";
        // echo $sql2;
        $_SESSION['order'] = $_SESSION['order'];
        $sqlSum = "SELECT SUM(total) FROM ordercomp where order_id = '".$_SESSION['order']."' ";
        $resultSum = mysqli_query($conn,$sqlSum);
        $rowSum = mysqli_fetch_array($resultSum);
        $result = mysqli_query($conn,$sql2);
        $total = $rowSum['SUM(total)'];




            if($_POST['submit']){       
             $slipID = $_POST['slipID'];
             $Money  = $_POST['Money']; 
             $date1 = date("Ymd-His");
             $numrand = (mt_rand());
             $p_img = (isset($_POST['fileUpload']) ? $_POST['fileUpload'] : '');
             $upload =$_FILES['fileUpload']['name'];
            if($upload != ''){
                    $path = "slip/";
                    $type = strrchr($_FILES['fileUpload']['name'],".");
                    $newname = $numrand.$date1.$type;
                    $path_copy = $path.$newname;
                    $pathlink = "../resource/".$newname;
                  //  echo $_FILES['fileUpload']['tmp_name' ];
                move_uploaded_file($_FILES['fileUpload']['tmp_name'],$path_copy);
                $sql = "INSERT INTO payment(`slip_number` , `pay_img` , `pay_Price`) VALUE ('".$slipID."'  , '".$newname."', $Money );";
           
            
            
            //ส่วนการจ่ายเงิน
               if($Money - $total == 0)  {  
               if($conn->query($sql) === TRUE){
                    $updateOrder =  "UPDATE orders SET slip_number = '".$slipID."' WHERE order_id = '".$_SESSION['order']."' ";
                    $updateStock =  "SELECT pro_total FROM ordercomp INNER JOIN product ON ordercomp.pro_id = product.pro_id WHERE ordercomp.order_id = '".$_SESSION['order']."' ";
                    $updateResult = mysqli_query($conn,$updateStock);
                 //   echo $updateStock."<br>";
                    $cout = mysqli_num_rows($updateResult);
                    $seeOrder  ="SELECT product.pro_Total - ordercomp.orderc_qty AS answer , product.pro_id  FROM ordercomp INNER JOIN product ON product.pro_id = ordercomp.pro_id WHERE order_id = '".$_SESSION['order']."';";
                    $seeOrderReusult = mysqli_query($conn,$seeOrder);
                 while ($rowSeeOrder =  mysqli_fetch_array($seeOrderReusult)){ $answer[] = $rowSeeOrder;  }
          
           //      while ($rowUpdateStock = mysqli_fetch_array($updateResult)) { $have[] = $rowUpdateStock; } 
           //        echo    $answer[0]['pro_id']  ;


                  for($i=0;$i<$cout;$i++){
                    error_reporting( E_PARSE);
                    $updateStockSQL ="UPDATE product SET pro_total = '".$answer[$i][answer]."' WHERE product.pro_id = '".$answer[$i]['pro_id']."' ";
             //         echo $updateStockSQL."<br>"; 
                      mysqli_query($conn,$updateStockSQL);
                    }

                    if($conn->query($updateOrder) === TRUE){
                        $_SESSION['order'] = $_SESSION['order']+1 ;
                        echo $_SESSION['order'];
                        header('location:product.php');
                    $message = "Upload Complete";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                            

                   } 
                }
                 else{
             //         echo "รหัสสลิปอาจไม่ถูกต้อง".mysqli_error();
                      $message = "รหัสสลิปอาจไม่ถูกต้อง";
                       echo "<script type='text/javascript'>alert('$message');</script>";
                  }    
            }

            else {
            $message = "โปรใส่จำนวนเงินให้ถูกต้อง";
            echo "<script type='text/javascript'>alert('$message');</script>";
            }

        }
    }
    



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



<div class = "container">
           <div class = "row">
              <div class = "col-md-6 mx-0 mt-5 col-sm-6">
                <div class = "card">
                <form action="EditCart.php" method ="GET">
                    <div class = "card-header text-center">
                       <h5>รายระเอียด</h5>
                    </div>
                    <div class = "card-body">
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
                                        </tr>
                                    </thead>          
                                    <?php $i = 1; ?> 
                            <?php while($row = mysqli_fetch_array($result))  { ?>
                                    <tbody>
                                        <tr>
                                        <th scope="row" class ="text-center"> <?php echo $i; ?></th>
                                        <td scope="row" class ="text-center"> <?php echo $row['pro_Name']; ?></td>               
                                        <td scope="row" class ="text-center"> <?php echo number_format($row['pro_Price'],2,'.',','); ?></td>     
                                        <td scope="row" class ="text-center"> <?php echo$row['orderc_qty']  ?>   </td>                                  
                                        </tr>                              
                            <?php   $i++; }?>
                                    <thead>
                                        <tr> 
                                        <th scope="col" class ="text-center"></th>
                                        <th scope="col" class ="text-center">ราคารวม</th>
                                         <th scope="col" class ="text-center">  <font color = "red">  <?php echo $total ?> </font>  </th>   
                                        <th scope="col" class ="text-center"></th>                                                              
                                        </tr>
                                    </thead>  

                            
                                    </table>
                                  </div>       
                             </form>
                        </div>
                    </div> 
                </div>     

                            <div class="col-md-6 mx-0 mt-5 col-sm-6">
                            <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="card">
                                            <div class = "card-header text-center">
                                                 <h5>อัพโหลดการจ่ายเงินของคุณ</h5>
                                            </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                             <label for="slipID" class="col-sm-3 col-form-label">รหัสสลิป</label>
                                            <div class="col-sm-9">
                                                 <input type="text" class="form-control" id="slipID" name="slipID" required placeholder ="รหัสสลิป" >
                                            </div>
                                       </div>
                                    
                                       <div class="form-group row">
                                             <label for="Money" class="col-sm-3 col-form-label">จำนวนเงิน</label>
                                            <div class="col-sm-9">
                                                 <input type="number" step = 0.01 class="form-control" id="Money" name="Money" required placeholder ="จำนวนเงิน" >
                                            </div>
                                       </div>


                                        <div class="form-group row">
                                             <label for="fileUpload" class="col-sm-3 col-form-label">รูปสลิป</label>
                                                <div class="col-sm-9">
                                                <input type="file" class="form-control" id="fileUpload" name="fileUpload" required>
                                                </div>
                                         </div>


                                    </div>

                                    <div class = "card-footer text-center">
                                            <input type = "submit" name = "submit" class = "btn btn-success btn-md" value ="ยืนยัน"  >
                                    </div>

                                    </form>

                                    </div>
                                </div>
                                </div>                         

                </div>
               
</body>
</html>

