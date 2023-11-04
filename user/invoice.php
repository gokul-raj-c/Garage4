<?php
session_start();
/*include("header.php");*/
require("../connect.php");
$username = $_SESSION['email_id'];
   $sql="select * from registration where email_id='$username'" ;
   $res=select_data($sql);
   $arr=mysqli_fetch_assoc($res);




$id = $_GET['id'];
$sql1="select * from booking where booking_id='$id'" ;
$res1=select_data($sql1);
$arr1=mysqli_fetch_assoc($res1);


?>

 <!--<main id="main" class="main">

<div class="pagetitle">
  <h1>Receipt</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="viewcar.php">Home</a></li>
      <li class="breadcrumb-item">Booking</li>
      <li class="breadcrumb-item active">View Receipt</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Receipt - <?php echo $id; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
      body{
    margin-top:20px;
    background:#eee;
}

.invoice {
    background: #fff;
    padding: 20px
}

.invoice-company {
    font-size: 20px
    text-align: right;
}

.invoice-header {
    margin: 0 -20px;
    background: #f0f3f4;
    padding: 20px
}

.invoice-date,
.invoice-from,
.invoice-to {
    display: table-cell;
    width: 1%
}

.invoice-from,
.invoice-to {
    padding-right: 20px
}

.invoice-date .date,
.invoice-from strong,
.invoice-to strong {
    font-size: 16px;
    font-weight: 600
}

.invoice-date {
    text-align: right;
    padding-left: 20px
}

.invoice-price {
    background: #f0f3f4;
    display: table;
    width: 100%
}

.invoice-price .invoice-price-left,
.invoice-price .invoice-price-right {
    display: table-cell;
    padding: 20px;
    font-size: 20px;
    font-weight: 600;
    width: 75%;
    position: relative;
    vertical-align: middle
}

.invoice-price .invoice-price-left .sub-price {
    display: table-cell;
    vertical-align: middle;
    padding: 0 20px
}

.invoice-price small {
    font-size: 12px;
    font-weight: 400;
    display: block
}

.invoice-price .invoice-price-row {
    display: table;
    float: left
}

.invoice-price .invoice-price-right {
    width: 25%;
    background: #f0f3f4;
    color: #343a40;
    font-size: 28px;
    text-align: right;
    vertical-align: bottom;
    font-weight: 300
}

.invoice-price .invoice-price-right small {
    display: block;
    opacity: .6;
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 12px
}

.invoice-footer {
    border-top: 1px solid #ddd;
    padding-top: 10px;
    font-size: 10px
}

.invoice-note {
    color: #999;
    margin-top: 80px;
    font-size: 85%
}

.invoice>div:not(.invoice-footer) {
    margin-bottom: 20px
}

.btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
    color: #2d353c;
    background: #fff;
    border-color: #d9dfe3;
}
@media print {
   #print-tools {
       display: none;
   }


   /* 
.invoice {
   font-size: 11px !important;
   overflow: hidden !important
}

.invoice footer {
   position: absolute;
   bottom: 10px;
   page-break-after: always
}

.invoice>div:last-child {
   page-break-before: always
} */
}

.invoice main .notices {
   padding-left: 6px;
   border-left: 6px solid #0d6efd;
   background: #e7f2ff;
   padding: 10px;
}
</style>
</head>

<body>
<div class="toolbar hidden-print sticky-top" style="background-color: white;padding: 15px;" id="print-tools">
        <div class="text-end" style="display: flex;justify-content: flex-end;">
            <button type="button" class="btn btn-danger" onclick="window.print();"><i class="fa fa-print"></i>
                Print</button>
            <!--<button type="button" class="btn btn-danger" id="exportButton"><i class="fa fa-file-pdf-o"></i> Export as
                PDF</button>-->
                <div class="btn-group">
                      <a href="pdf1.php?id=<?php echo $arr1['booking_id'] ?>" class="btn btn-dark">Send Receipt Email</a>
                        
                      </div>
        </div>
    </div>
<div class="container">
   <div class="col-md-12">
      <div class="invoice">
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            <!--<span class="pull-right hidden-print">
            <button type="button" class="btn btn-dark" onclick="window.print();"><i class="fa fa-print"></i>
                Print</button>
            <button type="button" class="btn btn-danger" id="exportButton"><i class="fa fa-file-pdf-o"></i> Export as
                PDF</button>
            </span>-->
           <p><h2><b> TEAM GARAGE4 </b></h2></p>
         </div>
        
                


         <!-- end invoice-company -->
         <!-- begin invoice-header -->
         <div class="invoice-header">
            <div class="invoice-from">
               <small>From</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">Team GARAGE4</strong><br>
                  Opp Old Petrol Pump<br>
                  Piravom,Ernakulam<br>
                  Phone: 9061393951<br>
                  Mail: teamgarage4web@gmail.com
               </address>
            </div>
            <div class="invoice-to">
               <small>To</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse"><?php echo $arr['first_name'];?> <?php echo $arr['last_name'];?></strong><br>
                  <?php echo $arr['house_name'];?>,<br>
                  <?php echo $arr['street_name'];?>
                  <?php echo $arr['district'];?><br>
                  Phone: <?php echo $arr['contact'];?><br>
                  Mail: <?php echo $arr['email_id'];?>
                  
               </address>
            </div>
            <div class="invoice-date">
               <h4>Invoice - <?php echo $arr1['booking_id'];?></h4>
               <!--<div class="date text-inverse m-t-5">August 3,2012</div>
               <div class="invoice-detail">
                  #0000123DSS<br>
                  Services Product
               </div>
            </div>-->
         </div>
         <!-- end invoice-header -->
         <!-- begin invoice-content -->
         <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
               <table class="table table-invoice">
                  <thead>
                     <tr>
                        <th>CAR NAME</th>
                        <th>RATE</th>
                        <th>BOOKED DATE</th>
                        <th>PICKUP DATE</th>
                        <th>DROP DATE</th>
                        <th>NO OF DAYS</th>
                       <!-- <th class="text-center" width="10%">HOURS</th>
                        <th class="text-right" width="20%">LINE TOTAL</th>-->
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <!--<td>
                           <span class="text-inverse">Website design &amp; development</span><br>
                           <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sagittis arcu.</small>
                        </td>-->
                        <td><?php echo $arr1['carname'];?></td>
                        <td><?php echo $arr1['rate'];?></td>
                        <td><?php echo $arr1['bdate'];?></td>
                        <td><?php echo $arr1['pick'];?></td>
                        <td><?php echo $arr1['dropd'];?></td>
                        <td><?php echo $arr1['days'];?></td>
                     </tr>
                     <!--<tr>
                        <td>
                           <span class="text-inverse">Branding</span><br>
                           <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sagittis arcu.</small>
                        </td>
                        <td class="text-center">$50.00</td>
                        <td class="text-center">40</td>
                        <td class="text-right">$2,000.00</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Redesign Service</span><br>
                           <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sagittis arcu.</small>
                        </td>
                        <td class="text-center">$50.00</td>
                        <td class="text-center">50</td>
                        <td class="text-right">$2,500.00</td>
                     </tr>-->
                  </tbody>
               </table>
            </div>
            <!-- end table-responsive -->
            <!-- begin invoice-price -->
            <div class="invoice-price">
               <div class="invoice-price-left">
                  <div class="invoice-price-row">
                     <!--<div class="sub-price">
                        <small>SUBTOTAL</small>
                        <span class="text-inverse">$4,500.00</span>
                     </div>
                     <div class="sub-price">
                        <i class="fa fa-plus text-muted"></i>
                     </div>
                     <div class="sub-price">
                        <small>PAYPAL FEE (5.4%)</small>
                        <span class="text-inverse">$108.00</span>
                     </div>-->
                  </div>
               </div>
               <div class="invoice-price-right">
                  <b><medium>TOTAL : </medium> <span class="f-w-600"><?php echo $arr1['total'];?></span></b>
               </div>
            </div>
            <!-- end invoice-price -->
         </div>
         
         <!-- end invoice-content -->
         <!-- begin invoice-note -->
         <div class="invoice-footer"><h6>
            * Invoice was created on a computer and is valid without the signature and seal.<br>
            * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]</h6>
         </div>
        <!-- <div class="invoice-note">
            *Invoice was created on a computer and is valid without the signature and seal.
            * 
         </div>-->
         <!-- end invoice-note -->
         <!-- begin invoice-footer -->
         <div class="invoice-footer">
            <h4><p class="text-center m-b-5 f-w-600">
               THANK YOU FOR YOUR BOOKING
            </p></h4>
            <!--<p class="text-center">
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> matiasgallipoli.com</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> rtiemps@gmail.com</span>
            </p>-->
         </div>
         <!-- end invoice-footer -->
         
      </div>
   </div>
</div>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            document.getElementById("exportButton").addEventListener("click", function() {
                var element = document.getElementById('invoice');
                var opt = {
                    margin: 1,
                    filename: 'invoice_<?php echo $id; ?>.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 1
                    },
                    jsPDF: {
                        unit: 'mm',
                        format: 'a4',
                        orientation: 'portrait'
                    }
                };

                // New Promise-based usage:
                html2pdf().set(opt).from(element).save();



            });
        });
    </script>
</body>

</html>