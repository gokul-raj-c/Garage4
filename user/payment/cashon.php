
<?php 
 session_start();
 if($_SESSION['status']!="Active")
{
    header("location:../Homepage/home.php");
}
 require_once("../db.class.php");
                        $ob=new db_operations();
                        $id=$_GET['id'];
                        $q1="update checkout set status=2 where id='$id'";
                        $ob->db_write($q1);
?>
<script>
alert("Your Order Has been Placed");
window.location="../Homepage/home_user.php";
</script>
