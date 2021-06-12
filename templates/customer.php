<?php
include './database/config.php';

if (isset($_POST['customer_submit'])) {
  $name = $_POST['customer_name'];
  $email = $_POST['customer_email'];
  $phone = $_POST['customer_phone'];
  $address = $_POST['customer_address'];
  $city = $_POST['customer_city'];
  $zip = $_POST['customer_zip'];


  $query = "SELECT * FROM customers WHERE customer_name = '$name'";
  $query_run = mysqli_query($conn, $query);

  if (!$query_run->num_rows > 0) {
    $query2 = "INSERT INTO customers(customer_name, email, phone, address, city, zip) VALUES ('$name','$email','$phone','$address','$city','$zip')";
    $query_run2 = mysqli_query($conn, $query2);
    if ($query_run2) {
      echo "<script> alert('Customer has been Saved.');</script>";
    } else {
      echo "<script>alert('Cannot save Customer')</script>";
    }
  } else {
    echo "<script>alert('Customer Already Exists')</script>";
  }
}
?>


<div class="modal fade" id="form_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label>Customer Name</label>
            <input type="text" class="form-control" name="customer_name" id="customer_name" aria-describedby="emailHelp" placeholder="Enter Name" required>
            <small id="cat_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="customer_email" id="customer_email" aria-describedby="emailHelp" placeholder="Enter Email" required>
            <small id="cat_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input type="text" class="form-control" name="customer_phone" id="customer_phone" aria-describedby="emailHelp" placeholder="Enter Phone Number" required>
            <small id="cat_error" class="form-text text-muted"></small>
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="customer_address" id="customer_address" aria-describedby="emailHelp" placeholder="Enter Address" required>
            <small id="cat_error" class="form-text text-muted"></small>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>City</label>
              <input type="text" class="form-control" name="customer_city" id="customer_city" aria-describedby="emailHelp" placeholder="Enter City" required>
            </div>
            <div class="form-group col-md-6">
              <label>Zip</label>
              <input type="text" class="form-control" name="customer_zip" id="customer_zip" aria-describedby="emailHelp" placeholder="Enter Zip" required>
            </div>
          </div>
          <button type="submit" name="customer_submit" class="btn btn-success">Add Customer</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>