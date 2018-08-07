<?php
    include_once "common/header.php";
    include_once "classes/Cart.php";
?>

<?php
    include_once "common/navbar.php";
?>

<!-- breadcrumbs start -->
<div class="breadcrumbs-area breadcrumb-bg ptb-100">
    <div class="container">
        <div class="breadcrumbs text-center">
            <h2 class="breadcrumb-title">shopping cart</h2>
            <ul>
                <li>
                    <a class="active" href="index.php">Home</a>
                </li>
                <li>cart</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<!-- shopping-cart-area start -->
<div class="cart-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <?php
                    if (isset($_GET['mes']) AND $_GET['mes'] != NULL) {
                        echo "<h4 class='text-danger'>" . $_GET['mes'] . "</h4>";
                    }
                ?>
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th class="product-price">images</th>
                                    <th class="product-name">Product Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-name">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $ct = new Cart();
                                    $getPro = $ct->getCartProduct();
                                    if ($getPro) {
                                        $i = 0;
                                        $sum = 0;
                                      foreach ($getPro as $data) {
                                        $i++;
                                ?>
                                <tr>
                                    <td class="product-price"><?php echo($i); ?></td>
                                    <td class="product-thumbnail">
                                        <a href="details.php?productId=<?php echo $data['productId'] ?>"><img src="Admin/<?php echo $data['image'] ?>" style="height: 75px; width: 75px;" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="details.php?productId=<?php echo $data['productId'] ?>"><?php echo $data['productName']; ?></a></td>
                                    <td class="product-price"><span class="amount">$<?php echo $data['price']; ?></span></td>
                                    <td class="product-quantity">
                                        <input value="<?php echo $data['quantity']; ?>" type="number">
                                    </td>
                                    <td class="product-subtotal">$<?php
                                        $total = ($data['price'] * $data['quantity']);
                                        echo $total;
                                        ?></td>
                                    <td class="product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                </tr>
                              <?php
                                    $sum = $sum + $total;
                                }}else{

                              ?>
                              <tr><td colspan="4"><h4>Data Not Found</h4></td></tr>
                            </tbody>
                            <?php

                              }

                            ?>
                        </table>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12 f-right">
                <div class="cart-total">
                    <div class="cart-total-btn">
                        <div class="cart-total-btn2 f-right">
                            <a href="shopPage.php">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row mt-50">
            <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="tax-coupon-all">
                    <div class="tax-coupon">
                        <ul role="tablist">
                            <li class="active"><a href="#tax" data-toggle="tab">Estimate Shipping & Taxe</a></li>
                            <li><a href="#coupon" data-toggle="tab">Discount Coupon </a></li>
                        </ul>
                    </div>
                    <div class="tax-coupon-details tab-content">
                        <div id="tax" class="shipping-dec tab-pane active">
                            <p>Enter your destination to get a shipping estimate.</p>
                            <div class="shipping-form">
                                <div class="single-shipping-form">
                                    <label class="required get">
                                        country
                                        <em>*</em>
                                    </label>
                                    <select class="email s-email">
                                        <option value="">United States</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Åland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VA">Vatican City</option>
                                        <option value="VE">Venezuela</option>
                                        <option value="VN">Vietnam</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="single-shipping-form">
                                    <label class="required get">
                                        State/Province
                                        <em>*</em>
                                    </label>
                                    <select class="email s-email">
                                        <option value="">Please select region</option>
                                        <option value="1">Alabama</option>
                                        <option value="61">Virginia</option>
                                        <option value="62">Washington</option>
                                        <option value="63">West Virginia</option>
                                        <option value="64">Wisconsin</option>
                                        <option value="65">Wyoming</option>
                                    </select>
                                </div>
                                <div class="single-shipping-form">
                                    <label class="required get">
                                        Zip/Postal Code
                                        <em>*</em>
                                    </label>
                                    <input placeholder="1234567" type="text" required="">
                                </div>
                                <div class="single-shipping-botton">
                                    <button type="submit">
                                        <span>Get a Quote</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="coupon" class="coupon-dec tab-pane">
                            <p>Enter your coupon code if you have one.</p>
                            <label class="required get">
                                coupon
                                <em>*</em>
                            </label>
                            <input placeholder="coupon code" required="" type="text">
                            <button class="coupon-btn" type="submit">
                                Apply Coupon
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="cart-total">
                    <ul>
                        <li>Subtotal<span>$

                            <?php
                                if (isset($sum)) {
                                    echo $sum;
                                 }else{
                                    echo "0";
                                 }
                            ?>
                                
                            </span></li>
                        <li class="cart-black">Vat<span>5%</span></li>
                        <li class="cart-black">Total<span>$
                            <?php
                                if (isset($sum)) {
                                    $vat =($sum * 0.05);
                                    echo($sum + $vat);
                                }else{
                                    echo "0";
                                }
                            ?>

                            </span></li>
                    </ul>
                    <div class="cart-total-btn">
                        <div class="cart-total-btn1 f-left">
                            <a href="#">Proceed to checkout</a>
                        </div>
                        <div class="cart-total-btn2 f-right">
                            <a href="#">Confirm Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- shopping-cart-area end -->


<?php
    include_once "common/subscribe.php";
?>

<?php
    include_once "common/footer.php";
?>

<?php
    include_once "common/jScript.php";
?>