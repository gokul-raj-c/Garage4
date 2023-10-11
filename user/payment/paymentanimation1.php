
 <?php 
 session_start();
 if($_SESSION['status']!="Active")
{
    header("location:../Homepage/home.php");
}

                        require_once("../db.class.php");
                        $ob=new db_operations();
 ?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>NEEDLEWORKER</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-size: 20px;
}
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 4s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
</style>
</head>
<body onload="myFunction()" style="margin:0;">
<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
  
  <span style='font-size:200px;'>&#9745;</span>
  <h1><font color="black"><center>Payement Successfull</center></font></h1>
  <br>
   <center><a href="../Homepage/home_user.php"><button type="button" class="btn btn-primary">Go Home</button></center>
  <?php 

  $email=$_SESSION['user_name'];
  $sql="select max(id) from checkout where user_id='$email'";
  $res=$ob->db_read($sql);
  $arr=mysqli_fetch_array($res);
  $id=$arr[0];
  $q1="select * from cart where userid='$email'";
  $res1=$ob->db_read($q1);
  if(mysqli_num_rows($res1))
  {
    while($row=mysqli_fetch_array($res1))
    {
      $pid=$row['productid'];
  $sql1="update checkout set status=1 where id='$id'";
  //echo $sql1;
  $ob->db_read($sql1);
  $sql2="delete from cart where userid='$email' and productid='$pid'";
  //echo $sql2;
  $ob->db_read($sql2);
  $id=$id-1;
}
}

  ?>
  <p></p>
</div>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

</body>
</html>