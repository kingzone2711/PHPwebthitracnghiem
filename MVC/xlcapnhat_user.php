<?php
require_once('config.php');
$id=$_POST['id'];
$ten=$_POST['ten'];
$ngaysinh=$_POST['ngaysinh'];
$gioitinh=$_POST['gioitinh'];
if($gioitinh=='Nam') $gioitinh=1;else $gioitinh=0;
$std=$_POST['sdt'];
$email=$_POST['email'];
$sql="update giaovien set TenGV='$ten',	NgaySinh='$ngaysinh',GioiTinh='$gioitinh',SDT='$std',Email='$email' where MaGV='$id'";
$result=mysqli_query($conn,$sql) or die("loi!");
if($result)
{
    header("location:profile.php");
}
?>
