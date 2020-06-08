@extends('admin.layouts.master')

@section('title')
Trang chu
@endsection

<!-- content -->
@section('main_content')
    <div class="row" style="display: inline-block;width: 100%;">
            <div class="top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats bg-success text-white">
                  <div class="icon text-white"><i class="fa fa-users" aria-hidden="true"></i></div>
                  <div class="count">0</div>
                  <h3 class="text-white">Số tài khoản</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats bg-primary text-white">
                  <div class="icon text-white"><i class="fa fa-shopping-bag" aria-hidden="true"></i></div>
                  <div class="count">0</div>
                  <h3 class="text-white">Số cửa hàng</h3>
                  
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats bg-info text-white">
                  <div class="icon text-white"><i class="fa fa-table"></i></div>
                  <div class="count">0</div>
                  <h3 class="text-white">Số loại sản phẩm</h3>
                  
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats bg-danger text-white">
                  <div class="icon text-white"><i class="fa fa-comments-o"></i></div>
                  <div class="count">0</div>
                  <h3 class="text-white">Số bài viết</h3>
                  
                </div>
              </div>
            </div>
          </div>

         
@endsection
<!-- endcontent -->