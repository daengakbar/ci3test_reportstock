<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class rp_intorder extends CI_Controller {
	/**
	 * Index Page for this controller.
	 * Programmer : Akbar Z
	 * TIM : Akbar
	 */
	function __construct() {
        parent::__construct();
		date_default_timezone_set('Asia/Jakarta');	
    }
	function index()
	{
		$d = array(
			'title' => 'Report',
			'small' => 'Laporan Stok',
			'class' => 'report',
			'ulink' => 'intorder-r',
		);
		$content 	= 'rp_intorder/view';
		$this->template->load('template',$content,$d);
		
	}
	function viewdata(){$this->load->view('rp_intorder/view_data');}
	function view_data()
	{
		$no=1; $result = array();
		/* -------: condition :------- */
		$query = "SELECT YM,JENIS,SUM(PCS)PCS,CARAT,GRAM,COGM,NET,USERNET FROM msproduct GROUP BY YM,JENIS,PCS";
		$result['total'] = $this->db->query($query)->num_rows();$row = array();	
		$qr = $this->model_global->manualQuery($query);		
		foreach($qr->result_array() as $rs){
			$saldo   = $this->model_data->get_stok('prodstckawal',$rs['JENIS']);		 
			$buyback = $this->model_data->get_stok('prodbuyback',$rs['JENIS']);		 
			$sales   = $this->model_data->get_stok('prodsales',$rs['JENIS']);		 
			$akhir   = ($saldo+$rs['PCS']+$buyback)-$sales;
			$row[] = array(
				'NO'   =>$no++,	
				'JENIS'=>$rs['JENIS'],
				'YM'   =>$rs['YM'],
				'PCS'  =>'<div class="text-right">'.$saldo.'</div>',
				'CARAT'=>'<div class="text-right">'.$rs['CARAT'].'</div>',
				'GRAM' =>'<div class="text-right">'.$rs['GRAM'].'</div>',
				'COGM' =>'<div class="text-right">'.$rs['COGM'].'</div>',
				'NET'  =>'<div class="text-right">'.$rs['NET'].'</div>',
				'USERNET'=>'<div class="text-right">'.$rs['USERNET'].'</div>',
				'SIB'  =>'<div class="text-right">'.$rs['PCS'].'</div>',
				'SBB'  =>'<div class="text-right">'.$buyback.'</div>',
				'SIP'  =>'<div class="text-right">'.$sales.'</div>',
				'SA'  =>'<div class="text-right"><b>'.$akhir.'</b></div>',
			);	
		}
		$result=array('aaData'=>$row);
		echo  json_encode($result);	
	}
	public function export_toexcel()
	{
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();
		// Set document properties
		$spreadsheet->getProperties()->setCreator('Daeng - wakudev.com')
			->setLastModifiedBy('Daeng - wakudev.com')
			->setTitle('Office 2007 XLSX Test Document')
			->setSubject('Office 2007 XLSX Test Document')
			->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
			->setKeywords('office 2007 openxml php')
			->setCategory('Internal Order');
		
		$sheet = $spreadsheet->getActiveSheet();
		$styleArray = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];
		// Add some data
		$i = 5;	
		$spreadsheet->getActiveSheet()->mergeCells('A1:D1');
		$spreadsheet->getActiveSheet()->mergeCells('A2:D2');
		$spreadsheet->getActiveSheet()->mergeCells('A3:D3');
		$spreadsheet->getActiveSheet()->getStyle('A1:O3')->getFont()->setName('Arial');
		$spreadsheet->getActiveSheet()->getStyle('A1:O3')->getFont()->setSize(10);
		$spreadsheet->getActiveSheet()->getStyle('A1:O3')->getFont()->setBold(true);
		$spreadsheet->getActiveSheet()->getRowDimension(4)->setRowHeight(30);
		
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(6);	
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(12);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(12);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(12);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(12);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(12);
		$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(12);
		$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(12);
		$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(12);
		$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(12);
		$spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(12);
		$spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(12);
		
		$j = $i-1;
		$cells = "A".$j.":M".$j;
		$spreadsheet->getActiveSheet()->getStyle($cells)->getAlignment()->setWrapText(true);
		$spreadsheet->getActiveSheet()->getStyle($cells)->getFont()->setBold(true);
		$sheet->getStyle($cells)->getAlignment()->setHorizontal('center');
		$sheet->getStyle($cells)->getAlignment()->setVertical('center');
			
		$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A1', 'LAPORAN STOCK')
		;
		$sheet->getStyle($cells)->applyFromArray($styleArray);
		$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A'.$j, 'NO') 			
				->setCellValue('B'.$j, 'JENIS') 		
				->setCellValue('C'.$j, 'YM') 		
				->setCellValue('D'.$j, 'PCS')		
				->setCellValue('E'.$j, 'CARAT')		
				->setCellValue('F'.$j, 'GRAM')	
				->setCellValue('G'.$j, 'COGM')	
				->setCellValue('H'.$j, 'NET')	
				->setCellValue('I'.$j, 'USERNET')	
				->setCellValue('J'.$j, 'STOCK IN BELI')
				->setCellValue('K'.$j, 'STOCK IN BUYBACK')	
				->setCellValue('L'.$j, 'STOCK OUT PENJUALAN')	
				->setCellValue('M'.$j, 'STOCK AKHIR')	
		;
		$spreadsheet->getActiveSheet()->getStyle($cells)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('eeefff');
		
		$query = "SELECT YM,JENIS,SUM(PCS)PCS,CARAT,GRAM,COGM,NET,USERNET FROM msproduct GROUP BY YM,JENIS,PCS";
		$result['total'] = $this->db->query($query)->num_rows();$row = array();	
		$q = $this->model_global->manualQuery($query);	
		
		// Miscellaneous glyphs, UTF-8 
		if($q->num_rows()>0){
			$no=1;
			
			foreach($q->result() as $row){
				$saldo   = $this->model_data->get_stok('prodstckawal',$row->JENIS);		 
				$buyback = $this->model_data->get_stok('prodbuyback',$row->JENIS);		 
				$sales   = $this->model_data->get_stok('prodsales',$row->JENIS);		 
				$akhir   = ($saldo+$row->PCS+$buyback)-$sales;
				$spreadsheet->setActiveSheetIndex(0)
					->setCellValue('A'.$i, $no)
					->setCellValue('B'.$i, $row->JENIS)
					->setCellValue('C'.$i, $row->YM)
					->setCellValue('D'.$i, $saldo)			
					->setCellValue('E'.$i, $row->CARAT)			
					->setCellValue('F'.$i, $row->GRAM)
					->setCellValue('G'.$i, $row->COGM)
					->setCellValue('H'.$i, $row->NET)
					->setCellValue('J'.$i, $row->PCS)	
					->setCellValue('K'.$i, $buyback)	
					->setCellValue('L'.$i, $sales)	
					->setCellValue('M'.$i, $akhir)	
				;
				$sheet->getStyle('A'.$i.':M'.$i)->applyFromArray($styleArray);
				$spreadsheet->getActiveSheet()->getStyle('D'.$i.':M'.$i)->getNumberFormat()->setFormatCode('#,##0');
				$i++; $no++;
			}
		}
		//$sheet->getStyle('D'.$j.':I'.$i)->getAlignment()->setHorizontal('right');
		$k = $i-1;
		$spreadsheet->getActiveSheet()->mergeCells('A'.$i.':C'.$i);
		$spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$i, 'TOTAL : ')
											->setCellValue('D'.$i, '=SUBTOTAL(9,D'.$j.':D'.$k.')')
											->setCellValue('E'.$i, '=SUBTOTAL(9,E'.$j.':E'.$k.')')
											->setCellValue('F'.$i, '=SUBTOTAL(9,F'.$j.':F'.$k.')')
											->setCellValue('G'.$i, '=SUBTOTAL(9,G'.$j.':G'.$k.')')
											->setCellValue('H'.$i, '=SUBTOTAL(9,H'.$j.':H'.$k.')')
											->setCellValue('I'.$i, '=SUBTOTAL(9,I'.$j.':I'.$k.')')
											->setCellValue('J'.$i, '=SUBTOTAL(9,J'.$j.':J'.$k.')')
											->setCellValue('K'.$i, '=SUBTOTAL(9,K'.$j.':K'.$k.')')
											->setCellValue('L'.$i, '=SUBTOTAL(9,L'.$j.':L'.$k.')')
											->setCellValue('M'.$i, '=SUBTOTAL(9,M'.$j.':M'.$k.')');
		$sheet->getStyle('A'.$i.':M'.$i)->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->freezePane('E5');
		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Internal');
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);
		// Redirect output to a client’s web browser (Xlsx)
		$title = "ReportStock_".date('dmY');
		$sheet->setTitle("Laporan");

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename='.$title); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */