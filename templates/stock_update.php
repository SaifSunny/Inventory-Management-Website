<?php
include './database/config.php';

if (isset($_POST['stock'])) {

  $pd_id = $_POST['product_id'];
  $stock = $_POST['add_stock'];

  $query = "SELECT * FROM products WHERE product_id = '$pd_id'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run->num_rows > 0) {

    $q2 = "SELECT stock FROM products WHERE product_id = '$pd_id'";
    $q_run2 = mysqli_query($conn, $q2);

    if ($q_run2->num_rows > 0) {

      while ($row = $q_run2->fetch_assoc()) {
        $val = (int)$row["stock"];
        $val = $val + $stock;
      }
    }

    $query2 = "UPDATE `products` SET stock = '$val' WHERE product_id='$pd_id'";
    $query_run2 = mysqli_query($conn, $query2);
    if ($query_run2) {
      echo "<script> alert('Product Stock has been UPDATED.');</script>";
    } else {
      echo "<script>alert('Cannot UPDATE Stock')</script>";
    }
  } else {
    echo "<script>alert('Invalid PRODUCT ID')</script>";
  }
}
?>


<div class="modal fade" id="form_addstock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label>Product ID</label>
            <input type="text" class="form-control" name="product_id" id="product_id" aria-describedby="emailHelp" placeholder="Product ID" required>
          </div>
          <div class="form-group">
            <label>Stock</label>
            <input type="text" class="form-control" name="add_stock" id="add_stock" aria-describedby="emailHelp" placeholder="Quantity" required>
          </div>
          <button type="submit" name="stock" id="stock" class="btn btn-success">ADD Stock</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="stock_close" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>