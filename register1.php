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
					<form action="php/phpreg.php" onsubmit="return ValidateForm(5)" method="POST" class="signin-form">
						<div class="form-input">
							<span class="fa fa-user" aria-hidden="true"></span> <input type="text" name="fname" id="firstname" placeholder="First Name" required />
                            
						</div>
						<div class="form-input">
							<span class="fa fa-user" aria-hidden="true"></span> <input type="text" name="lname" id="lastname" placeholder="Last Name" required />
                            
						</div>
						<div class="form-input">
							<span class="fa fa-phone" aria-hidden="true"></span> <input type="text" name="contact" id="mobileNum" placeholder="Contact" onclick="ValidateForm(1)" required />
                            <span id="mobilenameValidationMessage" class="validation-message" style="color: red; font-size: 12px;"></span> 
						</div>
						<div class="form-input">
							<span class="fa fa-envelope" aria-hidden="true"></span> <input type="email" name="email" id="emailInput" placeholder="Email" required />
                            
						</div>
						<div class="form-input">
							<span class="fa fa-birthday-cake" aria-hidden="true"></span> <input type="date" name="dateofbirth" id="dob" placeholder="DOB" required />
                            
						</div>
						<div class="form-input">
							<span class='fa fa-home' aria-hidden="true"></span> <input type="text" name="housename" placeholder="Housename" required />
						</div>
						<div class="form-input">
							<span class="fa fa-map-marker" aria-hidden="true"></span> <input type="text" name="streetname" placeholder="Streetname" required />
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
							<span class="fa fa-map-marker" aria-hidden="true"></span> <input type="text" name="pincode" id="pincode" placeholder="Pincode" onclick="ValidateForm(2)" required />
                            <span id="pincodeValidationMessage" class="validation-message" style="color: red; font-size: 12px;"></span> 
						</div>
						<div class="form-input">
							<span class="fa fa-map-marker" aria-hidden="true"></span> <input type="text" name="state" placeholder="State" required />
						</div>
						<div class="form-input">
							<span class="fa fa-lock" aria-hidden="true"></span><input type="password" name="password" id="passwordInput" placeholder="Password" onclick="ValidateForm(3)"
								required />
                                <span id="passwordValidationMessage" class="validation-message" style="color: red; font-size: 12px;"></span> 
						</div>
						<div class="form-input">
							<span class="fa fa-lock" aria-hidden="true"></span> <input type="password" name="cpassword" id="confirmpassword" placeholder="Confirm Password" onclick="ValidateForm(4)"
								required />
                                <span id="confirmPassValidationMessage" class="validation-message" style="color: red; font-size: 12px;"></span> 
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
    <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/jquery.countdown.min.js"></script>
  <script src="../js/bootstrap-datepicker.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.fancybox.min.js"></script>
  <script src="../js/jquery.sticky.js"></script>
  <script src="../js/jquery.mb.YTPlayer.min.js"></script>
  <script src="../js/main.js"></script>

<script>
  function ValidateForm(check) {
    var isValid = true;
    var validationMessages = document.querySelectorAll('.validation-message');
    for (var i = 0; i < validationMessages.length; i++) {
        validationMessages[i].textContent = '';
    }

    function isEmpty(value) {
        return value.trim() === '';
    
    }
    function isValidPinCode(value) {
        var pinCodePattern = /^[0-9]/;
        return emailPattern.test(value);
    }


    function isValidEmail(value) {
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return emailPattern.test(value);
    }

    function isValidPassword(value) {
        var passwordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        return passwordPattern.test(value);
    }

    var firstnameInput = document.getElementById('firstname');
    var lastnameInput = document.getElementById('lastname');
    var emailInput = document.getElementById('emailInput');
    var dobInput = document.getElementById('dob');
    var mobileNumInput = document.getElementById('mobileNum');
    var pincodeInput = document.getElementById('pincode');
    var passwordInput = document.getElementById('passwordInput');
    var confirmPasswordInput = document.getElementById('confirmpassword');

    /*if (isEmpty(firstnameInput.value) && check > 1) {
        document.getElementById('firstnameValidationMessage').textContent = 'First Name is required';
        isValid = false;
    }

    if (isEmpty(lastnameInput.value) && check > 2) {
        document.getElementById('lastnameValidationMessage').textContent = 'Last Name is required';
        isValid = false;
    }
    if (isEmpty(mobileNumInput.value) && check > 3) {
        document.getElementById('mobileNumValidationMessage').textContent = 'Mobile Number is required';
        isValid = false;
    }
    if (isEmpty(emailInput.value) && check > 4) {
        document.getElementById('emailValidationMessage').textContent = 'Email Id is required';
        isValid = false;
    } 
    else if (!isValidEmail(emailInput.value) && check > 4) {
        document.getElementById('emailValidationMessage').textContent = 'Please enter a valid email address.';
        isValid = false;*/
    }
     if (isValidPinCode(pincodeInput.value) && check ===6 ) {
        document.getElementById('pinCodeValidationMessage').textContent = 'Pincode must be 6 digits';
        isValid = false;
    }
    

    if (isEmpty(passwordInput.value) && check > 6) {
        document.getElementById('passwordValidationMessage').textContent = 'Password is required';
        isValid = false;
    } 
    else if (!isValidPassword(passwordInput.value) && check === 6) {
        document.getElementById('passwordValidationMessage').textContent = 'Password must have at least 8 characters with 1 special character and 1 capital letter.';
        isValid = false;
    }

    if (isEmpty(confirmPasswordInput.value) && check > 6) {
        document.getElementById('confirmPassValidationMessage').textContent = 'Confirm Password is required';
        isValid = false;
    }

    if (passwordInput.value !== confirmPasswordInput.value) {
          document.getElementById('confirmPassValidationMessage').textContent = 'Confirm Password should match.';
          isValid = false;
    } 

    return isValid;
}

</script>
</body>
</html>