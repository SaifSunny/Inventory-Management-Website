<?php
include './database/config.php';

if (isset($_POST['de_cat'])) {

  $cat_id = $_POST['de_category_id'];

  $query = "SELECT * FROM categories WHERE category_id = '$cat_id'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run->num_rows > 0) {
    $query2 = "DELETE FROM `categories` WHERE category_id='$cat_id'";
    $query_run2 = mysqli_query($conn, $query2);
    if ($query_run2) {
      echo "<script> alert('CATEGORY has been DELETED.');</script>";
    } else {
      echo "<script>alert('Cannot Delete CATEGORY')</script>";
    }
  } else {
    echo "<script>alert('Invalid CATEGORY ID')</script>";
  }
}
?>


<div class="modal fade" id="form_category_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label>Category ID</label>
            <input type="text" class="form-control" name="de_category_id" id="de_category_id" aria-describedby="emailHelp" placeholder="Category ID" required>
          </div>
          <button type="submit" name="de_cat" id="de_cat" class="btn btn-danger">Delete Category</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="de_cat_close" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>