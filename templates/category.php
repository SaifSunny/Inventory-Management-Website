<?php
include './database/config.php';

if (isset($_POST['category_submit'])) {
  $cat_name = $_POST['category_name'];

  $query = "SELECT * FROM categories WHERE category_name = '$cat_name'";
  $query_run = mysqli_query($conn, $query);

  if (!$query_run->num_rows > 0) {
    $query2 = "INSERT INTO categories(category_name) VALUES ('$cat_name')";
    $query_run2 = mysqli_query($conn, $query2);
    if ($query_run2) {
      echo "<script> alert('CATEGORY has been ADDED.');</script>";
    } else {
      echo "<script>alert('Cannot save CATEGORY')</script>";
    }
  } else {
    echo "<script>alert('CATEGORY Already Exists')</script>";
  }
}
?>


<div class="modal fade" id="form_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label>Category Name</label>
            <input type="text" class="form-control" name="category_name" id="category_name" aria-describedby="emailHelp" placeholder="Enter Category" required>
            <small id="cat_error" class="form-text text-muted"></small>
          </div>
          <button type="submit" name="category_submit" id="cat_submit" class="btn btn-success">Add Category</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="cat_close" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
