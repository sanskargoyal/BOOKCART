<?php
define('TITLE', 'Checkout'); 
// define('PAGE', 'Cart');
?>

    <!-- Start Head Area -->
    <?php include('winclude/head.php'); ?>

    <!-- Start Header Area -->
    <?php include('winclude/header.php'); ?>

    <!-- Start Banner -->
    <?php include('winclude/banner.php'); ?>

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap mt-5">
        <div class="container">
            <div class="returning_customer">
                <div class="check_title shadow-sm">
                    <h2>Returning Customer? <a href="../userlogin/index.php">Click here to login</a></h2>
                </div>
            </div>
            <div class="billing_details mt-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h3>Billing Details</h3>

                        <?php 
                        include('../connection/config.php');
                        $id = mysqli_real_escape_string($conn, $_GET['user_id']);
                        $sql = "SELECT * FROM user_table WHERE user_id = '$id'";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_array($result)){
                                ?>
                                <div class="card shadow-lg p-4">
                                    <h5><?php echo $row['fname'] ?> <?php echo $row['lname'] ?></h5>
                                    <p><?php echo $row['address'] ?></p>
                                    <p><?php echo $row['phone'] ?></p>
                                    <p><?php echo $row['email'] ?></p>
                                </div>

                                <?php
                            }
                        }else{
                            echo '<div class="check_title">
                            <h2>No Billing Address Found. Please <a href="../userlogin/index.php">Update</a> Details.</h2>
                            </div>';
                        }
                        $conn->close();
                        ?>
                    </div>
                    <div class="col-lg-6">
                        <form action="pages/orders.php?user_id=<?php echo $myid ?>" method="POST">
                        <div class="order_box shadow-lg">
                            <h2>Your Order</h2>

                            <ul class="list">
                                <table>
                                    <tr>
                                        <th colspan="1">Books</th>
                                        <th colspan="2">Quantity</th>
                                        <th colspan="3"></th>
                                        <th colspan="4">Total</th>
                                    </tr>
                                    <?php 
                                    $t=0;
                                    $sub_total = 0;
                                    include('../connection/config.php');
                                    $id = mysqli_real_escape_string($conn, $_GET['user_id']);
                                    $sql = "SELECT * FROM cart_table INNER JOIN book_table ON cart_table.book_id = book_table.book_id WHERE user_id = '$id'";
                                    $result = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($result)>0){
                                        while($row=mysqli_fetch_array($result)){
                                            $sub_total = $row['price']*$row['qty'];
                                            $t += $sub_total; 
                                            echo '<input type="hidden" name="book_id" value="'.$row['book_id'].'">';
                                            ?>


                                            <tr>
                                                <td colspan="1"><?php echo $row['title'] ?></td>

                                                <td colspan="2"><?php echo $row['qty'] ?></td>
                                                <td colspan="3"></td>
                                                <td colspan="4"><?php echo $row['total'] ?></td>
                                            </tr>
                                        




                                        <?php


                                    }
                                }else{
                                    echo '<div><p>No Book Found in Your Cart</p></div>';
                                }


                                ?>
                                </table>
                            </ul>
                            <ul class="list list_2 mt-3">
                                <li>Total <span><?php echo $t ?></span></li>
                            </ul>
                            
                            <div class="payment_item">
                                <div class="form-group">
                                    <input type="radio" id="f-option5" name="payment" value="Cash On Delivery">
                                    <label for="f-option5">Cash On Delivery</label>
                                    <input type="radio" id="f-option6" name="payment" value="Paypal" class="ml-5">

                                    <label for="f-option6">Paypal </label>
                                    <img src="script/img/product/card.jpg" alt="">
                                    <div class="check"></div>
                                    
                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                account.</p>
                                 </div>

                            </div>
                            
                            <input type="hidden" name="total" value="<?php echo $t ?>">
                            <button class="primary-btn form-control" style="outline: none; border: none">Proceed to Paypal</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->


    <!-- Start footer Area -->
    <?php include('winclude/footer.php'); ?>