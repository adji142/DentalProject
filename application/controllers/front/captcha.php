<?php
exit('no direct script access allowed');
/**
 * 
 */
class captcha extends CI_Controller
{
	
	function __construct()
	{
		# code...
	}
	function create_captcha()
	{
		$options = array(
			'img_path' =>'./captcha' ,
			'img_url' => base_url('captcha'),
			'img_width' => '100' ,
			'img_height' => '50',
			'expiration' => 7200
		);

		$cap = create_captcha($options);
		$image = $cap['image'];

		$this->session->set_userdata('captchaworld',$cap['word']);
		return $image;
	}
	function check_captcha()
	{
		if($this->input->post('captcha')==$this->session->userdata('captchaworld'))
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('check_captcha','Kode Captcha Salah');
			return false;
		}
	}
}
?>