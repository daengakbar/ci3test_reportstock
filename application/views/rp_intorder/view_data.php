<table class="table table-bordered table-hover" data-ride="datatables" class="display nowrap" cellspacing="0" width="100%">
<thead>
	<tr>
		<th class="text-center" width="35">NO.</th>
		<th>JENIS</th>
		<th class="info">YM</th>
		<th>PCS</th>
		<th>CARAT</th>
		<th>GRAM</th>
		<th>COGM</th>
		<th>NET</th>
		<th>USERNET</th>
	</tr>
</thead>
<tbody></tbody>
<tfoot>
	<tr>
		<th class="text-center" width="35">NO.</th>
		<th>JENIS</th>
		<th class="info">YM</th>
		<th>PCS</th>
		<th>CARAT</th>
		<th>GRAM</th>
		<th>COGM</th>
		<th>NET</th>
		<th>USERNET</th>
	</tr>
</tfoot>
</table>

<!--inline scripts related to this page-->
<script src="<?php echo base_url();?>scale/datatables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
+function ($) { "use strict";
  $(function(){	
	$('[data-ride="datatables"]').each(function() {
		var oTable = $(this).dataTable( {
				"bProcessing": true,
				"sAjaxSource": "<?php echo base_url();?>rp_intorder/view_data",  
				"sPaginationType": "full_numbers",
				"aoColumns": [
					{ "mData": "NO" },
					{ "mData": "JENIS" },
					{ "mData": "YM" },
					{ "mData": "PCS" },
					{ "mData": "CARAT" },
					{ "mData": "GRAM" },
					{ "mData": "COGM" },
					{ "mData": "NET" },
					{ "mData": "USERNET" },
				],
				"sScrollXInner": "220%"
		});
	});
  });
}(window.jQuery);	
</script>  

