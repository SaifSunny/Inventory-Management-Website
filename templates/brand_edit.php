<?php
include './database/config.php';

if (isset($_POST['up_br'])) {

  $br_id = $_POST['up_brand_id'];
  $br_name = $_POST['up_brand_name'];

  $query = "SELECT * FROM brands WHERE brand_id = '$br_id'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run->num_rows > 0) {
    $query2 = "UPDATE `brands` SET brand_name='$br_name' WHERE brand_id='$br_id'";
    $query_run2 = mysqli_query($conn, $query2);
    if ($query_run2) {
      echo "<script> alert('BRAND has been UPDATED.');</script>";
    } else {
      echo "<script>alert('Cannot save BRAND')</script>";
    }
  } else {
    echo "<script>alert('Invalid BRAND ID')</script>";
  }
}
?>


<div class="modal fade" id="form_Brand_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Brands</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label>Brand ID</label>
            <input type="text" class="form-control" name="up_brand_id" id="up_brand_id" aria-describedby="emailHelp" placeholder="Brand ID" required>
          </div>
          <div class="form-group">
            <label>Brand Name</label>
            <input type="text" class="form-control" name="up_brand_name" id="up_brand_name" aria-describedby="emailHelp" placeholder="Brand Name" required>
          </div>
          <button type="submit" name="up_br" id="up_br" class="btn btn-success">Update Brand</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="up_br_close" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>