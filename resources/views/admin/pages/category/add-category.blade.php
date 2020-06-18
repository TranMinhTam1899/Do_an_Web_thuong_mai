
@extends('admin.layouts.master')

@section('title')
Thêm sản catagory
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12" style="margin: 0 auto;">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Category</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left">
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Name category</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" class="form-control" placeholder="Name .....">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Alilas category</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="password" class="form-control" placeholder="Alilas .....">
                            </div>
                        </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 text-center">
                            <button type="submit" class="btn btn-success">Add Category</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection