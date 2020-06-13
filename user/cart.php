<?php
define('TITLE', 'Cart'); 
// define('PAGE', 'Cart');
?>
<!-- Start Head Area -->
<?php include('winclude/head.php'); ?>

<!-- Start Header Area -->
<?php include('winclude/header.php'); ?>

<!-- Start Banner -->
<?php include('winclude/banner.php'); ?>

<!--================Cart Area =================-->
<section class="cart_area mt-5">
	<div class="container">
		<div class="cart_inner">
			<div class="table-responsive">
				<table class="table">
					<thead>

						<tr>
							<th scope="col">Book</th>
							<th scope="col">Price</th>
							<th scope="col">Quantity</th>
							<th scope="col">Total</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$t=0;
						$sub_total = 0;
						include('../connection/config.php');
						$id = mysqli_real_escape_string($conn, $_GET['user_id']);
						$sql = "SELECT * FROM cart_table INNER JOIN book_table ON cart_table.book_id = book_table.book_id WHERE user_id = '$id'";
						$result = mysqli_query($conn, $sql);
						if(mysqli_num_rows($result)>0){
							while($row=mysqli_fetch_array($result)){
                        			// $product_price = $row['product_price'];
								$sub_total = $row['price']*$row['qty'];
								$t += $sub_total; 
								?>

								<tr>
									<td>
										<div class="media">
											<div class="d-flex">
												<img src="../admin/pages/product_images/<?php echo $row['image'] ?>" alt="<?php echo $row['image'] ?>" style="height: 100px;">

											</div>
											<div class="media-body">
												<p><?php echo $row['title'] ?></p>
												<small><b><?php echo $row['author'] ?></b>,&nbsp;&nbsp;<?php echo $row['language'] ?>,&nbsp;&nbsp;<?php echo $row['binding'] ?></small>
											</div>
										</div>
									</td>
									<td>
										<h5>Rs. <?php echo $row['price'] ?></h5>
									</td>
									<td>
										<?php echo $row['qty'] ?>
									</td>
									<td>
										<h5>Rs. <?php echo $row['total'] ?></h5>
									</td>
								</tr>
								<?php

							}
						}else{
							echo '<div><p>No Book Found in Your Cart</p></div>';
						}
						

						?>
                          <!--   <tr class="bottom_button">
                                <td>
                                    <a class="gray_btn" href="#">Update Cart</a>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="cupon_text d-flex align-items-center">
                                        <input type="text" placeholder="Coupon Code">
                                        <a class="primary-btn" href="#">Apply</a>
                                        <a class="gray_btn" href="#">Close Coupon</a>
                                    </div>
                                </td>
                            </tr>
                            <tr> -->
                            	<td>

                            	</td>
                            	<td>

                            	</td>
                            	<td>
                            		<h5>Subtotal</h5>
                            	</td>
                            	<td>
                            		<h5><?php echo $t;
                            		$conn->close();
                            		?></h5>
                            	</td>
                            </tr>
                            <?php 
                            include('../connection/config.php');
                            $id = mysqli_real_escape_string($conn, $_GET['user_id']);
                            $sqla = "SELECT * FROM user_table WHERE user_id = '$id' LIMIT 1";
                            $resulta = mysqli_query($conn, $sqla);
                            if(mysqli_num_rows($resulta)>0){
                            	$rowa=mysqli_fetch_array($resulta);
                            	
                            	?>
                            	<tr class="shipping_area">
                            		<td>

                            		</td>
                            		<td>

                            		</td>
                            		<td>
                            			<h5>Shipping:</h5>
                            		</td>
                            		<td>
                            			<?php 
                            			echo $rowa['address'];
                            			?>
                            		</td>
                            	</tr>
                            	<?php 
                            }
                            else{
                            	echo '<div><p>No Address Found Please Update Your Address.</p></div>';
                            }
                            $conn->close();
                            ?>
                            <tr>
                            	<td>
                            		
                            	</td>
                            	<td>
                            		
                            	</td>
                            	<td>

                            		<div class="shipping_box">
                            			
                                        <!-- <ul class="list">
                                            <li><a href="#">Flat Rate: $5.00</a></li>
                                            <li><a href="#">Free Shipping</a></li>
                                            <li><a href="#">Flat Rate: $10.00</a></li>
                                            <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                        </ul>
                                        <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                        <select class="shipping_select">
                                            <option value="1">Bangladesh</option>
                                            <option value="2">India</option>
                                            <option value="4">Pakistan</option>
                                        </select>
                                        <select class="shipping_select">
                                            <option value="1">Select a State</option>
                                            <option value="2">Select a State</option>
                                            <option value="4">Select a State</option>
                                        </select>
                                        <input type="text" placeholder="Postcode/Zipcode"> -->
                                        
                                        <a class="gray_btn" href="address.php">Update Details</a>
                                    </div>
                                </td>
                            </tr>
                            
                            <tr class="out_button_area">
                            	<td>

                            	</td>
                            	<td>

                            	</td>
                            	<td>

                            	</td>
                            	<td>
                            		<div class="checkout_btn_inner d-flex align-items-center">
                            			<a class="gray_btn" href="#">Continue Shopping</a>

                            			<a class="primary-btn" href="checkout.php?user_id=<?php echo $myid ?>">Proceed to checkout</a>
                            		</div>
                            	</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->


    <!-- Start footer Area -->
    <?php include('winclude/footer.php'); ?>