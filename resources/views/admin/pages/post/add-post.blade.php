@extends('admin.layouts.master')

@section('title')
add post
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12" style="margin: 0 auto;">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add post</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left">
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Title</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" class="form-control" placeholder="Title.....">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Images</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="file" >
                            </div>
                        </div>
                        
                    </div>
                   
                    <div class="row">
                    
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Short desc</label>
                            <div class="col-md-10 col-sm-10 ">
                                <textarea name="add_dress" id="" cols="10" rows="5" class="form-control"
                                    placeholder="..........."></textarea>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Desc</label>
                            <div class="col-md-10 col-sm-10 ">
                                <textarea name="add_dress" id="" cols="10" rows="5" class="form-control"
                                    placeholder="..........."></textarea>
                            </div>
                        </div>


                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 text-center">
                            <button type="submit" class="btn btn-success">Post</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection