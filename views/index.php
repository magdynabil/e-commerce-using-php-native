<?php

include_once "layout/header.php";
include_once "layout/navbar.php";
include_once __DIR__ . "/../app/models/Product.php";
include_once __DIR__ . "/../app/models/Offer.php";

$productObject = new Product;
$offerObject = new Offer;
$offersResult = $offerObject->selectData();
$topOffersResult = $offerObject->getTopOffers();

const percent_discount = 0;
const fixed_discount = 1;
?>
<!-- Slider Start -->
<div class="slider-area">
    <div class="slider-active owl-dot-style owl-carousel">
        <?php
        if ($offersResult) {
            $offers = $offersResult->fetch_all(MYSQLI_ASSOC);
            foreach ($offers as $key => $offer) {
        ?>
                <a href="shop.php?offer=<?= $offer['id'] ?>">
                    <div class="single-slider ptb-240 bg-img" style="background-image:url(../assets/img/slider/<?= $offer['image'] ?>);">
                        <div class="container">
                            <div class="slider-content slider-animated-1">
                                <h1 class="animated "> <span class="theme-color fw-bold fs-2">-<?= $offer['discount'] ?><?= ($offer['discount_type'] == percent_discount) ? '%' : 'EGP' ?> Sale</span> </h1>
                                <h2 class="animated text-wrap col-4"><?= $offer['title'] ?></h2>
                            </div>
                        </div>
                    </div>
                </a>
            <?php
            }
        } else {
            ?>
            <div class="single-slider ptb-240 bg-img" style="background-image:url(../assets/img/slider/nooffer.png);">
            </div>
        <?php
        }
        ?>
    </div>
</div>
<!-- Slider End -->
<!-- Newest Product Start -->
<div class="product-area bg-image-1 pt-100 pb-95">
    <div class="container ">
        <div class="product-top-bar section-border mb-55">
            <div class="section-title-wrap text-center">
                <h3 class="section-title">New Products</h3>
            </div>
        </div>
        <div class="row">


            <?php
            $newestFourProducts = $productObject->getNewestFourProducts();
            $getProductByIDResult = $newestFourProducts->fetch_all(MYSQLI_ASSOC);
            if ($getProductByIDResult) {

                foreach ($getProductByIDResult  as $key => $product) {
            ?>
                    <div class=" col-3 product-nav">
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="product-details.php?id=<?= $product['id'] ?>">
                                    <img alt="" width="270" height="287" src="../assets/img/product/<?= $product['image'] ?>">
                                </a>
                                <div class="product-action">
                                    <a class="action-wishlist" href="product-details.php?id=<?= $product['id'] ?>" title="Wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="action-cart" href="product-details.php?id=<?= $product['id'] ?>" title="Add To Cart">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="action-compare" href="product-details.php?id=<?= $product['id'] ?>" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content text-left">
                                <div class="product-hover-style">
                                    <div class="product-title">
                                        <h4>
                                            <a href="product-details.php?id=1"><?= $product['name_en'] ?></a>
                                        </h4>
                                    </div>
                                    <div class="cart-hover">
                                        <h4><a href="product-details.php">+ Add to cart</a></h4>
                                    </div>
                                </div>
                                <div class="product-price-wrapper">
                                    <span><?= $product['price'] ?> EGP</span>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

        </div>
    </div>
</div>
<!-- Newest Product End -->
<!-- Banner Start -->
<div class="banner-area pt-100 pb-70">
    <div class="container">
        <div class="banner-wrap">
            <div class="row">
                <?php
                if ($topOffersResult) {
                    $offers = $topOffersResult->fetch_all(MYSQLI_ASSOC);
                    foreach ($offers as $key => $offer) {
                ?>
                       

                        <div class="col-lg-6 col-md-6 bg-secondary pt-3 rounded ">
                            <a href="shop.php?offer=<?= $offer['id'] ?>">
                                <div class="single-banner img-zoom mb-30 ">

                                    <img src="../assets/img/banner/<?= $offer['image'] ?>" alt="sd">

                                    <div class="banner-content">
                                        <h4>-<?= $offer['discount'] ?><?= ($offer['discount_type'] == percent_discount) ? '%' : 'EGP' ?> Sale </h4>
                                        <h5 class="text-wrap col-5"><?= $offer['title'] ?></h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                       
                    <?php }
                } else {
                    ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="single-banner img-zoom mb-30">
                                <img src="../assets/img/banner/nooffer.png" alt="">
                            <div class="banner-content">
                                <h4>-50% Sale</h4>
                                <h5>Summer Vacation</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single-banner img-zoom mb-30">
                                <img src="../assets/img/banner/nooffer.png" alt="">
                            <div class="banner-content">
                                <h4>-50% Sale</h4>
                                <h5>Summer Vacation</h5>
                            </div>
                        </div>
                    </div>

                <?php

                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->
<!-- Most Rated Product Start -->
<div class="product-area bg-image-1 pt-100 pb-95">
    <div class="container ">
        <div class="product-top-bar section-border mb-55">
            <div class="section-title-wrap text-center">
                <h3 class="section-title">Most Rated Products</h3>
            </div>
        </div>
        <div class="row">


            <?php
            $newestFourProducts = $productObject->getMostRatedProducts();
            $getProductByIDResult = $newestFourProducts->fetch_all(MYSQLI_ASSOC);
            if ($getProductByIDResult) {

                foreach ($getProductByIDResult  as $key => $product) {
            ?>
                    <div class=" col-3 product-nav">
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="product-details.php?id=<?= $product['id'] ?>">
                                    <img alt="" width="270" height="287" src="../assets/img/product/<?= $product['image'] ?>">
                                </a>
                                <div class="product-action">
                                    <a class="action-wishlist" href="#" title="Wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="action-cart" href="#" title="Add To Cart">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content text-left">
                                <div class="product-hover-style">
                                    <div class="product-title">
                                        <h4>
                                            <a href="product-details.php?id=<?= $product['id'] ?>"><?= $product['name_en'] ?></a>
                                        </h4>
                                    </div>
                                    <div class="cart-hover">
                                        <h4><a href="product-details.php?id=<?= $product['id'] ?>">+ Add to cart</a></h4>
                                    </div>
                                </div>
                                <div class="product-price-wrapper">
                                    <span><?= $product['price'] ?> EGP</span>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

        </div>
    </div>
</div>
<!-- Most Rated Product End -->
<!-- //Most ordered product Start -->
<div class="product-area bg-image-1 pt-100 pb-95">
    <div class="container ">
        <div class="product-top-bar section-border mb-55">
            <div class="section-title-wrap text-center">
                <h3 class="section-title">Most Ordered Products</h3>
            </div>
        </div>
        <div class="row">


            <?php
            $newestFourProducts = $productObject->getMostOrderedProducts();
            $getProductByIDResult = $newestFourProducts->fetch_all(MYSQLI_ASSOC);
            if ($getProductByIDResult) {

                foreach ($getProductByIDResult  as $key => $product) {
            ?>
                    <div class=" col-3 product-nav">
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="product-details.php?id=<?= $product['id'] ?>">
                                    <img alt="" width="270" height="287" src="../assets/img/product/<?= $product['image'] ?>">
                                </a>
                                <div class="product-action">
                                    <a class="action-wishlist" href="#" title="Wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="action-cart" href="#" title="Add To Cart">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content text-left">
                                <div class="product-hover-style">
                                    <div class="product-title">
                                        <h4>
                                            <a href="product-details.php?id=<?= $product['id'] ?>"><?= $product['name_en'] ?></a>
                                        </h4>
                                    </div>
                                    <div class="cart-hover">
                                        <h4><a href="product-details.php?id=<?= $product['id'] ?>">+ Add to cart</a></h4>
                                    </div>
                                </div>
                                <div class="product-price-wrapper">
                                    <span><?= $product['price'] ?> EGP</span>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

        </div>
    </div>
</div>
<!-- //Most ordered product End -->
<!-- Most purchased Product Start -->
<div class="product-area bg-image-1 pt-100 pb-95">
    <div class="container ">
        <div class="product-top-bar section-border mb-55">
            <div class="section-title-wrap text-center">
                <h3 class="section-title">Most purchased Products</h3>
            </div>
        </div>
        <div class="row">


            <?php
            $newestFourProducts = $productObject->getMostPurchasedProducts();
            $getProductByIDResult = $newestFourProducts->fetch_all(MYSQLI_ASSOC);
            if ($getProductByIDResult) {

                foreach ($getProductByIDResult  as $key => $product) {
            ?>
                    <div class=" col-3 product-nav">
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="product-details.php?id=<?= $product['id'] ?>">
                                    <img alt="" width="270" height="287" src="../assets/img/product/<?= $product['image'] ?>">
                                </a>
                                <div class="product-action">
                                    <a class="action-wishlist" href="#" title="Wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="action-cart" href="#" title="Add To Cart">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content text-left">
                                <div class="product-hover-style">
                                    <div class="product-title">
                                        <h4>
                                            <a href="product-details.php?id=<?= $product['id'] ?>"><?= $product['name_en'] ?></a>
                                        </h4>
                                    </div>
                                    <div class="cart-hover">
                                        <h4><a href="product-details.php">+ Add to cart</a></h4>
                                    </div>
                                </div>
                                <div class="product-price-wrapper">
                                    <span><?= $product['price'] ?> EGP</span>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

        </div>
    </div>
</div>
<!-- Most purchased Product End -->
<!-- Most Viewed Product Start -->
<div class="product-area bg-image-1 pt-100 pb-95">
    <div class="container ">
        <div class="product-top-bar section-border mb-55">
            <div class="section-title-wrap text-center">
                <h3 class="section-title">Most Viewed Products</h3>
            </div>
        </div>
        <div class="row">


            <?php
            $newestFourProducts = $productObject->getMostViewedProducts();
            $getProductByIDResult = $newestFourProducts->fetch_all(MYSQLI_ASSOC);
            if ($getProductByIDResult) {

                foreach ($getProductByIDResult  as $key => $product) {
            ?>
                    <div class=" col-3 product-nav">
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="product-details.php?id=<?= $product['id'] ?>">
                                    <img alt="" width="270" height="287" src="../assets/img/product/<?= $product['image'] ?>">
                                </a>
                                <div class="product-action">
                                    <a class="action-wishlist" href="#" title="Wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="action-cart" href="#" title="Add To Cart">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content text-left">
                                <div class="product-hover-style">
                                    <div class="product-title">
                                        <h4>
                                            <a href="product-details.php?id=<?= $product['id'] ?>"><?= $product['name_en'] ?></a>
                                        </h4>
                                    </div>
                                    <div class="cart-hover">
                                        <h4><a href="product-details.php">+ Add to cart</a></h4>
                                    </div>
                                </div>
                                <div class="product-price-wrapper">
                                    <span><?= $product['price'] ?> EGP</span>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

        </div>
    </div>
</div>
<!-- Most Viewed Product End -->
<!-- Testimonial Area Start -->
<div class="testimonials-area bg-img pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="testimonial-active owl-carousel">
                    <div class="single-testimonial text-center">
                        <div class="testimonial-img">
                            <img alt="" src="../assets/img/icon-img/testi.png">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempor incididunt
                            ut labore</p>
                        <h4>Gregory Perkins</h4>
                        <h5>Customer</h5>
                    </div>
                    <div class="single-testimonial text-center">
                        <div class="testimonial-img">
                            <img alt="" src="../assets/img/icon-img/testi.png">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempor incididunt
                            ut labore</p>
                        <h4>Khabuli Teop</h4>
                        <h5>Marketing</h5>
                    </div>
                    <div class="single-testimonial text-center">
                        <div class="testimonial-img">
                            <img alt="" src="../assets/img/icon-img/testi.png">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempor incididunt
                            ut labore </p>
                        <h4>Lotan Jopon</h4>
                        <h5>Admin</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial Area End -->
<!-- News Area Start -->
<div class="blog-area bg-image-1 pt-90 pb-70">
    <div class="container">
        <div class="product-top-bar section-border mb-55">
            <div class="section-title-wrap text-center">
                <h3 class="section-title">Latest News</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="blog-single mb-30">
                    <div class="blog-thumb">
                        <a href="#"><img src="../assets/img/blog/blog-single-1.jpg" alt="" /></a>
                    </div>
                    <div class="blog-content pt-25">
                        <span class="blog-date">14 Sep</span>
                        <h3><a href="#">Lorem ipsum sit ame co.</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius tempor incididunt ut
                            labore et dolore</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-single mb-30">
                    <div class="blog-thumb">
                        <a href="#"><img src="../assets/img/blog/blog-single-2.jpg" alt="" /></a>
                    </div>
                    <div class="blog-content pt-25">
                        <span class="blog-date">20 Dec</span>
                        <h3><a href="#">Lorem ipsum sit ame co.</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius tempor incididunt ut
                            labore et dolore</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-single mb-30">
                    <div class="blog-thumb">
                        <a href="#"><img src="../assets/img/blog/blog-single-3.jpg" alt="" /></a>
                    </div>
                    <div class="blog-content pt-25">
                        <span class="blog-date">18 Aug</span>
                        <h3><a href="#">Lorem ipsum sit ame co.</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius tempor incididunt ut
                            labore et dolore</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- News Area End -->
<!-- Newsletter Araea Start -->
<div class="newsletter-area bg-image-2 pt-90 pb-100">
    <div class="container">
        <div class="product-top-bar section-border mb-45">
            <div class="section-title-wrap text-center">
                <h3 class="section-title">Join to our Newsletter</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-6 col-md-10 col-md-auto">
                <div class="footer-newsletter">
                    <div id="mc_embed_signup" class="subscribe-form">
                        <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll" class="mc-form">
                                <input type="email" value="" name="EMAIL" class="email" placeholder="Your Email Address*" required>
                                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                <div class="submit-button">
                                    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter Araea End -->



<?php
include_once "layout/footer.php";
?>