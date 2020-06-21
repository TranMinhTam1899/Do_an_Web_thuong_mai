@extends('shop.layouts.master')

@section('title_shop')
Home shop
@endsection

@section('shop_main_content')
@include('client.layouts.banner')

<div class="seller">
    <div class="seller_title">
        <h4>Danh sách cần làm</h4>
    </div>
    <div class="seller_content">
        <div class="row">
            <div class="col-md-4 col-sm-4 text-center">
                <div class="seller_item about-image-wrap btn  btn-success">
                    <p class="seller_num text-white">0</p>
                    <span>Sản phẩm chờ xử lý</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
            <div class="seller_item">
                    <p class="seller_num">0</p>
                    <span>Sản phẩm đã xử lý</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
            <div class="seller_item">
                    <p class="seller_num">0</p>
                    <span>Số đơn hàng</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 text-center">
            <div class="seller_item">
                    <p class="seller_num">0</p>
                    <span>Sản phẩm hết hàng</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
            <div class="seller_item">
                    <p class="seller_num">0</p>
                    <span>Sản phẩm bị khóa</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
            <div class="seller_item">
                    <p class="seller_num">0</p>
                    <span>Chương trình khuyến mãi</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="seller">
    <div class="seller_title">
        <h4>Thống kê bán hàng</h4>
    </div>
    <div class="seller_content">
        <div class="row">
            <div class="col-md-4 col-sm-4 text-center">1</div>
            <div class="col-md-4 col-sm-4 text-center">2</div>
            <div class="col-md-4 col-sm-4 text-center">3</div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 text-center">4</div>
            <div class="col-md-4 col-sm-4 text-center">5</div>
            <div class="col-md-4 col-sm-4 text-center">6</div>
        </div>
    </div>
</div>




@endsection