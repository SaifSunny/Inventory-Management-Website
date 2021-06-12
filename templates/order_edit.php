<?php
include './database/config.php';

if (isset($_POST['up_order_submit'])) {

    $or_id = $_POST['order_id'];
    $cus_id = $_POST['select_customer'];
    $pd_id = $_POST['select_product'];
    $sell_price = $_POST['selling_price'];
    $quantity = $_POST['sell_quntity'];
    $total = $sell_price * $quantity;
    $paid = $_POST['product_paid'];
    $due = $total - $paid;

    $query = "SELECT * FROM orders WHERE order_id = '$or_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run->num_rows > 0) {
        $q2 = "SELECT stock FROM products WHERE product_id = '$pd_id'";
        $q_run2 = mysqli_query($conn, $q2);
    
        if ($q_run2->num_rows > 0) {
    
          while ($row = $q_run2->fetch_assoc()) {
            $val = (int)$row["stock"];
            $val = $val - $quantity;
          }
        }
        $q1 = "UPDATE products SET stock = '$val' WHERE product_id = '$pd_id'";
        $q1_run = mysqli_query($conn, $q1);
        
        $query2 = "UPDATE `orders` SET customer_id = '$cus_id', product_id='$pd_id', 
        customer_name=(SELECT customer_name FROM customers WHERE customer_id = '$cus_id'), 
        address= (SELECT address FROM customers WHERE customer_id = '$cus_id'),
        city = (SELECT city FROM customers WHERE customer_id = '$cus_id'),
        zip=(SELECT zip FROM customers WHERE customer_id = '$cus_id'),
        product_name=(SELECT product_name FROM products WHERE product_id = '$pd_id'),
        order_quantity = '$quantity', sell_price='$sell_price', total='$total', paid='$paid', due='$due'
        WHERE order_id = '$or_id'";

        $query_run2 = mysqli_query($conn, $query2);
        if ($query_run2) {
            echo "<script> alert('ORDER has been UPDATED.');</script>";
        } else {
            echo "<script>alert('Cannot UPDATE ORDER')</script>";
        }
    } else {
        echo "<script>alert('ORDER ID Doesn't Exists')</script>";
    }
}
?>

<div class="modal fade" id="form_order_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Order ID</label>
                        <input type="text" class="form-control" id="order_id" name="order_id" placeholder="Order ID" required />
                    </div>
                    <div class="form-group">
                        <label>Product Name</label>
                        <select class="form-control" id="select_product" name="select_product" required>
                            <option>-- Select Product --</option>
                            <?php
                            $pd_option = "SELECT * FROM products";
                            $pd_option_run = mysqli_query($conn, $pd_option);

                            if (mysqli_num_rows($pd_option_run) > 0) {
                                foreach ($pd_option_run as $row) {
                            ?>
                                    <option value="<?php echo $row['product_id']; ?>"> <?php echo $row['product_name']; ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Customer Name</label>
                        <select class="form-control" id="select_customer" name="select_customer" required>
                            <option>-- Customer --</option>
                            <?php
                            $cu_option = "SELECT * FROM customers";
                            $cu_option_run = mysqli_query($conn, $cu_option);

                            if (mysqli_num_rows($cu_option_run) > 0) {
                                foreach ($cu_option_run as $row2) {
                            ?>
                                    <option value="<?php echo $row2['customer_id']; ?>"> <?php echo $row2['customer_name']; ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Order Quantity</label>
                        <input type="text" class="form-control" id="sell_quntity" name="sell_quntity" placeholder="Sell Quantity" required />
                    </div>
                    <div class="form-group">
                        <label>Selling Price(1 unit)</label>
                        <input type="text" class="form-control" id="selling_price" name="selling_price" placeholder="Selling Price" required />
                    </div>
                    <div class="form-group">
                        <label>Paid Amount</label>
                        <input type="text" class="form-control" id="product_paid" name="product_paid" placeholder="Paid Amount" required />
                    </div>
                    <button type="submit" name="up_order_submit" class="btn btn-success">Update Order</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>