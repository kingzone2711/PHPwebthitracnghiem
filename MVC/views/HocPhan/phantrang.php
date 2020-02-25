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
        <a class="nav-link" href="ui-colors.html">
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
        <div class="container-fluid" id="container-wrapper">
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
                <div class="col-lg-12">
                    <?php
                    echo'
                
                    <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Khóa H</h6>
                </div>
                <div class="card-body">
                  <form>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                      <small id="emailHelp" class="form-text text-muted">Well never share your
                        email with anyone else.</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
                ';





                    // Nếu người dùng submit form thì thực hiện
                        // Gán hàm addslashes để chống sql injection
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
                                    echo '<tr role="row" class="odd">';
                                        echo '<td ><a href="./HocPhan.php?MaHocPhan='.$MaHocPhan.'">'.$TenHocPhan."</td>";
                                        echo "<td>{$row['MaLop']}</td>";
                                        echo "<td>{$row['Time_Start']}</td>";
                                        echo "<td>{$row['Time_Stop']}</td>";
                                        echo "<td>{$row['Time_Play']}</td>";
                                    echo '</tr>';
                                }
                    
                    ?>
                </div>
            <!-- DataTable with Hover -->

          </div>
          <!--Row-->

        </div>
        <!---Container Fluid-->
      <!-- Footer -->
      <?php 
      require_once('./footer.php');
      ?>
      <!-- Footer -->

      </div>
</div>
  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
</body>

</html>