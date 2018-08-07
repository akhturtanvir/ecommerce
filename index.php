<?php
    include_once "common/header.php";
    include_once "classes/Product.php";
?>

<?php
    include_once "common/navbar.php";
?>


    <!-- slider start -->
    <div class="slider-area">
        <div class="bend niceties preview-2">
            <div id="ensign-nivoslider" class="slides">
                <img src="assets/img/slider/1.jpg" alt="" title="#slider-direction-1" />
                <img src="assets/img/slider/2.jpg" alt="" title="#slider-direction-2" />
            </div>
            <!-- direction 1 -->
            <div id="slider-direction-1" class="t-cn slider-direction">
                <div class="container">
                    <div class="slider-content t-lfl s-tb slider-1">
                        <div class="title-container s-tb-c title-compress">
                            <h1 class="title1">amazing Collections</h1>
                            <h2 class="title2">new arrivals !</h2>
                            <h3 class="title3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt <br> doloremque maiores odit
                                perferendis unde et</h3>
                            <a class="btn-hover" href="shop-page.php">shop now <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- direction 2 -->
            <div id="slider-direction-2" class="slider-direction">
                <div class="container">
                    <div class="slider-content s-tb slider-1">
                        <div class="title-container s-tb-c">
                            <h1 class="title1">amazing Collections</h1>
                            <h2 class="title2">new arrivals !</h2>
                            <h3 class="title3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt <br> doloremque maiores odit
                                perferendis unde et</h3>
                            <a class="btn-hover" href="shop-page.php">shop now <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider end -->
    <!-- service area start  -->
    <div class="service-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="single-service addm">
                        <div class="service-icon">
                            <i class="fa fa-bus"></i>
                        </div>
                        <div class="service-text">
                            <h3>FREE SHIIPPING</h3>
                            <p>Guaranteed delivery</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="single-service addm">
                        <div class="service-icon">
                            <i class="fa fa-credit-card"></i>
                        </div>
                        <div class="service-text">
                            <h3>MONEY BACK</h3>
                            <p>30 Days return guarantee</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="single-service addm">
                        <div class="service-icon">
                            <i class="pe-7s-headphones"></i>
                        </div>
                        <div class="service-text">
                            <h3>online support</h3>
                            <p>Call us (+100) 456 7890</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="single-service">
                        <div class="service-icon">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <div class="service-text">
                            <h3>BONUS PLUS</h3>
                            <p>Make fun of shopping</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service area end -->
    <!-- shop area start -->
    <div class="portfolio-area ptb-100">
        <div class="container">
            <div class="section-title text-center mb-50">
                <h2>Featured Collections <i class="fa fa-shopping-cart"></i></h2>
            </div>
            <div class="shop-menu portfolio-left-menu text-center mb-50">
                <button class="active" data-filter="*">ALL</button>
                <button data-filter=".mix1">Clothing </button>
                <button data-filter=".mix2">Bags</button>
                <button data-filter=".mix3">Jewelry </button>
                <button data-filter=".mix4">WATCHES </button>
            </div>
            <div class="row portfolio-style-2">
                <div class="grid">

                    <?php

                        $pd = new Product();
                        $getFProduct = $pd->getFeaturedProduct();
                        if ($getFProduct) {
                          $i = 0;
                          foreach ($getFProduct as $data) {
                            $i++;

                    ?>

                    <div class="col-md-3 col-sm-6 col-xs-12 grid-item mb-50

                    <?php
                    if ($data['catName'] == 'Clothing'){
                    ?>
                        mix1

                    <?php }elseif ($data['catName'] == 'Bags'){ ?>

                        mix2

                    <?php }elseif ($data['catName'] == 'Jewelary'){ ?>

                        mix3

                    <?php }elseif ($data['catName'] == 'Watches'){ ?>

                        mix4

                    <?php } ?>

                    ">
                        <div class="single-shop">
                            <div class="shop-img">
                                <a href="details.php?productId=<?php echo $data['productId'] ?>"><img src="Admin/<?php echo $data['image'] ?>" style="height: 300px; width: 300px;" alt="" /></a>
                                <div class="price-up-down">
                                    <span class="sale-new">sale</span>
                                </div>
                                <div class="button-group">
                                    <a href="cart.php?productId=<?php echo $data['productId'] ?>" title="Add to Cart">
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

                </div>
            </div>
            <div class="text-center">
                <a class="hvr-shutter-out-horizontal" href="shopPage.php">view more <i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>
    </div>
    <!-- shop area end -->
    <!-- subscribe area start -->
    <div class="offer-area shop-text bg-opacity-black-90">
        <div class="container">
            <div class="subscribe-bg ptb-80">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 ">
                        <div class="offer-text text-center">
                            <h3>unlimited offer</h3>
                            <div class="text-center">
                                <a class="hvr-shutter-out-horizontal" href="shop-page.php">shop now <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- subscribe area end -->
    <!-- special-offer area start -->
    <div class="special-offer ptb-100">
        <div class="container">
            <div class="section-title text-center mb-50">
                <h2>New Collections <i class="fa fa-shopping-cart"></i></h2>
            </div>
            <div class="row">
                <div class="special-slider-active owl-carousel">

                    <?php
                    
                        $getNProduct = $pd->getNewProduct();
                        if ($getNProduct) {
                          $i = 0;
                          foreach ($getNProduct as $data) {
                            $i++;

                    ?>

                    <div class="single-special-slider">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <div class="single-shop">
                                <div class="shop-img">
                                    <a href="details.php?productId=<?php echo $data['productId'] ?>"><img src="Admin/<?php echo $data['image'] ?>" style="height: 300px; width: 300px;" alt="" /></a>
                                    <div class="price-up-down">
                                        <span class="sale-new">new</span>
                                    </div>
                                    <div class="button-group">
                                        <a href="cart.php?productId=<?php echo $data['productId'] ?>" title="Add to Cart">
                                            <i class="pe-7s-cart"></i>
                                        </a>
                                        <a href="wishlist.php?productId=<?php echo $data['productId'] ?>" class="wishlist" title="Wishlist">
                                            <i class="pe-7s-like"></i>
                                        </a>
                                        <a href="details.php?productId=<?php echo $data['productId'] ?>" title="Details">
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
                    </div>

                        <?php

                            }}else{
                                echo "<h4>Data not Found</h4>";
                            }

                        ?>
                </div>
            </div>
        </div>
    </div>
    <!-- special-offer area end -->
    <!-- blog area start -->
    <div class="blog-area pb-70">
        <div class="container">
            <div class="section-title text-center mb-50">
                <h2>latest news <i class="fa fa-pencil"></i></h2>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="blog-details mb-30">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="assets/img/blog/1.jpg" alt=""></a>
                            <div class="blog-quick-view">
                                <a href="blog-details.html">
                                        <i class="pe-7s-link"></i>
                                    </a>
                            </div>
                        </div>
                        <div class="blog-meta">
                            <h4><a href="blog-details.html">Award ceremony 2018</a></h4>
                            <ul class="meta">
                                <li>08 May 2018</li>
                            </ul>
                            <p>Lorem Ipsum is that it has a more-or-less normal of letters, as opposed to using 'Content here,
                                distribution content here..</p>
                            <a href="blog-details.html">read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="blog-details mb-30">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="assets/img/blog/2.jpg" alt=""></a>
                            <div class="blog-quick-view">
                                <a href="blog-details.html">
                                        <i class="pe-7s-link"></i>
                                    </a>
                            </div>
                        </div>
                        <div class="blog-meta">
                            <h4><a href="blog-details.html">Award ceremony 2018</a></h4>
                            <ul class="meta">
                                <li>08 May 2018</li>
                            </ul>
                            <p>Lorem Ipsum is that it has a more-or-less normal of letters, as opposed to using 'Content here,
                                distribution content here..</p>
                            <a href="blog-details.html">read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm">
                    <div class="blog-details mb-30">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="assets/img/blog/3.jpg" alt=""></a>
                            <div class="blog-quick-view">
                                <a href="blog-details.html">
                                        <i class="pe-7s-link"></i>
                                    </a>
                            </div>
                        </div>
                        <div class="blog-meta">
                            <h4><a href="blog-details.html">Award ceremony 2018</a></h4>
                            <ul class="meta">
                                <li>08 May 2018</li>
                            </ul>
                            <p>Lorem Ipsum is that it has a more-or-less normal of letters, as opposed to using 'Content here,
                                distribution content here..</p>
                            <a href="blog-details.html">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog area end -->


<?php
    include_once "common/subscribe.php";
?>

<?php
    include_once "common/footer.php";
?>

<?php
    include_once "common/jScript.php";
?>