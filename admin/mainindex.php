<?php
require('header.php');
?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="chart_agile_left">
                    <div class="agile-last-top" style="margin: 1.5em 0em;">
                        <div class="agile-last-grid">
                            <div class="area-grids-heading">
                                <?php
                                $currentMonth = date('m');
                                $lastMonth = date('m', strtotime('last month'));
                                $year = date('y');
                                ?>
                                <h3>Revenue</h3>
                                <p style="text-align: center;">
                                    (<?php echo $lastMonth . "/" . $year . " Vs " . $currentMonth . "/" . $year ?>)</p>
                            </div>
                            <div id="graph7"></div>
                            <script>
                                <?php


                                /*$crev = array_fill(0, 31, 0);
                                $lrev = array_fill(0, 31, 0);

                                $sql = "select day(paid_date) as day, sum(amount) as total_payment from payment where month(paid_date) = '$currentMonth' group by day(paid_date) order by day(paid_date);";
                                $res = sel($sql);
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $crev[$row['day']] = $row['total_payment'];
                                }

                                $sql = "select day(paid_date) as day, sum(amount) as total_payment from payment where month(paid_date) = '$lastMonth' group by day(paid_date) order by day(paid_date);";
                                $res = sel($sql);
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $lrev[$row['day']] = $row['total_payment'];
                                }*/
                                ?>
                                // This crosses a DST boundary in the UK.
                                Morris.Area({
                                    element: 'graph7',
                                    data: [
                                        <?php
                                        for ($i = 0; $i < 31; $i++) {
                                            echo "
                                            {
                                                x: '" . $i . "',
                                                y: " . $lrev[$i] . ",
                                                z: " . $crev[$i] . "
                                            },
                                            ";
                                        }
                                        ?>


                                    ],
                                    xkey: 'x',
                                    ykeys: ['y', 'z'],
                                    labels: ['Last Month', 'Current Month'],
                                    fillOpacity: 0.3,
                                    parseTime: false,
                                });
                            </script>

                        </div>
                    </div>

                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!--<div class="col-md-6">
                <div class="agil-info-calendar">
                    <div class="chart_agile_top" style="margin: 1.5em 0em;">
                        <div class="chart_agile_bottom">
                            <h4 style="text-align: center;">Products by Category</h4>
                            <div id="graph4"></div>
                            <script>
                                <?php
                                $sql = "select category,count(*) as cs from product where stock>0 group by category;";
                                $res = sel($sql);

                                ?>
                                Morris.Donut({
                                    element: 'graph4',
                                    data: [
                                        // {
                                        //     value: 70,
                                        //     label: 'foo',
                                        //     formatted: 'at least 70%'
                                        // },
                                        <?php
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            echo "
                                            {
                                                value: " . (int)$row['cs'] . ",
                                                label: '" . $row['category'] . "',
                                                formatted: " . (int)$row['cs'] . ",
                                            },
                                            ";
                                        }
                                        ?>

                                    ],
                                    formatter: function(x, data) {
                                        return data.formatted;
                                    }
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>-->
            <div class="col-md-6">
                <div class="agil-info-calendar">
                    <!-- calendar -->
                    <div class="agile-calendar">
                        <div class="calendar-widget">
                            <div class="panel-heading ui-sortable-handle">
                                <span class="panel-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </span>
                                <span class="panel-title"> Calendar Widget</span>
                            </div>
                            <!-- grids -->
                            <div class="agile-calendar-grid">
                                <div class="page">

                                    <div class="w3l-calendar-left">
                                        <div class="calendar-heading">

                                        </div>
                                        <div class="monthly" id="mycalendar"></div>
                                    </div>

                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>



        <div class="row">
            <div class="col-md-3 ">
                <div class="market-update-block clr-block-2 row" style="margin:0px;">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-futbol-o"> </i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <?php
                        $sql = "select * from product";
                        $count = num($sql);
                        ?>
                        <h4>Products</h4>
                        <h3><?php echo $count; ?></h3>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="market-update-block clr-block-1 row" style="margin:0px;">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <?php
                        $sql = "select * from customer";
                        $count = num($sql);
                        ?>
                        <h4>Users</h4>
                        <h3><?php echo $count; ?></h3>

                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="market-update-block clr-block-3 row" style="margin:0px;">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-inr"></i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <?php
                        $sql = "select sum(amount) as amt from payment;";
                        $res = sel($sql);
                        $row = mysqli_fetch_assoc($res);
                        ?>
                        <h4>Sales</h4>
                        <h3><?php echo $row['amt']; ?></h3>

                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="market-update-block clr-block-4 row" style="margin:0px;">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <?php
                        $sql = "select * from pro_order";
                        $count = num($sql);
                        ?>
                        <h4>Orders</h4>
                        <h3><?php echo $count; ?></h3>

                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>


    </section>

    <?php
    require('footer.php');
    ?>