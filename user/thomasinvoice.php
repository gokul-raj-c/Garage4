<?php
if (!isset($_GET['id'])) {
    echo "<script>window.location.replace('index.php');</script>";
}
session_start();
require("../connect.php");
$id = $_GET['id'];
$email = $_SESSION['email_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Invoice - <?php echo $id; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
        body {
            margin-top: 20px;
            background-color: #f7f7ff;
        }

        #invoice {
            padding: 0px;
        }

        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #0d6efd
        }

        .invoice .company-details {
            text-align: right
        }

        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .contacts {
            margin-bottom: 20px
        }

        .invoice .invoice-to {
            text-align: left
        }

        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .invoice-details {
            text-align: right
        }

        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            color: #0d6efd
        }

        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            margin-top: -100px;
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #0d6efd;
            background: #e7f2ff;
            padding: 10px;
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td,
        .invoice table th {
            padding: 15px;
            background: #eee;
            border-bottom: 1px solid #fff
        }

        .invoice table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: #0d6efd;
            font-size: 1.2em
        }

        .invoice table .qty,
        .invoice table .total,
        .invoice table .unit {
            text-align: right;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: #0d6efd
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background: #0d6efd;
            color: #fff
        }

        .invoice table tbody tr:last-child td {
            border: none
        }

        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0px solid rgba(0, 0, 0, 0);
            border-radius: .25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }

        .invoice table tfoot tr:last-child td {
            color: #0d6efd;
            font-size: 1.4em;
            border-top: 1px solid #0d6efd
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
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
            <button type="button" class="btn btn-dark" onclick="window.print();"><i class="fa fa-print"></i>
                Print</button>
            <button type="button" class="btn btn-danger" id="exportButton"><i class="fa fa-file-pdf-o"></i> Export as
                PDF</button>
        </div>
    </div>
    <div class="container" style="margin-top: 20px;" id="contentToExport">
        <div class="card">
            <div class="card-body">
                <div id="invoice">

                    <div class="invoice overflow-auto">
                        <div style="min-width: 600px">
                            <header>
                                <div class="row">
                                    <div class="col">
                                        <a href="javascript:;">
                                            <img src="../images/logo-footer.png" width="80" alt>
                                        </a>
                                    </div>
                                    <div class="col company-details">
                                        <h2 class="name">
                                            <a target="_blank" href="javascript:;">
                                                The Sports Hub
                                            </a>
                                        </h2>
                                        <!-- <div>455 Foggy Heights, AZ 85004, US</div>
                                        <div>(123) 456-789</div> -->
                                        <div><a href="mailto:sportshub9874@gmail.com" class="_cf_email_" data-cfemail="">sportshub9874@gmail.com</a>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <main>
                                <div class="row contacts">
                                    <div class="col invoice-to">
                                        <div class="text-gray-light">INVOICE TO:</div>
                                        <?php
                                        $sql = "select * from registration where email_id='$email'";
                                        $res = select_data($sql);
                                        $user = mysqli_fetch_assoc($res);

                                        $sql = "select * from payment where payment_id='$id'";
                                        $res = select_data($sql);
                                        $row = mysqli_fetch_assoc($res);
                                        ?>
                                        <h2 class="to"><?php echo $user['firstname'] . " " . $user['lastname']; ?></h2>
                                        <div class="address">
                                            <?php echo $user['housename'] . "," . $user['streetname'] . "," . $user['city'] . "," . $user['district']; ?>
                                        </div>
                                        <div class="email" style="color: #0d6efd;"> <?php echo $email; ?></a>
                                        </div>
                                    </div>
                                    <div class="col invoice-details">
                                        <h1 class="invoice-id">INVOICE #<?php echo $row['payment_id']; ?></h1>
                                        <div class="date">Date of Invoice: <?php echo date('d/m/Y h:i A'); ?></div>
                                        <div class="date">Payment Date:
                                            <?php echo date_format(date_create($row['paid_date']), 'd/m/Y h:i A'); ?>
                                        </div>
                                    </div>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="text-left">ITEM</th>
                                            <th class="text-right">PRICE</th>
                                            <th class="text-right">QUANTITY</th>
                                            <th class="text-right">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql = "select * from payment,pro_order,product where payment.payment_id=pro_order.payment_id and product.product_id=pro_order.product_id and  payment.payment_id='$id'";
                                        $res = select_data($sql);
                                        $n = 0;
                                        $total = 0;
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $n += 1;
                                            $total += ($row['price'] * $row['quantity']);
                                        ?>
                                            <tr>
                                                <td class="no"><?php echo $n; ?></td>
                                                <td class="text-left">
                                                    <h3>
                                                        <a target="_blank" href="javascript:;">
                                                            <?php echo $row['product_name']; ?>
                                                        </a>
                                                    </h3>
                                                    <p><?php echo $row['category']; ?></p>
                                                </td>
                                                <td class="unit">₹<?php echo $row['price']; ?></td>
                                                <td class="qty"><?php echo $row['quantity']; ?></td>
                                                <td class="total">₹<?php echo $row['price'] * $row['quantity']; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>


                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">SUBTOTAL</td>
                                            <td>₹<?php echo $total; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">Delivery Charge</td>
                                            <td>₹50</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">GRAND TOTAL</td>
                                            <td>₹<?php echo $total + 50; ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="thanks">Thank you!</div>
                                <!-- <div class="notices">
                                    <div>NOTICE:</div>
                                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after
                                        30 days.</div>
                                </div> -->
                            </main>
                            <footer>Invoice was created on a computer and is valid without the signature and seal.
                            </footer>
                        </div>

                        <div></div>
                    </div>
                </div>
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