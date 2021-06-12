<?php
include './database/config.php';

if (isset($_POST['de_cus'])) {

  $cus_id = $_POST['de_customer_id'];

  $query = "SELECT * FROM customers WHERE customer_id = '$cus_id'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run->num_rows > 0) {
    $query2 = "DELETE FROM `customers` WHERE customer_id='$cus_id'";
    $query_run2 = mysqli_query($conn, $query2);
    if ($query_run2) {
      echo "<script> alert('CUSTOMER has been DELETED.');</script>";
    } else {
      echo "<script>alert('Cannot Delete CUSTOMER')</script>";
    }
  } else {
    echo "<script>alert('Invalid CUSTOMER ID')</script>";
  }
}
?>


<div class="modal fade" id="form_customer_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label>Customer ID</label>
            <input type="text" class="form-control" name="de_customer_id" id="de_customer_id" aria-describedby="emailHelp" placeholder="Customer ID" required>
          </div>
          <button type="submit" name="de_cus" id="de_cus" class="btn btn-danger">Delete Customer</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="de_cus_close" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>