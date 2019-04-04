<?php
        include_once('connectdb.php');
        include_once('script.php');
        
        $categorySql = "SELECT * FROM category";
       
        $cateResult = mysqli_query($conn,$categorySql);

                  $rowShowPro = 12;
                  $page = $_GET['page'];
                    if($page =="") $page = 1;
                      $total_data = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM product"));
                      $total_page = ceil($total_data / $rowShowPro);
                      $start = ($page-1) * $rowShowPro;

                 $sql = "SELECT * FROM product ORDER BY pro_id DESC   LIMIT $start,12 " or die("Error: " . $conn ->connect_errno);

                $category = $_POST['category'];
                $product_Name = $_POST['name'];
                if(empty($_POST['price_Start']) && empty( $_POST['price_Last'])){
                    $price_Start = 0;
                    $price_Last  = 999999999; 
                }

                else if (empty($_POST['price_Start'])) {
                    $price_Start = 0;
                    $price_Last  = $_POST['price_Last'];
                }
                else if (empty($_POST['price_Last'])) {
                  $price_Start = $_POST['price_Start'];
                  $price_Last = 999999999;
                }
                else if(!empty($_POST['price_Start']) && !empty( $_POST['price_Last'])){
                    $price_Start = $_POST['price_Start'];
                    $price_Last  = $_POST['price_Last'];
                }

              
               if(isset($_POST['submit'])){
  
                    $sql = "SELECT * FROM `product` INNER JOIN `category` ON product.cate_id = category.cate_id   WHERE `pro_Name` LIKE '%".$product_Name."%' AND `pro_Price` BETWEEN '$price_Start' AND '$price_Last' AND `cate_Name` LIKE '%".$category."%' ORDER BY pro_id DESC LIMIT $start,12 ;" ;
                        
                           
              }
              if(isset($_POST['all'])){
                   $sql = "SELECT * FROM product ORDER BY pro_id DESC LIMIT $start,12 " or die("Error: " . $conn ->connect_errno);
              } 
  
              $result = mysqli_query($conn,$sql);

?>




<div class = "container">
        <div class = "row">
            <div class = "col-xs-12 col-md-12">
     <form action = "" method = "POST">
    <br>
    <h3 class = "text-center">รายการสินค้า</h3>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="text">ชื่อสินค้า</label>
      <input type="text" class="form-control" name= "name" id="name" placeholder="ชื่อสินค้า">
    </div>

  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="price_Start">ราคาเริ่มต้น</label>
      <input type="number" class="form-control" name= "price_Start" id="price_Start" placeholder="0">
    </div>

<div class="form-group col-md-4">
      <label for="price_Last">ราคาสูงสุด</label>
      <input type="number" class="form-control" name= "price_Last"  id="price_Last"placeholder="9999">
    </div>

    <div class="form-group col-md-4">
      <label for="inputState">ประเภทสินค้า</label>
      <select id="categoryId" name= "category"  class="form-control">
      <option></option>
        <?php
            while($objResult = mysqli_fetch_array($cateResult))
                {  ?>
               <option value=<?php echo $objResult["cate_Name"];?>><?php echo $objResult["cate_Name"];?></option>
                <?php  } ?>

            </select>
           </div>
        </div>
            <button type="submit" name = "submit"class="btn btn-success">ค้นหา</button>
            <button type="submit" name = "all"class="btn btn-warning">สินค้าทั้งหมด</button>
        </form>
</div>




<?php   while ($row = mysqli_fetch_array($result)) { ?>
    <?php //echo ($row['pro_img']) ;  ?>
       <div class = "cil-xs-12 col-md-2 col-sm-4 ">
          <a href= "detail.php?p_id=<?php echo $row['pro_id'];?>">  <img src= "resource/<?php echo $row['pro_img']; ?>"  class="rounded mx-auto d-block img-thumbnail" >   </a>
    <p class = "text-center" style = "font-size:14px " style="font-weight:bold" ><?php  echo $row['pro_Name'];  ?> </p>
    <a class="btn btn-info"  href="detail.php?p_id=<?php echo $row['pro_id'];?>"      role="button" style = "width:100%">Detail</a>
           </p>
             </div>
<?php } ?>
     
    </div>
</div>

                <div class = "col-md-2 mx-auto mt-1">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                          <li class="<?php if($page==1) echo "disabled " ?>page-item">
                            <a class="page-link" href="product.php?page=<?php echo $page-1 ?>" aria-label="Previous"> Previous </a>
                              
                          
                          </li>
                          <?php for($z=1;$z<=$total_page;$z++){ ?>
                          <li class="page-item"><a class="page-link" href="product.php?page=<?php echo $z ?>"  >  <?php echo $z ?></a></li>              
                          <?php } ?>
                          <li class="<?php if($page==$total_page) echo "disabled " ?>page-item">
                            <a class="page-link" href="product.php?&page=<?php echo $page+1 ?> " aria-label="Next"> Next </a>
                            
                          
                          </li>
                        </ul>
                    </nav>
                 </div>
