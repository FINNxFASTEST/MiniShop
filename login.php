<?php session_start(); 
include_once('script.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
</head>
    
  
<?php /*  echo $id = $_SESSION['id']; 
        echo $date1 = date("Ymd");
        echo $orderid = ($_SESSION['order']);;
        if(isset($_PSOT['summit'])){
            $buy = "INSERT INTO `orders` (`oder_id`, `date`, `cus_email`) VALUES ('".$orderid.", 'CAST($date1 as datetime)','".$id."')";
            echo $buy; 
        //    $resultbuy = mysqli_query($buy); 
        } */?>


    <?php  
            /*  ส่วนการตรวจสอบการล็อคอิน  */
            include_once('connectdb.php');
                if(isset($_POST['submit'])){
                $username =  $_POST['username'];
                $password = htmlspecialchars_decode($conn->real_escape_string($_POST['password']));   
                $sql = "SELECT * FROM `customer` WHERE `cus_Email` = '".$username."' AND `cus_Pass` = '".$password."'";
                $result = $conn->query($sql);          
                if($result->num_rows > 0){

                    $row = $result->fetch_assoc();
                    $checkOrder = "SELECT orders.order_id FROM orders  ORDER BY orders.order_id DESC LIMIT 0,1";
                    $rowOrder = mysqli_fetch_array($resultCheck = mysqli_query($conn,$checkOrder));
                      $lastOder = $rowOrder['order_id'];
                      $_SESSION['id'] = $row['cus_Email'];
                      $_SESSION['name'] = $row['cus_Name'];
                      $_SESSION['order'] = $lastOder+1;
                if($resultCheck->num_rows == 0){
                  $_SESSION['order'] = 1;
                }
                    //  echo $_SESSION['name'];
                    header('location:index.php');
                }
       
                else{
                        $message = "Username or Password invalid";
                       echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }

           
            
    ?>
    <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Back to home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
</nav> 



        <!-- ส่วนบอดี้การล็อคอินทั้งหมด -->
        <div class = "container">
           <div class = "row">
              <div class = "col-md-10 mx-auto mt-5">
                <div class = "card">
                <form action="" method ="POST">
                    <div class = "card-header text-center">
                        <h5>Please login your account</h5>
                    </div>
                    <div class = "card-body">
                     <!-- ส่วนยูสเซอร์เนม -->
                        <div class = "form-grpup  row">
                            <label for="username" class ="col-form-label " > Username </label>
                        <input type ="text" class = "form-control" id = "username" name="username" placeholder ="email">              
                        </div>
                     <!-- ส่วนพาสเวิดด์-->  
                        <div class = "form-grpup row ">
                            <label for="password" class ="col-form-label"> Password </label>
                        <input type ="password" class = "form-control" id = "password" name="password"placeholder ="password">
                        </div>
                    </div>
                    <div class = "card-footer text-center">
                        <input type = "submit" name = "submit" class = "btn btn-success btn-lg" value ="Login"  >
                    </div>
                    </form>
                </div>
              </div> 
           </div>     
        </div>




  
  <!-- สคริปในการดึงไฟล์ bootstarp -->
  <script> scr = "node_modules/popper.js/dist/umd/popper.min.js" </script>
  <script language="JavaScript" type="text/javascript" src="node_modules/jquery/dist/jquery.js"></script>
  <script language="JavaScript" type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
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