<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title><?php echo $title;?></title>
  <meta name="description" content="print mutasi out" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?php echo base_url()?>scale/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url()?>scale/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url()?>scale/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url()?>scale/css/icon.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url()?>scale/css/font.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url()?>scale/css/app.css" type="text/css" /> 
  <link rel="shortcut icon" href="<?php echo base_url()?>scale/images/favicon.ico"/>  
</head>
<style> 
	.fontdtl{font-size:11px;} 
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
	}
</style>
<body class="">
  <section class="hbox stretch">
	<section id="content" class='vbox bg-white'>
	  <section class="content bg-white scrollable wrapper">
		<header class="header b-b b-light hidden-print">
		  <button href="#" class="btn btn-sm btn-info pull-right" onClick="window.print();">Print</button>
		  <p> <?php echo $small;?></p>
		</header>
		<section class="scrollable wrapper">
		  <div class="row">
		  <table class="table table-bordered m-b-none"  width="100%">
			<thead>
			  <tr>
				<th class="text-center" width="35">NO.</th>
				<th width="45">DATE</th>
				<th class="info" width="130">NO.TRANS</th>
				<th>DESCRIPTION</th>
				<th width="60" class="text-center">QTY</th>
				<th width="100" class="text-center">PRICE</th>
				<th width="110" class="text-center">TOTAL</th>
				<th width="75" class="text-center">STATUS</th>
			  </tr>
			</thead>
			<tbody class="fontdtl">
			  <?php 
				$i=1; $T=0;
				foreach($data->result() as $dt){ 
					$date = substr($dt->dTransDate,0,10);	
					$total = $dt->nQty*$dt->nHpp;
				?>
			  <tr>
				<td><?php echo $i;?></td>
				<td><?php echo $date;?></td>
				<td><?php echo substr($dt->cNoInorder,4,25);?></td>
				<td><?php echo $dt->cItemCode." - ".$dt->cItemName;?></td>
				<td class="text-center"><?php echo $dt->nQty;?></td>
				<td class="text-right"><?php echo number_format($dt->nHpp);?></td>
				<td class="text-right"><?php echo number_format($total);?></td>
				<td class="text-center"><?php echo $dt->cStatus;?></td>
			  </tr>
			  <?php $i++; 
			    $T=$T+$total;
			  } ?>
			  <tr>
				<td colspan='6' class="text-right"><strong>TOTAL : </strong></td>
				<td class="text-right"><?php echo number_format($T) ;?></td>
			  </tr>
			</tbody>
		  </table> 
		  <div class="row">
			<div class="col-xs-9"></div>
			<div class="col-xs-3">
			  <p class="m-t m-b"><span class="label bg-danger"><?php echo strtoupper($wrht['Rgname']);?></span><br>
			  #<?php echo date("d-M-Y");?></p><br>
			  <u><?php echo $User;?></u>
			</div>
		  </div>		  
		</section>
	  </section>
	  <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
	</section>
  </section>
  <script src="<?php echo base_url()?>scale/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url()?>scale/js/bootstrap.js"></script>
  <!-- App -->
  <script src="<?php echo base_url()?>scale/js/app.js"></script>  
  <script src="<?php echo base_url()?>scale/js/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?php echo base_url()?>scale/js/app.plugin.js"></script>
</body>
</html>