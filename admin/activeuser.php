<?php
session_start();
include("header.php");



   
   $username = $_SESSION['email_id'];

?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Users</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Active Users</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <section class="section">
        <div class="row">
          <div class="col-lg-12">

          <div class="card"> 
          <div class="card-body"> 
            <h5 class="card-title"> 
              User List
            </h5>

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
                 
                  
                  <!--<th scope="col">Bloodgroup</th>
                  <th scope="col">Action</th>-->
                </tr>
              </thead>
              <tbody>

                <?php
                $sql = "SELECT * FROM `registration` WHERE email_id IN (SELECT email_id FROM `login` WHERE user_type = 1)";


                $data = select_data($sql);

                $n = 1;

                while ($row = mysqli_fetch_assoc($data)) {

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

</main><!-- End #main -->




</div>
</section>

</main><!-- End #main -->

<?php




include 'footer.html';

?>
