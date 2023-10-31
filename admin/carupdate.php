<?php
session_start();
include("header.php");


$id=$_GET['id'];
   $sql="select * from product where product_id='$id'" ;
   $res=select_data($sql);
   $arr=mysqli_fetch_assoc($res);
   
   ?>


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Update Car</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="viewcar.php">Home</a></li>
          <li class="breadcrumb-item active">Update Car</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
                        <img class="card-img-top" src="../admin/uploads/products/<?php echo $arr['image']; ?>" alt="Card image cap" style="height: 300px;">
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            
              
          <div class="card-body">
              <h5 class="card-title">Enter Details Here</h5>

              <!-- General Form Elements -->
              <form method="POST" action="php/updatecar.php" role="form" enctype="multipart/form-data" onsubmit="return check()">
              <!--<div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Photo Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="photo" name="photo">
                  </div>
                </div>-->
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Car Id</label>
                  <div class="col-sm-10">
                  <input name="carid" type="text" class="form-control" id="carid" value=<?php echo $arr['product_id'];?>>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Car Name</label>
                  <div class="col-sm-10">
                  <input name="carname" type="text" class="form-control" id="carname" value=<?php echo $arr['name'];?>>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Car Category</label>
                  <div class="col-sm-10">
                  <input name="carcategory" type="text" class="form-control" id="carcategory" value=<?php echo $arr['category'];?>>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Car Color</label>
                  <div class="col-sm-10">
                  <input name="carcolor" type="text" class="form-control" id="carcolor" value=<?php echo $arr['color'];?>>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Car Capacity</label>
                  <div class="col-sm-10">
                  <input name="carcapacity" type="text" class="form-control" id="carcapacity" value=<?php echo $arr['capacity'];?>>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Car Rate</label>
                  <div class="col-sm-10">
                  <input name="carrate" type="text" class="form-control" id="carrate" value=<?php echo $arr['amount'];?>>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px"  id="description" name="description"  value=<?php echo $arr['description'];?>></textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Proceed</label>
                  <div class="col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

           
        </div>

          

            </div>
          

        </div>
      </div>
    </section>
    <?php 

include 'footer.php';

?>
<script type="text/javascript">
        function check() {
            var photo = document.getElementById('photo');
            var fileExtension = photo.value.split('.').pop().toLowerCase();
            if (fileExtension === 'jpg' || fileExtension === 'jpeg' || fileExtension === 'png') {
                return true;
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid File Format!',
                    text: 'Please select jpg, jpeg or png file',
                }).then((result) => {
                    photo.focus();
                })
                return false;
            }

        }
    </script>