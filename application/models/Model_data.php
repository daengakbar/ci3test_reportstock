<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_data extends CI_Model {
	/**
	 * @author : Daeng Akbar
	 * @keterangan : Model untuk menangani semua query database aplikasi
	 * http://daengakbar.com
	 * TIM : Akbar Z, Misra Haryati
	**/
	/*** master data ***/ 
	function __construct()
    {
        parent::__construct();
		date_default_timezone_set('Asia/Jakarta'); 
		$this->load->helper('cookie');
    }
	public function data_table($table,$field){
		$q = $this->db->order_by($field);
		$q = $this->db->get($table);
		return $q;
	}
	public function data_where($table,$where,$by,$limit){
		$q = $this->db->distinct();
		if (!empty($where)){$q = $this->db->where($where);}
		$q = $this->db->order_by($by,'Desc');
		$q = $this->db->limit($limit);
		$q = $this->db->get($table);
		return $q;
	}
	public function data_rows($table,$where){
		$q = $this->db->where($where);
		$q = $this->db->get($table);
		$row = $q->num_rows();
		return $row;
	}
	public function data_dtable($table,$where,$field){
		$q = $this->db->where($where);
		$q = $this->db->order_by($field);
		$q = $this->db->get($table);
		return $q;
	}
	public function search_wrh($wrh)
	{
		$q = $this->db->query("select cRgName,cAddress1,cAddress2,cPhone,cNoFax from mwarehouse g, mregion r 
							   where g.cRgCode=r.cRgCode and (cWrhName ='".$wrh."' or cWrhCode='".$wrh."')");
		if($q->num_rows()>0){
			foreach($q->result() as $dt){
				$hasil = array( 
					'Rgname'   => $dt->cRgName,
					'Alamat'   => $dt->cAddress1.' '.$dt->cAddress2,
					'NoTelepon'=> $dt->cPhone,
					'NoFax'	   => $dt->cNoFax,
				);
			}
		}else{
			$hasil = array('Rgname' => '','Alamat'=> '','NoTelepon'=> '','NoFax'=> '',);
		}
		return $hasil;
	} 
	public function get_repbestitem($date1,$date2,$branch){
		$ses = $this->model_global->getSessData();
		if (!empty($branch)){$branch = "cRgcode='".$branch."'";}
		$where = "cCode='".$ses['c']."' and dTransDate between '".$date1."' and '".$date2."'";	
		$q = $this->db->query("select cGroupCode,dTransDate,sum(TM0110)TM0110,sum(TM1114)TM1114,sum(TM1518)TM1518,
															sum(TM1922)TM1922,sum(TM2324)TM2324,cItemName
								from vsales_bestmenu
								where ".$where." GROUP BY cCode,cRgcode,cGroupCode,dTransDate,cItemName
								ORDER BY dTransDate");
	    return $q;
	}
	
	/*** view kriteria ***/
	
	
}
/* End of file app_model.php */
/* Location: ./application/models/app_model.php */