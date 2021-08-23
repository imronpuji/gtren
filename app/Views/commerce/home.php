
    <?= $this->extend('commerce/templates/index') ?>
    <?= $this->section('content') ?>

        <!-- <div class="container"> -->
            <section class="home-slider bg-grey-9 position-relative">
                <div class="hero-slider-1 style-2 dot-style-1 dot-style-1-position-1">
                    <?php foreach ($banners as $banner): ?>
                    <div class="single-hero-slider single-animation-wrap">
                        <div class="container">
                            <div class="slider-1-height-2 slider-animated-1">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated"><?= $banner->offer ?></h4>
                                    <h2 class="animated fw-900"><?= $banner->title ?></h2>
                                    <h1 class="animated fw-900 text-brand"><?= $banner->sub_title ?></h1>
                                    <p class="animated"><?= $banner->description ?></p>
                                    <a class="animated btn btn-default btn-rounded" href="shop-product-right.html"> DISCOVER NOW <i class="fa fa-arrow-right"></i> </a>
                                </div>
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated" src="<?= base_url() ?>/uploads/banner/<?= $banner->photo  ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
                <div class="slider-arrow hero-slider-1-arrow"></div>
            </section>

        <!-- </div> -->
        <section class="product-tabs pt-30 pb-30 wow fadeIn animated">
            <div class="container">
                
                <div class="row product-grid-4">
                    <!-- Start -->
                    <?php  foreach ($products as $product): ?>
                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <?php for($i = 0; $i < 2; $i++): ?>
                                            <img class="<?= $i == 0 ? 'default-img' : 'hover-img'  ?>" src="<?= $product->photos[$i] ?>" alt="">
                                        <?php endfor ?>
                                    </a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <?php $categories = $product->getCategory($product->categories); ?>
                                    
                                    <?php foreach($categories as $category): ?>
                                        <a href="<?= base_url('product/category/'. strtolower($category->category) ) ?>">
                                        <?= $category->category ?>
                                        </a>
                                    <?php endforeach ?>

                                </div>
                                <h2><a href="<?= base_url('product/'. $product->slug) ?>"><?= $product->name ?></a></h2>
                                <div class="rating-result" title="50%">
                                    <span>
                                        <span>50%</span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span><?= "Rp. ". number_format($product->sell_price) ?></span>
                                    <!-- <span class="old-price">$245.8</span> -->
                                </div>
                                <div class="product-action-1 show">
                                    <a aria-label="Add To Cart" class="action-btn hover-up" href="shop-cart.html"><i class="far fa-shopping-bag"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                    <!-- End -->
                    <div class="pagination-area mt-30 mb-50">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <?= $pager->links('products', 'commerce_pagination'); ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!--End product-grid-4-->
            </div>
        </section>
        <section class="banners">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img class="border-radius-10" src="<?= base_url() ?>/frontend/imgs/banner/banner-1.png" alt="">
                            <div class="banner-text">
                                <span>Smart Offer</span>
                                <h4>Save 20% on <br>iPhone 12</h4>
                                <a href="shop-grid-right.html">Shop Now <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img class="border-radius-10" src="<?= base_url() ?>/frontend/imgs/banner/banner-2.png" alt="">
                            <div class="banner-text">
                                <span>Sale off</span>
                                <h4>Great Camera <br>Collection</h4>
                                <a href="shop-grid-right.html">Shop Now <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img wow fadeIn animated">
                            <img class="border-radius-10" src="<?= base_url() ?>/frontend/imgs/banner/banner-3.png" alt="">
                            <div class="banner-text">
                                <span>New Arrivals</span>
                                <h4>Shop Today’s <br>Deals & Offers</h4>
                                <a href="shop-grid-right.html">Shop Now <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="featured section-padding-60">
            <div class="container">
                <div class="row">
                 <?php foreach ($offers as $offer): ?>
                    <div class="col-lg-3 col-md-6 mb-md-3">
                        <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                            <div class="banner-icon">
                                <img src="<?= base_url() ?>/uploads/offer/<?php echo $offer->photo ?>" alt="">
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title"><?= $offer->title ?></h3>
                                <p><?= $offer->description ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

         <?php foreach ($kategori as $ka): ?>
        <section class="bg-grey-9 section-padding-60 py-5 my-5">
            <div class="container">
                <div class="heading-tab d-flex">
                    <div class="heading-tab-left wow fadeIn animated">
                        <h3 class="section-title mb-35">Produk Dengan Kategori <span><a href="<?= base_url('category/'. strtolower($ka->category)) ?>"><?= $ka->category ?></a></span></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="tab-content wow fadeIn animated" >
                            <div class="tab-pane fade show active">
                                <div class="carausel-4-columns-cover arrow-center position-relative">
                                    <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-<?= $ka->id ?>-arrows"></div>
                                    <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-<?= $ka->id ?>">
            <?php $ids = [intval($ka->id)]; foreach($ka->getProduct($ids) as $p): ?>
                                        <div class="product-cart-wrap mb-30">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html">
                                                     <?php for($i = 0; $i < 2; $i++): ?>
                                                        <img class="<?= $i == 0 ? 'default-img' : 'hover-img'  ?>" src="<?= $p->photos[$i] ?>" alt="">
                                                    <?php endfor ?>
                                                    </a>
                                                </div>
                                                <!-- <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Hot</span>
                                                </div> -->
                                            </div>
                                            <div class="product-content-wrap">
                                                <!-- <div class="product-category">
                                                    
                                                </div> -->
                                                <h2>
                                                    <a href="<?= base_url('product/'. $p->slug) ?>"><?= $p->name ?></a>
                                                </h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>70%</span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span><?= "Rp. ". number_format($p->sell_price) ?> </span>
                                                </div>
                                                <div class="product-action-1 show">
                                                    <a aria-label="Add To Cart" class="action-btn hover-up" href="shop-cart.html"><i class="far fa-shopping-bag"></i></a>
                                                </div>
                                            </div>
                                        </div>
            <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endforeach ?>
        




        <section class="banner-2 pt-60 pb-60">
            <div class="container">
                <div class="banner-img banner-big wow fadeIn animated">
                    <img src="<?= base_url() ?>/frontend/imgs/banner/banner-4.png" alt="">
                    <div class="banner-text">
                        <h4 class="mb-15 mt-40 text-white">Repair Services</h4>
                        <h2 class="fw-600 mb-20 text-white">We're an Apple <br>Authorised Service Provider</h2>
                        <a href="shop-grid-right.html" class="btn">Learn More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
    <!-- Preloader Start -->
   <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img class="jump" src="<?= base_url() ?>/frontend/imgs/theme/favico.svg" alt="">
                    <h5 class="mb-5">Loading...</h5>
                    <div class="loader">
                        <div class="bar bar1"></div>
                        <div class="bar bar2"></div>
                        <div class="bar bar3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>  -->
    <!-- Vendor JS-->
        <?= $this->endSection() ?>


