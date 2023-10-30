<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Signup Form</title>
		<!-- Meta tags -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!-- //Meta tags -->
    <link rel="stylesheet" href="css/rstylee.css" type="text/css" media="all" /><!-- Style-CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<section class="w3l-form-36">
		<div class="form-36-mian section-gap">
			<div class="wrapper">
				<div class="form-inner-cont">
					<h3>Create your account</h3>
					<form action="php/phpreg.php" method="POST" class="signin-form">
						<div class="form-input">
							<span class="fa fa-user" aria-hidden="true"></span> <input type="text" name="fname" placeholder="First Name" required />
						</div>
						<div class="form-input">
							<span class="fa fa-user" aria-hidden="true"></span> <input type="text" name="lname" placeholder="Last Name" required />
						</div>
						<div class="form-input">
							<span class="fa fa-phone" aria-hidden="true"></span> <input type="text" name="contact" placeholder="Contact" pattern="^\d{10}$" required />
						</div>
						<div class="form-input">
							<span class="fa fa-envelope" aria-hidden="true"></span> <input type="email" name="email" placeholder="Email" required />
						</div>
						<div class="form-input">
							<span class="fa fa-birthday-cake" aria-hidden="true"></span> <input type="date" name="dateofbirth" placeholder="DOB" required />
						</div>
						<div class="form-input">
							<span class='fa fa-home' aria-hidden="true"></span> <input type="text" name="housename" placeholder="Housename" pattern="^[A-Za-z]+$" required />
						</div>
						<div class="form-input">
							<span class="fa fa-map-marker" aria-hidden="true"></span> <input type="text" name="streetname" placeholder="Streetname" pattern="^[A-Za-z]+$" required />
						</div>
						<div class="form-input">
						<span class="fa fa-map-marker" aria-hidden="true"></span>
							<select class="form-input"  name="district">
                                    <option selected disabled>Select District</option>
                                    <?php
									require("connect.php");
                                    $sql = "select * from district";
                                    $result = select_data($sql);
                                    if (mysqli_num_rows($result) > 0) {
                                      while ($arr = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value="<?php echo $arr['district_name']; ?>">
                                          <?php echo $arr['district_name']; ?>
                                        </option>
                                    <?php
                                      }
                                    }
                                    ?>

                           </select>
						</div>
						<div class="form-input">
							<span class="fa fa-map-marker" aria-hidden="true"></span> <input type="text" name="pincode" pattern="^\d{6}$" placeholder="Pincode" required />
						</div>
						Pincode must have only 6 numbers
						<div class="form-input">
							<span class="fa fa-map-marker" aria-hidden="true"></span> <input type="text" name="state" placeholder="State" pattern="^[A-Za-z]+$" required />
						</div>
						<div class="form-input">
							<span class="fa fa-lock" aria-hidden="true"></span><input type="password" name="password" pattern="^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[@#$%^&+=!])(?=\S+$).{8,}$" placeholder="Password"
								required />
								
						</div>
						Password must have at least 8 characters with 1 special character and 1 capital letter
						<div class="form-input">
							<span class="fa fa-lock" aria-hidden="true"></span> <input type="password" name="cpassword" pattern="^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[@#$%^&+=!])(?=\S+$).{8,}$" placeholder="Confirm Password"
								required />
						</div>
						
						<div class="login-remember d-grid">
							<label class="check-remaind">
								<input type="checkbox">
								<span class="checkmark"></span>
								<p class="remember">Remember me</p>
							</label>
							<button class="btn theme-button" name="submit" >Signup</button>
						</div>
					</form>
					<!-- <div class="social-icons">
						<p class="continue"><span>Or</span></p>
						<div class="social-login">
						<a href="#facebook">
							<div class="facebook">
								<span class="fa fa-facebook" aria-hidden="true"></span>
								
							</div>
						</a>
						<a href="#google">
							<div class="google">
								<span class="fa fa-google-plus" aria-hidden="true"></span>
							</div>
						</a>
					</div>
				</div> -->
					<p class="signup">Already a member? <a href="login.html" class="signuplink">Login</a></p>
				</div>

				<!-- copyright -->
				<div class="copy-right">
					<p>© Signup Form. All rights reserved |</p>
				</div>
				<!-- //copyright -->
			</div>
		</div>
	</section>
</body>
</html>