<?php
session_start();
include("header.php");

$username = $_SESSION['email_id'];
$bbid=$_GET['id'];
   $sql="select * from booking where car_id='$bbid'" ;
   $res=select_data($sql);
   $arr=mysqli_fetch_assoc($res);

   $total=$arr['total'];
   
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
            
            $crid=$arr['car_id'];
            $sql1 = "select * from product where product_id=$crid";
            $res1 = select_data($sql1);
            $total=$arr['total'];
            $bid=$arr['booking_id'];
            while ($row1 = mysqli_fetch_assoc($res1))
            {
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
                            <button type="button" class="btn btn-success" onclick="pay(<?php echo $total?>,<?php echo $bid?>)">
                                        Pay Now <span class="fa fa-play"></span>
                                    </button>
            </div>
                      <div class="btn-group">
                      <a href="php/cancelbooking.php?id=<?php echo $arr['booking_id'] ?>" class="btn btn-danger btn">Cancel</a>
                        
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
   require('../keys.php');
?>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
    function pay(amt,id) {
        <?php
            $sql = "select * from registration where email_id='$username'";
            $res = select_data($sql);
            $row = mysqli_fetch_assoc($res);

            ?>
        var options = {
            "key": "<?php echo $apikey ?>", // Enter the Key ID generated from the Dashboard
            "amount": amt *
                100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "GARAGE4",
            "description": "Payment",
            
            //"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "callback_url": "./php/success.php?amt,id=" + amt,id,
            "prefill": {
                "name": "<?php echo $row['first_name'] . ' ' . $row['last_name'] ?>",
                "email": "<?php echo $row['email_id'] ?>",
                "contact": "<?php echo $row['contact'] ?>"
            },
            "notes": {
                "address": "Razorpay Corporate Office"
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    }
    </script>