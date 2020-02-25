

<?php
echo'
<div class="col-xl-9 col-lg-7">
  <div class="card mb-4">

<div class="d-sm-flex align-items-center justify-content-between mb-4" style="list-style:none;margin:20px;">
  <div class="col-xl-6 col-lg-9"> 
    <h1 class="h3 mb-0 text-gray-800" >Danh Mục Khóa Học</h1>
  </div>
  <div class="col-xl-6 col-lg-3" > 
  <form class="navbar-search" action="./searchHP.php" method="get">
  <div class="input-group">
    <input type="text" class="form-control bg-light border-1 small"  placeholder="Tìm Kiếm khóa học" name="search" aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
    <div class="input-group-append" style="z-index:0">
    <input class="btn btn-primary" type="submit" name="ok" value="Tìm kiếm" />
    </div>
  </div>
</form>
  </div>
</div>';
echo'<ul class="list-unstyled">';
foreach ($posts as $post) {
  echo '<li style="font-size:28px; padding-bottom:12px;margin-left: 20px;" class="fa fa-angle-right">
  <a href="./HocPhan.php?MaHocPhan=' .$post->MaHocPhan. '" >' .$post->TenHocPhan. '</a>
  </li>';
}
echo'</ul>  </div>
</div>';
?>