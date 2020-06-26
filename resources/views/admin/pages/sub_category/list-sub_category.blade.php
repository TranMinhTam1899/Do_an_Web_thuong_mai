@extends('admin.layouts.master')

@section('title')
    list sub_category
@endsection

@section('main_content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách sub_category</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                    <div id="datatable-responsive_filter" class="dataTables_filter">
                            <label><i class="fa fa-search" aria-hidden="true"></i></label>
                            <input type="search" class="form-control input-sm" placeholder="Search ..."
                                    aria-controls="datatable-responsive">
                        </div>
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
                                    <a href="{{route('sub_category.them-moi-sub-category')}}" class="btn bg_btnAdd">Add sub_category &nbsp;<i class="fa fa-plus" aria-hidden="true"></i></a>
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
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 80px;">Sub_name</th>

                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;">Alilas
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 34px;"
                                                        aria-label="Age: activate to sort column ascending">Parent_id
                                                    </th>
                                                    
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 43px;"
                                                        aria-label="Extn.: activate to sort column ascending">Status</th>
                                                   
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">created
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">updated
                                                    </th>
                                                    <th  tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;" aria-sort="ascending">
                                                        Function</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                              
                                            </tr>
                                           
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
    
    <div class="col-sm-12">
        <div class="dataTables_paginate paging_simple_numbers" id="datatable-responsive_paginate">
            <ul class="pagination">
                <li class="paginate_button previous disabled" id="datatable-responsive_previous"><a href="#"
                        aria-controls="datatable-responsive" data-dt-idx="0" tabindex="0">Previous</a></li>
                <li class="paginate_button active"><a href="#" aria-controls="datatable-responsive" data-dt-idx="1"
                        tabindex="0">1</a></li>
                <li class="paginate_button "><a href="#" aria-controls="datatable-responsive" data-dt-idx="2"
                        tabindex="0">2</a></li>
                <li class="paginate_button "><a href="#" aria-controls="datatable-responsive" data-dt-idx="3"
                        tabindex="0">3</a></li>
                <li class="paginate_button "><a href="#" aria-controls="datatable-responsive" data-dt-idx="4"
                        tabindex="0">4</a></li>
                <li class="paginate_button "><a href="#" aria-controls="datatable-responsive" data-dt-idx="5"
                        tabindex="0">5</a></li>
                <li class="paginate_button "><a href="#" aria-controls="datatable-responsive" data-dt-idx="6"
                        tabindex="0">6</a></li>
                <li class="paginate_button next" id="datatable-responsive_next"><a href="#"
                        aria-controls="datatable-responsive" data-dt-idx="7" tabindex="0">Next</a></li>
            </ul>
        </div>
    </div>
</div>

@endsection