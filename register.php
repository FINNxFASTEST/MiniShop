<?php session_start();
include_once('script.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <link rel = "stylesheet" href = "node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "css\grad.css">

</head>
    <?php  

            include_once('connectdb.php');
                if(isset($_POST['submit'])){ 
             $name =  htmlspecialchars_decode($_POST['name']);    
             $address =  htmlspecialchars_decode($_POST['address']);   
             $telNo =  htmlspecialchars_decode($_POST['telNo']);  
             $username =  htmlspecialchars_decode($_POST['email']);  
             $password = htmlspecialchars_decode($conn->real_escape_string($_POST['password']));             
            $sql = ("INSERT INTO `customer` (`cus_Email`, `cus_money`, `cus_Name`, `cus_Adress`, `cus_Tel`, `cus_Pass`) VALUES ('".$username."', '0', '".$name."', '".$address."', '".$telNo."', '".$password."')");
            if($conn->query($sql) === TRUE){
              $message = "Register Complete";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        header("location:login.php");

            }
            else{
              $message = "Somthink wrong";
                        echo "<script type='text/javascript'>alert('$message');</script>";
            }  
              
            }
    ?>
    <body>
    <?php include("navbar.php"); ?>



    <!-- ส่วนฟอมการสมัครสมาชิก -->
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
                        <input type ="text" class = "form-control" id = "name" name="name" placeholder ="ชื่อและนามสกุล" >              
                        </div>
                     <!-- ส่วนพาสเวิดด์-->  
                        <div class = "form-grpup row ">
                            <label for="address" class ="col-form-label"> ที่อยู่ </label>
                        <input type ="text" class = "form-control" id = "address" name="address" placeholder ="จำเป็น" >
                        </div>

                        <div class = "form-grpup row  ">
                            <label for="telNo" class ="col-form-label"> เบอร์โทรศัพท์ </label>
                        <input type ="text" class = "form-control" id = "telNo" name="telNo" pattern = "[0-9]{1,}"placeholder ="0123456789" >
                        </div>

                        <div class = "form-grpup row ">
                            <label for="password" class ="col-form-label"> อีเมล </label>
                        <input type ="text" class = "form-control" id = "email" name="email" placeholder ="exmaple@email.com">
                        </div>

                        <div class = "form-grpup row ">
                            <label for="password" class ="col-form-label"> พาสเวิด </label>
                        <input type ="password" class = "form-control" id = "password" name="password" placeholder ="ไม่ต่ำกว่า 8 ตัว">
                        </div>

                    </div>
                    <div class = "card-footer text-center">
                        <input type = "submit" name = "submit" class = "btn btn-primary btn-lg" value ="Register"  >
                    </div>
                    </form>
                </div>
              </div> 
           </div>     
        </div>

</body>
</html>