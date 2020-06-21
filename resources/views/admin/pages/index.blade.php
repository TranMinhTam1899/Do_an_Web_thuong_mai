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
                  <div class="count">{{DB::table('users')->count()}}</div>
                  <h3 class="text-white">Số tài khoản</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats bg-primary text-white">
                  <div class="icon text-white"><i class="fa fa-shopping-bag" aria-hidden="true"></i></div>
                  <div class="count">{{DB::table('vendors')->count()}}</div>
                  <h3 class="text-white">Số cửa hàng</h3>
                  
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats bg-info text-white">
                  <div class="icon text-white"><i class="fa fa-table"></i></div>
                  <div class="count">{{DB::table('categories')->count()}}</div>
                  <h3 class="text-white">Số loại sản phẩm</h3>
                  
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats bg-danger text-white">
                  <div class="icon text-white"><i class="fa fa-comments-o"></i></div>
                  <div class="count">{{DB::table('posts')->count()}}</div>
                  <h3 class="text-white">Số bài viết</h3>
                  
                </div>
              </div>
            </div>
          </div>

         <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Weekly Summary <small>Activity shares</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                      <div class="col-md-7" style="overflow:hidden;">
                        <span class="sparkline_one" style="height: 160px; padding: 10px 25px;"><canvas width="478" height="125" style="display: inline-block; width: 478px; height: 125px; vertical-align: top;"></canvas></span>
                        <h4 style="margin:18px">Weekly sales progress</h4>
                      </div>

                      <div class="col-md-5">
                        <div class="row" style="text-align: center;">
                          <div class="col-md-4"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                            <canvas class="canvasDoughnut" height="137" width="137" style="margin: 5px 10px 10px 0px; width: 110px; height: 110px;"></canvas>
                            <h4 style="margin:0">Bounce Rates</h4>
                          </div>
                          <div class="col-md-4"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                            <canvas class="canvasDoughnut" height="137" width="137" style="margin: 5px 10px 10px 0px; width: 110px; height: 110px;"></canvas>
                            <h4 style="margin:0">New Traffic</h4>
                          </div>
                          <div class="col-md-4"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                            <canvas class="canvasDoughnut" height="137" width="137" style="margin: 5px 10px 10px 0px; width: 110px; height: 110px;"></canvas>
                            <h4 style="margin:0">Device Share</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="dashboard_graph x_panel">
                  <div class="x_title">
                    <div class="col-md-6">
                      <h3>Network Activities <small>Graph title sub-title</small></h3>
                    </div>
                    <div class="col-md-6">
                      <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>May 11, 2020 - June 9, 2020</span> <b class="caret"></b>
                      </div>
                    </div>
                  </div>
                  <div class="x_content">
                    <div class="demo-container" style="height:250px">
                      <div id="chart_plot_03" class="demo-placeholder" style="padding: 0px; position: relative;"><canvas class="flot-base" width="1527" height="350" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1222px; height: 280px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 135px; top: 264px; left: 15px; text-align: center;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 135px; top: 264px; left: 165px; text-align: center;">2</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 135px; top: 264px; left: 314px; text-align: center;">4</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 135px; top: 264px; left: 464px; text-align: center;">6</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 135px; top: 264px; left: 613px; text-align: center;">8</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 135px; top: 264px; left: 760px; text-align: center;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 135px; top: 264px; left: 909px; text-align: center;">12</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 135px; top: 264px; left: 1059px; text-align: center;">14</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 135px; top: 264px; left: 1208px; text-align: center;">16</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 252px; left: 7px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 220px; left: 7px; text-align: right;">5</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 189px; left: 1px; text-align: right;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 157px; left: 1px; text-align: right;">15</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 126px; left: 1px; text-align: right;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 95px; left: 1px; text-align: right;">25</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 63px; left: 1px; text-align: right;">30</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 32px; left: 1px; text-align: right;">35</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 1px; text-align: right;">40</div></div></div><canvas class="flot-overlay" width="1527" height="350" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1222px; height: 280px;"></canvas><div class="legend"><div style="position: absolute; width: 82px; height: 17px; top: 13px; right: 13px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:13px;right:13px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(38,185,154);overflow:hidden"></div></div></td><td class="legendLabel">Registrations</td></tr></tbody></table></div></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>





@endsection
<!-- endcontent -->