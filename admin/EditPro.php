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
           
               
             $pro_idG =  trim(htmlspecialchars_decode($_GET['id']));    
             $pro_NameG =  trim(htmlspecialchars_decode($_GET['Name']));   
             $pro_DetailG =  trim(htmlspecialchars_decode($_GET['Detail']));  
             $pro_PriceG =  trim(htmlspecialchars_decode($_GET['Price']));  
             $pro_TotalG = trim(htmlspecialchars_decode($_GET['Total']));    
             $pro_CateG  = trim(htmlspecialchars_decode($_GET['Cate'])) ;  
             $imgG = trim(htmlspecialchars_decode($_GET['img']));

                    
             $pro_id =  $pro_idG;  
             $pro_Name =          trim(htmlspecialchars_decode($_POST['pro_Name']));   
             $pro_Detail =        trim(htmlspecialchars_decode($_POST['pro_Detail']));  
             $pro_Price =         trim(htmlspecialchars_decode($_POST['pro_Price']));  
             $pro_Total =         trim(htmlspecialchars_decode($_POST['pro_Total']));    
             $pro_Cate  =         trim(htmlspecialchars_decode($_POST['cate_id'])) ;  
             $img =               trim(htmlspecialchars_decode($_POST['img']));

            if(isset($_POST['submit'])){ 
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
            else{
                $newname = $imgG;
            }


       // $sql = "INSERT INTO `product` (`pro_id`, `pro_Name`, `pro_Detail`, `pro_Price`, `pro_Total`, `pro_img`,`cate_id`) VALUES ('".$pro_id."', '".$pro_Name."', '".$pro_Detail."', '".$pro_Price."', '".$pro_Total."','".$newname."','".$pro_Cate."')";
       // echo $sql;
          $sql = "UPDATE `product` SET `pro_Name` = '".$pro_Name."', `pro_Detail` = '".$pro_Detail."', `pro_Price` = '".$pro_Price."', `pro_Total` = '".$pro_Total."', `cate_id` = '".$pro_Cate."' ,`pro_img` = '".$newname."'  WHERE `pro_id` = '".$pro_id."'";
      //    echo $sql;
       if($conn->query($sql) === TRUE){
              $message = "Edit product complete";
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
                                    <input type="text" class="form-control"disabled='disabled' id="pro_id" name="pro_id" required placeholder ="รหัสสินค้า หรือ บาร์โค้ด" value ="<?php echo$pro_idG ?>" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pro_Name" class="col-sm-3 col-form-label">ชื่อสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pro_Name" name="pro_Name"required placeholder ="ชื่อ"   value ="<?php echo$pro_NameG ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pro_Detail" class="col-sm-3 col-form-label">รายระเอียดสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pro_Detail" name="pro_Detail" placeholder ="รายระเอียดสินค้า"  value ="<?php echo$pro_DetailG ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pro_Price" class="col-sm-3 col-form-label">ราคาสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="pro_Price" name="pro_Price"required placeholder ="00.00" value ="<?php echo$pro_PriceG ?>" >
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="pro_Total" class="col-sm-3 col-form-label">จำนวนสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="pro_Total" name="pro_Total"required placeholder ="ตัวเลข" value ="<?php echo$pro_TotalG ?>">
                                </div>
                            </div>

                          <div class="form-group row">
                                <label for="cate_id" class="col-sm-3 col-form-label">ประเภทสินค้า</label>
                                <div class="col-sm-9">
                            
                                <select name="cate_id" id="cate_id" class = form-control>    
                                    <?php  while($cateRow = mysqli_fetch_array($cateresult))    { ?>
                                        <option value=<?php echo $cateRow["cate_id"];?> >   <?php echo $cateRow['cate_Name'];?>     </option>
                                    <?php } ?>
                                </select>
                                </div>
                                </div>

                            <div class="form-group row">
                                <label for="fileUpload" class="col-sm-3 col-form-label">รูปภาพสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="fileUpload" name="fileUpload" >
                                </div>
                            </div>


                            <div class = "card-footer text-center">
                        <a class="btn  btn-danger btn-lg " href="index.php" role="button" >Back</a> 
                        <input type = "submit" name = "submit" class = "btn btn-success btn-lg" value ="Edit" >
                        
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