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
  <script>
$(document).ready(function(){
    $('#demo1').stopwatch().stopwatch('start');
    var steps = $('form').find(".questions");
    var count = steps.size();
    steps.each(function(i){
        hider=i+2;
        if (i == 0) {   
            $("#question_" + hider).hide();
            createNextButton(i);
        }
        else if(count==i+1){
            var step=i + 1;
            //$("#next"+step).attr('type','submit');
            $("#next"+step).on('click',function(){
 
               submit();
 
            });
        }
        else{
            $("#question_" + hider).hide();
            createNextButton(i);
        }
 
    });
    function submit(){
         $.ajax({
                        type: "POST",
                        url: "ajax.php",
                        data: $('form').serialize(),
                        success: function(msg) {
                          $("#quiz_form,#demo1").addClass("hide");
                          $('#result').show();
                          $('#result').append(msg);
                        }
         });
 
    }
    function createNextButton(i){
        var step = i + 1;
        var step1 = i + 2;
        $('#next'+step).on('click',function(){
            $("#question_" + step).hide();
            $("#question_" + step1).show();
        });
    }
    setTimeout(function() {
          submit();
    }, 50000);
});
</script> 
  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
  <script language="javascript">
 
 var h = 00; // Giờ
 var m = 30; // Phút
 var s = 00; // Giây
  
 var timeout = null; // Timeout
    /*BƯỚC 1: CHUYỂN ĐỔI DỮ LIỆU*/
    // Nếu số giây = -1 tức là đã chạy ngược hết số giây, lúc này:
    //  - giảm số phút xuống 1 đơn vị
    //  - thiết lập số giây lại 59
    if (s === -1){
        m -= 1;
        s = 59;
    }
 
    // Nếu số phút = -1 tức là đã chạy ngược hết số phút, lúc này:
    //  - giảm số giờ xuống 1 đơn vị
    //  - thiết lập số phút lại 59
    if (m === -1){
        h -= 1;
        m = 59;
    }
 
    // Nếu số giờ = -1 tức là đã hết giờ, lúc này:
    //  - Dừng chương trình
    if (h == -1){
        clearTimeout(timeout);
        alert('Hết giờ');
        return false;
    }
 
    /*BƯỚC 1: HIỂN THỊ ĐỒNG HỒ*/
    document.getElementById('h').innerText = h.toString();
    document.getElementById('m').innerText = m.toString();
    document.getElementById('s').innerText = s.toString();
 
    /*BƯỚC 1: GIẢM PHÚT XUỐNG 1 GIÂY VÀ GỌI LẠI SAU 1 GIÂY */
    timeout = setTimeout(function(){
        s--;
        start();
    }, 1000);
</script>
  </div>