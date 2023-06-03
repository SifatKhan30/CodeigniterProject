<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->model('My_model');
		$data['list']=$this->My_model->getData();
		$this->load->view('front/index',$data);
	}
	public function test()
	{
		$this->load->library('JWT');
		$token = array(
			"iss" => $this->config->item('iss'),
			"aud" => $this->config->item('aud'),
			"iat" => $this->config->item('iat'),
			"nbf" => $this->config->item('nbf'),
			"exp" => $this->config->item('exp'),
			"data" => ['name'=>'sohel','id'=>157]
		 );
		 echo $this->jwt->encode($token, 'secret key','HS256');
	}
	public function val()
	{
		$token=$this->input->post('token');
		$this->load->library('JWT');
		$data=$this->jwt->decode($token, 'secret key');
		echo json_encode($data,true);
	}
	public function contact()
	{
		$this->load->view('front/contact');
	}

	public function users()
	{
		$this->load->model('My_model');
		$data['list']=$this->My_model->getData();
		$data['title']='User List';
		$this->load->view('users',$data);
	}
	public function register()
	{
		
		$this->load->view('register');
	}
	public function registration()
	{
		
		$data=$this->input->post();
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100000;
		$config['max_width']            = 107000;
		$config['max_height']           = 107000;
		$config['encrypt_name']=true;

		$this->load->library('upload', $config);
		$this->upload->do_upload('photo');
		$this->upload->do_upload('photo1');

		// if (!$this->upload->do_upload('photo')){
		// 	$error['error'] = $this->upload->display_errors();
		// }else{
		// 	$info = $this->upload->data();
		// 	$data['photo']=$info['file_name'];
		// }
		// $this->User_model->save_test($data);
			
			

	}
	public function c()
	{
		$this->load->helper('captcha');
		$vals = array(
			'word'          => 'Random word',
			'img_path'      => './captcha/',
			'img_url'       => base_url().'captcha/',
			'font_path'     => 'system/fonts/texb.ttf',
			'img_width'     => '150',
			'img_height'    => 30,
			'expiration'    => 7200,
			'word_length'   => 8,
			'font_size'     => 16,
			'img_id'        => 'Imageid',
			'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
	
			// White background and border, black text and red grid
			'colors'        => array(
					'background' => array(255, 255, 255),
					'border' => array(255, 255, 255),
					'text' => array(0, 0, 0),
					'grid' => array(255, 40, 40)
			)
	);
	
	$cap = create_captcha($vals);
	echo $cap['image'];
	}

}