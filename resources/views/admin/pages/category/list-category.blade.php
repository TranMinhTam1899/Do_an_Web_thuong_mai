

@extends('admin.layouts.master')

@section('title')
Danh sách category
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách loại sản phẩm</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li> <div id="datatable-responsive_filter" class="dataTables_filter">
                                            <label>Search:<input type="search" class="form-control input-sm"
                                                    placeholder="" aria-controls="datatable-responsive"></label></div>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">


                            <div id="datatable-responsive_wrapper"
                                class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="dataTables_length" id="datatable-responsive_length"><label>Show
                                                <select name="datatable-responsive_length"
                                                    aria-controls="datatable-responsive" class="form-control input-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries</label></div>
                                    </div>
                                    <div class="col-sm-6">
                                       
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable-responsive"
                                            class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                            cellspacing="0" width="100%" role="grid"
                                            aria-describedby="datatable-responsive_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                <!-- <th class="sorting_asc" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;" aria-sort="ascending">
                                                        Id</th> -->
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;" aria-sort="ascending">
                                                        Name</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 176px;">
                                                        Alilas</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">Status
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($listCategorys as $cate)
                                                <tr role="row" class="odd">
                                                    <!-- <td tabindex="0" class="sorting_1">1</td> -->
                                                    <td>{{$cate -> name}}</td>
                                                    <td>{{$cate -> alilas}}</td>
                                                    
                                                    <td>{{$cate -> status}}</td>
                                                    
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
                                    <div class="col-sm-5">
                                        <div class="dataTables_info" id="datatable-responsive_info" role="status"
                                            aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                            id="datatable-responsive_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button previous disabled"
                                                    id="datatable-responsive_previous"><a href="#"
                                                        aria-controls="datatable-responsive" data-dt-idx="0"
                                                        tabindex="0">Previous</a></li>
                                                <li class="paginate_button active"><a href="#"
                                                        aria-controls="datatable-responsive" data-dt-idx="1"
                                                        tabindex="0">1</a></li>
                                                <li class="paginate_button "><a href="#"
                                                        aria-controls="datatable-responsive" data-dt-idx="2"
                                                        tabindex="0">2</a></li>
                                                <li class="paginate_button "><a href="#"
                                                        aria-controls="datatable-responsive" data-dt-idx="3"
                                                        tabindex="0">3</a></li>
                                                <li class="paginate_button "><a href="#"
                                                        aria-controls="datatable-responsive" data-dt-idx="4"
                                                        tabindex="0">4</a></li>
                                                <li class="paginate_button "><a href="#"
                                                        aria-controls="datatable-responsive" data-dt-idx="5"
                                                        tabindex="0">5</a></li>
                                                <li class="paginate_button "><a href="#"
                                                        aria-controls="datatable-responsive" data-dt-idx="6"
                                                        tabindex="0">6</a></li>
                                                <li class="paginate_button next" id="datatable-responsive_next"><a
                                                        href="#" aria-controls="datatable-responsive" data-dt-idx="7"
                                                        tabindex="0">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
@endsection