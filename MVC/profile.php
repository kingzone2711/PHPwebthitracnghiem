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
  <link href="img/logo/logo.png" rel="icon">
  <title>Thông Tin Sinh Viên</title>
  <?php 
      require_once('./data.php');
?>
</head>

<body id="page-top">
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
      <div id="content">
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
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <!-- Row -->
          <div class="row">
          <div>
</div>

<?php
require_once('config.php');
$user=$_SESSION['user'];
$sql="select * from  giaovien";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
    $magv=$row['MaGV'];
    $ten=$row['TenGV'];
    $ngaysinh=$row['NgaySinh'];
    $gioitinh=$row['GioiTinh'];
    $sdt=$row['SDT'];
    $email=$row['Email'];
    $tendn=$row['TenDN'];
    $matkhau=$row['MatKhau'];
    $kers=$row['KeysR'];
    $makhoa=$row['MaKhoa'];
}
?>
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
                        <?php echo'    <h6 class="m-0 font-weight-bold" Style="font-size:22px;color:black;">'.$_SESSION['username'].'</h6>';
                        ?>
                        <br>
					</div>
					<div class="profile-usertitle-job">
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->

				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
     <div class="profile-content">
           <!-- form -->      
<form action="xlcapnhat_user.php" method="post">        
         <input type="hidden" name="id" value="<?php echo $magv; ?>" > 
  <table class="table">
  <thead>
    <tr>
    <h6 class="m-0 font-weight-bold text-primary" Style="font-size:32px">Trang thông tin cá nhân</h6>
    <br>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Họ và tên</th>
      <td>
      <input type="text" name="ten" value="<?php
      echo $ten;
       ?>">
      </td>
    </tr>
    <tr>
      <th scope="row">Năm sinh</th>
      <td><input type="text" name="ngaysinh" value="<?php
      echo $ngaysinh;
       ?>"></td>
    </tr>
    <tr>
      <th scope="row">Giới tính</th>
      <td><input type="text"  name="gioitinh" value="<?php if($gioitinh==1) echo'Nam';
else      echo 'Nữ';
       ?>"></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><input type="text" name="email" value="<?php
      echo $email;
       ?>">
     </td>
    </tr>
    <tr>
      <th scope="row">Số điện thoại</th>
      <td><input type="text" name="sdt" value="<?php
      echo $sdt;
       ?>"></td>
   
    </tr>
    <tr>
      <th scope="row">Khoa</th>
      <td><?php
      echo $makhoa;
       ?></td>
   
    </tr>
  </tbody>
</table>
<input type="submit" value="chỉnh sửa" class="btn btn-danger btn-sm">
</form>
           
</div>
 
</div>  
</div>
</div>
          </div>
          <!--Row-->

          <!-- Documentation Link -->


        </div>
        <!---Container Fluid-->
      </div>

      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; 2019 - developed by
              <b><a href="#" target="_blank">Team 03</a></b>
            </span>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Page level plugins -->
  <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

</body>

</html>