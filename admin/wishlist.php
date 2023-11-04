<?php
require('header.php');
?>
<style>
    .display-flex {
        display: flex;
    }

    .product-count {
        margin-top: 29px;
    }

    .product-count .qtyminus,
    .product-count .qtyplus {
        width: 30px;
        height: 30px;
        background: #212529;
        text-align: center;
        font-size: 19px;
        line-height: 30px;
        color: #fff;
        cursor: pointer;
    }

    .product-count .qtyminus {
        border-radius: 3px 0 0 3px;
    }

    .product-count .qtyplus {
        border-radius: 0 3px 3px 0;
    }

    .product-count .qty {
        width: 40px;
        text-align: center;
    }

    .product-dtl label {
        line-height: 16px;
        font-size: 15px;
    }
</style>

<div class="main-grid">
    <div class="agile-grids">
        <!-- blank-page -->

        <div class="banner">
            <h2>
                <a href="index.php">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Wishlist</span>
            </h2>
        </div>

        <div class="blank">
            <div class="blank-page">
                <?php
                $sql = "select * from wishlist,cars where cars.car_id=wishlist.car_id and email_id='$email'";
                $res = sel($sql);
                $total = 0;
                if (num($sql) == 0) {
                ?>
                    <p>Nothing here!</p>

                <?php
                } else {

                ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-center">Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($res)) {

                                    ?>
                                        <tr>
                                            <td class="col-sm-8 col-md-6">
                                                <div class="media">
                                                    <a class="thumbnail pull-left" href="view.php?id=<?php echo $row['car_id']; ?>"> <img class="media-object" src="../admin/uploads/car/<?php echo $row['photo']; ?>" style="width: 72px; height: 72px;"> </a>

                                                    <div class="media-body" style="padding:5px;margin-left:5px;">
                                                        <h4 class="media-heading"><a href="view.php?id=<?php echo $row['car_id']; ?>"><?php echo $row['car_name']; ?></a>
                                                        </h4>
                                                        <h5 class="media-heading"> by <?php echo $row['car_brand']; ?></h5>
                                                        <span>Status: </span>
                                                        <?php
                                                        if ($row['stock'] > 0) {
                                                        ?>
                                                            <span class="text-success"><strong>In Stock</strong>
                                                            </span>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <span class="text-danger"><strong>Out of Stock</strong>
                                                            </span>
                                                        <?php
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-1 col-md-1 text-center" style="vertical-align: middle;">
                                                <strong><?php echo $row['price']; ?></strong>
                                            </td>
                                            <td class="col-sm-1 col-md-1">
                                                <div style="display: flex;align-items: center;justify-content: center;">
                                                    <button type="button" class="btn btn-danger" onclick="remove(<?php echo $row['wishlist_id']; ?>)">
                                                        <span class="glyphicon glyphicon-remove"></span> Remove
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }

                                    ?>


                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="btn btn-info" onclick="window.location.href='allcars.php'">
                                                <span class="fa fa-shopping-cart"></span> Continue Shopping
                                            </button>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
        <!-- //blank-page -->
    </div>
</div>






<section id="main-content">
    <div class="container typo-agile">

    </div>
</section>

<?php
require('footer.php');
?>

<script>
    function minus(id) {
        var now = $("#quantity" + id).val();
        if (now > 1) {
            $.ajax({
                url: "php/addcart.php",
                type: "post",
                data: {
                    minus: "check",
                    id: id

                },
                // beforeSend: function() {
                //     Swal.fire({
                //         allowOutsideClick: false,
                //         allowEscapeKey: false,
                //     });
                //     Swal.showLoading();
                // },
                success: function(res) {
                    // Swal.close();
                    window.location.reload(true);

                }
            });
        }
    }

    function plus(id, max) {
        var now = $("#quantity" + id).val();
        if (now != max) {
            $.ajax({
                url: "php/addcart.php",
                type: "post",
                data: {
                    plus: "check",
                    id: id

                },
                // beforeSend: function() {
                //     Swal.fire({
                //         allowOutsideClick: false,
                //         allowEscapeKey: false,
                //     });
                //     Swal.showLoading();
                // },
                success: function(res) {
                    // Swal.close();
                    window.location.reload(true);

                }
            });
        }
    }

    function remove(id) {
        $.ajax({
            url: "php/removewish.php",
            type: "post",
            data: {
                remove: "check",
                id: id

            },
            beforeSend: function() {
                Swal.fire({
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                });
                Swal.showLoading();
            },
            success: function(res) {
                Swal.close();
                window.location.reload(true);

            }
        });
    }
</script>