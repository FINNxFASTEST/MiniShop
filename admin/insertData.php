<?php session_start();  
include('../connectdb.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>insertdata</title>
    <link rel = "stylesheet" href = "..\node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "..\css\grad.css">
    <link rel = "stylesheet" href = "..\css\font.css">
</head>
    <?php  

            $category = "SELECT * FROM category";
            $cateresult = mysqli_query($conn,$category);
           
                if(isset($_POST['submit'])){ 
             $pro_id =  htmlspecialchars_decode($_POST['pro_id']);    
             $pro_Name =  htmlspecialchars_decode($_POST['pro_Name']);   
             $pro_Detail =  htmlspecialchars_decode($_POST['pro_Detail']);  
             $pro_Price =  htmlspecialchars_decode($_POST['pro_Price']);  
             $pro_Total = htmlspecialchars_decode($_POST['pro_Total']);    
             $pro_Cate  = htmlspecialchars_decode($_POST['type_ID']);   
            
             $date1 =date("Ymd-His");
             $numrand = (mt_rand());
             $p_img = (isset($_POST['fileUpload']) ? $_POST['fileUpload'] : '');
             $upload =$_FILES['fileUpload']['name'];
            if($upload != ''){
                    $path = "../resource/";
                    $type = strrchr($_FILES['fileUpload']['name'],".");
                    $newname = $numrand.$date1.$type;
                    $path_copy = $path.$newname;
                    $pathlink = "../resource/".$newname;
                  //  echo $_FILES['fileUpload']['tmp_name'];
                move_uploaded_file($_FILES['fileUpload']['tmp_name'],$path_copy);
            }
        $sql = "INSERT INTO `product` (`pro_id`, `pro_Name`, `pro_Detail`, `pro_Price`, `pro_Total`, `pro_img`,`cate_id`) VALUES ('".$pro_id."', '".$pro_Name."', '".$pro_Detail."', '".$pro_Price."', '".$pro_Total."','".$newname."','".$pro_Cate."')";
       // echo $sql;
        if($conn->query($sql) === TRUE){
              $message = "Insert product complete";
                        echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else{
                echo $conn->connection_error;
            }    
              
            }
    ?>

    <?php  //include("navbar.php"); ?>
    <body  style="background-color:#353a40">
            
<div class="container" class = "text-center"  >
         <div class="row">
            <div class="col-md-8 mx-auto mt-5 ">
                <div class="card">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-header text-center">
                            ADD PRODUCT TO DATABASE FORM
                        </div>
                        <div class="card-body">
                        <div class="form-group row">
                            <label for="pro_id" class="col-sm-3 col-form-label">รหัสสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pro_id" name="pro_id" required placeholder ="รหัสสินค้า หรือ บาร์โค้ด" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pro_Name" class="col-sm-3 col-form-label">ชื่อสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pro_Name" name="pro_Name"required placeholder ="ชื่อ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pro_Detail" class="col-sm-3 col-form-label">รายระเอียดสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pro_Detail" name="pro_Detail" placeholder ="รายระเอียดสินค้า">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pro_Price" class="col-sm-3 col-form-label">ราคาสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="number" step = 0.01 class="form-control" id="pro_Price" name="pro_Price"required placeholder ="00.00">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="pro_Total" class="col-sm-3 col-form-label">จำนวนสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="pro_Total" name="pro_Total"required placeholder ="ตัวเลข">
                                </div>
                            </div>

                          <div class="form-group row">
                                <label for="type_ID" class="col-sm-3 col-form-label">ประเภทสินค้า</label>
                                <div class="col-sm-9">
                            
                                <select name="type_ID" id="type_ID" class = form-control>    
                                    <?php  while($cateRow = mysqli_fetch_array($cateresult))    { ?>
                                        <option value=<?php echo $cateRow["cate_id"];?>><?php echo $cateRow["cate_Name"];?></option>
                                    <?php } ?>
                                </select>
                                </div>
                                </div>

                            <div class="form-group row">
                                <label for="fileUpload" class="col-sm-3 col-form-label">รูปภาพสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="fileUpload" name="fileUpload" required>
                                </div>
                            </div>


                            <div class = "card-footer text-center">
                        <a class="btn  btn-danger btn-lg " href="index.php" role="button" >Back</a> 
                        <input type = "submit" name = "submit" class = "btn btn-success btn-lg" value ="Register" >
                        
                            </div>
                        </div>
                    </form>
                </div>
            </div>  
         </div> 
      </div>
    <br>
 
  
 <!-- สคริปในการดึงไฟล์ bootstarp -->
 <script> scr = "../node_modules/bootstrap/dist/css/bootstrap.min.css" </script>
  <script language="/JavaScript" type="text/javascript" src="../node_modules/jquery/dist/jquery.js"></script>
  <script language="JavaScript" type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Carousel -->
  <script language="JavaScript" type="text/javascript">
  $(document).ready(function(){
    $('.carousel').carousel({
      interval: 3000
    })
  });    
</script>
</body>
</html>