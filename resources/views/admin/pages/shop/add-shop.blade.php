@extends('admin.layouts.master')

@section('title')
add shop
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12" style="margin: 0 auto;">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add shop</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @if(isset($vendor))

                @else
                <form class="form-horizontal form-label-left" action="{{route('vendor.xu-ly-them-moi-vendor')}}"
                    method="POST" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Shop name</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" class="form-control" name="shop_name" placeholder="Shop name.....">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2">Username</label>
                            <div class="col-md-10 col-sm-10 ">
                                <select name="id_user" id="" class="form-control">
                                @foreach($dataUser as $data)
                                    <option value="{{ $data->id}}">{{ $data->user_name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Banner</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="file" name="bannerFile" id="bannerFile">
                                <img src="" alt="img_banner" style="height: 30px; width: 50px;">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Logo</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="file" name="logoFile">
                                <img src="" alt="img_logo" style="height: 30px; width: 30px;">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Desc</label>
                            <div class="col-md-10 col-sm-10 ">
                                <textarea name="desc" class="form-control" id="" cols="10" rows="5"
                                    placeholder="Desc....."></textarea>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Status</label>
                            <div class="col-md-10 col-sm-10 ">
                                <select name="status" id="" class="form-control">
                                    <option value="1">Đang kích hoạt</option>
                                    <option value="0">Ngưng kích hoạt</option>
                                </select>
                            </div>
                        </div>
                    </div>





                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 text-center">
                            <button type="submit" class="btn btn_submit">Add shop</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection