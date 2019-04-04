<?php    
           session_start();
           include('connectdb.php');  
           require('script.php');

            $id      = $_GET['order'];
            $product = $_GET['product'];

           $sql = "SELECT * FROM ordercomp INNER JOIN product ON ordercomp.pro_id = product.pro_id  WHERE order_id = '".$id."' AND product.pro_id = '".$product."'    ;";
        //   echo $sql;
           $result = mysqli_query($conn,$sql);
           $row = mysqli_fetch_array($result);

          


            if(isset($_POST['submit'])){

               $qty = $_POST['qty'];
              
               $sqlTotal = "SELECT product.pro_price FROM product WHERE pro_id = '$product' ";
               $resultTotal = mysqli_query($conn,$sqlTotal);
               $rowTotal = mysqli_fetch_array($resultTotal);
               $price = $rowTotal['pro_price'];

                    (double)$total = (double)$price * (double)$qty;
    
               $sqlEdit = "UPDATE ordercomp SET orderc_qty = '$qty' , total = '$total' WHERE order_id = '$id' AND pro_id = '$product';  ";
                echo $sqlEdit;
                mysqli_query($conn,$sqlEdit);
               header('location:mycart.php');
            }



           ?>
           <div class = "container">
           <div class = "row">
              <div class = "col-md-10 mx-auto mt-5">
                <div class = "card">
                <form action="" method ="POST">
                    <div class = "card-header text-center">
                        <h5>Edit</h5>
                    </div>
                    <div class = "card-body">
                        <div class = "form-grpup  text-center">
                               <h5>ชื่อสินค้า</h5>     
                               <font color = "Red">  <h5> <?php echo $row['pro_Name'] ?>  </h5>  </font> 
                        </div>
                        <br>
                        <div class = "form-grpup  text-center">
                          
                             <h5>จำนวน</h5>     
                       
                        <input type ="number" class = "form-control  text-center"  name="qty" value = "<?php echo $row['orderc_qty']; ?>">
                        </div>
                    </div>
                    <div class = "card-footer text-center">
                        <input type = "submit" name = "submit" class = "btn btn-success btn-lg" value ="Edit"  >
                    </div>
                    </form>
                </div>
              </div> 
           </div>     
        </div>
    

   