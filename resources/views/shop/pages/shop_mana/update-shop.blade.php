@extends('shop.layouts.master')

@section('title_shop')
Trang chủ shop
@endsection

@section('shop_main_content')
<div class="row">
    <div class="col-md-12" style="margin: 0 auto;">
        <div class="x_panel">
        <div class="li-product-tab mt-10">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#"><span>Cập nhật thông tin shop</span></a></li>
                    </ul>
                </div>
            <div class="x_content mt-20">
                <form class="form-horizontal form-label-left">
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Shop name</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" class="form-control" placeholder="Shop name.....">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Banner</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="file">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Desc</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" class="form-control" placeholder="First name.....">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Logo</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="file">
                            </div>
                        </div>
                    </div>

                   
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 text-center">
                            <button type="submit" class="btn btn-success">Update shop</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection