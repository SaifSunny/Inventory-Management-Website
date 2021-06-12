<?php
include './database/config.php';

if (isset($_POST['de_pd'])) {

    $p_id = $_POST['de_products_id'];

    $query = "SELECT * FROM products WHERE product_id = '$p_id'";
    $query_run = mysqli_query($conn, $query);
  
    if ($query_run->num_rows > 0) {
      $query2 = "DELETE FROM `products` WHERE product_id='$p_id'";
      $query_run2 = mysqli_query($conn, $query2);
      if ($query_run2) {
        echo "<script> alert('PRODUCT has been DELETED.');</script>";
      } else {
        echo "<script>alert('Cannot Delete PRODUCT')</script>";
      }
    } else {
      echo "<script>alert('Invalid PRODUCT ID')</script>";
    }
  }
  ?>

<div class="modal fade" id="form_products_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label>Product ID</label>
            <input type="text" class="form-control" name="de_products_id" id="de_products_id" aria-describedby="emailHelp" placeholder="Product ID" required>
          </div>
          <button type="submit" name="de_pd" id="de_pd" class="btn btn-danger">Delete Product</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="de_pd_close" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>