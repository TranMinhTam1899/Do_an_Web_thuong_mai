@extends('shop.layouts.master')

@section('title_shop')
Home shop
@endsection

@section('shop_main_content')
<div class="row mt-10">
    <div class="col-sm-12">
        <div class="single-banner shop-page-banner">
            <a href="#">
                <img src="{{ asset('upload/banner/banner7.png')}}" alt="Li's Static Banner">
            </a>
        </div>
    </div>
</div>

<div class="seller mt-20">
    <div class="seller_title ">
        <h4>Danh sách cần làm</h4>
    </div>
    <div class="seller_content">
        <div class="row">
            <div class="col-md-4 col-sm-4 text-center">
                <div class="seller_item about-image-wrap btn  btn-success">
                    <p class="seller_num">0</p>
                    <span>Sản phẩm chờ xử lý</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
            <div class="seller_item about-image-wrap btn btn-primary">
                    <p class="seller_num">0</p>
                    <span>Sản phẩm đã xử lý</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
            <div class="seller_item about-image-wrap btn btn-secondary">
                    <p class="seller_num">0</p>
                    <span>Số đơn hàng</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 text-center">
            <div class="seller_item about-image-wrap btn btn-info ">
                    <p class="seller_num">0</p>
                    <span>Sản phẩm hết hàng</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
            <div class="seller_item about-image-wrap btn btn-danger">
                    <p class="seller_num">0</p>
                    <span>Sản phẩm bị khóa</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
            <div class="seller_item about-image-wrap btn btn-warning">
                    <p class="seller_num">0</p>
                    <span class="text-white">Chương trình khuyến mãi</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="seller">
    <div class="seller_title">
        <h4>Chương trình khuyến mãi</h4>
    </div>
    <div class="seller_content">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <a href="#">
                    <h6 class="vendor_title">Nhà cửa đời sống - DEAL SHOCK 300k (giá gốc từ 430k) -Từ 0h-23h59 ngày 23/06_HN</h6>
                    <div class="verdor_content">
                        <span>Thời gian diễn ra: 00:00 23-06-2020 ～ 23:59 23-06-2020</span>
                        <span>Thời gian đăng kí đã kết thúc.</span>
                    </div>
                </a>
            </div>
            <div class="col-md-12 col-sm-12 ">2</div>
            <div class="col-md-12 col-sm-12 ">3</div>
        </div>
        
    </div>
</div>




@endsection