<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class id extends CI_Controller
{
	private $perPage = 6;
	function __construct()
	{
		parent::__construct();
          //session_start();
          $this->load->helper('cookie');
	}
	function index(){
		$this->load->view('index');
	}
}
?>