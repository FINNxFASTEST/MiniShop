<?php  
session_start();
include('../connectdb.php');
?>
<!-- สคริปในการดึงไฟล์ bootstarp -->
<script> scr = "../node_modules/bootstrap/dist/css/bootstrap.min.css" </script>
  <script language="JavaScript" type="text/javascript" src="../node_modules/jquery/dist/jquery.js"></script>
  <script language="JavaScript" type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
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



     <?php   
             $Email = $_GET['Email'];
             $Name = $_GET['Name'];
             $Tel = $_GET['Tel'];
             $Pass = $_GET['Pass'];
             $Address = $_GET['Address'];   
          
                 $nameE =         $_POST['name'];
                 $addressE =      $_POST['address'];
                 $telE =          $_POST['telNo'];
                 $passwordE =     htmlspecialchars_decode($conn->real_escape_string($_POST['password']));

          
          if(isset($_POST['submit'])){

            $sql = "UPDATE `customer` SET `cus_Email` = '$Email', `cus_Name` = '$nameE', `cus_Adress` = '$addressE', `cus_Tel` = '$telE', `cus_Pass` = '$passwordE' WHERE `customer`.`cus_Email` = 'pepa@email.com'";
          //  echo $sql;
            if($conn->query($sql) === TRUE){
                
                $message = "Edit Complete";
                        echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else {
                echo $conn->connection_error;
            }
          }


                ?>  




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
            
            
            <body style="background-color:#353a40">
    
                <div class = "container">
                        <div class = "row">
                            <div class = "col-md-8 mx-auto mt-5">
                                <div class = "card">
                                <form action="" method ="POST">
                                    <div class = "card-header text-center">
                                        <h5>Register form</h5>
                                    </div>
                                    <div class = "card-body">
                                    <!-- ส่วนบอดี้การล็อคอิน -->
                                    <!-- ส่วนยูสเซอร์เนม -->
                                        <div class = "form-grpup  row">
                                            <label for="name" class ="col-form-label " > ชื่อและนามสกุล</label>
                                        <input type ="text" class = "form-control" id = "name" name="name" value ="<?php echo$Name ?>" placeholder ="ชื่อและนามสกุล"   required >              
                                        </div>
                                    <!-- ส่วนพาสเวิดด์-->  
                                        <div class = "form-grpup row ">
                                            <label for="address" class ="col-form-label"> ที่อยู่ </label>
                                        <input type ="text" class = "form-control" id = "address" name="address" value ="<?php echo$Address ?>"  placeholder ="จำเป็น" required >
                                        </div>

                                        <div class = "form-grpup row  ">
                                            <label for="telNo" class ="col-form-label"> เบอร์โทรศัพท์ </label>
                                        <input type ="text" class = "form-control" id = "telNo" name="telNo" value ="<?php echo $Tel ?>" pattern ="[0-9]{1,}" placeholder ="0123456789"   required >
                                        </div>

                                        <div class = "form-grpup row ">
                                            <label for="password" class ="col-form-label"> อีเมล </label>
                                        <input type ="text" class = "form-control" id = "email" name="email" value ="<?php echo$Email ?>"  disabled='disabled'  required>
                                        </div>

                                        <div class = "form-grpup row ">
                                            <label for="password" class ="col-form-label"> พาสเวิด </label>
                                        <input type ="password" class = "form-control" id = "password" name="password" value ="<?php echo$Pass ?>"  placeholder ="ไม่ต่ำกว่า 8 ตัว" required> 
                                        </div>

                                    </div>
                                    <div class = "card-footer text-center">
                                        <a class="btn  btn-danger btn-lg " href="index.php" role="button" >Back</a> 
                                        <input type = "submit" name = "submit" class = "btn btn-primary btn-lg" value ="Edit"  >
                                    </div>
                                    </form>
                                </div>
                            </div> 
                        </div>     
                        </div>

                </body>



     




</html>
