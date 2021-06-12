<?php
include './database/config.php';

if (isset($_POST['de_or'])) {

  $or_id = $_POST['de_order_id'];
  $sq =  "SELECT order_quantity FROM orders WHERE order_id = '$or_id'";
  $sq_run=mysqli_query($conn, $sq);

  if ($sq_run->num_rows > 0) {

    while ($row = $sq_run->fetch_assoc()) {
      $quantity = (int)$row["order_quantity"];
    }
  }


  $query = "SELECT * FROM orders WHERE order_id = '$or_id'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run->num_rows > 0) {

    $q2 = "SELECT stock FROM products WHERE product_id = (SELECT product_id FROM orders WHERE order_id='$or_id')";
    $q_run2 = mysqli_query($conn, $q2);

    if ($q_run2->num_rows > 0) {

      while ($row = $q_run2->fetch_assoc()) {
        $val = (int)$row["stock"];
        $val = $val + $quantity;
      }
    }
    $q1 = "UPDATE products SET stock = '$val' WHERE product_id = (SELECT product_id FROM orders WHERE order_id='$or_id')";
    $q1_run = mysqli_query($conn, $q1);


    $query2 = "DELETE FROM `orders` WHERE order_id='$or_id'";
    $query_run2 = mysqli_query($conn, $query2);
    if ($query_run2) {
      echo "<script> alert('ORDER has been DELETED.');</script>";
    } else {
      echo "<script>alert('Cannot Delete ORDER')</script>";
    }
  } else {
    echo "<script>alert('Invalid ORDER ID')</script>";
  }
}
?>


<div class="modal fade" id="form_order_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete ORDER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label>ORDER ID</label>
            <input type="text" class="form-control" name="de_order_id" id="de_order_id" aria-describedby="emailHelp" placeholder="Order ID" required>
          </div>
          <button type="submit" name="de_or" id="de_or" class="btn btn-danger">Delete ORDER</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="de_or_close" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>