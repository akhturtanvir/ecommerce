<?php
    include_once "common/header.php";
    include_once "classes/Product.php";
    include_once "classes/Cart.php";
?>

<?php
    include_once "common/navbar.php";
?>
<?php

    $ct =new Cart();
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['productId'])) {
        $id = $_GET['productId'];
        $quantity = $_GET['quantity'];
        $addCart = $ct->addToCart($quantity, $id);
    }
?>
    <!-- breadcrumbs start -->
    <div class="breadcrumbs-area breadcrumb-bg ptb-100">
        <div class="container">
            <div class="breadcrumbs text-center">
                <h2 class="breadcrumb-title">shop page</h2>
                <ul>
                    <li>
                        <a class="active" href="index.php">Home</a>
                    </li>
                    <li>shop</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- login area end -->
    <div class="shop-page-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="blog-sidebar">
                        <div class="single-sidebar">
                            <h3 class="sidebar-title">Choose Price</h3>
                            <div class="price-filter">
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <input type="text" id="amount" name="price" />
                                </div>
                            </div>
                        </div>
                        <div class="single-sidebar">
                            <h3 class="sidebar-title">Category</h3>
                            <div class="sidebar-list">
                                <ul>
                                    <li><input type="checkbox"> <a href="#">Dresses (7)</a></li>
                                    <li><input type="checkbox"> <a href="#">Accessories (9)</a></li>
                                    <li><input type="checkbox"> <a href="#">Tops (3)</a></li>
                                    <li><input type="checkbox"> <a href="#">Handbags (1)</a></li>
                                    <li><input type="checkbox"> <a href="#">Watches (7)</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-sidebar">
                            <h3 class="sidebar-title">Choose color</h3>
                            <div class="sidebar-list">
                                <ul>
                                    <li><input type="checkbox"> <a href="#">red (8)</a></li>
                                    <li><input type="checkbox"> <a href="#">green (5)</a></li>
                                    <li><input type="checkbox"> <a href="#">blue (2)</a></li>
                                    <li><input type="checkbox"> <a href="#">black (6)</a></li>
                                    <li><input type="checkbox"> <a href="#">Pink (7)</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-sidebar">
                            <h3 class="sidebar-title">Our Brand</h3>
                            <div class="sidebar-list">
                                <ul>
                                    <li><input type="checkbox"> <a href="#">Nike (8)</a></li>
                                    <li><input type="checkbox"> <a href="#">Religion (2)</a></li>
                                    <li><input type="checkbox"> <a href="#">Diesel (5)</a></li>
                                    <li><input type="checkbox"> <a href="#">Monki (8)</a></li>
                                    <li><input type="checkbox"> <a href="#">iaan (7)</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-sidebar">
                            <h3 class="sidebar-title">Popular Tags</h3>
                            <div class="tag">
                                <ul>
                                    <li><a href="#">Clothing</a></li>
                                    <li><a href="#">accessories</a></li>
                                    <li><a href="#">fashion</a></li>
                                    <li><a href="#">footwear</a></li>
                                    <li><a href="#">kid</a></li>
                                    <li><a href="#">View All Tags</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-sidebar">
                            <div class="sidebar-img-text">
                                <div class="sidebar-img">
                                    <a href="#">
                                        <img src="assets/img/shop/2.jpg" alt="">
                                    </a>
                                    <div class="sidebar-text">
                                        <h3>save up to </h3>
                                        <h2>40% off</h2>
                                        <h3>cap</h3>
                                        <a href="#">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="blog-wrapper shop-page-mrg">
                        <div class="tab-menu-product">
                            <div class="tab-menu-sort">
                                <div class="tab-menu">
                                    <ul role="tablist">
                                        <li class="active">
                                            <a href="#grid" data-toggle="tab">
                                                <i class="fa fa-th-large"></i> Grid
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#list" data-toggle="tab">
                                                <i class="fa fa-align-justify"></i> List
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-sort">
                                    <label>Sort By : </label>
                                    <select>
                                            <option value="">Position</option>
                                            <option value="">Popularity</option>
                                            <option value="">Price</option>
                                            <option value="">Average rating</option>
                                        </select>
                                </div>
                            </div>
                            <div class="tab-product">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="grid">
                                        <div class="row">

                                            <?php

                                                $pd = new Product();
                                                $getAllPd = $pd->getAllProduct();
                                                if ($getAllPd) {
                                                  $i = 0;
                                                  foreach ($getAllPd as $data) {
                                                    $i++;

                                            ?>
                                            <div class="col-md-6 col-lg-4 col-sm-6">
                                                <div class="single-shop mb-40">
                                                    <div class="shop-img">
                                                        <a href="details.php?productId=<?php echo $data['productId'] ?>"><img src="Admin/<?php echo $data['image'] ?>" style="height: 300px; width: 300px;" alt="" /></a>
                                                        <div class="price-up-down">
                                                            <span class="sale-new">sale</span>
                                                        </div>
                                                        <div class="button-group">
                                                            <a href="?productId=<?php echo $data['productId'] ?>&quantity=1" title="Add to Cart">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                            <a href="wishlist.php?productId=<?php echo $data['productId'] ?>" class="wishlist" title="Wishlist">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                            <a href="details.php?productId=<?php echo $data['productId'] ?>"title="Details">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="shop-text-all">
                                                        <div class="title-color fix">
                                                            <div class="shop-title f-left">
                                                                <h3><a href="#"><?php echo $data['catName']; ?></a></h3>
                                                            </div>
                                                            <div class="price f-right">
                                                                <span class="new">$<?php echo $data['price']; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php

                                                }}else{
                                                    echo "<h4>Data not Found</h4>";
                                                }
                                            ?>

                                            <!-- <div class="col-md-6 col-lg-4 col-sm-6">
                                                <div class="single-shop mb-40">
                                                    <div class="shop-img">
                                                        <a href="#"><img src="assets/img/shop/equal/11.jpg" alt="" /></a>
                                                        <div class="price-up-down">
                                                            <span class="sale-new">sale</span>
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
                                                                <h3><a href="#">Handbag</a></h3>
                                                            </div>
                                                            <div class="price f-right">
                                                                <span class="new">$342.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->

                                        </div>
                                    </div>
                                    <div class="tab-pane mb-10" id="list">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">

                                                    <?php

                                                        $pd = new Product();
                                                        $getAllPd = $pd->getAllProduct();
                                                        if ($getAllPd) {
                                                          $i = 0;
                                                          foreach ($getAllPd as $data) {
                                                            $i++;

                                                    ?>

                                                    <div class="single-shop mb-30">
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <div class="shop-list-left">
                                                                <div class="shop-img">
                                                                    <a href="details.php?productId=<?php echo $data['productId'] ?>"><img src="Admin/<?php echo $data['image'] ?>" style="height: 265px; width: 265px;" alt="" /></a>
                                                                    <div class="shop-quick-view">
                                                                        <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                                            <i class="pe-7s-look"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="price-up-down">
                                                                        <span class="sale-new">-30%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <div class="shop-list-right">
                                                                <div class="shop-list-all">
                                                                    <div class="shop-list-name">
                                                                        <h3><a href="#"><?php echo $data['productName'] ?></a></h3>
                                                                    </div>
                                                                    <div class="shop-list-rating">
                                                                        <span class="ratting">
                                                                                <i class="fa fa-star active"></i>
                                                                                <i class="fa fa-star active"></i>
                                                                                <i class="fa fa-star active"></i>
                                                                                <i class="fa fa-star active"></i>
                                                                                <i class="fa fa-star active"></i>
                                                                            </span>
                                                                    </div>
                                                                    <p><?php echo $data['body'] ?></p>
                                                                    <div class="shop-list-price">
                                                                        <span class="list-price">
                                                                                <span class="new">$<?php echo $data['price'] ?></span>
                                                                        <span class="old">$110.00</span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="shop-list-cart">
                                                                        <div class="shop-group">
                                                                            <a href="?productId=<?php echo $data['productId'] ?>&quantity=1" title="Add to Cart">
                                                                                <i class="pe-7s-cart"></i> add to cart
                                                                            </a>
                                                                            <a class="wishlist" href="wishlist.php?productId=<?php echo $data['productId'] ?>" title="Wishlist">
                                                                                <i class="pe-7s-like"></i> Wishlist
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                        <?php

                                                            }}else{
                                                                echo "<h4>Data not Found</h4>";
                                                            }
                                                        ?>
                                                    <!-- <div class="single-shop mb-30">
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <div class="shop-list-left">
                                                                <div class="shop-img">
                                                                    <a href="#"><img src="assets/img/shop/equal/9.jpg" alt="" /></a>
                                                                    <div class="shop-quick-view">
                                                                        <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                                            <i class="pe-7s-look"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="price-up-down">
                                                                        <span class="sale-new">new</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <div class="shop-list-right">
                                                                <div class="shop-list-all">
                                                                    <div class="shop-list-name">
                                                                        <h3><a href="#">Product Title</a></h3>
                                                                    </div>
                                                                    <div class="shop-list-rating">
                                                                        <span class="ratting">
                                                                                <i class="fa fa-star active"></i>
                                                                                <i class="fa fa-star active"></i>
                                                                                <i class="fa fa-star active"></i>
                                                                                <i class="fa fa-star active"></i>
                                                                                <i class="fa fa-star active"></i>
                                                                            </span>
                                                                    </div>
                                                                    <p>Lorem ipsum dolor sit amet, adipiscing elit. Nam fringilla
                                                                        augue nec est auctor. Donec non est at libero vulputate
                                                                        rutrum. Morbi ornare lectus quis justo gravida semper.
                                                                        Nulla tellus mi, vulputate adipiscing cursus eu,
                                                                        odio...
                                                                    </p>
                                                                    <div class="shop-list-price">
                                                                        <span class="list-price">
                                                                                <span class="new">$160.00</span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="shop-list-cart">
                                                                        <div class="shop-group">
                                                                            <a href="#" title="Add to Cart">
                                                                                <i class="pe-7s-cart"></i> add to cart
                                                                            </a>
                                                                            <a class="wishlist" href="#" title="Wishlist">
                                                                                <i class="pe-7s-like"></i> Wishlist
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="page-pagination text-center">
                                        <ul>
                                            <li><a class="active" href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login area end -->


<?php
    include_once "common/subscribe.php";
?>

<?php
    include_once "common/footer.php";
?>

<?php
    include_once "common/jScript.php";
?>