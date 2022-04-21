<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Crawl width python</title>

  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../public/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../public/assets/demo/demo.css" rel="stylesheet" />
  
  <style type="text/css">
    .pagination {
      width: 100%;
    }
    /* thiết lập style cho thẻ a */
    .pagination a {
      color: black;
      float: left;
      padding:  0px 18px;
      text-decoration: none;
    }
   /* thiết lập style cho class active */
    .pagination li.active {
      font-weight: bold;
      color: white;
      background-color: #2E9AFE;
      padding:  0px 18px;
    }
   /* thêm màu nền khi người dùng hover vào class không active */
    .pagination a:hover:not(.active) {
      background-color: #ddd;
  }
  .show:hover{
      /*box-shadow: 4px 4px 6px 0px #888888;
      */
      box-shadow: 0px 0px 8px 0px  #888888;
    }
  </style>


</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->


   
      <div class="logo"><a href="http://localhost/timkiem/public/" class="simple-text logo-normal">
                 <i  style="color:#FE642E" class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active ">
            <a class="nav-link"  style=" background-color:#FE642E">
             <i class="fa fa-filter" aria-hidden="true"></i>
              <p>BỘ LỘC TÌM KIẾM</p>
            

            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" >
            <i class="fa fa-bars" aria-hidden="true"></i>
              <p style="background-color:#E6E6E6">THEO DANH MỤC</p>
             <a href="#"> <p style="padding-left:50px">Điện thoại - Máy tính bảng</p></a>
             <a href="#"> <p style="padding-left:50px">Laptop - Thiết bị điện tử</p></a>
             <a href="#"> <p style="padding-left:50px">Thời trang phụ kiện</p></a>
             <a href="#"><p style="padding-left:50px">Nhà cửa và đời sống</p></a>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link">
             <i class="fa fa-map-marker" aria-hidden="true"></i>
              <p style="background-color:#E6E6E6">THEO SHOP</p>
             <a href="#"> <p style="padding-left:50px">Tiki</p></a>
              <a href="#"> <p style="padding-left:50px">Shoppe</p></a>
               <a href="#"> <p style="padding-left:50px">Lazada</p></a>
                <a href="#"> <p style="padding-left:50px">Sendo</p></a>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{URL::to('/bieudo')}}">
              <i class="fa fa-sort" aria-hidden="true"></i>
              <p style="background-color:#E6E6E6">BIỂU ĐỒ TRỰC QUAN</p>
            </a>
          </li>
        
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">

            <!--  form gui du lieu tim kiem -->
            <form class="navbar-form" role="form" action="{{URL::to('/timkiem')}}"   method="GET" enctype="multipart/form-data" >
                <div class="input-group no-border" style="width:500px">
                  <input  name="txtkey"   style="font-weight :bold"  type="text" value="" class="form-control" placeholder="TÌM KIẾM SO SÁNH SẢN PHẨM">
                  <button  name="btnsearch" type="submit" class="btn btn-white btn-round btn-just-icon" >
                    <i  style=" color:#FE642E" class="material-icons">search</i>
                    <div class="ripple-container"></div>
                  </button>
                </div>
            </form>



            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="# id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                 
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <img  style="width:50px;height: 50px" src="https://chanhtuoi.vn1.vdrive.vn/uploads/2020/06/logo-lazada-2.png">
                   <img  style="width:50px;height: 50px ; border-radius: 5px" src="https://cdn-images-1.medium.com/max/1200/1*yVsoOu3hZJ7A45hjq4zqoA.png">
                 <img  style="width:50px;height: 50px" src="https://cdn.chanhtuoi.com/uploads/2020/02/w400/sendo.png.webp">
                <img  style="width:50px;height: 50px; border-radius: 5px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSqW8x5KN3qyM4C3Jcdu6khr-IHDk2vy6jW-VP8BM8NEuJ523OrVAMcCK_xyyWVdqI4oxM&usqp=CAU">
                </a>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSqW8x5KN3qyM4C3Jcdu6khr-IHDk2vy6jW-VP8BM8NEuJ523OrVAMcCK_xyyWVdqI4oxM&usqp=CAU
                  <a class="dropdown-item" href="#">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-2 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                   <p class="card-category">Sản phẩm</p>
                  <h3 class="card-title">Phổ biến
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Sản phẩm</p>
                  <h3 class="card-title">Bán chạy</h3>
                </div>
               
              </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                   <i class="fa fa-sort-desc" aria-hidden="true"></i>
                  </div>
                  <p class="card-category">Sort</p>
                  <a href="{{URL::to('/minprice')}}">  <h3 class="card-title">Giá thấp</h3></a>
                </div>
               
              </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                 <i class="fa fa-sort-asc" aria-hidden="true"></i>
                  </div>
                  <p class="card-category">Sort</p>
                <a href="{{URL::to('/maxprice')}}"><h3 class="card-title">Giá cao</h3></a>
                </div>
               
              </div>
            </div>

             <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                  <i class="fa fa-telegram" aria-hidden="true"></i>
                      KHOẢNG GIÁ
                  </div>
                  <form action="{{URL::to('/khoanggia')}}"   method="GET" enctype="multipart/form-data" >
                  <input  style="width:100px;margin-top:5PX" type="number"   name="minprice" value="Thấp nhất"  min="1000" placeholder="1000">
                  <input type="number" name="maxprice" value=""  min="1000" placeholder="1000000">
                  <input  style="width:100px; margin-right:120px; margin-top:10PX" type="submit" name="btnBW" value="Áp dụng ">
                </form>
                </div>
               
              </div>
            </div>
          </div>



   




          <!--   product -->
          <div class="row">
            <div class="col-md-1">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                  <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title"> Sales</h4>
                  <p class="card-category">
                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> Tăng 55% so với hôm qua.</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> Cập nhật khoảng 4 phút trước
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                  <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-body" style="height: 300px">
                  <h4 class="card-title">Dữ liệu trực quan </h4>

<!--  chỗ này để biểu đồ  tròn -->              
                        <?php
                          $conn=mysqli_connect("localhost","root","","tiki3") or die("Lỗi");
                          mysqli_set_charset($conn, "utf8");

                                $sql = "SELECT phanloai, COUNT(DISTINCT id) AS TONGSO FROM product GROUP BY phanloai";
                                $result = mysqli_query($conn, $sql);
                                $chart_data[] = ["TIKI", "TONGSO"];
                                while($pie_data = mysqli_fetch_assoc($result)){
                                    settype($pie_data["TONGSO"], "double");
                                   $chart_data [] = [$pie_data["phanloai"], $pie_data["TONGSO"]];
                            }
                        ?>
                           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                            google.charts.load('current', {'packages':['corechart']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {

                                var data = google.visualization.arrayToDataTable(
                                 <?php echo json_encode($chart_data); ?>   );

                                var options = {
                                    title: 'TIKI ',
                                    is3D: true
                                };

                                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                                chart.draw(data, options);
                            }
                            
                            $(window).resize(function(){
                              drawChart();
                            });
                            
                        </script>
                        <section class="wrapper">
                            <div class="agil-info-calendar">  
                                <div id="piechart" class="chart" class="col-md-12" style=" width: 100%; min-height: 250px;"></div>
                            </div>
                        </section>


                       
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> Cập nhật khoảng 2 ngày trước
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Gợi ý hôm nay</h4>
<!--  end -->
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> Cập nhật khoảng 2 ngày trước
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Sản phẩm dành cho bạn</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                       @yield('content')
                       <style type="text/css">
                        .rw-conversation-container .rw-header{background-color:organe;}
                        .rw-conversation-container .rw-messages-container.rw-imageFrame{}
                        .rw-conversation-container .rw-messages-container.rw-replies.rw-response{background-image: https://i.pinimg.com/originals/a2/dc/96/a2dc9668f2cf170fe3efeb263128b0e7.gif;}
                      </style>
                        <script>!(function () {
                        let e = document.createElement("script"),
                          t = document.head || document.getElementsByTagName("head")[0];
                        (e.src =
                          "https://cdn.jsdelivr.net/npm/rasa-webchat@1.0.0/lib/index.js"),
                          // Replace 1.x.x with the version that you want
                          (e.async = !0),
                          (e.onload = () => {
                            window.WebChat.default(
                              {
                                initPayload: '/greet',
                                customData: { language: "en" },
                                socketUrl: "http://localhost:5005",
                                title:'           AI       ',
                                subtitle:''
                              },
                              null
                            );
                          }),
                          t.insertBefore(e, t.firstChild);
                      })();

                      </script>


      
         
                        <!--  product -->

                   

          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="#">
                DAU
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">TUẦN  - ĐỨC  - THUẦN - 18CT4</a> 
        </div>
      </footer>
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose active" data-color="rose"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
        </li>
        <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->
        <li class="button-container">
          <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
            View Documentation
          </a>
        </li>
        <li class="button-container github-star">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
        </li>
      </ul>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>