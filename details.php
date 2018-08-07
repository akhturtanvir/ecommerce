<?php
    include_once "common/header.php";
    include_once "classes/Product.php";
    include_once "classes/Cart.php";
?>

<?php
    include_once "common/navbar.php";
?>
<?php
    if (!isset($_GET['productId']) || $_GET['productId'] == NULL) {
        echo "<script>window.location = '404.php'</script";
    }else{
        $id = $_GET['productId'];
    }
?>

<?php

    $ct =new Cart();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnCart'])) {
        $quantity = $_POST['quantity'];
        $addCart = $ct->addToCart($quantity, $id);
    }
?>

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnWishlist'])) {
        $quantity = $_POST['quantity'];
    }

?>

    <!-- breadcrumbs start -->
    <div class="breadcrumbs-area breadcrumb-bg ptb-100">
        <div class="container">
            <div class="breadcrumbs text-center">
                <h2 class="breadcrumb-title">Product Details</h2>
                <ul>
                    <li>
                        <a class="active" href="index.php">Home</a>
                    </li>
                    <li>Product Details</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- single product area start -->
    <div class="single-product-area ptb-100">
        <div class="container">

            <?php
                $pd = new Product();
                $getpd = $pd->getSingleProduct($id);
                if ($getpd) {
                  $i = 0;
                  foreach ($getpd as $data) {
                    $i++;
            ?>

            <div class="row">
                <div class="col-md-5">
                    <div class="product-details-tab">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="product1">
                                <div class="large-img">
                                    <img src="Admin/<?php echo $data['image'] ?>" alt="" />
                                </div>
                            </div>
                        </div>
                        <!-- Nav tabs -->
                        <div class="details-tab owl-carousel">
                            <div class="active"><a href="#product1" data-toggle="tab"><img src="assets/img/shop/3.jpg" alt="" /></a></div>
                            <div><a href="#product2" data-toggle="tab"><img src="assets/img/shop/4.jpg" alt="" /></a></div>
                            <div><a href="#product3" data-toggle="tab"><img src="assets/img/shop/5.jpg" alt="" /></a></div>
                            <div><a href="#product4" data-toggle="tab"><img src="assets/img/shop/6.jpg" alt="" /></a></div>
                            <div><a href="#product5" data-toggle="tab"><img src="assets/img/shop/3.jpg" alt="" /></a></div>
                            <div><a href="#product6" data-toggle="tab"><img src="assets/img/shop/4.jpg" alt="" /></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-content">
                        <div class="single-product-dec pb-30  for-pro-border">
                            <h2><?php echo $data['productName']; ?></h2>
                            <span class="ratting">
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                </span>
                            <h3>$<?php echo $data['price']; ?></h3>
                            <p><?php echo $data['body']; ?></p>
                        </div>
                        <div class="single-cart-color for-pro-border">
                            <p>availability : <span>in stock</span></p>
                            <div class="pro-color pro-color-style-2">
                                <p>color :</p>
                                <ul>
                                    <li class="blue">b</li>
                                    <li class="orange">o</li>
                                    <li class="purple">p</li>
                                    <li class="pink">p</li>
                                </ul>
                            </div>
                            <div class="pro-color-size">
                                <p>size :</p>
                                <ul>
                                    <li><a href="#">xs</a></li>
                                    <li><a href="#">s</a></li>
                                    <li><a href="#">m</a></li>
                                    <li><a href="#">l</a></li>
                                    <li><a href="#">xl</a></li>
                                </ul>
                            </div>
                            <div class="model">
                                <p>model : <span>nms005</span></p>
                            </div>
                            <form action="" method="POST">
                                <div class="pro-quality">
                                    <p>Quantity:</p>
                                    <input value="1" type="number" name="quantity">
                                </div>
                                <div class="single-pro-cart">
                                    <button title="Add to Cart" type="submit" name="btnCart">
                                        <i class="pe-7s-cart"></i>
                                        add to cart
                                    </button>
                                    <button title="wishlist" type="submit" name="btnWishlist">
                                        <i class="pe-7s-like"></i>
                                        wishlist
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="pro-category-tag ptb-30 for-pro-border">
                            <div class="pro-category">
                                <p>categories :</p>
                                <ul>
                                    <li><a href="#">fashion</a></li>
                                    <li><a href="#">kid</a></li>
                                    <li><a href="#">men</a></li>
                                    <li><a href="#">women</a></li>
                                    <li><a href="#">Watche</a></li>
                                </ul>
                            </div>
                            <div class="pro-tag">
                                <p>tags :</p>
                                <ul>
                                    <li>
                                        <a href="#">Clothing</a>
                                    </li>
                                    <li>
                                        <a href="#">accessories</a>
                                    </li>
                                    <li>
                                        <a href="#">fashion</a>
                                    </li>
                                    <li>
                                        <a href="#">footwear</a>
                                    </li>
                                    <li>
                                        <a href="#">kid</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="pro-shared">
                            <p>shared :</p>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <?php

                }}else{
                    echo "<h4>Data not Found</h4>";
                }

            ?>


        </div>
    </div>
    <!-- single product area end -->
    <!-- single product area end -->
    <div class="single-product-dec-area">
        <div class="container">
            <div class="single-product-dec-tab">
                <ul role="tablist">
                    <li class="active">
                        <a href="#description" data-toggle="tab">
                            description
                        </a>
                    </li>
                    <li>
                        <a href="#reviews" data-toggle="tab">
                            reviews
                        </a>
                    </li>
                </ul>
            </div>
            <div class="single-product-dec pb-100">
                <div class="tab-content">
                    <div class="tab-pane active" id="description">
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean
                            massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                            Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis
                            enim.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                            mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa
                            quis enim.</p>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean
                            massa. Cum sociis natoque penatibus et magnis dis parturient montes Cum sociis natoque penatibus
                            et magnis dis parturient montes.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                            commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient
                            montes Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                    </div>
                    <div class="tab-pane" id="reviews">
                        <div class="customer-reviews-all">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><a href="#">themedream1</a> Review by AbcThemes</p>
                                    <div class="single-reviews">
                                        <div class="single-reviews-left">
                                            <p>Quality :</p>
                                        </div>
                                        <div class="single-reviews-right">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="single-reviews">
                                        <div class="single-reviews-left">
                                            <p>Price :</p>
                                        </div>
                                        <div class="single-reviews-right">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="single-reviews">
                                        <div class="single-reviews-left">
                                            <p>Value :</p>
                                        </div>
                                        <div class="single-reviews-right">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p>themedream1 (Posted on 27/09/2018) </p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-add table-responsive">
                                        <form action="#">
                                            <div class="form-border">
                                                <div class="add-text">
                                                    <h3>
                                                        You're reviewing:
                                                        <span>product title</span>
                                                    </h3>
                                                    <p>
                                                        How do you rate this product?*
                                                    </p>
                                                </div>
                                                <table class="data-table">
                                                    <tr>
                                                        <th></th>
                                                        <th>1 star</th>
                                                        <th>2 stars</th>
                                                        <th>3 stars</th>
                                                        <th>4 stars</th>
                                                        <th>5 stars</th>
                                                    </tr>
                                                    <tr>
                                                        <td class="one">Quality</td>
                                                        <td><input type="radio" name="ratings" required></td>
                                                        <td><input type="radio" name="ratings" required></td>
                                                        <td><input type="radio" name="ratings" required></td>
                                                        <td><input type="radio" name="ratings" required></td>
                                                        <td><input type="radio" name="ratings" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="one">Price</td>
                                                        <td><input type="radio" name="ratings" required></td>
                                                        <td><input type="radio" name="ratings" required></td>
                                                        <td><input type="radio" name="ratings" required></td>
                                                        <td><input type="radio" name="ratings" required></td>
                                                        <td><input type="radio" name="ratings" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="one">Value</td>
                                                        <td><input type="radio" name="ratings" required></td>
                                                        <td><input type="radio" name="ratings" required></td>
                                                        <td><input type="radio" name="ratings" required></td>
                                                        <td><input type="radio" name="ratings" required></td>
                                                        <td><input type="radio" name="ratings" required></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="reviews-form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input placeholder="Your name" type="text">
                                                </div>
                                                <div class="col-md-6">
                                                    <input placeholder="Summary of Your Review" type="text">
                                                </div>
                                                <div class="col-md-12">
                                                    <textarea id="contact_message" name="message" placeholder="Review"></textarea>
                                                    <button class="reviews-btn" type="submit" name="submit">Submit Review</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="features-tab pb-100">
                <div class="home-2-tab">
                    <ul role="tablist">
                        <li class="active">
                            <a href="#dresses" data-toggle="tab">
                                    related post 
                                </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="dresses">
                        <div class="row">
                            <div class="product-curosel product-curosel-style owl-carousel">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="single-shop">
                                        <div class="shop-img">
                                            <a href="#"><img src="assets/img/shop/equal/1.jpg" alt="" /></a>
                                            <div class="price-up-down">
                                                <span class="sale-new">new</span>
                                            </div>
                                            <div class="button-group">
                                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#quick-view">
                                                    <i class="pe-7s-cart"></i>
                                                </a>
                                                <a class="wishlist" href="#" title="Wishlist" data-toggle="modal" data-target="#quick-view">
                                                    <i class="pe-7s-like"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                    <i class="pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="shop-text-all">
                                            <div class="title-color fix">
                                                <div class="shop-title f-left">
                                                    <h3><a href="#">Perfume</a></h3>
                                                </div>
                                                <div class="price f-right">
                                                    <span class="new">$340.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="single-shop">
                                        <div class="shop-img">
                                            <a href="#"><img src="assets/img/shop/equal/2.jpg" alt="" /></a>
                                            <div class="price-up-down">
                                                <span class="sale-new">new</span>
                                            </div>
                                            <div class="button-group">
                                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#quick-view">
                                                    <i class="pe-7s-cart"></i>
                                                </a>
                                                <a class="wishlist" href="#" title="Wishlist" data-toggle="modal" data-target="#quick-view">
                                                    <i class="pe-7s-like"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                    <i class="pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="shop-text-all">
                                            <div class="title-color fix">
                                                <div class="shop-title f-left">
                                                    <h3><a href="#">Perfume</a></h3>
                                                </div>
                                                <div class="price f-right">
                                                    <span class="new">$340.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="single-shop">
                                        <div class="shop-img">
                                            <a href="#"><img src="assets/img/shop/equal/3.jpg" alt="" /></a>
                                            <div class="price-up-down">
                                                <span class="sale-new">new</span>
                                            </div>
                                            <div class="button-group">
                                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#quick-view">
                                                    <i class="pe-7s-cart"></i>
                                                </a>
                                                <a class="wishlist" href="#" title="Wishlist" data-toggle="modal" data-target="#quick-view">
                                                    <i class="pe-7s-like"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                    <i class="pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="shop-text-all">
                                            <div class="title-color fix">
                                                <div class="shop-title f-left">
                                                    <h3><a href="#">Perfume</a></h3>
                                                </div>
                                                <div class="price f-right">
                                                    <span class="new">$340.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="single-shop">
                                        <div class="shop-img">
                                            <a href="#"><img src="assets/img/shop/equal/8.jpg" alt="" /></a>
                                            <div class="price-up-down">
                                                <span class="sale-new">new</span>
                                            </div>
                                            <div class="button-group">
                                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#quick-view">
                                                    <i class="pe-7s-cart"></i>
                                                </a>
                                                <a class="wishlist" href="#" title="Wishlist" data-toggle="modal" data-target="#quick-view">
                                                    <i class="pe-7s-like"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                    <i class="pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="shop-text-all">
                                            <div class="title-color fix">
                                                <div class="shop-title f-left">
                                                    <h3><a href="#">Perfume</a></h3>
                                                </div>
                                                <div class="price f-right">
                                                    <span class="new">$340.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="single-shop">
                                        <div class="shop-img">
                                            <a href="#"><img src="assets/img/shop/equal/4.jpg" alt="" /></a>
                                            <div class="price-up-down">
                                                <span class="sale-new">new</span>
                                            </div>
                                            <div class="button-group">
                                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#quick-view">
                                                    <i class="pe-7s-cart"></i>
                                                </a>
                                                <a class="wishlist" href="#" title="Wishlist" data-toggle="modal" data-target="#quick-view">
                                                    <i class="pe-7s-like"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                    <i class="pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="shop-text-all">
                                            <div class="title-color fix">
                                                <div class="shop-title f-left">
                                                    <h3><a href="#">Perfume</a></h3>
                                                </div>
                                                <div class="price f-right">
                                                    <span class="new">$340.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="single-shop">
                                        <div class="shop-img">
                                            <a href="#"><img src="assets/img/shop/equal/5.jpg" alt="" /></a>
                                            <div class="price-up-down">
                                                <span class="sale-new">new</span>
                                            </div>
                                            <div class="button-group">
                                                <a href="#" title="Add to Cart" data-toggle="modal" data-target="#quick-view">
                                                    <i class="pe-7s-cart"></i>
                                                </a>
                                                <a class="wishlist" href="#" title="Wishlist" data-toggle="modal" data-target="#quick-view">
                                                    <i class="pe-7s-like"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                    <i class="pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="shop-text-all">
                                            <div class="title-color fix">
                                                <div class="shop-title f-left">
                                                    <h3><a href="#">Perfume</a></h3>
                                                </div>
                                                <div class="price f-right">
                                                    <span class="new">$340.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single product area end -->


<?php
    include_once "common/subscribe.php";
?>

<?php
    include_once "common/footer.php";
?>

<?php
    include_once "common/jScript.php";
?>