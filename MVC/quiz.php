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
  <title>Kiểm Tra Học Phần</title>
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
      <?php 
      require_once('./nav.php');
      ?>   
        <div class="container-fluid" id="container-wrapper">
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
            <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                                    <?php
                                            $MaHocPhan = addslashes($_GET['MaHocPhan']);
                                            require_once('./conf.php');
                                            $sql = "select * from cauhoi where MaHP= '$MaHocPhan'";                                        
                                            $sql1 = "select * from hocphan where MaHocPhan= '$MaHocPhan'";
                                            $result=mysqli_query($conn,$sql1);
                                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                                                    {
                                                    $TenHocPhan=$row['TenHocPhan'];
                                                }

                                            

                                                $response=mysqli_query($conn,$sql);
                                                    while($row=mysqli_fetch_array($response,MYSQLI_ASSOC))
                                                    {
                                                    $MaDe=$row['MaDe'];
                                                }
                                                if(mysqli_num_rows($response)==null) {
                                                    echo '<h6 Style="font-size:32px;    padding-left: 25px;">Chưa Có Đề Kiểm Tra Cho Khóa Học Này </h6>';}
                                                   else{ 

                                     ?>
                    <h6 class="m-0 font-weight-bold text-primary" Style="font-size:32px"><?php echo $TenHocPhan?></h6>
                    </div><hr>
                    <h6 Style="font-size:32px;    padding-left: 25px;">Nội Dung Bài Kiểm Tra Mã Đề: <?php echo '<span style="color:red;">'.$MaDe.'</span>'?></h6>
                    <hr>



              <?php $response=mysqli_query($conn,"select * from cauhoi where MaHP='$MaHocPhan'");?>
            <form method='post' id='quiz_form' style="padding-left: 30px;">
              <?php while($result=mysqli_fetch_array($response,MYSQLI_ASSOC)){ ?>
              <div id="question_<?php echo $result['CauSo'];?>" class='questions'>
              <h2 id="question_<?php echo $result['CauSo'];?>"><?php echo $result['CauSo'].".".$result['NDCauHoi'];?></h2>
              <div class='align'>
              <input type="radio" value="A" id='radio1_<?php echo $result['CauSo'];?>' name='<?php echo $result['CauSo'];?>'>
              <label id='ans1_<?php echo $result['CauSo'];?>' for='1'><?php echo $result['A'];?></label>
              <br/>
              <input type="radio" value="B" id='radio2_<?php echo $result['CauSo'];?>' name='<?php echo $result['CauSo'];?>'>
              <label id='ans2_<?php echo $result['CauSo'];?>' for='1'><?php echo $result['B'];?></label>
              <br/>
              <input type="radio" value="C" id='radio3_<?php echo $result['CauSo'];?>' name='<?php echo $result['CauSo'];?>'>
              <label id='ans3_<?php echo $result['CauSo'];?>' for='1'><?php echo $result['C'];?></label>
              <br/>
              <input type="radio" value="D" id='radio4_<?php echo $result['CauSo'];?>' name='<?php echo $result['CauSo'];?>'>
              <label id='ans4_<?php echo $result['CauSo'];?>' for='1'><?php echo $result['D'];?></label>
              <input type="radio" checked='checked' value="5" style='display:none' id='radio4_<?php echo $result['CauSo'];?>' name='<?php echo $result['CauSo'];?>'>
              </div>
              <br/>
              <input type="button" id='next<?php echo $result['CauSo']; ?>' value='Next!' name='question'  class="btn btn-primary"/>
              </div>
              <?php }?>
          </form>
<div id='result'>
</div>
<div id="demo1" class="demo" style="text-align:center;font-size: 25px;">00:00:00</div>    
                    </div> 
                    <a href="./Ketqua.php?MaHocPhan=<?php echo$MaHocPhan?>" class="btn btn-primary" style="margin-left: auto; margin-right: auto; display: block;width: 100px;color: white;">Kết Thúc</a>                
<?php
if (isset($_POST['submit'])) {
if(isset($_POST['radio']))
{
echo "You have selected :".$_POST['radio']; 
}
}
                                               }
?>
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