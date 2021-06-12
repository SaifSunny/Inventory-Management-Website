<?php
include_once("./database/config.php");

include_once("./templates/customer.php");
include_once("./templates/customer_edit.php");
include_once("./templates/customer_delete.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Customers</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./includes/table.css">
    <script type="text/javascript" src="./js/main.js"></script>
</head>

<body>

    <?php include_once("./templates/header.php"); ?>

    <div style="padding: 50px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mx-auto" style="text-align:center;padding:40px 20px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                        <div class="card-title">
                            <h2 style="padding-right: 490px; padding-left:10px; font-weight:1000">CUSTOMERS</h2>
                            <div class="butt">
                                <a href="#" data-toggle="modal" data-target="#form_customer" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                                <a href="#" class="btn btn-success edit_btn" name="edit" data-toggle="modal" data-target="#form_customer_edit"><i class="fa fa-edit"></i>Update</a>
                                <a href="#" class="btn btn-danger delete_btn" name="delete" data-toggle="modal" data-target="#form_customer_delete"><i class="fa fa-trash-o"></i>Delete</a>
                            </div>
                        </div>

                        <div class="card-body" id="card-body">
                            <table class="table">
                                <thead>
                                    <th>Customer ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Zip</th>
                                </thead>

                                <tbody id="cus_data">


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $.ajax({
                url: 'show_cus.php',
                type: 'GET',
                success: function(response) {
                    $.each(response, function(key, value) {
                        $('#cus_data').append('<tr>' +
                            '<td>' + value['customer_id'] + '</td>\
                             <td>' + value['customer_name'] + '</td>\
                             <td>' + value['email'] + '</td>\
                             <td>' + value['phone'] + '</td>\
                             <td>' + value['address'] + '</td>\
                             <td>' + value['city'] + '</td>\
                             <td>' + value['zip'] + '</td>\
                        </tr>')
                    })
                }
            })

        });
    </script>


</body>

</html>