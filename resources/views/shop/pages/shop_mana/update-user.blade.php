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
                        <li><a class="active" data-toggle="tab" href="#"><span>Cập nhật thông tin tài khoản</span></a></li>
                    </ul>
                </div>
            <div class="x_content mt-20">
                <form class="form-horizontal form-label-left">
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-3 col-sm-3 ">Username</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" placeholder="Username.....">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-3 col-sm-3 ">Password</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="password" class="form-control" placeholder="Password.....">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-3 col-sm-3 ">First name</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" placeholder="First name.....">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-3 col-sm-3 ">Last name</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" placeholder="Last name.....">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-3 col-sm-3 ">Birthday</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-3 col-sm-3 ">Images</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="file">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-3 col-sm-3 ">Email</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="email" class="form-control" placeholder="Email.....">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-3 col-sm-3 ">Phone</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="phone" class="form-control" placeholder="Phone.....">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-3 col-sm-3 ">Address</label>
                            <div class="col-md-9 col-sm-9 ">
                                <textarea name="add_dress" id="" cols="10" rows="5" class="form-control" placeholder="Address....."></textarea>
                            </div>
                        </div>

                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-3 col-sm-3 ">Gender</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select class="select2_single form-control" tabindex="-1">
                                    <option>----!-----</option>
                                    <option value="nv1">User1</option>
                                    <option value="nv2">User2</option>
                                    <option value="nv3">User3</option>
                                    <option value="nv4">User4</option>
                                    <option value="nv5">User5</option>

                                </select>
                            </div>
                        </div>
                    </div>





                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 text-center">
                            <button type="submit" class="btn btn-success">Update user</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection