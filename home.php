<?php
include_once("./database/config.php");

session_start();


if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
date_default_timezone_set("Asia/Dhaka");
$_SESSION['last-login'] = date("Y-m-d h:i:s");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="">
    <script type="text/javascript" src="./js/main.js"></script>
</head>

<body>

    <?php include_once("./templates/header.php"); ?>

    <div style="padding: 50px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mx-auto" style="text-align:center;padding:30px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                        <h3 class="card-title" style="padding-bottom:20px;">Profile Info</h3>
                        <img class="card-img-top mx-auto" style="width:50%;padding-bottom:20px;" src="./images/user-profile.png" alt="Profile Image">
                        <div class="card-body" style="padding:20px 40px; text-align:left;font-size:18px;">
                            <p class="card-text"><i class="fa fa-user"></i><?php echo $_SESSION['username'] ?></p>
                            <p class="card-text"><i class="fa fa-user"></i>Admin</p>
                            <p class="card-text"><i class="fa fa-clock-o"></i>Last Login : <?php echo $_SESSION['last-login'] ?></p>

                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card" style="width:100%;height:100%;background-color: #1690A7;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                        <h1 style="color:white;padding:90px 0 0 60px;font-size:48px">Welcome <span><?php echo $_SESSION['username'] ?></span></h1>
                        <h3 style="color:white;padding:0px 0 0 60px;font-size:22px">Hope You are haveing a nice day...</h1>

                            <div class="row" style="padding:40px 30px">
                                <div class="col-sm-6">
                                    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                        <div class="card-body" style="padding:30px 30px;">
                                            <h4 class="card-title">New Customers</h4>
                                            <p class="card-text">Here you can Add new Customers</p>
                                            <a href="#" data-toggle="modal" data-target="#form_customer" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                                            <a href="main_customers.php" class="btn btn-success">Manage</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                        <div class="card-body" style="padding:30px 30px;">
                                            <h4 class="card-title">New Orders</h4>
                                            <p class="card-text">Here you can add new order details</p>
                                            <a href="#" data-toggle="modal" data-target="#form_order" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                                            <a href="main_orders.php" class="btn btn-success">Manage</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="padding: 40px 0">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                        <div class="card-body" style="padding:20px 30px;">
                            <h4 class="card-title">Categories</h4>
                            <p class="card-text">Here you can manage your categories and can add categories</p>
                            <a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                            <a href="main_category.php" class="btn btn-success">Manage</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                        <div class="card-body" style="padding:20px 30px;">
                            <h4 class="card-title">Brands</h4>
                            <p class="card-text">Here you can manage your brand and can add new brand</p>
                            <a href="#" data-toggle="modal" data-target="#form_brand" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                            <a href="main_brands.php" class="btn btn-success">Manage</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                        <div class="card-body" style="padding:20px 30px;">
                            <h4 class="card-title">Products</h4>
                            <p class="card-text">Here you can manage your products and can add new products</p>
                            <a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                            <a href="main_products.php" class="btn btn-success">Manage</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once("./templates/brand.php");
    ?>

    <?php
    include_once("./templates/category.php");
    ?>

    <?php
    include_once("./templates/products.php");
    ?>

    <?php
    include_once("./templates/customer.php");
    ?>
    <?php
    include_once("./templates/order.php");
    ?>

</body>

</html>