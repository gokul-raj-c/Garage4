<?php
session_start();
include("header.php");


$id=$_GET['id'];
   $sql="select * from product where product_id='$id'" ;
   $res=select_data($sql);
   $arr=mysqli_fetch_assoc($res);
   $username = $_SESSION['email_id'];
   $sql1="select * from registration where email_id='$username'" ;
   $res1=select_data($sql1);
   $arr1=mysqli_fetch_assoc($res1);
   ?>


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Booking</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="viewcar.php">Home</a></li>
          <li class="breadcrumb-item active">Booking</li>
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
              <form action="./php/booking.php?id=<?php echo $arr['product_id'] ?>" method="POST">
              <!--<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Car Id</label>
                  <div class="col-sm-10">
                  <input name="carid" type="text" class="form-control" id="carid" value=
                  </div>
                </div>-->
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Car Name</label>
                  <div class="col-sm-10">
                  <input name="carname" type="text" class="form-control" id="carname" hidden value='<?php echo $arr['name'];?>'>
                  <input name="carnaame" type="text" class="form-control" id="carnaame" disabled value='<?php echo $arr['name'];?>'>

                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Car Category</label>
                  <div class="col-sm-10">
                  <input name="carcategory" type="text" class="form-control" id="carcategory" hidden value=<?php echo $arr['category'];?>>
                  <input name="carcaategory" type="text" class="form-control" id="carcaategory" disabled value=<?php echo $arr['category'];?>>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Car Color</label>
                  <div class="col-sm-10">
                  <input name="carcolor" type="text" class="form-control" id="carcolor" hidden value=<?php echo $arr['color'];?>>
                  <input name="carcoolor" type="text" class="form-control" id="carcoolor" disabled value=<?php echo $arr['color'];?>>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Car Capacity</label>
                  <div class="col-sm-10">
                  <input name="carcapacity" type="text" class="form-control" id="carcapacity" hidden value=<?php echo $arr['capacity'];?>>
                  <input name="carcaapacity" type="text" class="form-control" id="carcaapacity" disabled value=<?php echo $arr['capacity'];?>>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Car Rate</label>
                  <div class="col-sm-10">
                  <input name="carrate" type="text" class="form-control" id="carrate" hidden value=<?php echo $arr['amount'];?>>
                  <input name="carraate" type="text" class="form-control" id="carraate" disabled value=<?php echo $arr['amount'];?>>
                  </div>
                </div>
                <!--<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">User Name</label>
                  <div class="col-sm-10">
                  <input name="username" type="text" class="form-control" id="username" value=
                  </div>
                </div>-->
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">User Email</label>
                  <div class="col-sm-10">
                  <input name="useremail" type="text" class="form-control" id="useremail" hidden value= <?php echo $arr1['email_id'];?>>
                  <input name="useremmail" type="text" class="form-control" id="useremmail" disabled value= <?php echo $arr1['email_id'];?>>
                  </div>
                </div>
                <!--<div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">No Of Days For Rent</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="noofdays" id="noofdays">
                  </div>
                </div>-->
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">PicUp Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="pickupdate" id="picupdate" required />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Drop Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="dropdate" id="dropdate" required />
                  </div>
                </div>
                <!--<div class="row mb-3">
                  <label for="inputTime" class="col-sm-2 col-form-label">Pick Up Time</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control">
                  </div>
                </div>--
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Identity Proof</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>
                <!--<div class="row mb-3">
                  <label for="inputColor" class="col-sm-2 col-form-label">Color Picker</label>
                  <div class="col-sm-10">
                    <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#4154f1" title="Choose your color">
                  </div>
                </div>--
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Textarea</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px"></textarea>
                  </div>
                </div>
                <!--<fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                      <label class="form-check-label" for="gridRadios1">
                        First radio
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                      <label class="form-check-label" for="gridRadios2">
                        Second radio
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios" value="option" disabled>
                      <label class="form-check-label" for="gridRadios3">
                        Third disabled radio
                      </label>
                    </div>
                  </div>
                </fieldset>
                <div class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Checkboxes</legend>
                  <div class="col-sm-10">

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck1">
                      <label class="form-check-label" for="gridCheck1">
                        Example checkbox
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck2" checked>
                      <label class="form-check-label" for="gridCheck2">
                        Example checkbox 2
                      </label>
                    </div>

                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Disabled</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="Read only / Disabled" disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Multi Select</label>
                  <div class="col-sm-10">
                    <select class="form-select" multiple aria-label="multiple select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>-->

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Proceed</label>
                  <div class="col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Book Now</button>
                  </div>
                  <!--<div class="btn-group">
                        <a href="php/booking.php?id= class="btn btn-success btn-sm">Book Now</a>
                        
                      </div>-->
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