<?php
session_start();
include("header.php");

$username = $_SESSION['email_id'];

  /* $sql="select * from booking where email='$username'" ;
   $res=select_data($sql);
   $arr=mysqli_fetch_assoc($res);*/

  
   
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Bookings</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="activeuser.php">Home</a></li>
          <!--<li class="breadcrumb-item">Components</li>-->
          <li class="breadcrumb-item active">My Bookings</li>
        </ol>
      </nav>
    </div>
    <?php
            $sql="select * from booking where email='$username' && status=1" ;
            $res=select_data($sql);
            while($arr=mysqli_fetch_assoc($res)){
            


            $crid=$arr['car_id'];
            $sql1 = "select * from product where product_id=$crid";
            $res1 = select_data($sql1);
            $total=$arr['total'];
            $bid=$arr['booking_id'];
            $row1 = mysqli_fetch_assoc($res1)
            
            ?>
            
                <div class="col-md-4" style="margin:0px;display: inline-block;">
                    <div class="card">
                   
                        <img class="card-img-top" src="../admin/uploads/products/<?php echo $row1['image']; ?>" alt="Card image cap" style="height: 300px;">
                        <!--<div class="card-header">
                        <h5 class="card-title"><</h5>
                        </div>-->
                        <div class="card-body">
                        <h5 class="card-title"><?php echo $arr['carname']; ?></h5>
                            <p class="card-text"><b>Car Category:</b> <?php echo $arr['category']; ?></p>
                            <p class="card-text"><b>User Email:</b> <?php echo $arr['email']; ?></p>
                            <p class="card-text"><b>Pick Up Date:</b> <?php echo $arr['pick']; ?></p>
                           
                            <p class="card-text"><b>Total Rate:</b> <?php echo $arr['total']; ?></p>
                            <p>
                            <div class="btn-group">
                      <a href="invoice.php?id=<?php echo $arr['booking_id'] ?>" class="btn btn-success btn">View Receipt</a>
                        
                      </div>
                      <!--<div class="btn-group">
                      <a href="php/cancelbooking.php?id=<?php echo $arr['booking_id'] ?>" class="btn btn-danger btn">Cancel</a>
                        
                      </div></p>-->


                        </div>
                        <!--<div class="card-footer text-muted">

                        </div>-->
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
        </div>
          
          
        
    </section>
    </main><!-- End #main -->

    <?php
   include 'footer.html';

?>