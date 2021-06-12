<?php
include './database/config.php';

if (isset($_POST['update_customer'])) {

  $cu_id = $_POST['up_customer_id'];
  $name = $_POST['up_customer_name'];
  $email = $_POST['up_customer_email'];
  $phone = $_POST['up_customer_phone'];
  $address = $_POST['up_customer_address'];
  $city = $_POST['up_customer_city'];
  $zip = $_POST['up_customer_zip'];

  $query = "SELECT * FROM customers WHERE customer_id = '$cu_id'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run->num_rows > 0) {
    $query2 = "UPDATE customers SET customer_name ='$name', email='$email', phone='$phone', address='$address', city='$city', zip='$zip' WHERE customer_id = '$cu_id'";

    $query_run2 = mysqli_query($conn, $query2);
    if ($query_run2) {
      echo "<script> alert('Customer INFO has been UPDATED.');</script>";
    } else {
      echo "<script>alert('Cannot UPDATE Customer INFO')</script>";
    }
  } else {
    echo "<script>alert('Customer INFO does not Exist')</script>";
  }
}
?>


<div class="modal fade" id="form_customer_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label>Customer ID</label>
            <input type="text" class="form-control" name="up_customer_id" id="up_customer_id" aria-describedby="emailHelp" placeholder="Enter ID" required>
            <small id="cat_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label>Customer Name</label>
            <input type="text" class="form-control" name="up_customer_name" id="up_customer_name" aria-describedby="emailHelp" placeholder="Enter Name" required>
            <small id="cat_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="up_customer_email" id="up_customer_email" aria-describedby="emailHelp" placeholder="Enter Email" required>
            <small id="cat_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input type="text" class="form-control" name="up_customer_phone" id="up_customer_phone" aria-describedby="emailHelp" placeholder="Enter Phone Number" required>
            <small id="cat_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="up_customer_address" id="up_customer_address" aria-describedby="emailHelp" placeholder="Enter Address" required>
            <small id="cat_error" class="form-text text-muted"></small>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>City</label>
              <input type="text" class="form-control" name="up_customer_city" id="up_customer_city" aria-describedby="emailHelp" placeholder="Enter City" required>
            </div>
            <div class="form-group col-md-6">
              <label>Zip</label>
              <input type="text" class="form-control" name="up_customer_zip" id="up_customer_zip" aria-describedby="emailHelp" placeholder="Enter Zip" required>
            </div>
          </div>
          <button type="submit" name="update_customer" class="btn btn-success">Update Customer</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>