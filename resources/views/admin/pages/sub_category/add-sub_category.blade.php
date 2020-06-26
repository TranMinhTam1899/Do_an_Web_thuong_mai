@extends('admin.layouts.master')

@section('title')
add sub_category
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12" style="margin: 0 auto;">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Sub_Category</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" action=""
                    method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Sub_category name</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" class="form-control" name="" placeholder="Sub name">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Alilas</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" class="form-control" name="" placeholder="Alilas">
                            </div>
                        </div>
                        
                    </div>
                   

                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Categoty</label>
                            <div class="col-md-10 col-sm-10 ">
                               <select name="" id="">
                                    <option value=""></option>
                               </select>
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
                            <button type="submit" class="btn btn_submit">Add sub_category</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection