<?php
session_start();
include("header.php");



   
   /*$username = $_SESSION['email_id'];
   $sql="select * from registration where email_id='$username'" ;
   $res=select_data($sql);
   $arr=mysqli_fetch_assoc($res);*/
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Cars</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <!--<li class="breadcrumb-item">Components</li>-->
          <li class="breadcrumb-item active">Cars</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row align-items-top">
        <div class="col-lg-6">

        <div class="col-lg-6">

          <!-- Card with an image on top -->
          <?php
            $sql = "select * from product";
            $res = select_data($sql);
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <div class="col-md-6" style="margin: 50px;display:block;">
                    <div class="card">
                        <img class="card-img-top" src="uploads/products/<?php echo $row['image']; ?>" alt="Card image cap" style="height: 300px;">
                        <div class="card-header">
                            <?php echo $row['name']; ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['category']; ?></h5>
                            <p class="card-text"><?php echo $row['model_year']; ?></p>
                            <p class="card-text"><?php echo $row['brand']; ?></p>
                            <p class="card-text"><?php echo $row['plate_number']; ?></p>
                            <p class="card-text"><?php echo $row['color']; ?></p>
                            <p class="card-text"><?php echo $row['capacity']; ?></p>
                            <p class="card-text"><?php echo $row['description']; ?></p>
                            <p class="card-text"><?php echo $row['amount']; ?></p>

                        </div>
                        <div class="card-footer text-muted">

                        </div>
                    </div>
                </div>
            <?php
            }
            ?><!-- End Card with an image on top -->

          
        </div>

          

        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <?php
  include 'footer.html';
   ?>