<?php

echo "
	<div id='loader-3' style='display:none;'>
		<span></span><span></span><span></span><span></span><span></span>
	</div>
</div>
<script>
//window.nodeRequire = require; 
//delete window.require;
//delete window.exports; delete window.module; 
</script>
<script src='bower_components/jquery/dist/jquery.min.js'></script>
<!-- jQuery UI 1.11.4 -->
<script src='bower_components/jquery-ui/jquery-ui.min.js'></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src=' bower_components/bootstrap/dist/js/bootstrap.min.js'></script>
<!-- Morris.js charts -->
<script src=' bower_components/raphael/raphael.min.js'></script>
<script src=' bower_components/morris.js/morris.min.js'></script>
<!-- Sparkline -->
<script src=' bower_components/jquery-sparkline/dist/jquery.sparkline.min.js'></script>
<!-- jvectormap -->
<script src=' plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
<script src=' plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
<!-- jQuery Knob Chart -->
<script src=' bower_components/jquery-knob/dist/jquery.knob.min.js'></script>
<!-- daterangepicker -->
<script src=' bower_components/moment/min/moment.min.js'></script>
<script src=' bower_components/bootstrap-daterangepicker/daterangepicker.js'></script>
<!-- datepicker -->
<script src=' bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'></script>
<!-- Bootstrap WYSIHTML5 -->
<script src=' plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'></script>
<!-- Slimscroll -->
<script src=' bower_components/jquery-slimscroll/jquery.slimscroll.min.js'></script>
<!-- FastClick -->
<script src=' bower_components/fastclick/lib/fastclick.js'></script>

 <!-- Sweet Alert -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.js'></script>
<!-- AdminLTE App -->
<script src=' dist/js/adminlte.min.js'></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src=' dist/js/pages/dashboard.js'></script>
<!-- AdminLTE for demo purposes -->
<script src='scripts/scripts.js'></script>
<script src='https://www.paypalobjects.com/api/checkout.js'></script>
<div id='fb-root'></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = '//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.10&appId=243247112870024';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
";

 ?>