<?php
include_once "layout/header.php";
include_once "layout/navbar.php";
include_once __DIR__ . "/../app/models/Product.php";
include_once __DIR__ . "/../app/models/Review.php";

$productObject = new Product;
$reviewsObject = new Review;

if ($_GET) {
    if (isset($_GET['id'])) {
        if (is_numeric($_GET['id'])) {
            $productObject->setId($_GET['id']);
            $productObjectResult = $productObject->getProductById();
            if ($productObjectResult) {
                $productObject->increaseViewNumber();
                $product = $productObjectResult->fetch_object();
                $reviewsObject->setProduct_id($_GET['id']);
                $SelectReviewsResult = $reviewsObject->selectData();
            } else {
                header('location:errors/404.php');
            }
        } else {
            header('location:errors/404.php');
        }
    } else {
        header('location:errors/404.php');
    }
} else {
    header('location:errors/404.php');
}
if ($_POST) {
    if (isset($_POST['add_review'])) {
        $reviewsObject->setValue($_POST['value']);
        $reviewsObject->setComment($_POST['comment']);
        $insertReviewResult = $reviewsObject->insertData();

        if ($insertReviewResult) {
            header("location:product-details.php?id={$product->id}");
        } else {
            echo "<div class='col-11 m-5 text-center alert alert-danger'>Something happen in adding review   </div>";
        }
    }
}
?>



<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-3 ptb-150">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>SINGLE PRODUCT</h3>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Single Product</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->
<!-- Product Deatils Area Start -->
<div class="product-details pt-100 pb-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="product-details-img">
                    <img class="zoompro" src="../assets/img/product-details/l-<?= $product->image ?>" data-zoom-image="../assets/img/product-details/product-detalis-bl1.jpg" alt="zoom" />
                    <div id="gallery" class="mt-20 product-dec-slider owl-carousel">
                        <a data-image="../assets/img/product-details/l-<?= $product->image ?>" data-zoom-image="../assets/img/product-details/product-detalis-bl1.jpg">
                            <img src="../assets/img/product-details/s-<?= $product->image ?>" alt="">
                        </a>


                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="product-details-content">
                    <h4><?= $product->name_en ?></h4>
                    <div class="rating-review">
                        <div class="pro-dec-rating">
                            <?php
                            for ($i = 0; $i <  $product->reviews_avg; $i++) {
                            ?>
                                <i class="ion-android-star-outline theme-star"></i>
                            <?php
                            }
                            for ($i = 0; $i < 5 - $product->reviews_avg; $i++) {
                            ?>

                                <i class="ion-android-star-outline"></i>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="pro-dec-review">
                            <ul>
                                <li><?= $product->reviews_count ?> Reviews </li>
                                <li> Add Your Reviews</li>
                            </ul>
                        </div>
                    </div>
                    <span><?= $product->price ?> EGP</span>
                    <div class="in-stock">
                        <p>Available: <span><?= ($product->amount > 0) ? 'In stock' : 'Out Of Stock' ?></span></p>
                    </div>
                    <p><?= $product->details_en ?></p>

                    <div class="quality-add-to-cart">
                        <div class="quality">
                            <label>Qty:</label>
                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="<?= $product->amount ?>">
                        </div>
                        <div class="shop-list-cart-wishlist">
                            <a title="Add To Cart" href="#">
                                <i class="icon-handbag"></i>
                            </a>
                            <a title="Wishlist" href="#">
                                <i class="icon-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pro-dec-categories">
                        <ul>
                            <li class="categories-title">Tags: </li>
                            <li><a href="shop.php?brand=<?= $product->brand_id?>"><?= $product->brands_name_en ?>, </a></li>
                            <li><a href="shop.php?category=<?= $product->category_id?>"> <?= $product->category_name_en ?>,</a></li>
                            <li><a href="shop.php?subcategory=<?= $product->subcategory_id?>"><?= $product->subcategory_name_en ?></a></li>

                        </ul>
                    </div>
                    <div class="pro-dec-categories">
                        <ul>
                            <li class="categories-title">View Number: </li>
                            <li><a href="#"><?= $product->view_number + 1 ?> </a></li>
                        </ul>
                    </div>
                    <div class="pro-dec-social">
                        <ul>
                            <li><a class="tweet" href="#"><i class="ion-social-twitter"></i> Tweet</a></li>
                            <li><a class="share" href="#"><i class="ion-social-facebook"></i> Share</a></li>
                            <li><a class="google" href="#"><i class="ion-social-googleplus-outline"></i> Google+</a></li>
                            <li><a class="pinterest" href="#"><i class="ion-social-pinterest"></i> Pinterest</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Deatils Area End -->

<!-- Description ,tag ,reviews  Area Start -->
<div class="description-review-area pb-70">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav text-center">
                <a class="active" data-toggle="tab" href="#des-details1">Description</a>
                <a data-toggle="tab" href="#des-details2">Tags</a>
                <a data-toggle="tab" href="#des-details3">Review</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <p><?= $product->details_en ?></p>

                    </div>
                </div>
                <div id="des-details2" class="tab-pane">
                    <div class="product-anotherinfo-wrapper">
                        <ul>
                            <li><span>Tags:</span></li>
                            <li><a href="#"><?= $product->brands_name_en ?>, </a></li>
                            <li><a href="#"> <?= $product->category_name_en ?>,</a></li>
                            <li><a href="#"><?= $product->subcategory_name_en ?></a></li>
                        </ul>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">


                    <div class="rattings-wrapper">
                        <?php
                        if ($SelectReviewsResult) {
                            $reviews = $SelectReviewsResult->fetch_all(MYSQLI_ASSOC);
                            foreach ($reviews as $key => $review) {
                        ?>
                                <div class="sin-rattings">
                                    <div class="star-author-all">
                                        <div class="ratting-star f-left">
                                            <?php
                                            for ($i = 0; $i <  $review['value']; $i++) {
                                            ?>
                                                <i class="ion-star theme-color"></i>
                                            <?php
                                            }
                                            for ($i = 0; $i < 5 - $review['value']; $i++) {
                                            ?>

                                                <i class="ion-android-star-outline"></i>
                                            <?php
                                            }
                                            ?>
                                            <span>(<?= $review['value'] ?>)</span>
                                        </div>
                                        <div class="ratting-author f-right">
                                            <!-- reviewer name -->
                                            <h3> <?= $review['user_name'] ?></h3>
                                            <!-- reviewer time -->
                                            <span><?= $review['created_at'] ?></span>
                                        </div>
                                    </div>
                                    <!-- reviewer comment -->
                                    <p><?= $review['comment'] ?></p>
                                </div>
                        <?php
                            }
                        } else {
                            echo "<div class='col-11 m-5 text-center alert alert-warning'>No Reviews </div>";
                        }
                        ?>


                    </div>
                    <?php
                    if (isset($_SESSION['user'])) {
                        $reviewsObject->setUser_id($_SESSION['user']->id);
                        $reviewsObject->setProduct_id($product->id);
                        if (!$reviewsObject->checkIfUserAlreadyAddedReview()) {


                    ?>
                            <!-- new review from user  -->
                            <div class="ratting-form-wrapper">
                                <h3>Add your Comments :</h3>
                                <div class="ratting-form">
                                    <!-- add review form -->
                                    <form method="POST">
                                        <div class="star-box">
                                            <h2>Rating:</h2>
                                            <div class="ratting-star">
                                                <!-- <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star"></i> -->
                                                <select name="value" id="" class="form-control mb-4">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="comment" placeholder="Comment"></textarea>
                                                    <input type="submit" name="add_review" value="add review">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    <?php
                        } else {
                            echo "<div class='col-11 m-5 text-center alert alert-warning'>User Already Entered His Review</div>";
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!--  Description ,tag ,reviews Area End -->



<!-- Related Product Start -->
<div class="product-area pb-100">
    <div class="container">
        <div class="product-top-bar section-border mb-35">
            <div class="section-title-wrap">
                <h3 class="section-title section-bg-white">Related Products</h3>
            </div>
        </div>
        <div class="row">


            <?php

            $productObject->setSubcategory_id($product->subcategory_id);
            $newestFourProducts = $productObject->getRelatedProducts();
            if ($newestFourProducts) {
                $getProductByIDResult = $newestFourProducts->fetch_all(MYSQLI_ASSOC);

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
            } else {
                echo "<div class='col-11 m-5 text-center alert alert-warning'>No Products </div>";
            }
            ?>

        </div>
    </div>




</div>
</div>
<!-- Related Product End -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <!-- Thumbnail Large Image start -->
                        <div class="tab-content">
                            <div id="pro-1" class="tab-pane fade show active">
                                <img src="../assets/img/product-details/product-detalis-l1.jpg" alt="">
                            </div>
                            <div id="pro-2" class="tab-pane fade">
                                <img src="../assets/img/product-details/product-detalis-l2.jpg" alt="">
                            </div>
                            <div id="pro-3" class="tab-pane fade">
                                <img src="../assets/img/product-details/product-detalis-l3.jpg" alt="">
                            </div>
                            <div id="pro-4" class="tab-pane fade">
                                <img src="../assets/img/product-details/product-detalis-l4.jpg" alt="">
                            </div>
                        </div>
                        <!-- Thumbnail Large Image End -->
                        <!-- Thumbnail Image End -->
                        <div class="product-thumbnail">
                            <div class="thumb-menu owl-carousel nav nav-style" role="tablist">
                                <a class="active" data-toggle="tab" href="#pro-1"><img src="../assets/img/product-details/product-detalis-s1.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-2"><img src="../assets/img/product-details/product-detalis-s2.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-3"><img src="../assets/img/product-details/product-detalis-s3.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-4"><img src="../assets/img/product-details/product-detalis-s4.jpg" alt=""></a>
                            </div>
                        </div>
                        <!-- Thumbnail image end -->
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="modal-pro-content">
                            <h3>Dutchman's Breeches </h3>
                            <div class="product-price-wrapper">
                                <span class="product-price-old">£162.00 </span>
                                <span>£120.00</span>
                            </div>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.</p>
                            <div class="quick-view-select">
                                <div class="quickview-color-wrap">
                                    <label>Color*</label>
                                    <div class="quickview-color">
                                        <ul>
                                            <li class="blue">b</li>
                                            <li class="red">r</li>
                                            <li class="pink">p</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-quantity">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                                </div>
                                <button>Add to cart</button>
                            </div>
                            <span><i class="fa fa-check"></i> In stock</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->

<?php
include_once "layout/footer.php";
?>