<?php
session_start();
include("header.php");

$username = $_SESSION['email_id'];

  /* $sql="select * from booking where email='$username'" ;
   $res=select_data($sql);
   $arr=mysqli_fetch_assoc($res);*/

  
   
?>


<style>



  .rate:not(:checked)>input {
    position: absolute;
    top: -9999px;
  }

  .rate:not(:checked)>label {
    float: right;
    width: 1em;
    overflow: hidden;
    white-space: nowrap;
    cursor: pointer;
    font-size: 50px;
    color: #ccc;
    
  }

  .rate:not(:checked)>label:before {
    content: '★ ';
  }

  .rate>input:checked~label {
    color: #ffc700;
  }

  .rate:not(:checked)>label:hover,
  .rate:not(:checked)>label:hover~label {
    color: #deb217;
  }

  .rate>input:checked+label:hover,
  .rate>input:checked+label:hover~label,
  .rate>input:checked~label:hover,
  .rate>input:checked~label:hover~label,
  .rate>label:hover~input:checked~label {
    color: #c59b08;
  }

  /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
</style>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Bookings</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="viewcar.php">Home</a></li>
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
            $row1 = mysqli_fetch_assoc($res1);

            $sql2="SELECT AVG(rating) AS average_rating FROM review WHERE car_id = '$crid' ";
        $data2=select_data($sql2);
        $avg=mysqli_fetch_assoc($data2)
            
            ?>
            
                <div class="col-md-4" style="margin:0px;display: inline-block;">
                    <div class="card">
                   
                        <img class="card-img-top" src="../admin/uploads/products/<?php echo $row1['image']; ?>" alt="Card image cap" style="height: 300px;">
                        <!--<div class="card-header">
                        <h5 class="card-title"><</h5>
                        </div>-->
                        <div class="card-body">
                        <h5 class="card-title"><?php echo $arr['carname']; ?></h5>
                        <p style="font-size: large;margin:0 0 5px;"> <span class="badge bg-success" style="color:white"><?php echo number_format($avg['average_rating'] , 1)?> <i class="bi bi-star-fill text-warning"></i></span></p>
                            <p class="card-text"><b>Car Category:</b> <?php echo $arr['category']; ?></p>
                            <p class="card-text"><b>User Email:</b> <?php echo $arr['email']; ?></p>
                            <p class="card-text"><b>Pick Up Date:</b> <?php echo $arr['pick']; ?></p>
                            <p class="card-text"><b>Drop Date:</b> <?php echo $arr['dropd']; ?></p>
                            <p class="card-text"><b>Total Rate:</b> <?php echo $arr['total']; ?></p>
                            <p>
                            <div class="btn-group">
                      <a href="invoice.php?id=<?php echo $arr['booking_id'] ?>" class="btn btn-success btn">View Receipt</a>
                        
                      </div>
                      <div class="btn-group">
                      <p class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered"
                        onclick="passid('<?php echo $arr['car_id']; ?>')"> <i class="bi bi-star me-1"></i>Add Review</p>

                    </div>

                      <!--<div class="btn-group">
                      <a href="php/cancelbooking.php?id=<?php echo $arr['booking_id'] ?>" class="btn btn-danger btn">Cancel</a>
                        
                      </div></p>-->

                      
              <?php
             /* if ($arr['status'] == 1) {
                $sql6="SELECT * from review where email='$username' AND car_id='$crid' ";
                $data6=select_data($sql6);
                if(mysqli_num_rows($data6)<1)
                 {
               ?>
                <div class="btn-group">
                  <p class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered"
                    onclick="passid('<?php echo $row['car_id']; ?>')"> <i class="bi bi-star me-1"></i>Add Review</p>

                </div>

                <?php
              }
             } else if ($arr['status'] == 2) {
                
                $sql3 = "SELECT * FROM booking WHERE car_id='$crid' AND email='$username' ";
                $data3 = select_data($sql3);
                if(mysqli_num_rows($data3) > 0) {
                $sql6="SELECT * from review where email='$username' AND car_id='$crid' ";
                $data6=select_data($sql6);
                if(mysqli_num_rows($data6)<1)
                 {
                  ?>
                    <div class="btn-group">
                      <p class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered"
                        onclick="passid('<?php echo $arr['car_id']; ?>')"> <i class="bi bi-star me-1"></i>Add Review</p>

                    </div>
                  <?php
                }
              }
            }
             */ ?>


</div>
          </div><!-- End Card with an image on top -->

        </div>
        <?php
      }

      ?>


    </div>


  </section>



  <div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">



          <h5 class="modal-title">Rate the Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="php/rating.php" method="POST">
          <div class="modal-body">

            <input type="text" id="eventid" name="eventid" hidden>

            <div class="row mb-3">
            
              <div class="col-sm-12 rate" style="padding-right:110px;">

                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>

              </div>
            </div>
           


            <div class="row mb-3">
              <label for="inputPassword" class="col-sm-2 col-form-label">Comment</label>
              <div class="col-sm-10">
                <textarea class="form-control" style="height: 100px" name="comment" maxlength="100"></textarea>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit Reply</button>
            </div>
        </form>
      </div>
    </div>
  </div><!-- End Vertically centered Modal-->

</main><!-- End #main -->

</main><!-- End #main -->

<script>
  function passid(valuee) {
    // alert("Hello");
    // alert(valuee);

    document.getElementById('eventid').value = valuee;
  }
</script>

    <?php
   include 'footer.php';

?>