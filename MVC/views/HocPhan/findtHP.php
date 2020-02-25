<?php 
   $servername="localhost";$username="root";$password="";
   $dbname="mysql_ltpm";
   $conn= mysqli_connect($servername,$username,$password,$dbname);
   !$conn->set_charset("utf8");
   if(!$conn){
       die('Kết nối thất bại:'.mysqli_connect_error());
   }
   if(! $conn )
   {
      die('Không thể kết nối: ' . mysql_error());
   } 
  
   $sql="select * from hocphan ";
   $result=mysqli_query($conn,$sql);
   if(! $result )
   {
      die('Không thể lấy dữ liệu: ' . mysql_error());
   }   



   while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
   {
       $magv=$row['MaHocPhan'];
       $ten=$row['TenHocPhan'];
       $ngaysinh=$row['MaLop'];
      echo "ID :{$magv}  <br> ".
         "Tên nhân viên : {$ten} <br> ".
         "Lương : {$ngaysinh} <br> ".
         "--------------------------------<br>";
   }

 //  mysql_close($conn);
?>