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
  <h1>Complaint</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="viewcar.php">Home</a></li>
      <li class="breadcrumb-item">Pages</li>
      <li class="breadcrumb-item active">Contact</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

        <?php
        if (isset($_GET['id'])) {
            $booking_id = intval($_GET['id']);
            /*$booking_id = intval($_GET['booking_id']);*/

            require 'vendor/autoload.php';

            // Use a prepared statement to avoid SQL injection
            $stmt = $conn->prepare("SELECT * FROM payment WHERE booking_id = $booking_id");
            /*$stmt->bind_param("i", $payment_id); // "i" indicates an integer parameter*/
            $stmt->execute();
            $res = $stmt->get_result();

            if ($res->num_rows > 0) {
                $row = $res->fetch_assoc();

                // Function to send email using SMTP
 // Function to send email using SMTP
                // Handle sending the receipt via email
// Handle sending the receipt via email
if (isset($_POST['send_receipt'])) {
    $recipientEmail = $row['email'];
    $subject = "Receipt for Payment";
    $message = "Dear " . $arr['first_name'] . ",\n\n";
    $message .= "Here is your receipt for the payment of $" . $row['amount'] . ".\n";
    $message .= "Payment Date: " . $row['paid_date'] . "\n";
    $message .= "Thank you for your Booking!\n\n";
    $message .= "Best regards,\nGARAGE4";

    $smtpHost = 'smtp.gmail.com';
    $smtpPort = 587;
    $smtpUsername = 'garage4@gmail.com';
    $smtpPassword = 'pgrl kcec sile kcwx';

    // Create a PHPMailer instance
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    // Enable SMTP
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption
    $mail->Port = $smtpPort;

    // Sender and recipient email addresses
    $mail->setFrom($smtpUsername);
    $mail->addAddress($recipientEmail);

    // Email content
    $mail->isHTML(false); // Set to false if your email content is plain text
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send the email
    if ($mail->send()) {
?>
        <html>
        <head>
          <script type="text/javascript" src="swal/jquery.min.js"></script>
          <script type="text/javascript" src="swal/bootstrap.min.js"></script>
          <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
        </head>
        <body>
        <script>
  Swal.fire({
    icon: 'success',
    text: 'Recipt Send To Your Email!!!',
    didClose: () => {
      window.location.replace('receipt.php?id=<?php echo $arr['booking_id'] ?>');
    }
  });
</script>

</body>
</html>
<?php
        return true;
    } else {
        return false;
    }
}

                ?>
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
                      rel="stylesheet">
                <div class="container bootstrap snippets bootdeys">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default invoice" id="invoice">
                                <div class="panel-body">
                                    <div class="invoice-ribbon">
                                        <div class="ribbon-inner">PAID</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 top-left">
                                            <i class="fa fa-rocket"></i>
                                        </div>
                                        <div class="col-sm-6 top-right">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-4 from">
                                            <p class="lead marginbottom">From : GARAGE4</p>
                                            <p>India</p>
                                            <p>KERALA</p>
                                            <p>Phone: 415-767-3600</p>
                                            <p>Email: garage4@gmail.com</p>
                                        </div>
                                        <div class="col-xs-4 to">
                                            <p class="lead marginbottom">To : <?php echo $row['email']; ?></p>
                                            <p><?php echo $arr['contact']; ?></p>
                                            <p><?php echo $arr['house_name']; ?></p>
                                            <p><?php echo $arr['street_name']; ?></p>
                                            <p><?php echo $arr['district']; ?></p>
                                        </div>
                                        <div class="col-xs-4 text-right payment-details">
                                            <p class="lead marginbottom payment-info">Payment details</p>
                                            <p>Amount: <?php echo $row['amount']; ?></p>
                                            <p>User Email: <?php echo $row['email']; ?></p>
                                            <p>Date: <?php echo $row['paid_date']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 margintop">
                                            <p class="lead marginbottom">THANK YOU!</p>
                                            <form method="post">
                                                <button class="btn btn-success" id="invoice-print"
                                                        name="print_receipt"
                                                        onclick="printReceipt()"><i class="fa fa-print"></i> Print Receipt
                                                </button>
                                                <button class="btn btn-danger" name="send_receipt"><i
                                                            class="fa fa-envelope-o"></i> Mail Receipt
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function printReceipt() {
                        var printContents = document.getElementById("invoice").innerHTML;
                        var originalContents = document.body.innerHTML;
                        document.body.innerHTML = printContents;
                        window.print();
                        document.body.innerHTML = originalContents;
                    }
                </script>
                <?php
            }
        }
        ?>
    </div>
</div>

<?php
include("footer.html");
?>