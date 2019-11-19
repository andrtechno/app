<?php
use panix\ext\owlcarousel\OwlCarouselWidget;
use panix\mod\shop\models\Product;

?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="shipping_area mb-50">
                <div class="shipping_inner">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <i class="icon-user" style="font-size:55px;color:#ffd54c;"></i>
                        </div>
                        <div class="shipping_content">
                            <h2>Free Shipping</h2>
                            <p>Free shipping on all US order</p>
                        </div>
                    </div>
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <i class="icon-delivery" style="font-size:55px;color:#ffd54c;"></i>
                        </div>
                        <div class="shipping_content">
                            <h2>Support 24/7</h2>
                            <p>Contact us 24 hours a day</p>
                        </div>
                    </div>
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <i class="icon-partner" style="font-size:55px;color:#ffd54c;"></i>
                        </div>
                        <div class="shipping_content">
                            <h2>100% Money Back</h2>
                            <p>You have 30 days to Return</p>
                        </div>
                    </div>
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <i class="icon-cash-money" style="font-size:55px;color:#ffd54c;"></i>
                        </div>
                        <div class="shipping_content">
                            <h2>Payment Secure</h2>
                            <p>We ensure secure payment</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<section class="product_area mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2><span> <strong>Our</strong>Products</span></h2>
                    <ul class="product_tab_button nav" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#brake" role="tab" aria-controls="brake"
                               aria-selected="true">Brake Parts</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#wheels" role="tab" aria-controls="wheels"
                               aria-selected="false">Wheels & Tires</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#turbo" role="tab" aria-controls="turbo"
                               aria-selected="false">Turbo System</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="brake" role="tabpanel">
                <div class="product_carousel product_column5 owl-carousel">
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">JBL Flip 3 Splasroof Portable Bluetooth 2</a>
                                </h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$180.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Bose SoundLink Bluetooth Speaker</a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-47%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="current_price">$160.00</span>
                                        <span class="old_price">$3200.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Variable with soldout product for title</a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$150.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Lorem ipsum dolor sit amet, consectetur</a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$175.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">JBL Flip 3 Splasroof Portable Bluetooth 2</a>
                                </h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-07%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="current_price">$180.00</span>
                                        <span class="old_price">$420.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Accusantium dolorem Security Camera</a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="current_price">$140.00</span>
                                        <span class="old_price">$320.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Fugit eum cupiditate necessitatibus
                                        similique </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Fugit eum cupiditate necessitatibus similique</a>
                                </h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html"> repellendus quas ratione voluptas.</a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">repellendus quas ratione voluptas.</a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Etiam Gravida 16GB Factory Unlocked </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="wheels" role="tabpanel">
                <div class="product_carousel product_column5 owl-carousel">
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">JBL Flip 3 Splasroof Portable Bluetooth 2</a>
                                </h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$180.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Bose SoundLink Bluetooth Speaker</a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-47%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="current_price">$160.00</span>
                                        <span class="old_price">$3200.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Variable with soldout product for title</a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$150.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Lorem ipsum dolor sit amet, consectetur</a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$175.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">JBL Flip 3 Splasroof Portable Bluetooth 2</a>
                                </h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-07%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="current_price">$180.00</span>
                                        <span class="old_price">$420.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Accusantium dolorem Security Camera</a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="current_price">$140.00</span>
                                        <span class="old_price">$320.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="turbo" role="tabpanel">
                <div class="product_carousel product_column5 owl-carousel">
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">JBL Flip 3 Splasroof Portable Bluetooth 2</a>
                                </h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$180.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Bose SoundLink Bluetooth Speaker</a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-47%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="current_price">$160.00</span>
                                        <span class="old_price">$3200.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Variable with soldout product for title</a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$150.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Lorem ipsum dolor sit amet, consectetur</a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$175.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">JBL Flip 3 Splasroof Portable Bluetooth 2</a>
                                </h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-07%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="current_price">$180.00</span>
                                        <span class="old_price">$420.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Accusantium dolorem Security Camera</a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="current_price">$140.00</span>
                                        <span class="old_price">$320.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_list">
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                v <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                            src="<?= $this->context->assetUrl; ?>/images/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view">
                                                <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                        class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span
                                                        class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">$160.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span
                                                    class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$views = Product::find()
    ->where(['id' => Yii::$app->session->get('views')])
    ->published()
    ->all();
if ($views) {
    ?>
    <section class="product_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2><span>Вы интересовались</span></h2>
                    </div>


                    <?php


                    OwlCarouselWidget::begin([
                        'containerTag' => 'div',
                        'containerOptions' => [
                            'class' => 'product_carousel'
                        ],
                        'options' => [
                            'margin' => 20,
                            'navText' => ['<i class="icon-arrow-left"></i>', '<i class="icon-arrow-right"></i>'],
                            'autoplay' => true,
                            'autoplayTimeout' => 8000,
                            'items' => 4,
                            'loop' => true,
                            'nav' => true,
                            'responsiveClass' => true,
                            'responsive' => [
                                0 => [
                                    'items' => 1,
                                    'nav' => false,
                                    'dots' => true,
                                    'center' => true,
                                ],
                                426 => [
                                    'items' => 2,
                                    'nav' => false
                                ],
                                768 => [
                                    'items' => 2,
                                    'nav' => false
                                ],
                                1024 => [
                                    'items' => 5,
                                    'dots' => false
                                ]
                            ]
                        ]
                    ]);
                    ?>

                    <?php

                    foreach ($views as $data) {
                        echo $this->render('@theme/modules/shop/views/catalog/_view_grid', ['model' => $data]);

                    }
                    ?>


                    <?php OwlCarouselWidget::end(); ?>


                </div>
            </div>

        </div>
    </section>
<?php } ?>


