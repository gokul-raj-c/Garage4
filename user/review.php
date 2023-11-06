<?php
include("header.php");

$username = $_SESSION['email_id'];
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
    <h1>My Events</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Completed Events</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row align-items-top">

      <?php
      date_default_timezone_set('Asia/Kolkata');
      $date = date("Y-m-d");
      $sql = "SELECT * FROM `event` WHERE date<'$date' ";

      $data = select_data($sql);

      
     



      while ($row = mysqli_fetch_assoc($data)) {
        
        $id = $row['eventid'];
      
        $sql2="SELECT AVG(rating) AS average_rating FROM review WHERE eventid = '$id' ";
        $data2=select_data($sql2);
        $avg=mysqli_fetch_assoc($data2);

        ?>
        <div class="col-lg-4">


          <div class="card">
            <img src="../uploads/event/event_<?php echo $row['eventid']; ?>.jpg" class="card-img-top" height="190px"
              alt="...">
            <div class="card-body">

            
              <h5 class="card-title pb-0 mb-1">

              <p style="font-size: large;margin:0 0 5px;"> <span class="badge bg-success" style="color:white"><?php echo number_format($avg['average_rating'] , 1)?> <i class="bi bi-star-fill text-warning"></i></span></p>

                <?php echo $row['title'] ?>
              </h5>
              <p class="card-text mb-1" style="text-transform:capitalize;"><i class="bi bi-geo-fill"></i>
                <?php echo $row['venue'] ?>
              </p>
              <p class="card-text mb-1" style="text-transform:capitalize;"><i class="bi bi-geo-fill"></i>
                <?php echo $row['date'] ?>
              </p>
              <p class="card-text mb-1" style="text-transform:capitalize;"><i class="bi bi-geo-fill"></i>
                <?php echo $row['stime'] ?>:00 -
                <?php echo $row['etime'] ?>:00
              </p>
              <p class="card-text mb-1"><i class="bi bi-envelope"></i>
                <?php echo $row['cemail'] ?>
              </p>



              <?php
              if ($row['register'] == 0) {
                $sql6="SELECT * from review where email='$email' AND eventid='$id' ";
                $data6=select_data($sql6);
                if(mysqli_num_rows($data6)<1)
                 {
               ?>
                <div class="btn-group">
                  <p class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered"
                    onclick="passid('<?php echo $row['eventid']; ?>')"> <i class="bi bi-star me-1"></i>Add Review</p>

                </div>

                <?php
              }
             } else if ($row['register'] == 1) {
                
                $sql3 = "SELECT * FROM event_register WHERE eventid='$id' AND email='$email' ";
                $data3 = select_data($sql3);
                if(mysqli_num_rows($data3) > 0) {
                $sql6="SELECT * from review where email='$email' AND eventid='$id' ";
                $data6=select_data($sql6);
                if(mysqli_num_rows($data6)<1)
                 {
                  ?>
                    <div class="btn-group">
                      <p class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered"
                        onclick="passid('<?php echo $row['eventid']; ?>')"> <i class="bi bi-star me-1"></i>Add Review</p>

                    </div>
                  <?php
                }
              }
            }
              ?>


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
require 'footer.html';
?>