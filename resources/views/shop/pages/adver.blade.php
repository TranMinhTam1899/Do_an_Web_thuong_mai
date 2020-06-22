@extends('shop.layouts.master')

@section('title_shop')
Trang chủ shop
@endsection

@section('shop_main_content')
<div class="vochor">
    <div class="li-product-tab mt-10">
        <ul class="nav li-product-menu">
            <li><a class="active" data-toggle="tab" href="#"><span>Chương trình khuyến mãi</span></a></li>
        </ul>
    </div>
    <div class="vochor_content">
    <div class="x_content mt-20">
                    <form class="form-horizontal form-label-left">
                        <div class="row">
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-3 col-sm-3 ">Promotion name</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Name.....">
                                </div>
                            </div>
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-3 col-sm-3 ">Images</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="file">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-3 col-sm-3 ">Start time</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="date" class="form-control" placeholder="Start time ....">
                                </div>
                            </div>
                            <div class="form-group row col-md-6 col-sm-6 px-0">
                                <label class="control-label col-md-3 col-sm-3 ">End time</label>
                                <div class="col-md-9 col-sm-9 px-0">
                                    <input type="date" class="form-control" placeholder="End time .....">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group row col-md-12 col-sm-12">
                                <label class="control-label col-md-3 col-sm-3 ">Promotion content</label>
                                <div class="col-md-12 col-sm-12 ">
                                <textarea id="txt_vochor" name="vochor" id="" cols="30" rows="10" placeholder="Promotion content ...."></textarea>
                                </div>
                            </div>
                           

                        </div>
                       
                       
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 text-center">
                                <button type="submit" class="btn btn-success">Add product</button>
                            </div>
                        </div>

                    </form>
                </div>
    </div>
</div>
@endsection