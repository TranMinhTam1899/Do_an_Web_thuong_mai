<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
            
              <ul class="nav side-menu">
                <li><a href="{{route('admin.index')}}"><i class="fa fa-home"></i> Trang chủ </a>
                  
                </li>
                <li><a><i class="fa fa-shopping-bag" aria-hidden="true"></i> Quản lý cửa hàng<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  <li><a href="{{route('vendor.them-moi-vendor')}}" style="display: none;">Thêm cửa hàng</a></li>
                  <li><a href="{{route('vendor.listVendor')}}">Danh sách cửa hàng</a></li>
                    
                  </ul>
                </li>
                <li><a><i class="fa fa-users" aria-hidden="true"></i> Quản lý người dùng<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  <li><a href="{{route('user.them-moi')}}" style="display: none;">Thêm người dùng</a></li>
                    <li><a href="{{route('user.listUser')}}">Danh sách người dùng</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-users" aria-hidden="true"></i> Quản lý khách hàng<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  

                  <li><a href="{{route('customer.them-moi-customer')}}" style="display: none;">Thêm khách hàng</a></li>
                    <li><a href="{{route('customer.listCustomer')}}">Danh sách khách hàng</a></li>

                    
                  </ul>
                </li>
                <li><a><i class="fa fa-pie-chart" aria-hidden="true"></i> Quản lý sản phẩm<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  <li><a href="{{route('product.them-moi')}}" style="display: none;">Thêm sản phẩm</a></li>
                    <li><a href="{{route('product.listProduct')}}">Danh sách sản phẩm</a></li>
                    
                   
                  </ul>
                </li>
                <li><a><i class="fa fa-table"></i>Quản lý loại sản phẩm<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  <li><a href="{{route('category.them-moi')}}" style="display: none;">Thêm loại sản phẩm</a></li>
                    <li><a href="{{route('category.listCategory')}}">Danh sách loại sản phẩm</a></li>
                    
                  </ul>
                </li>
                <li><a><i class="fa fa-table"></i>Quản lý loại sản phẩm con<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  <li><a href="{{route('sub_category.them-moi-sub-category')}}" style="display: none;">Thêm sub category</a></li>
                    <li><a href="{{route('sub_category.listSubCategory')}}">Danh sách sub category</a></li>
                    
                  </ul>
                </li>
                <li><a><i class="fa fa-bar-chart-o"></i> Thống kê <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{route('admin.list-statistical')}}">Xem thống kê</a></li>
                    <li><a href="{{route('admin.add-statistical')}}">In thống kê</a></li>
                    
                  </ul>
                </li>
                <li><a><i class="fa fa-newspaper-o" aria-hidden="true"></i> Bài viết<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  <li><a href="{{route('admin.add-post')}}" style="display: none;">Thêm bài viết</a></li>
                    <li><a href="{{route('admin.list-post')}}">Danh sách bài viết </a></li>
                    
                  </ul>
                </li>
                <li><a href="{{route('admin.setting')}}"><i class="fa fa-cogs" aria-hidden="true"></i>cài đặt</a>
                  
                </li>
               
              </ul>
            </div>
           

          </div>