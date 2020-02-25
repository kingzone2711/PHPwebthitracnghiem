<?php
session_start();
?>
<?php
require_once 'config.php';
$MaHocPhan= $_SESSION['MaHocPhan'];
$MaSV= $_SESSION['MaSV'];
$response=mysqli_query($conn,"select CauSo,NDCauHoi,DapAn from cauhoi where MaHP='DL007'");
	 $i=1;
	 $right_answer=0;
	 $wrong_answer=0;
	 $unanswered=0;
	 while($result=mysqli_fetch_array($response)){ 
	       if($result['DapAn']==$_POST["$i"]){
		       $right_answer++;
		   }else if($_POST["$i"]==5){
		       $unanswered++;
		   }
		   else{
		       $wrong_answer++;
		   }
		   $i++;
	 }
     echo "<div id='answer'>";
     $num= mysqli_num_rows($response);
     $diem=10/$num;
     $diem=$diem*$right_answer;
     $sql = "insert into ketquahp(MaHP,MaSV,SoCauDung,DiemSo) values('$MaHocPhan',$MaSV,$right_answer,$diem)";
	 $result=mysqli_query($conn,$sql);
	 


	 $sql = "select * from hocphan where MaHocPhan= '$MaHocPhan'";
	 // Kết nối sql
	 $result=mysqli_query($conn,$sql);
	 // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
		//  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		//  {
		//    $MaHocPhan=$row['MaHocPhan'];
		//    $TenHocPhan=$row['TenHocPhan'];
		//    $MaLop=$row['MaLop'];
		//    $Time_Start=$row['Time_Start'];
		//    $Time_Stop=$row['Time_Stop'];
		//    $Time_Play=$row['Time_Play'];
		//    $KeyLog=$row['KeyLog'];
		//    $SoLan=$row['SoLan'];
		//  }
		//  if($SoLan>=1) {
		// 	 $SoLan=$SoLan-1;
		// 	 $sql = "UPDATE hocphan SET SoLan=$SoLan WHERE MaHocPhan='$MaHocPhan'";
		// 	 $result=mysqli_query($conn,$sql);
		//  }
     echo "</div>";
?>