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
           
           
           if(isset($_POST['submit'])){     
           $cate_id = $_POST['cate_id'];
            $cate_Name = $_POST['cate_Name'];

           $sqlCateInsert = "INSERT INTO category (cate_id,cate_name) VALUE ('$cate_id' ,'$cate_Name');";
            echo $sqlCateInsert;
            if($conn->query($sqlCateInsert)===true) {
                $message = "เพิ่มประเถทสินค้าเรียบร้อยแล้ว";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    

            }
            else {
                $message = "อาจจะมีประเถทสินค้านี้อยู่แล้ว หรือ มีบางอย่างผิดปกติ";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                
                }
            }
   ?>
    <body  style="background-color:#353a40">
            
<div class="container" class = "text-center"  >
         <div class="row">
            <div class="col-md-8 mx-auto mt-5 ">
                <div class="card">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-header text-center">
                            ADD CATEGORY TO DATABASE FORM
                        </div>
                        <div class="card-body">
                        <div class="form-group row">
                            <label for="cate_id" class="col-sm-3 col-form-label">รหัสประเภทสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="cate_id" name="cate_id" required placeholder ="รหัสประเภท" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cate_Name" class="col-sm-3 col-form-label">ชื่อประเภทสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="cate_Name" name="cate_Name"required placeholder ="ชื่อ">
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
</body>
</html>