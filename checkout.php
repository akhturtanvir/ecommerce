<?php
    include_once "common/header.php";
?>

<?php
    include_once "common/navbar.php";
?>
<!-- breadcrumbs start -->
<div class="breadcrumbs-area breadcrumb-bg ptb-100">
    <div class="container">
        <div class="breadcrumbs text-center">
            <h2 class="breadcrumb-title">checkout page</h2>
            <ul>
                <li>
                    <a class="active" href="index-2.html">Home</a>
                </li>
                <li>checkout</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<!-- checkout area start -->
<div class="checkout-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="returning-customer">
                    <h3><i class="fa fa-user"></i> Returning customer? <span id="customer">Click here to login</span></h3>
                    <div id="customer-login" class="coupon-content">
                        <div class="coupon-info">
                            <p class="coupon-text">If you have shopped with us before, please enter your details in the boxes below. If you
                                are a new customer, please proceed to the Billing & Shipping section.</p>
                            <form action="#">
                                <p class="form-row-first">
                                    <label>Username or email <span class="required">*</span></label>
                                    <input type="text" />
                                </p>
                                <p class="form-row-last">
                                    <label>Password  <span class="required">*</span></label>
                                    <input type="text" />
                                </p>
                                <p class="form-row">
                                    <input type="submit" value="Login" />
                                    <label>
                                            <input type="checkbox" />
                                             Remember me 
                                        </label>
                                </p>
                                <p class="lost-password">
                                    <a href="#">Lost your password?</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="customer-coupon">
                    <h3><i class="fa fa-square-o"></i> Have a coupon? <span id="coupon">Click here to enter your code</span></h3>
                    <div id="have-coupon" class="coupon-checkout-content">
                        <div class="coupon-info">
                            <form action="#">
                                <p class="checkout-coupon">
                                    <label>
                                        Coupon code
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" />
                                    <input class="coupon-submit" type="submit" value="Apply Coupon" />
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="billing-details-area">
                    <h2>Billing details</h2>
                    <form action="#">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="billing-input">
                                    <label>
                                        First Name
                                        <span class="required">*</span>
                                    </label>
                                    <input placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="billing-input">
                                    <label>
                                        First Name
                                        <span class="required">*</span>
                                    </label>
                                    <input placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="billing-input">
                                    <label>
                                        Company Name 
                                        <span class="required">*</span>
                                    </label>
                                    <input placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="billing-input">
                                    <label>
                                        Country 
                                        <span class="required">*</span>
                                    </label>
                                    <select>
                                        <option value="audi2">Albania</option>
                                        <option value="mercedes">Afghanistan</option>
                                        <option value="audi">Ghana</option>
                                        <option value="audi3">Bahrain</option>
                                        <option value="audi4">Colombia</option>
                                        <option value="audi5">Dominican Republic</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="billing-input">
                                    <label>
                                        Address
                                        <span class="required">*</span>
                                    </label>
                                    <input placeholder="Street address" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="billing-input">
                                    <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="billing-input">
                                    <label>
                                        Town / City
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="billing-input">
                                    <label>
                                        State / County
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="billing-input">
                                    <label>
                                        Postcode / Zip
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="billing-input">
                                    <label>
                                        Phone 
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="billing-input">
                                    <label>
                                        Email Address
                                        <span class="required">*</span>
                                    </label>
                                    <input type="email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="billing-input">
                                    <input id="cbox" type="checkbox">
                                    <label>Create an account?</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="billing-input">
                                    <label>
                                        Order Notes
                                        <span class="required">*</span>
                                    </label>
                                    <textarea id="checkout-mess" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="your-order-payment">
                    <div class="your-order">
                        <h2>Your Order</h2>
                        <ul>
                            <li>luxury bag x 1 <span>$ 299.00</span></li>
                            <li>Cart Subtotal <span>$ 299.00</span></li>
                            <li>Shipping <span>$ 100.00</span></li>
                            <li class="order-total">Order Total <span>$ 399.00</span></li>
                        </ul>
                    </div>
                    <div class="your-payment">
                        <h2>payment method</h2>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Direct Bank Transfer
                                                    </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <p>Make your payment directly into our bank account. Please use your Order
                                                    ID as the payment reference. Your order won’t be shipped until the
                                                    funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                                    aria-controls="collapseTwo">
                                                    Cheque Payment
                                                    </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <p>Please send your cheque to Store Name, Store Street, Store Town, Store
                                                    State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                    PayPal
                                                    </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                                    PayPal account.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment">
                                    <input type="submit" value="Place order" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    include_once "common/subscribe.php";
?>

<?php
    include_once "common/footer.php";
?>

<?php
    include_once "common/jScript.php";
?>