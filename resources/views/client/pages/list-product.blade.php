@extends('client.layouts.master')

@section('title')
Trang danh sách
@endsection


@section('content')

<!-- Begin Li's Content Wraper Area -->
<div class="content-wraper pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Li's Banner Area -->

                <!-- Li's Banner Area End Here -->
                <!-- shop-top-bar start -->
                <div class="shop-top-bar mt-30">
                    <div class="shop-bar-inner">
                        <div class="product-view-mode">
                            <!-- shop-item-filter-list start -->
                            <ul class="nav shop-item-filter-list" role="tablist">
                                <li class="active" role="presentation"><a aria-selected="true" class="active show"
                                        data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i
                                            class="fa fa-th"></i></a></li>
                                <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="list-view"
                                        href="#list-view"><i class="fa fa-th-list"></i></a></li>
                            </ul>
                            <!-- shop-item-filter-list end -->
                        </div>
                        <div class="toolbar-amount">
                            <span>Showing 1 to 9 of 15</span>
                        </div>
                    </div>
                    <!-- product-select-box start -->
                    <div class="product-select-box">
                        <div class="product-short">
                            <p>Sort By:</p>
                            <select class="nice-select">
                                <option value="trending">Relevance</option>
                                <option value="sales">Name (A - Z)</option>
                                <option value="sales">Name (Z - A)</option>
                                <option value="rating">Price (Low &gt; High)</option>
                                <option value="date">Rating (Lowest)</option>
                                <option value="price-asc">Model (A - Z)</option>
                                <option value="price-asc">Model (Z - A)</option>
                            </select>
                        </div>
                    </div>
                    <!-- product-select-box end -->
                </div>
                <!-- shop-top-bar end -->
                <!-- shop-products-wrapper start -->
                <div class="shop-products-wrapper">
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                            <div class="product-area shop-product-area">
                                <div class="row">
                                    <!-- one product -->
                                    @foreach($listProduces as $lproduct)
                                    <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                               
                                                    <img src="{{ asset('assets/client/images/product/large-size/1.jpg')}}"
                                                        alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">Graphic Corner</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name"
                                                            href="single-product.html">{{$lproduct->name}}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">{{$lproduct->price}}</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions action__overplay">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart heart"><a class="links-details "
                                                                href="wishlist.html"><i class="fa fa-heart"></i></a>
                                                        </li>
                                                        <li class="add-cart "><a href="#" title="quick view"
                                                                class="quick-view-btn" data-toggle="modal"
                                                                data-target="#exampleModalCenter"><i
                                                                    class="fa fa-eye"></i></a></li>


                                                    </ul>
                                                    <div class="add-cart active "><a href="#"><i
                                                                class="fa fa-cart-arrow-down fa-7x"
                                                                aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->

                                    </div>
                                    @endforeach
                                    <!-- end one product -->
                                </div>
                            </div>
                        </div>
                        <!-- <div id="list-view" class="tab-pane product-list-view fade" role="tabpanel">
                            <div class="row">
                                <div class="col">
                                    <div class="row product-layout-list">
                                        <div class="col-lg-3 col-md-5 ">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                                    <img src="{{ asset('assets/client/images/product/large-size/12.jpg')}}"
                                                        alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-7">
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">Graphic Corner</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="single-product.html">Hummingbird
                                                            printed t-shirt</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$46.80</span>
                                                    </div>
                                                    <p>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360
                                                        R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite
                                                        Sound via Ring Radiator Technology. Stream And Control R3
                                                        Speakers Wirelessly With Your Smartphone. Sophisticated, Modern
                                                        Desig</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="shop-add-action mb-xs-30">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart"><a href="#">Add to cart</a></li>
                                                    <li class="wishlist"><a href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i>Quick view</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row product-layout-list">
                                        <div class="col-lg-3 col-md-5 ">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                                    <img src="{{ asset('assets/client/images/product/large-size/11.jpg')}}"
                                                        alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-7">
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">Graphic Corner</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="single-product.html">Hummingbird
                                                            printed t-shirt</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$46.80</span>
                                                    </div>
                                                    <p>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360
                                                        R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite
                                                        Sound via Ring Radiator Technology. Stream And Control R3
                                                        Speakers Wirelessly With Your Smartphone. Sophisticated, Modern
                                                        Desig</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="shop-add-action mb-xs-30">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart"><a href="#">Add to cart</a></li>
                                                    <li class="wishlist"><a href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i>Quick view</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row product-layout-list">
                                        <div class="col-lg-3 col-md-5 ">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                                    <img src="{{ asset('assets/client/images/product/large-size/10.jpg')}}"
                                                        alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-7">
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">Graphic Corner</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="single-product.html">Hummingbird
                                                            printed t-shirt</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$46.80</span>
                                                    </div>
                                                    <p>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360
                                                        R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite
                                                        Sound via Ring Radiator Technology. Stream And Control R3
                                                        Speakers Wirelessly With Your Smartphone. Sophisticated, Modern
                                                        Desig</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="shop-add-action mb-xs-30">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart"><a href="#">Add to cart</a></li>
                                                    <li class="wishlist"><a href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i>Quick view</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row product-layout-list">
                                        <div class="col-lg-3 col-md-5 ">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                                    <img src="{{ asset('assets/client/images/product/large-size/9.jpg')}}"
                                                        alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-7">
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">Graphic Corner</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="single-product.html">Hummingbird
                                                            printed t-shirt</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$46.80</span>
                                                    </div>
                                                    <p>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360
                                                        R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite
                                                        Sound via Ring Radiator Technology. Stream And Control R3
                                                        Speakers Wirelessly With Your Smartphone. Sophisticated, Modern
                                                        Desig</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="shop-add-action mb-xs-30">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart"><a href="#">Add to cart</a></li>
                                                    <li class="wishlist"><a href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i>Quick view</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row product-layout-list">
                                        <div class="col-lg-3 col-md-5 ">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                                    <img src="{{ asset('assets/client/images/product/large-size/8.jpg')}}"
                                                        alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-7">
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">Graphic Corner</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="single-product.html">Hummingbird
                                                            printed t-shirt</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$46.80</span>
                                                    </div>
                                                    <p>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360
                                                        R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite
                                                        Sound via Ring Radiator Technology. Stream And Control R3
                                                        Speakers Wirelessly With Your Smartphone. Sophisticated, Modern
                                                        Desig</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="shop-add-action mb-xs-30">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart"><a href="#">Add to cart</a></li>
                                                    <li class="wishlist"><a href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i>Quick view</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row product-layout-list">
                                        <div class="col-lg-3 col-md-5 ">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                                    <img src="{{ asset('assets/client/images/product/large-size/7.jpg')}}"
                                                        alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-7">
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">Graphic Corner</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="single-product.html">Hummingbird
                                                            printed t-shirt</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$46.80</span>
                                                    </div>
                                                    <p>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360
                                                        R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite
                                                        Sound via Ring Radiator Technology. Stream And Control R3
                                                        Speakers Wirelessly With Your Smartphone. Sophisticated, Modern
                                                        Desig</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="shop-add-action mb-xs-30">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart"><a href="#">Add to cart</a></li>
                                                    <li class="wishlist"><a href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i>Quick view</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row product-layout-list">
                                        <div class="col-lg-3 col-md-5 ">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                                    <img src="{{ asset('assets/client/images/product/large-size/6.jpg')}}"
                                                        alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-7">
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">Graphic Corner</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="single-product.html">Hummingbird
                                                            printed t-shirt</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$46.80</span>
                                                    </div>
                                                    <p>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360
                                                        R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite
                                                        Sound via Ring Radiator Technology. Stream And Control R3
                                                        Speakers Wirelessly With Your Smartphone. Sophisticated, Modern
                                                        Desig</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="shop-add-action mb-xs-30">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart"><a href="#">Add to cart</a></li>
                                                    <li class="wishlist"><a href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i>Quick view</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row product-layout-list">
                                        <div class="col-lg-3 col-md-5 ">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                                    <img src="{{ asset('assets/client/images/product/large-size/5.jpg')}}"
                                                        alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-7">
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">Graphic Corner</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="single-product.html">Hummingbird
                                                            printed t-shirt</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$46.80</span>
                                                    </div>
                                                    <p>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360
                                                        R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite
                                                        Sound via Ring Radiator Technology. Stream And Control R3
                                                        Speakers Wirelessly With Your Smartphone. Sophisticated, Modern
                                                        Desig</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="shop-add-action mb-xs-30">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart"><a href="#">Add to cart</a></li>
                                                    <li class="wishlist"><a href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i>Quick view</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row product-layout-list">
                                        <div class="col-lg-3 col-md-5 ">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                                    <img src="{{ asset('assets/client/images/product/large-size/4.jpg')}}"
                                                        alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-7">
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">Graphic Corner</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="single-product.html">Hummingbird
                                                            printed t-shirt</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$46.80</span>
                                                    </div>
                                                    <p>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360
                                                        R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite
                                                        Sound via Ring Radiator Technology. Stream And Control R3
                                                        Speakers Wirelessly With Your Smartphone. Sophisticated, Modern
                                                        Desig</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="shop-add-action mb-xs-30">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart"><a href="#">Add to cart</a></li>
                                                    <li class="wishlist"><a href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i>Quick view</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row product-layout-list">
                                        <div class="col-lg-3 col-md-5 ">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                                    <img src="{{ asset('assets/client/images/product/large-size/3.jpg')}}"
                                                        alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-7">
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">Graphic Corner</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="single-product.html">Hummingbird
                                                            printed t-shirt</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$46.80</span>
                                                    </div>
                                                    <p>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360
                                                        R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite
                                                        Sound via Ring Radiator Technology. Stream And Control R3
                                                        Speakers Wirelessly With Your Smartphone. Sophisticated, Modern
                                                        Desig</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="shop-add-action mb-xs-30">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart"><a href="#">Add to cart</a></li>
                                                    <li class="wishlist"><a href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i>Quick view</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row product-layout-list">
                                        <div class="col-lg-3 col-md-5 ">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                                    <img src="{{ asset('assets/client/images/product/large-size/2.jpg')}}"
                                                        alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-7">
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">Graphic Corner</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="single-product.html">Hummingbird
                                                            printed t-shirt</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$46.80</span>
                                                    </div>
                                                    <p>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360
                                                        R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite
                                                        Sound via Ring Radiator Technology. Stream And Control R3
                                                        Speakers Wirelessly With Your Smartphone. Sophisticated, Modern
                                                        Desig</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="shop-add-action mb-xs-30">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart"><a href="#">Add to cart</a></li>
                                                    <li class="wishlist"><a href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i>Quick view</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row product-layout-list last-child">
                                        <div class="col-lg-3 col-md-5 ">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                                    <img src="{{ asset('assets/client/images/product/large-size/1.jpg')}}"
                                                        alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-7">
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">Graphic Corner</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="single-product.html">Hummingbird
                                                            printed t-shirt</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$46.80</span>
                                                    </div>
                                                    <p>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360
                                                        R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite
                                                        Sound via Ring Radiator Technology. Stream And Control R3
                                                        Speakers Wirelessly With Your Smartphone. Sophisticated, Modern
                                                        Desig</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="shop-add-action">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart"><a href="#">Add to cart</a></li>
                                                    <li class="wishlist"><a href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i>Quick view</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="paginatoin-area">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <p>Showing 1-12 of 13 item(s)</p>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul class="pagination-box">
                                        <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                                        </li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li>
                                            <a href="#" class="Next"> Next <i class="fa fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!-- shop-products-wrapper end -->
            </div>
        </div>
    </div>
</div>
<!-- Content Wraper Area End Here -->

<!-- Begin Quick View | Modal Area -->
<div class="modal fade modal-wrapper" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-inner-area row">
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <!-- Product Details Left -->
                        <div class="product-details-left">
                            <div class="product-details-images slider-navigation-1">
                                <div class="lg-image">
                                    <img src="{{ asset('assets/client/images/product/large-size/1.jpg')}}"
                                        alt="product image">
                                </div>
                                <div class="lg-image">
                                    <img src="{{ asset('assets/client/images/product/large-size/2.jpg')}}"
                                        alt="product image">
                                </div>
                                <div class="lg-image">
                                    <img src="{{ asset('assets/client/images/product/large-size/3.jpg')}}"
                                        alt="product image">
                                </div>
                                <div class="lg-image">
                                    <img src="{{ asset('assets/client/images/product/large-size/4.jpg')}}"
                                        alt="product image">
                                </div>
                                <div class="lg-image">
                                    <img src="{{ asset('assets/client/images/product/large-size/5.jpg')}}"
                                        alt="product image">
                                </div>
                                <div class="lg-image">
                                    <img src="{{ asset('assets/client/images/product/large-size/6.jpg')}}"
                                        alt="product image">
                                </div>
                            </div>
                            <div class="product-details-thumbs slider-thumbs-1">
                                <div class="sm-image"><img
                                        src="{{ asset('assets/client/images/product/small-size/1.jpg')}}"
                                        alt="product image thumb"></div>
                                <div class="sm-image"><img
                                        src="{{ asset('assets/client/images/product/small-size/2.jpg')}}"
                                        alt="product image thumb"></div>
                                <div class="sm-image"><img
                                        src="{{ asset('assets/client/images/product/small-size/3.jpg')}}"
                                        alt="product image thumb"></div>
                                <div class="sm-image"><img
                                        src="{{ asset('assets/client/images/product/small-size/4.jpg')}}"
                                        alt="product image thumb"></div>
                                <div class="sm-image"><img
                                        src="{{ asset('assets/client/images/product/small-size/5.jpg')}}"
                                        alt="product image thumb"></div>
                                <div class="sm-image"><img
                                        src="{{ asset('assets/client/images/product/small-size/6.jpg')}}"
                                        alt="product image thumb"></div>
                            </div>
                        </div>
                        <!--// Product Details Left -->
                    </div>

                    <div class="col-lg-7 col-md-6 col-sm-6">
                        <div class="product-details-view-content pt-60">
                            <div class="product-info">
                                <h2>Today is a good day Framed poster</h2>
                                <span class="product-details-ref">Reference: demo_15</span>
                                <div class="rating-box pt-20">
                                    <ul class="rating rating-with-review-item">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                        <li class="review-item"><a href="#">Read Review</a></li>
                                        <li class="review-item"><a href="#">Write Review</a></li>
                                    </ul>
                                </div>
                                <div class="price-box pt-20">
                                    <span class="new-price new-price-2">$57.98</span>
                                </div>
                                <div class="product-desc">
                                    <p>
                                        <span>100% cotton double printed dress. Black and white striped top and orange
                                            high waisted skater skirt bottom. Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit. quibusdam corporis, earum facilis et nostrum dolorum
                                            accusamus similique eveniet quia pariatur.
                                        </span>
                                    </p>
                                </div>
                                <div class="product-variants">
                                    <div class="produt-variants-size">
                                        <label>Dimension</label>
                                        <select class="nice-select">
                                            <option value="1" title="S" selected="selected">40x60cm</option>
                                            <option value="2" title="M">60x90cm</option>
                                            <option value="3" title="L">80x120cm</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="single-add-to-cart">
                                    <form action="#" class="cart-quantity">
                                        <div class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </div>
                                        <button class="add-to-cart" type="submit">Add to cart</button>
                                    </form>
                                </div>
                                <div class="product-additional-info pt-25">
                                    <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to
                                        wishlist</a>
                                    <div class="product-social-sharing pt-25">
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a>
                                            </li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a>
                                            </li>
                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google
                                                    +</a></li>
                                            <li class="instagram"><a href="#"><i
                                                        class="fa fa-instagram"></i>Instagram</a></li>
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
</div>
<!-- Quick View | Modal Area End Here -->

@endsection