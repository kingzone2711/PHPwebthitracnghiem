<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="assets/img/logo/logo.png" rel="icon">
  <title>Học Phần</title>
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/ruang-admin.min.css" rel="stylesheet">
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
   
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="assets/js/countdown.js"></script>  
  <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="assets/vendor/chart.js/Chart.min.js"></script>
  <script src="assets/js/demo/chart-area-demo.js"></script>  
  <script src="assets/js/jquery-1.9.1.min.js"></script>
  <script src="assets/js/watch.js"></script>
</head>

<body id="page-top">
<?php
             $MaHocPhan = addslashes($_GET['MaHocPhan']);
             
             // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
                 // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                 $sql = "select * from hocphan where MaHocPhan= '$MaHocPhan'";
                
                 $servername="localhost";$username="root";$password="";
                 $dbname="mysql_ltpm";           
                 $conn= mysqli_connect($servername,$username,$password,$dbname);
                 !$conn->set_charset("utf8");
                 // Kết nối sql
                 $result=mysqli_query($conn,$sql);
                 // Thực thi câu truy vấn
  
                 // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                     while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                     {
                       $MaHocPhan=$row['MaHocPhan'];
                       $TenHocPhan=$row['TenHocPhan'];
                       $MaLop=$row['MaLop'];
                       $Time_Start=$row['Time_Start'];
                       $Time_Stop=$row['Time_Stop'];
                       $Time_Play=$row['Time_Play'];
                       $KeyLog=$row['KeyLog'];
                       $SoLan=$row['SoLan'];
                     }
if (isset($_POST["btn_submit"])) {
		// lấy thông tin người dùng
		$CheckKey = $_POST["GhiDanh"];

		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$CheckKey = strip_tags($CheckKey);
		$CheckKey = addslashes($CheckKey);
		if ($CheckKey == "") {
      echo '<script language="javascript">';
      echo 'alert("Vui lòng nhập mã ghi danh!")';
      echo '</script>';
		}else{
      if( $KeyLog!=$CheckKey)
      {
        echo '<script language="javascript">';
        echo 'alert("Mã ghi danh không đúng. Vui lòng nhập lại!")';
        echo '</script>';
			}else{
        $_SESSION['MaHocPhan'] = $MaHocPhan;
        $MaSV = $_SESSION['MaSV'];
        $sqlcheck = "select * from ketquahp where MaSV='$MaSV' and MaHP='$MaHocPhan'";
        $querycheck = mysqli_query($conn,$sqlcheck);
        $num_rowscheck = mysqli_num_rows($querycheck);
        if($num_rowscheck >=$SoLan )
        {
          header('Location: ketqua.php?MaHocPhan='.$MaHocPhan.'');
        }
        else{
          header('Location: quiz.php?MaHocPhan='.$MaHocPhan.'');
        }

                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
              
			}
		}
	}
                     ?>

                     
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="assets/img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">Trang Chủ</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Các Khóa Học</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Danh sách Khóa học</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Danh sách Khóa học</h6>
            <a class="collapse-item" href="#">Tin cơ bản</a>
            <a class="collapse-item" href="#">Ngoại Ngữ</a>
            <a class="collapse-item" href="#">Hóa Phân Tích</a>
            <a class="collapse-item" href="#">PHP cơ bản</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./diemso.php">
          <i class="fas fa-fw fa-palette"></i>
          <span>Điểm Số</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Sắp diễn ra
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>Lịch kiểm tra</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Lịch kiểm tra</h6>
            <a class="collapse-item" href="#">Ngoại Ngữ</a>
            <a class="collapse-item" href="#">Hóa Học</a>
            <a class="collapse-item" href="#">Tin Học</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"> Version 2.0.1</div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
<!-- TopBar -->
<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                  <form class="navbar-search" action="./searchHP.php" method="get">
                    <div class="input-group">
                      <input type="text" class="form-control bg-light border-1 small"  placeholder="Tìm Kiếm khóa học" name="search" aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                      <div class="input-group-append" style="z-index:0">
                      <input class="btn btn-primary" type="submit" name="ok" value="Tìm kiếm" />
                      </div>
                    </div>
                  </form>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Thông Báo
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">Bạn có bài kiểm tra khóa học mới trong Ngoại ngữ ...</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    Bạn đã hoàn thành xong bài Ngoại ngữ A. Xem lại kết quả
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Bạn đã hoàn thành xong bài Tin cơ bản. Xem lại kết quả
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Xem thêm thông báo.</a>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-warning badge-counter">2</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Tin nhắn
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="img/man.png" style="max-width: 60px" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Nước vô tình, ngàn năm trôi mãi, Mây vô tình, mây mãi vẫn bay
                      having.</div>
                    <div class="small text-gray-500">Trung anh em · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="img/girl.png" style="max-width: 60px" alt="">
                    <div class="status-indicator bg-default"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Tiết kiệm nước là chính sách quốc gia, thế nên anh đừng tắm một mình nữa
                      </div>
                    <div class="small text-gray-500">Vương cô đơn · 2h</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Xem thêm tin nhắn</a>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-tasks fa-fw"></i>
                <span class="badge badge-success badge-counter">3</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Thành Tích
                </h6>
                <a class="dropdown-item align-items-center" href="#">
                  <div class="mb-3">
                    <div class="small text-gray-500">Tin Học Cơ Bản
                      <div class="small float-right"><b>50%</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item align-items-center" href="#">
                  <div class="mb-3">
                    <div class="small text-gray-500">Đường lối cách mạng
                      <div class="small float-right"><b>30%</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item align-items-center" href="#">
                  <div class="mb-3">
                    <div class="small text-gray-500">Ngoại ngữ Không Chuyên
                      <div class="small float-right"><b>75%</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Xem Tất Cả</a>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="assets/img/<?php echo $_SESSION['hinh']?>" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $_SESSION['username']?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="./profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Trang cá nhân
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Tùy Chọn
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Các bài kiểm tra
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="./login.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Đăng xuất
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <div class="container-fluid" id="container-wrapper">
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
                    <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary" Style="font-size:32px"><?php echo $TenHocPhan ?></h6>
                    </div><hr>
                    <h6 Style="font-size:32px;    padding-left: 25px;">Thông Tin Khóa Học</h6>
                    <div class="card-body">
                        <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                          <tr>
                            <th>Tên học phần</th>
                            <th>Lớp</th>
                            <th>Thời gian bắt đầu</th>
                            <th>Thời gian kết thúc</th>
                            <th>Thời gian thi</th>
                          </tr>
                        </thead>
                          <tbody>
                            <tr>
                              <td><?php echo $TenHocPhan ?></td>
                              <td><?php echo $MaLop ?></td>
                              <td><?php echo $Time_Start ?></td>
                              <td><?php echo $Time_Stop ?></td>
                              <td><?php echo $Time_Play ?></td>
                            </tr>
                          </tbody>
                        </table>
                        <hr>
                        <div> 
                        <form action="HocPhan.php?MaHocPhan=<?php echo $MaHocPhan ?>" method="POST">
                        <input type="text" name="GhiDanh" class="form-control" id="MaGhiDanh" aria-describedby="GhiDanh"
                        placeholder="Nhập mã ghi danh..."  style="margin-left: auto; margin-right: auto; display: block;width: 300px;color: black;"><br>
                            <input name="btn_submit" type="submit" value="Kiểm Tra" class="btn btn-primary btn-block" style="margin-left: auto; margin-right: auto; display: block;width: 100px;color: white;">
                        </form>                        
                        </div>
                        
                    </div>                
              </div>
            <!-- DataTable with Hover -->

          </div>
          <!--Row-->

        </div>
        <!---Container Fluid-->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; 2019 - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">Team 03</a></b>
            </span>
          </div>
        </div>
    </footer>
      <!-- Footer -->

      </div>
</div>
  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
</body>

</html>