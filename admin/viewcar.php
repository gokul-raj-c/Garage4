<?php
session_start();
include("header.php");

$username = $_SESSION['email_id'];
   $sql="select * from registration where email_id='$username'" ;
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
            $sql = "select * from product";
            $res = select_data($sql);
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <div class="col-md-4" style="margin:0px;display: inline-block;">
                    <div class="card">
                        <img class="card-img-top" src="./uploads/products/<?php echo $row['image']; ?>" alt="Card image cap" style="height: 300px;">
                        <!--<div class="card-header">
                        <h5 class="card-title"><</h5>
                        </div>-->
                        <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text"><b>Category:</b> <?php echo $row['category']; ?></p>
                            <p class="card-text"><b>Color:</b> <?php echo $row['color']; ?></p>
                            <p class="card-text"><b>Capacity:</b> <?php echo $row['capacity']; ?></p>
                            <p class="card-text"><b>Description:</b> <?php echo $row['description']; ?></p>
                            <p class="card-text"><b>Rate:</b> <?php echo $row['amount']; ?> :Per Day    </p>
                            <p>
                      <div class="btn-group">
                        <a class="btn btn-success btn">Update</a>
                        
                      </div>
                      <div class="btn-group">
                        <a class="btn btn-danger btn">Delete</a>
                        
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