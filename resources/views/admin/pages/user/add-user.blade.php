@extends('admin.layouts.master')

@section('title')
thêm mới user
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12" style="margin: 0 auto;">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm User</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left">
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Username</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" class="form-control" placeholder="Username.....">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Password</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="password" class="form-control" placeholder="Password.....">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">First name</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" class="form-control" placeholder="First name.....">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Last name</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" class="form-control" placeholder="Last name.....">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Birthday</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Images</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="file" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Email</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="email" class="form-control" placeholder="Email.....">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Phone</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="phone" class="form-control" placeholder="Phone.....">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Address</label>
                            <div class="col-md-10 col-sm-10 ">
                                <textarea name="add_dress" id="" cols="10" rows="5" class="form-control"
                                placeholder="Address....."></textarea>
                            </div>
                        </div>

                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Gender</label>
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
                            <button type="submit" class="btn btn_submit">Add user</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection