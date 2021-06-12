<?php
include './database/config.php';

if (isset($_POST['product_submit'])) {

    $p_name = $_POST['product_name'];
    $p_category_id = $_POST['select_category'];
    $p_brand_id = $_POST['select_brand'];
    $price = $_POST['product_price'];
    $stock = $_POST['product_qty'];
    $date = $_POST['added_date'];

    $query = "SELECT * FROM products WHERE product_name = '$p_name'";
    $query_run = mysqli_query($conn, $query);

    if (!$query_run->num_rows > 0) {

        $query2 = "INSERT INTO products(category_id, brand_id, product_name, brand_name, category_name, product_price, stock, added_date) 
        VALUES ('$p_category_id','$p_brand_id','$p_name',(SELECT brand_name FROM brands WHERE brand_id = '$p_brand_id'),(SELECT category_name FROM categories WHERE category_id = '$p_category_id'),'$price','$stock','$date')";

        $query_run2 = mysqli_query($conn, $query2);
        if ($query_run2) {
            echo "<script> alert('Product has been Added.');</script>";
        } else {
            echo "<script>alert('Cannot Add Product')</script>";
        }
    } else {
        echo "<script>alert('Product Already Exists')</script>";
    }
}
?>

<div class="modal fade" id="form_products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Date</label>
                            <input type="text" class="form-control" name="added_date" id="added_date" value="<?php echo date("Y-m-d"); ?>" readonly />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Product Name</label>
                            <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Product Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" id="select_category" name="select_category" required>
                            <option>-- Select Category --</option>
                            <?php
                            $cat_option = "SELECT * FROM categories";
                            $cat_option_run = mysqli_query($conn, $cat_option);

                            if (mysqli_num_rows($cat_option_run) > 0) {
                                foreach ($cat_option_run as $row) {
                            ?>
                                    <option value="<?php echo $row['category_id']; ?>"> <?php echo $row['category_name']; ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Brand</label>
                        <select class="form-control" id="select_brand" name="select_brand" required>
                            <option>-- Select Brand --</option>
                            <?php
                            $br_option = "SELECT * FROM brands";
                            $br_option_run = mysqli_query($conn, $br_option);

                            if (mysqli_num_rows($br_option_run) > 0) {
                                foreach ($br_option_run as $row2) {
                            ?>
                                    <option value="<?php echo $row2['brand_id']; ?>"> <?php echo $row2['brand_name']; ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter Price of Product" required />
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" class="form-control" id="product_qty" name="product_qty" placeholder="Enter Quantity" required />
                    </div>
                    <button type="submit" name="product_submit" class="btn btn-success">Add Product</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>