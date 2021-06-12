<?php
include_once("./database/config.php");

include_once("./templates/category.php");

include_once("./templates/category_edit.php");

include_once("./templates/category_delete.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Category</title>
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
                            <h2 style="padding-right: 500px; padding-left:10px; font-weight:1000">CATEGORIES</h2>
                            <div class="butt">
                                <a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                                <a href="#" class="btn btn-success edit_btn" name="edit" data-toggle="modal" data-target="#form_category_edit"><i class="fa fa-edit"></i>Update</a>
                                <a href="#" class="btn btn-danger delete_btn" name="delete" data-toggle="modal" data-target="#form_category_delete"><i class="fa fa-trash-o"></i>Delete</a>
                            </div>

                        </div>

                        <div class="card-body" id="card-body">
                            <table class="table">
                                <thead>
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                </thead>

                                <tbody id="cat_data">

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
                url: 'show_cat.php',
                type: 'GET',
                success: function(response) {
                    $.each(response, function(key, value) {
                        $('#cat_data').append('<tr>' +
                            '<td class="cat_id">' + value['category_id'] + '</td>\
                             <td class="cat_name">' + value['category_name'] + '</td>\
                        </tr>')
                    })
                }
            })

        });
    </script>


</body>

</html>