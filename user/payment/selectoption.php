<?php 
 session_start();
 if($_SESSION['status']!="Active")
{
    header("location:../Homepage/home.php");
}
 ?>
<html>
<head>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body background="images/1.png">
<?php 
$order=$_SESSION['oid'];
?>

<br>

<h2 style="font-weight:bold;" align="center">Choose Your Option</h2>
<p align="center" style="margin-top:70px;">
	<a href="cashon.php?id=<?php echo $order ?>">
  <button type="button" style="background-color:#5cb85c;color:white;border-radius:8px;border-color:#5cb85c;width:250px;height:50px;font-weight:bold;">Cash On Delivery</button>
</a>
  <br>
  <br>
  <br>
  <a href="payment.php">

   <button type="button" style="background-color:#5cb85c;color:white;border-radius:8px;border-color:#5cb85c;width:250px;height:50px;font-weight:bold;">Online Payment</button>
</a>
</p>
</body>
</html>