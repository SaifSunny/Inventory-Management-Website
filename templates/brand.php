<?php
include './database/config.php';

if (isset($_POST['brand_submit'])) {
    $br_name = $_POST['brand_name'];

    $query = "SELECT * FROM brands WHERE brand_name = '$br_name'";
    $query_run = mysqli_query($conn, $query);

    if (!$query_run->num_rows > 0) {
        $query2 = "INSERT INTO brands(brand_name) VALUES ('$br_name')";
        $query_run2 = mysqli_query($conn, $query2);
        if ($query_run2) {
            echo "<script> alert('Brand has been ADDED.');</script>";
            
        } else {
            echo "<script>alert('Cannot save Brand')</script>";
            
        }
    } else {
        echo "<script>alert('Brand Already Exists')</script>";
        
    }
}
?>


<div class="modal fade" id="form_brand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Brand Name</label>
                        <input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="Enter Brand Name" required>
                    </div>
                    <button type="submit" name="brand_submit" class="btn btn-success">Add Brand</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>