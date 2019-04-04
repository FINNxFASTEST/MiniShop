 <?php    
            include('../connectdb.php');
                $idcus = $_GET['Email'];
                $No = $_GET['No'];
                $idPro = $_GET['idPro'];
               
               if($No == 1){
                $sql = "DELETE FROM `customer` WHERE `customer`.`cus_Email` = '".$idcus."';";
                header('location:index.php');
               }
               else if($No == 2){
                   $sql = "DELETE FROM `product` WHERE pro_id = '".$idPro."'";
                   header('location:index.php');
          //         echo $sql;
               }
               else {
                     echo "Error: ".mysqli_error($conn);
                     echo "สินค้าอาจอยู่ในตระก้าลูกค้า";
               }
                    
                $result = mysqli_query($conn,$sql);
               
            

    ?>