<!--ส่วนของของเฮดเดอร์  เนวิเกเตอร์บาร์  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">HOME</a> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">   
    <li class="nav-item">
        <a class="nav-link" href="product.php">Our Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin/index.php">Admin</a>
      </li>
     <?php if(isset($_SESSION['id'])){ ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['name']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="mycart.php">Mycart</a>  
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>

      
     <?php } else { ?>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
     <?php  } ?>
    </ul>
  </div>
</nav>