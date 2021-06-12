<?php
include './database/config.php';

if (isset($_POST['up_cat'])) {

  $cat_id = $_POST['up_category_id'];
  $cat_name = $_POST['up_category_name'];

  $query = "SELECT * FROM categories WHERE category_id = '$cat_id'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run->num_rows > 0) {
    $query2 = "UPDATE `categories` SET category_name='$cat_name' WHERE category_id='$cat_id'";
    $query_run2 = mysqli_query($conn, $query2);
    if ($query_run2) {
      echo "<script> alert('CATEGORY has been UPDATED.');</script>";
    } else {
      echo "<script>alert('Cannot save CATEGORY')</script>";
    }
  } else {
    echo "<script>alert('Invalid CATEGORY ID')</script>";
  }
}
?>


<div class="modal fade" id="form_category_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label>Category ID</label>
            <input type="text" class="form-control" name="up_category_id" id="up_category_id" aria-describedby="emailHelp" placeholder="Category ID" required>
          </div>
          <div class="form-group">
            <label>Category Name</label>
            <input type="text" class="form-control" name="up_category_name" id="up_category_name" aria-describedby="emailHelp" placeholder="Category Name" required>
          </div>
          <button type="submit" name="up_cat" id="up_cat" class="btn btn-success">Update Category</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="up_cat_close" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>