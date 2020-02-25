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
  <title>RuangAdmin - DataTables</title>
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
        <a class="nav-link" href="charts.html">
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
      <?php 
      require_once('./nav.php');
      ?>   
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary" Style="font-size:32px">Trang kết quả tìm kiếm</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
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
                    <?php
        // Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['ok'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo '<span style="color:red;">Dữ liệu tìm kiếm rỗng</span>';
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $sql = "select * from hocphan where TenHocPhan like '%$search%'";
               

                // Kết nối sql

                require_once('./conf.php');

                $result=mysqli_query($conn,$sql);
                // Thực thi câu truy vấn
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả

                    // Dùng $num để đếm số dòng trả về.
                    echo " Kết Quả Tìm Kiếm của: <b>$search</b>";
                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {
                      $MaHocPhan=$row['MaHocPhan'];
                      $TenHocPhan=$row['TenHocPhan'];
                        echo '<tr role="row" class="odd">';
                            echo '<td ><a href="./HocPhan.php?MaHocPhan='.$MaHocPhan.'">'.$TenHocPhan."</td>";
                            echo "<td>{$row['MaLop']}</td>";
                            echo "<td>{$row['Time_Start']}</td>";
                            echo "<td>{$row['Time_Stop']}</td>";
                            echo "<td>{$row['Time_Play']}</td>";
                        echo '</tr>';
                    }
            }
        }
        ?>
                      <!-- <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                      </tr> -->
                    </tbody>
                  </table>
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
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/js/ruang-admin.min.js"></script>
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