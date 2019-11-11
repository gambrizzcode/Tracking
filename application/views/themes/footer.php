	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>Version</b> 1.0.0
		</div>
		<strong>Copyright &copy; 2018 <a href="http://anmediacorp.com">ANMediaCorp Jember</a>.</strong> All rights
    reserved.
	</footer>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jQueryUI/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.all.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script type="text/javascript">
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $(".inieditor").wysihtml5();
  });
</script>
<script type="text/javascript">
	$("#wadah-tgl-status").hide();
	$("select[name='status']").change(function() {
		if ($(this).val() == "PROSES") {
			$("#wadah-tgl-status").hide();
		}else if($(this).val() == ""){
			$("#wadah-tgl-status").hide();
		}else{
			$("#wadah-tgl-status").show();
		}
	});
</script>
<script type="text/javascript">
	$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true
	})
	$("select[name='kec']").click(function() {
		var kec = $(this).val();
        $.ajax({
        	url: '<?php echo base_url()."index.php/c_permohonan/kec_ajax"; ?>',
        	type: 'GET',
        	data: "kec="+kec,
        	success:function(data){
        		$("select[name='desa']").html(data);
        	}
        });
	});
</script>
<script type="text/javascript">
	$('.table-heleh').DataTable({
		'searching' : true,
		'ordering' : true,
		'lengthChange' : true,
		'lengthMenu' : [[10 ,50 ,100 ,200 ,-1 ],[10 ,50 ,100 ,200 ,"All" ]],
		'paging' : true,
		'pagingType' : 'full_numbers',
		'scrollX' : true,
	});
</script>
<script type="text/javascript">
	$("input[name='password']").keyup(function() {
		var password = $(this).val().length;
		if (password < 4) {
			$(this).css('box-shadow', 'red 0px 0px 10px');
            $(this).focus();
		}else{
			$(this).css('box-shadow', 'blue 0px 0px 2px');
		}
	});
	$("input[name='password']").keydown(function() {
		var password = $(this).val().length;
		if (password < 4) {
			$(this).css('box-shadow', 'red 0px 0px 10px');
            $(this).focus();
		}else{
			$(this).css('box-shadow', 'blue 0px 0px 2px');
		}
	});
	$("input[name='password']").focusout(function() {
		var password = $(this).val().length;
		if (password < 4) {
			$(this).css('box-shadow', 'red 0px 0px 10px');
            $(this).focus();
		}else{
			$(this).css('box-shadow', 'blue 0px 0px 2px');
		}
	});
	$("input[name='confirm']").keyup(function() {
		var confirm = $(this).val();
		var password = $("input[name='password']").val();
		if (confirm != password) {
			$(this).css('box-shadow', 'red 0px 0px 10px');
            $(this).focus();
		}else{
			$(this).css('box-shadow', 'blue 0px 0px 2px');
		}
	});
	$("input[name='confirm']").keydown(function() {
		var confirm = $(this).val();
		var password = $("input[name='password']").val();
		if (confirm != password) {
			$(this).css('box-shadow', 'red 0px 0px 10px');
            $(this).focus();
		}else{
			$(this).css('box-shadow', 'blue 0px 0px 2px');
		}
	});
	$("input[name='confirm']").focusout(function() {
		var confirm = $(this).val();
		var password = $("input[name='password']").val();
		if (confirm != password) {
			$(this).css('box-shadow', 'red 0px 0px 10px');
            $(this).focus();
		}else{
			$(this).css('box-shadow', 'blue 0px 0px 2px');
		}
	});
</script>
</body>
</html>
