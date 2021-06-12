<?php
include './database/config.php';

if (isset($_POST['de_br'])) {

  $br_id = $_POST['de_brand_id'];

  $query = "SELECT * FROM brands WHERE brand_id = '$br_id'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run->num_rows > 0) {
    $query2 = "DELETE FROM `brands` WHERE brand_id='$br_id'";
    $query_run2 = mysqli_query($conn, $query2);
    if ($query_run2) {
      echo "<script> alert('BRAND has been DELETED.');</script>";
    } else {
      echo "<script>alert('Cannot Delete BRAND')</script>";
    }
  } else {
    echo "<script>alert('Invalid BRAND ID')</script>";
  }
}
?>


<div class="modal fade" id="form_brand_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label>Brand ID</label>
            <input type="text" class="form-control" name="de_brand_id" id="de_brand_id" aria-describedby="emailHelp" placeholder="Brand ID" required>
          </div>
          <button type="submit" name="de_br" id="de_br" class="btn btn-danger">Delete Brand</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="de_br_close" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>