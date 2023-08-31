<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_global extends CI_Model {
	/**
	 * Index Page for this controller.
	 * Programmer : Daeng Akbar.S.Kom
	 * http://daengakbar.com
	 * TIM : Akbar, Misra haryati
	 */
	function __construct()
    {
        parent::__construct();
		date_default_timezone_set('Asia/Jakarta'); 
		$this->load->helper('cookie');
    } 
	function hari() { 
		$hari2=date("w"); 
		Switch ($hari2){
			case 0 	: $hari="Minggu"; Break; 
			case 1 	: $hari="Senin"; Break; 
			case 2	: $hari="Selasa"; Break; 
			case 3 	: $hari="Rabu"; Break; 
			case 4 	: $hari="Kamis"; Break; 
			case 5 	: $hari="Jumat"; Break; 
			case 6 	: $hari="Sabtu"; Break; 
		} 
		return $hari; 
	} 
	function Server_thn($date){
		$exp = explode('-',$date);
		$tgl = $date;
		$date= substr($date, 0, 4);
		return $date;
	}
	function Server_date($date){
		$exp = explode('-',$date);
		$tgl = $date;
		$date= substr($date, 8, 2).'-'.substr($date, 5, 2).'-'.substr($date, 0, 4);
		return $date;
	}
	function Server_date_str($date){
		$exp = explode('-',$date);
		$tgl = $date;
		$date= substr($date, 6, 4).'-'.substr($date, 3, 3).''.substr($date, 0, 2);
		return $date;
	}
	function getAllData($table)
	{
		return $this->db->get($table);
	}
	function getAllDataLimited($table,$limit,$offset)
	{
		return $this->db->get($table, $limit, $offset);
	}
	function getSelectedDataLimited($table,$data,$limit,$offset)
	{
		return $this->db->get_where($table, $data, $limit, $offset);
	}
	//select table
	function getSelectedData($table,$data)
	{
		return $this->db->get_where($table, $data);
	}
	//update table
	function updateData($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}
	function deleteData($table,$data)
	{
		$this->db->delete($table,$data);
	}
	function insertData($table,$data)
	{
		$this->db->insert($table,$data);
	}
	//Query manual
	function manualQuery($q)
	{
		return $this->db->query($q);
	}
	function tgl_sql($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}
	function tgl_str($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}
	function ambilTgl($tgl){
		$exp = explode('-',$tgl);
		$tgl = $exp[2];
		return $tgl;
	}
	function ambilBln($tgl){
		$exp = explode('-',$tgl);
		$tgl = $exp[1];
		$bln = $this->model_global->getBulan($tgl);
		$hasil = substr($bln,0,3);
		return $hasil;
	}
	function tgl_indo($tgl){
			$jam = substr($tgl,11,10);
			$tgl = substr($tgl,0,10);
			$tanggal = substr($tgl,8,2);
			$bulan = $this->model_global->getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun.' '.$jam;		 
	}	
	function combobln($awal, $akhir, $var, $terpilih){
		echo "<select name=$var id=$var class='form-control' >
		<option value=''>-Pilih-</option>";
		for ($bln=$awal; $bln<=$akhir; $bln++){
			$lebar=strlen($bln);
			switch($lebar){
			  case 1:
				{
					$b="0".$bln;
					break;     
				}
				case 2:
				{
					$b=$bln;
					break;     
				}      
			}  
			if ($bln==$terpilih)
				echo "<option value=".$b." selected>".$b."</option>";
			else
				echo "<option value=".$b.">".$b."</option>";
		}
		echo "</select> ";
	}
	function getBulan($bln){
		switch ($bln){
			case 1: 
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	} 
	function hari_ini($hari){
		date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
		$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
		//$hari = date("w");
		$hari_ini = $seminggu[$hari];
		return $hari_ini;
	}
	function getRomawi($bln){
		switch ($bln){
			case 1: 
				return "I";
				break;
			case 2:
				return "II";
				break;
			case 3:
				return "III";
				break;
			case 4:
				return "IV";
				break;
			case 5:
				return "V";
				break;
			case 6:
				return "VI";
				break;
			case 7:
				return "VII";
				break;
			case 8:
				return "VIII";
				break;
			case 9:
				return "IX";
				break;
			case 10:
				return "X";
				break;
			case 11:
				return "XI";
				break;
			case 12:
				return "XII";
				break;
		}
	}
	function SelisihWaktu($awal, $akhir){
			$mulai=(is_string($awal)?strtotime($awal):$awal);  	
			$selesai=(is_string($akhir)?strtotime($akhir):$akhir);
			$selisih=$selesai-$mulai ;
			$jam = floor( $selisih / 3600 );
			$selisih -= $jam * 3600;
			$menit = floor( $selisih / 60 );
			$selisih -= $menit * 60;
			if($jam<10){ $jam='0'.$jam;}
			if($menit<10){ $menit='0'.$menit;}
			if($selisih<10){ $selisih='0'.$selisih;}
			return "{$jam}:{$menit}:{$selisih}";
	}
	function terbilang($bilangan){
		$angka = array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
		$kata = array('', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan');
		$tingkat = array('', 'Ribu', 'Juta', 'Milyar', 'Triliun');
		$panjang_bilangan = strlen($bilangan);
		/* pengujian panjang bilangan */
		if ($panjang_bilangan > 15)
		{
			$kalimat = "Diluar Batas";
			return $kalimat;
		}
		/* mengambil angka-angka yang ada dalam bilangan,
		dimasukkan ke dalam array */
		for ($i = 1; $i <= $panjang_bilangan; $i++)
		{
			$angka[$i] = substr($bilangan, -($i), 1);
		}
		$i = 1;
		$j = 0;
		$kalimat = "";
		/* mulai proses iterasi terhadap array angka */
		while ($i <= $panjang_bilangan)
		{
			$subkalimat = "";
			$kata1 = "";
			$kata2 = "";
			$kata3 = "";
			/* untuk ratusan */
			if ($angka[$i + 2] != "0")
			{
				if ($angka[$i + 2] == "1")
				{
					$kata1 = "Seratus";
				}
				else
				{
					$kata1 = $kata[$angka[$i + 2]] . " ratus";
				}
			}
			/* untuk puluhan atau belasan */
			if ($angka[$i + 1] != "0")
			{
				if ($angka[$i + 1] == "1")
				{
					if ($angka[$i] == "0")
					{
						$kata2 = "Sepuluh";
					}
					elseif ($angka[$i] == "1")
					{
						$kata2 = "Sebelas";
					}
					else
					{
						$kata2 = $kata[$angka[$i]] . " Belas";
					}
				}
				else
				{
					$kata2 = $kata[$angka[$i + 1]] . " Puluh";
				}
			}
			/* untuk satuan */
			if ($angka[$i] != "0")
			{
				if ($angka[$i + 1] != "1")
				{
					$kata3 = $kata[$angka[$i]];
				}
			}
			/* pengujian angka apakah tidak nol semua,
			lalu ditambahkan tingkat */
			if (($angka[$i] != "0") or ($angka[$i + 1] != "0") or ($angka[$i + 2] != "0"))
			{
				$subkalimat = "$kata1 $kata2 $kata3 " . $tingkat[$j] . " ";
			}
			/* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
			ke variabel kalimat */
			$kalimat = $subkalimat . $kalimat;
			$i = $i + 3;
			$j = $j + 1;
		}
		/* mengganti satu ribu jadi seribu jika diperlukan */
		if (($angka[5] == "0") and ($angka[6] == "0"))
		{
			$kalimat = str_replace("Satu Ribu", "Seribu", $kalimat);
		}
		return trim($kalimat . "")." Rupiah";
	}
	public function getStatus($flg){
		switch ($flg){
			case "O": 
				return "OPEN";
				break;
			case "C":
				return "CLOSE";
				break;
			case "D":
				return "DELIVERY";
				break;
			case "R":
				return "RETURN";
				break;
			case "X": 
				return "CANCEL";
				break;	
			case "IO":
				return "INTERNAL ORDER";
				break;
			case "QO":
				return "QUOTATION ORDER";
				break;
			case "SO":
				return "SALES ORDER";
				break;
			case "":
				return "NO STATUS";
				break;
		}
	}
		
}
/* End of file app_model.php */
/* Location: ./application/models/app_model.php */