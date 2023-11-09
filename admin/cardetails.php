<?php
session_start();
include("header.php");



   
   $username = $_SESSION['email_id'];
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>History</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index1.php">Home</a></li>
          <li class="breadcrumb-item">History</a></li>
          <li class="breadcrumb-item active">Booking History</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card"> 
          <div class="card-body"> 
            <h5 class="card-title"> 
            Booking History
            </h5>

    <section class="section dashboard">
      <div class="row">

      <section class="section">
      <div class="row">
        <div class="col-lg-12">

         
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Slno.</th>
                    <th scope="col">Car Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Color</th>
                    <th scope="col">Capacity</th>
                  
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>

                   
                
                  </tr>
                </thead>
                <tbody>
 
                <?php 
               $sql = "select * from product";


                $data=select_data($sql);

                $n=1;

                while ($row = mysqli_fetch_assoc($data)) {
                  
                  ?>
                  <tr>
                  <th scope='row'><?php echo $n++; ?></th>
                 <td><?php echo  $row['name'] ?></td>
                 <td><?php echo  $row['category'] ?></td>
                 <td> <?php echo $row['color'] ?></td>
                 <td><?php echo $row['capacity'] ?></td>
                
                 <td> <?php echo $row['amount']  ?></td>
                 <td>
                                <?php
                                    if ($row['status'] == 0)
                                        echo "<p style='color: green;'>In View</p>";
                                    else if ($row['status'] == 1)
                                        echo "<p style='color: red;'>Booked</p>";
                                        else if ($row['status'] == -1)
                                        echo "<p style='color: blue;'>Dropped</p>";
                                        else if ($row['status'] == 2)
                                        echo "<p style='color: orange;'>Service</p>";
                                    ?>
                            </td>
                 <!--<td>
                      <div class="btn-group">
                        <a href="replay.php?id=<?php echo $row['complaint_id'] ?>" class="btn btn-success btn-sm">Reply</a>
                        
                      </div>
                    </td>-->
                 
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

  </main><!-- End #main -->






      </div>
    </section>

  </main><!-- End #main -->

  <?php




include 'footer.php';

?>