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
	public function get_stok($table,$where)
	{
		$q = $this->db->query("SELECT SUM(PCS)PCS FROM ".$table." where JENIS='".$where."' GROUP BY JENIS");
		if($q->num_rows()>0){
			foreach($q->result() as $dt){
				$hasil = $dt->PCS;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	} 
	
	
	/*** view kriteria ***/
	
	
}
/* End of file app_model.php */
/* Location: ./application/models/app_model.php */