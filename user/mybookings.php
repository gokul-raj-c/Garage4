<?php
session_start();
include("header.php");



   
   $username = $_SESSION['email_id'];
   $sql="select * from booking where email='$username'" ;
   $res=select_data($sql);
   $arr=mysqli_fetch_assoc($res);
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="viewcar.php">Home</a></li>
          <li class="breadcrumb-item">Booking</li>
          <li class="breadcrumb-item active">My Bookings</li>
      </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card"> 
          <div class="card-body"> 
            <h5 class="card-title"> 
            Booking Details
            </h5>

            <section id="main-content">
    <section class="wrapper">
        <div class="container typo-agile">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Car Name</th>
                                <th>Category</th>
                                <th>User Email</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Total</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "select * from booking where email='$username'";
                            $res = select_data($sql);
                            $total = 0;
                            while ($row = mysqli_fetch_assoc($res)) {
                                /*$total += $row['price'] * $row['quantity'];*/
                            ?>
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media">
                                        <a class="thumbnail pull-left"
                                            href="singleproduct.php?id=<?php echo $row['product_id']; ?>"> <img
                                                class="media-object"
                                                src="../admin/uploads/products/<?php echo $row['photo']; ?>"
                                                style="width: 72px; height: 72px;"> </a>
                                        <div class="media-body" style="padding:5px;margin-left:5px;">
                                            <h4 class="media-heading"><a
                                                    href="singleproduct.php?id=<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></a>
                                            </h4>
                                            <h5 class="media-heading"> by <?php echo $row['company']; ?></h5>
                                            <span>Status: </span><span class="text-success"><strong>In
                                                    Stock</strong></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center">
                                    <div class="product-count">
                                        <form action="#" class="display-flex">
                                            <div class="qtyminus" onclick="minus(<?php echo $row['item_id']; ?>)">-
                                            </div>
                                            <input type="text" id="quantity<?php echo $row['item_id']; ?>"
                                                name="quantity" value="<?php echo $row['quantity']; ?>" class="qty"
                                                readonly>
                                            <div class="qtyplus"
                                                onclick="plus(<?php echo $row['item_id'] . ',' . $row['stock']; ?>)">+
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1 text-center" style="vertical-align: middle;">
                                    <strong><?php echo $row['price']; ?></strong>
                                </td>
                                <td class="col-sm-1 col-md-1 text-center" style="vertical-align: middle;">
                                    <strong><?php echo $row['price'] * $row['quantity']; ?></strong>
                                </td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button" class="btn btn-danger"
                                        onclick="removecart(<?php echo $row['item_id']; ?>)">
                                        <span class="glyphicon glyphicon-remove"></span> Remove
                                    </button>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>


                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>
                                    <h3>Total</h3>
                                </td>
                                <td class="text-right">
                                    <h3><strong> ₹<?php echo $total ?></strong></h3>
                                </td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>
                                    <button type="button" class="btn btn-default"
                                        onclick="window.location.href='allproducts.php'">
                                        <span class="fa fa-shopping-cart"></span> Continue Shopping
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success" onclick="pay(<?php echo $total ?>)">
                                        Buy Now <span class="fa fa-play"></span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

  </main><!-- End #main -->

<?php 


require 'footer.html';
?>