<?php 
session_start();
include("header.php");



   
   $username = $_SESSION['email_id'];

//count of total members
$sql1="SELECT registration.*
       FROM registration
       JOIN login ON registration.email_id = login.email_id
       WHERE login.user_status = '1'";  

 $data1=select_data($sql1);
 $count1=mysqli_num_rows($data1);

//count of total completed events
/*$date=date("Y-m-d"); 
$sql2="SELECT * FROM `event` WHERE date<'$date' ";
$data2=select_data($sql2);
$count2=mysqli_num_rows($data2);

//count of total Sponsors
$sql3="SELECT * FROM sponsoring";
$data3=select_data($sql3);
$count3=mysqli_num_rows($data3);*/

//count of pending users
$sql4="SELECT * FROM login where user_status='0' ";
$data4=select_data($sql4);
$count4=mysqli_num_rows($data4);

//count of suspended users
$sql5="SELECT * FROM login where user_status='-1' ";
$data5=select_data($sql5);
$count5=mysqli_num_rows($data5);

//count of rejected users
$sql6="SELECT * FROM login where user_status='-2' ";
$data6=select_data($sql6);
$count6=mysqli_num_rows($data6);

//count of products
$sql7="SELECT * FROM product";
$data7=select_data($sql7);
$count7=mysqli_num_rows($data7);

//count of bookings
$sql8="SELECT * FROM booking";
$data8=select_data($sql8);
$count8=mysqli_num_rows($data8);

//sum of payment
$sql9 = "SELECT SUM(amount) AS total_amount FROM payment";
$data9 = select_data($sql9);
$totalAmount = mysqli_fetch_assoc($data9)['total_amount'];

//count of bookings
$sql10="SELECT * FROM booking where status='1'";
$data10=select_data($sql10);
$count10=mysqli_num_rows($data10);

//count of products
$sql11="SELECT * FROM product where status='0'";
$data11=select_data($sql11);
$count11=mysqli_num_rows($data11);

//count of products
$sql12="SELECT * FROM booking where category='premium'";
$data12=select_data($sql12);
$count12=mysqli_num_rows($data12);


//count of products
$sql13="SELECT * FROM booking where category='vintage'";
$data13=select_data($sql13);
$count13=mysqli_num_rows($data13);


//count of products
$sql14="SELECT * FROM booking where category='other'";
$data14=select_data($sql14);
$count14=mysqli_num_rows($data14);

?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index1.php">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

  <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <!--<div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>-->

                <div class="card-body">
                  <h5 class="card-title">Total Members</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $count1 ?></h6>
                     

                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <!--<div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>-->

                <div class="card-body">
                  <h5 class="card-title">Total Cars</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $count7 ?></h6>
                     

                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <!--<div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>-->

                <div class="card-body">
                  <h5 class="card-title">Currently Available</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-clipboard"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $count11 ?></h6>
                     

                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <!--<div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>-->

                <div class="card-body">
                  <h5 class="card-title">Total Bookings</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-check-circle"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $count8 ?></h6>
                     

                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->

             <!-- Revenue Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <!--<div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>-->

                <div class="card-body">
                  <h5 class="card-title">Total Amount</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cash-coin"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $totalAmount ?></h6>
                     

                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->

             <!-- Revenue Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <!--<div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>-->

                <div class="card-body">
                  <h5 class="card-title">Current Bookings</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $count10 ?></h6>
                     

                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->

             


             <!-- Sales Card --
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Active Events</a></li>
                    <li><a class="dropdown-item" href="#">Upcoming Events</a></li>
                    <li><a class="dropdown-item" href="#">Completed</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Events <span>| Completed</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-calendar2-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $count2 ?></h6>
                      

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Customers Card --
            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="viewsponsorship-admin.php">View All Sponsorships</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Total Sponsers</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $count3 ?></h6>
                      

                    </div>
                  </div>
                  

                </div>
              </div>
              

            </div><!-- End Customers Card -->
    
          
        

<div class="row">

           <div class="col-lg-6">

<div class="card">
  <!--<div class="filter">
    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
      <li class="dropdown-header text-start">
        <h6>Filter</h6>
      </li>

      <li><a class="dropdown-item" href="pendinguser.php">Pending Users</a></li>
      <li><a class="dropdown-item" href="suspendeduser.php">Suspended Users</a></li>
      <li><a class="dropdown-item" href="rejecteduser.php">Rejected Users</a></li>
    </ul>
  </div>-->

  <div class="card-body pb-0">
    <h5 class="card-title">Members</h5>

    <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        echarts.init(document.querySelector("#trafficChart")).setOption({
          tooltip: {
            trigger: 'item'
          },
          legend: {
            top: '5%',
            left: 'center'
          },
          series: [{
            name: '',
            type: 'pie',
            radius: ['40%', '70%'],
            avoidLabelOverlap: false,
            label: {
              show: false,
              position: 'center'
            },
            emphasis: {
              label: {
                show: true,
                fontSize: '18',
                fontWeight: 'bold'
              }
            },
            labelLine: {
              show: false
            },
            data: [
              
              {
                value: <?php echo $count1 ?>,
                name: 'Active Users'
              },
              {
                value: <?php echo $count5 ?>,
                name: 'Suspended users'
              }
              
            ]
          }]
        });
      });
    </script>

    </div>
  </div><!-- End Website Traffic -->
    </div>


  <div class="col-lg-6">

<div class="card">
  <div class="card-body pb-0">
    <h5 class="card-title">Booking Category</h5>

    <div id="bookingChart" style="min-height: 400px;" class="echart"></div>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        echarts.init(document.querySelector("#bookingChart")).setOption({
          tooltip: {
            trigger: 'item'
          },
          legend: {
            top: '5%',
            left: 'center'
          },
          series: [{
            name: '',
            type: 'pie',
            radius: ['40%', '70%'],
            avoidLabelOverlap: false,
            label: {
              show: false,
              position: 'center'
            },
            emphasis: {
              label: {
                show: true,
                fontSize: '18',
                fontWeight: 'bold'
              }
            },
            labelLine: {
              show: false
            },
            data: [
              
              {
                value: <?php echo $count12 ?>,
                name: 'Premium'
              },
               
              {
                value: <?php echo $count13 ?>,
                name: 'Vintage'
              },
              {
                value: <?php echo $count14 ?>,
                name: 'Others'
              }
              
            ]
          }]
        });
      });
    </script>

    </div>
  </div><!-- End Website Traffic -->
    </div>


    </div>


          <!--end of left columns -->
                </div>
                </div>




          <!-- Website Traffic -->
           



  

        </div>
      </div>

    </div> <!--End of right columns -->


    <div class="col-20">
          <div  class="card">
            <div class="card-body">
              <h5 class="card-title">User List</h5>
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                  <th scope="col">Slno.</th>
                  <th scope="col">Full Name</th>
                  <th scope="col">Phone no</th>
                  <th scope="col">Email</th>
                  <th scope="col">DOB</th>

                  <th scope="col">Address</th>
                                       
                  </tr>
                </thead>


                <tbody>               
                <?php
                $sql="SELECT registration.*
                FROM registration
                JOIN login ON registration.email_id = login.email_id
                WHERE login.user_status = '1'";
                
                
                // echo $sql;
                $data=select_data($sql);
                // echo mysqli_num_rows($data);
                $n=1;
                while($row=mysqli_fetch_assoc($data))
                {
                
                
                ?>
                
                  <tr>
                  <th scope='row'>
                      <?php echo $n++; ?>
                    </th>
                    <td>
                      <?php echo $row['first_name'] . " " . $row['last_name'] ?>
                    </td>
                    <td>
                      <?php echo $row['contact'] ?>
                    </td>
                    <td>
                      <?php echo $row['email_id'] ?>
                    </td>
                    <td>
                      <?php echo $row['date_of_birth'] ?>
                    </td>

                    <td>
                      <?php echo $row['house_name'] ?>,
                      <?php echo $row['street_name'] ?>,
                      <?php echo $row['district'] ?>,
                      <?php echo $row['pincode'] ?>,
                      <?php echo $row['state'] ?>
                    </td>
                    
                    
                  </tr>
                  <?php
                  }
                
                  ?>

                  
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>
           </div>



    </div>
    </section>
    
    </main>
        <?php
     // echo $email;

        ?>

      </div>
    </section>

  </main><!-- End #main -->

<?php 

require 'footer.php';

?>