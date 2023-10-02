<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
/*session_start();*/
if (!isset($_SESSION['email_id'])) {
	echo "<script>window.location.replace('../index.html')</script>";
}
$email = $_SESSION['email_id'];
require('../connect.php');

$sql = "select * from registration where email_id='$email'";
$res = select_data($sql);
$row = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>

<head>
    <title>Autodoc user panel </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font.css" type="text/css" />
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <script src="js/jquery2.0.3.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/screenfull.js"></script>
    <script>
    $(function() {
        $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

        if (!screenfull.enabled) {
            return false;
        }



        $('#toggle').click(function() {
            screenfull.toggle($('#container')[0]);
        });
    });
    </script>

</head>

<body class="dashboard-page">

    <nav class="main-menu">
        <ul>
            <li>
                <a href="index.php">
                    <i class="fa fa-home nav_icon"></i>
                    <span class="nav-text">
                        Dashboard
                    </span>
                </a>
            </li>
            <li>
                <a href="profile.php">
                    <i class="fa fa-home nav_icon"></i>
                    <span class="nav-text">
                        Profile
                    </span>
                </a>
            </li>
            <li>
                <a href="complaint.php">
                    <i class="fa fa-cogs"></i>
                    <span class="nav-text">
                        complaint
                    </span>
                </a>
            </li>

            <li class="has-subnav">
                <a href="javascript:;">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    <span class="nav-text">
                        UI Components
                    </span>
                    <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
                </a>
                <ul>
                    <li>
                        <a class="subnav-text" href="buttons.html">
                            Buttons
                        </a>
                    </li>
                    <li>
                        <a class="subnav-text" href="grids.html">
                            Grids
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
        <ul class="logout">
            <li>
                <a href="javascript:;" onclick="logout()">
                    <i class="icon-off nav-icon"></i>
                    <span class="nav-text">
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </nav>
    <section class="wrapper scrollable" style="opacity: 1;">
        <nav class="user-menu">
            <a href="javascript:;" class="main-menu-access">
                <i class="icon-proton-logo"></i>
                <i class="icon-reorder"></i>
            </a>
        </nav>
        <section class="title-bar">
            <div class="logo" style="width: 17%;">
                <h1><a href="index.html"><img src="images/logo.png" alt="" />Autodoc</a></h1>
            </div>

            <div class="header-right">
                <div class="profile_details_left">
                    <div class="header-right-left">
                        <!--notifications of menu start -->

                    </div>
                    <div class="profile_details" style="background-color: #00bcd4;padding: 5px 15px 5px 5px;border-radius: 20px;">
                        <ul>
                            <li class="dropdown profile_details_drop">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <div class="profile_img">
									<img class="prfil-img" style="width: 33px;height: 33px;border-radius: 50%;" src="<?php echo 'uploads/profile/' . $row['profile_pic']; ?>" alt="Profile Image">
										<span style="color: white;"><?php echo $row['first_name'] . " " . $row['last_name']; ?></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu drp-mnu">
                                    <li> <a href="password.php"><i class="fa fa-cog"></i> Change Password</a> </li>
                                    <li> <a href="profile.php"><i class="fa fa-user"></i> Profile</a> </li>
                                    <li> <a href="javascript:;" onclick="logout()"><i class="fa fa-sign-out"></i> Logout</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </section>