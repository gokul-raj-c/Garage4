<html>
<head>
	</head>
	<body>
<?php 
 session_start();
 if($_SESSION['status']!="Active")
{
    header("location:../Homepage/home.php");
}
 require_once("../db.class.php");
                        $ob=new db_operations();
                        $email=$_SESSION['user_name'];
                        $id=$_GET['id'];
              
                        $q2="select max(id) from checkout";
                        $res1=$ob->db_read($q2);
                        $arr1=mysqli_fetch_array($res1);
                        $id1=$arr1[0];

                        $q1="select * from cart where userid='$email'";
                        $res=$ob->db_read($q1);
                        if(mysqli_num_rows($res))
                        {
                        	while($row=mysqli_fetch_array($res))
                        	{
                        	$pid=$row['productid'];	
                        $q1="update checkout set status=2 where id='$id1'";
                        echo $q1;
                        $id1=$id1-1;
                        $ob->db_write($q1);
                      $q4="delete from cart where userid='$email' and productid='$pid'";
                      $ob->db_read($q4);
                    }
                }
?>
<script>
alert("Your Order Has been Placed");
window.location="../Homepage/home_user.php";
</script>
</body>
</html>