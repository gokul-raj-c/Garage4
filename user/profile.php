<?php
session_start();
include("header.php");



   
   $username = $_SESSION['email_id'];
   $sql="select * from registration where email_id='$username'" ;
   $res=select_data($sql);
   $arr=mysqli_fetch_assoc($res);
   ?>


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="viewcar.php">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/profileimg.jpg" alt="Profile" class="rounded-circle">
              <h2><?php echo $arr['first_name'];?> <?php echo $arr['last_name'];?></h2>
              <!--<h3>Web Designer</h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>--->
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Your Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

               <!-- <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>-->

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title"></h5>
                  <p class="small fst-italic"></p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">First Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $arr['first_name'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Last Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $arr['last_name'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Contact</div>
                    <div class="col-lg-9 col-md-8"><?php echo $arr['contact'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $arr['email_id'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">DOB</div>
                    <div class="col-lg-9 col-md-8"><?php echo $arr['date_of_birth'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">House Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $arr['house_name'];?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Street Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $arr['street_name'];?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">District</div>
                    <div class="col-lg-9 col-md-8"><?php echo $arr['district'];?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Pincode</div>
                    <div class="col-lg-9 col-md-8"><?php echo $arr['pincode'];?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">State</div>
                    <div class="col-lg-9 col-md-8"><?php echo $arr['state'];?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="./php/profileupdate.php" method="POST" >
                    <!--<div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="assets/img/profileimg.jpg" alt="Profile">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>-->

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fname" type="text" class="form-control" id="fname" value=<?php echo $arr['first_name'];?>>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="lname" type="text" class="form-control" id="lname" value=<?php echo $arr['last_name'];?>>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Contact</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="contact" type="text" class="form-control" id="contact" value=<?php echo $arr['contact'];?>>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" disabled type="text" class="form-control" id="email" value=<?php echo $arr['email_id'];?>>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">DOB</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="dateofbirth" type="date" class="form-control" id="dateofbirth" value=<?php echo $arr['date_of_birth'];?>>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">House Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="hname" type="text" class="form-control" id="hname" value=<?php echo $arr['house_name'];?>>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Street Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="sname" type="text" class="form-control" id="sname" value=<?php echo $arr['street_name'];?>>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">District</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="district" type="text" class="form-control" id="district" value=<?php echo $arr['district'];?>>
                      </div>
                    </div>
                   
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Pincode</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pincode" type="text" class="form-control" id="pincode" value=<?php echo $arr['pincode'];?>>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">State</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="state" type="text" class="form-control" id="state" value=<?php echo $arr['state'];?>>
                      </div>
                    </div>
                  <div class="text-center">
                      <button name="submit" type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="./php/passwordupdate.php" method="POST">

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="cpass" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="npass" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="cnpass" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button name="submit" type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
    <?php 

include 'footer.html';

?>