<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	/**
	 * Index Page for this controller.
	 * Programmer : Akbar Z
	 */
	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');	
    }
	function index()
	{
		$d = array(
			'title'  => 'Dashboard',
			'small'  => 'Testing Stock',
		);
		$this->template->load('template','welcome',$d);
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */