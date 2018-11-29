<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
/**
* 
*/
class registration extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}
	//login
	function get_user($user,$pass){
		$this->db->where("email",$user);
		$this->db->where("pass",$pass);
		return $this->db->get("user");
	}
	function Validate_email($mail)
	{
		$this->db->where('email',$mail);
		return $this->db->get('registration_staging');
	}
	function RegInsert($data,$table)
	{
		$this->db->insert($table,$data);
	}
	function updatetoken($update,$where,$table){
		$this->db->where($where);
		return $this->db->update($table,$update);
	}
	function verifytoken($token){
		$dateserver = date('Y-m-d h:i:s');
		$sql = "select * from registration_staging where verifytoken = '$token' and tokenexpired between now() and tokenexpired
		and verified = 0";
		return $this->db->query($sql);
	}
	function SecureUserInsert($data,$table)
	{
		$this->db->insert($table,$data);
	}
	function SecureRoleUserInsert($data,$table)
	{
		$this->db->insert($table,$data);
	}
}
?>