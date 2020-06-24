@extends('admin.layouts.master')

@section('title')
Thêm sản phẩm
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12" style="margin: 0 auto;">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm sản phẩm</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                @if(isset($listProduce))

                @else

                <form class="form-horizontal form-label-left" action="{{route('product.xu-ly-them-moi')}}"
                    method="POST">
                    @endif
                    @csrf
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Product name</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="name" class="form-control" placeholder="Name.....">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Images</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="file" name="img">
                            </div>
                        </div>


                    </div>
                    <div class="row">

                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">unit</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="unit" class="form-control" placeholder="Unit.....">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">SKU</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="SKU" class="form-control" placeholder="SKU.....">
                            </div>
                        </div>


                    </div>
                    <div class="row">

                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Desc</label>
                            <div class="col-md-10 col-sm-10 ">
                                <textarea id="" cols="10" name="desc" rows="5" class="form-control"
                                    placeholder="..........."></textarea>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">short desc</label>
                            <div class="col-md-10 col-sm-10 ">
                                <textarea id="" cols="10" name="shortdesc" rows="5"
                                    class="form-control" placeholder="..........."></textarea>
                            </div>
                        </div>


                    </div>


                    <div class="row">

                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Catagory</label>
                            <div class="col-md-10 col-sm-10 ">
                                <select class="select2_single form-control" name="category_id" tabindex="-1">
                                    @foreach($listcategory as $listC)
                                    <option value="{{$listC->id}}">{{$listC -> name}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Author</label>
                            <div class="col-md-10 col-sm-10 ">
                                <select class="select2_single form-control" name="author_id" tabindex="-1">
                                    @foreach($listUser as $listU)
                                    <option value="{{$listU->id}}">{{$listU->user_name}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Price</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="price" class="form-control" placeholder="USD.....">
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Discount price</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="discout_price" class="form-control" placeholder="USD.....">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Status</label>
                            <div class="col-md-10 col-sm-10 ">
                                <select class="select2_single form-control" name="status">

                                    <option value="1">Đang hoạt động</option>
                                    <option value="0">Ngưng hoạt động</option>

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
@endsection