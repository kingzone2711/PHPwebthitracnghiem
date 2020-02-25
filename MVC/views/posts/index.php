
<?php
echo'         <!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
  <div class="card mb-4">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Danh Mục Khóa Học</h1>
</div>';
echo'<ul';
foreach ($posts as $post) {
  echo '<li>
    <a href="index.php?controller=posts&action=showPost&id=' . $post->MaSV . '">' . $post->TenSV . '</a>
  </li>';
}
echo'</ul>  </div>
</div>';
?>