<section class="row">
	<div class="col-sm-6">
		<h3 class="m-b-xs text-black"><i class="i i-docs"></i> <?php echo $title;?></h3>
		<small> <?php echo $small;?></small> 
	</div>
	<div class="col-sm-6 text-right text-left-xs m-t-md">
		 <ul class="breadcrumb pull-right">
			<li><small>You are here :</small><a href="<?php echo base_url();?>home"> Home</a></li>
			<li class="active"><?php echo $class;?></li>
			<li class="active"><b><?php echo $title;?></b></li>           
		</ul>
	</div>
</section>
<section class="panel panel-default">
	<header class="panel-heading">
		<ul class="nav nav-pills pull-right">
    		<li><a href="javascript:;" class="text-success" id="btnexl"><i class="i i-file-excel"></i> Download Excel</a></li>
			<li><a href="javascript:;" class="text-primary" id="btnload"><i class="i i-search2"></i> Load Data</a></li>
        </ul>
		List Data
	</header>
	<div class="panel-body">
		<div class="table-responsive">
			<div id="tampil_data"></div>
		</div>	
	</div>	
</section>
<!-- JQ -->  
<script src="<?php echo base_url()?>scale/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#btnload").click(function(){viewdata();});
	$("#btnexl").click(function(){exportdata('exl');});	
	$("#btncsv").click(function(){exportdata('csv');});	
	viewdata();
});
function exportdata(flg){
	window.open('<?php echo site_url(); ?>rp_intorder/export_toexcel');	
}
function viewdata(){
	$.ajax({
		type	: 'POST',
		url		: "<?php echo site_url(); ?>rp_intorder/viewdata",
		cache	: false,
		success	: function(data){
				$("#tampil_data").html(data);
		}
	});
}
</script>
</body>
</html>