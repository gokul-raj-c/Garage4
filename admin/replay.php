<?php
include("header.php");
$id = $_GET['id'];

?>
 <main id="main" class="main">

<div class="pagetitle">
  <h1>Complaints</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="activeuser.php">Home</a></li>
      <li class="breadcrumb-item">Manage Complaints</a></li>
      <li class="breadcrumb-item">Pending Complaints</a></li>
      <li class="breadcrumb-item active">Reply</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="card"> 
      <div class="card-body"> 
        <h5 class="card-title"> 
        Your Complaint List
        </h5>

<section class="section dashboard">
  <div class="row">

  <section class="section">
  <div class="row">
    <div class="col-lg-12">

<div class="panel-body">
          <div class="alert alert-info">
            Please fill details to send the replay
          </div>
          <form class="com-mail" method="POST" action="php/complaintviewing.php">
          <input type="hidden" name="complaint_id" value="<?php echo $id; ?>">
            <textarea rows="12" class="form-control1 control2" placeholder="Replay :" name="message"></textarea>
            <input type="submit" value="Send Message">
          </form>
        </div>
     

             
              <?php
              
              ?>
             
         

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
include("footer.html");
?> 