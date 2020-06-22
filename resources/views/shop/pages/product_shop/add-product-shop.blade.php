@extends('shop.layouts.master')

@section('title_shop')
Trang chủ shop
@endsection

@section('shop_main_content')
<div class="shop_add_product">
    <div class="row">
        <div class="col-md-12" style="margin: 0 auto;">
            <div class="x_panel">
                <div class="li-product-tab mt-10">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#"><span>Khuyến mãi cực
                                    sốc</span></a></li>
                    </ul>
                </div>
                <div class="x_content mt-20">
                    <form class="form-horizontal form-label-left">
                        <div class="row">
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-2 col-sm-2 ">Product name</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input type="text" class="form-control" placeholder="Name.....">
                                </div>
                            </div>
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-2 col-sm-2 ">Images</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input type="file">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-2 col-sm-2 ">Prive</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input type="password" class="form-control" placeholder="USD.....">
                                </div>
                            </div>
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-2 col-sm-2 ">Discount price</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input type="text" class="form-control" placeholder="USD.....">
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="form-group row col-md-6 col-sm-6 ">
                                <label class="control-label col-md-2 col-sm-2 ">Desc</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <textarea name="add_dress" id="" cols="10" rows="5" class="form-control"
                                        placeholder="..........."></textarea>
                                </div>
                            </div>
                            <div class="form-group row col-md-6 col-sm-6 ">
                                <label class="control-label col-md-2 col-sm-2 ">short desc</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <textarea name="add_dress" id="" cols="10" rows="5" class="form-control"
                                        placeholder="..........."></textarea>
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-2 col-sm-2 ">Unit</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input type="text" class="form-control" placeholder="Last name.....">
                                </div>
                            </div>
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-2 col-sm-2 ">Catagory</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <select class="select2_single form-control" tabindex="-1">
                                        <option>----!-----</option>
                                        <option value="nv1">User1</option>
                                        <option value="nv2">User2</option>
                                        <option value="nv2">User2</option>
                                        <option value="nv4">User4</option>
                                        <option value="nv5">User5</option>

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group row col-md-6 col-sm-6">
                                <label class="control-label col-md-2 col-sm-2 ">Author</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <select class="select2_single form-control" tabindex="-1">
                                        <option>----!-----</option>
                                        <option value="nv1">User1</option>
                                        <option value="nv2">User2</option>
                                        <option value="nv2">User2</option>
                                        <option value="nv4">User4</option>
                                        <option value="nv5">User5</option>

                                    </select>
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
    </div>
</div>
@endsection