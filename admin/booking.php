<?php
session_start();
include("header.php");

$username = $_SESSION['email_id'];
   $sql="select * from booking where email_id='$username'" ;
   $res=select_data($sql);
   $arr=mysqli_fetch_assoc($res);

   
   
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Cars</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="activeuser.php">Home</a></li>
          <!--<li class="breadcrumb-item">Components</li>
          <li class="breadcrumb-item active">Cars</li>-->
        </ol>
      </nav>
    </div>

            <?php
            $crid=$row['car_id'];
            $sql1 = "select * from product where car_id=$crid";
            $res1 = select_data($sql1);
            while ($row1 = mysqli_fetch_assoc($res1)) {
            ?>
                <div class="col-md-4" style="margin:0px;display: inline-block;">
                    <div class="card">
                        <img class="card-img-top" src="./uploads/products/<?php echo $row1['image']; ?>" alt="Card image cap" style="height: 300px;">
                        <!--<div class="card-header">
                        <h5 class="card-title"><</h5>
                        </div>-->
                        <div class="card-body">
                        <h5 class="card-title"><?php echo $row['carname']; ?></h5>
                            <p class="card-text"><b>Car Category:</b> <?php echo $row['category']; ?></p>
                            <p class="card-text"><b>User Email:</b> <?php echo $row['email']; ?></p>
                            <p class="card-text"><b>Pick Up Date:</b> <?php echo $row['pic']; ?></p>
                           
                            <p class="card-text"><b>Total Rate:</b> <?php echo $row['total']; ?></p>
                            <p>
                      <div class="btn-group">
                      <a href="carupdate.php?id=<?php echo $row['product_id'] ?>" class="btn btn-success btn">Update</a>
                        
                      </div>
                      <div class="btn-group">
                      <a href="php/deletecar.php?id=<?php echo $row['product_id'] ?>" class="btn btn-danger btn">Delete</a>
                        
                      </div></p>


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