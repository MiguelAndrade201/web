<?php

SESSION_START();

  if(!(isset($_SESSION['cart']))){
    $_SESSION['cart'] = array();
  }

//connect to database
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = mysqli_connect('localhost', 'root', 'root', 'portfolio2');
mysqli_select_db($conn, 'portfolio2');
$sql = "SELECT * FROM items WHERE stock>=1 AND category='action'";
$shop = $conn->query($sql);
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title> BuyGames.com </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="http://ajax.com/googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<!-- 
Nav template from bootstrap 
-->
<body style="background-color:#786399">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="http://localhost/Portfolio2/index.php">BuyGames.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/Portfolio2/index.php">Home </a>
      </li>
      <li>
      <div class="nav-item dropdown">
	  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
		Game Category
        </a>
        </button>
	  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
		<li><a class="dropdown-item" href="http://localhost/Portfolio2/Action.php">Action</a></li>
		<li><a class="dropdown-item" href="http://localhost/Portfolio2/Simulation.php">Simulation</a></li>
		<li><a class="dropdown-item" href="http://localhost/Portfolio2/Driving.php">Driving</a></li>
	  </ul>
        </div>
      </li>
    </ul>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-cart" href="http://localhost/Portfolio2/cart.php"><img src="/portfolio2/images/shopcart.png" width='50' height='50'> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
  </div>
</nav>
<h1 style="font-size:60px;"> Action Games </h1>
    <br><br>
<form name="form1"action="{$_SERVER['PHP_SELF]}" method="POST">
    <?php
 while($items = mysqli_fetch_assoc($shop)):
?>
<!-- Display items from database-->
<div class= "action items col-md-5">
 <h2 style="font-size:25px;"> <?=$items['title'];?></h2>
 <img src="<?=$items['image'];?> "width='300' height='500'/>
 <p style="font-size:20px;" class = "lprice">GBP <?= $items['price'];?> 
 <input type="submit" name="btnid" action="<?$row('id');?>" value="Add to Cart">
 </p>
</div>
<?php endwhile; ?>
 </form>



</body>
</html>