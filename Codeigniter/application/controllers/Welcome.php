<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data['hspan']=$this->User_model->span();
		$data['list'] = $this->User_model->getHome();
		$this->load->view('project/index',$data);
	}
	public function project()
	{
		$data['hspan']=$this->User_model->span();
		$data['list'] = $this->User_model->getHome();
		$this->load->view('project/index',$data);

	
	}
	public function about()
	{
		$this->load->view('project/about');
	}
	public function deals()
	{
		$this->load->view('project/deals');
	}
	public function reservation()
	{
		$this->load->view('project/reservation');
	}
	public function saveReserve()
	{
		$data=$this->input->post();
		$this->User_model->customer($data);
		$this->session->set_flashdata('msg','Reserved Successfully!!');
		redirect(base_url('welcome/reservation'));
	}
	public function register()
	{
		$this->load->view('project/register');
	}
	public function registration()
	{
		$data=$this->input->post();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|JPG';
		$config['max_size'] = 1000;
		$config['max_width'] = 500;
		$config['max_height'] = 500;
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);
	
		if(!$this->upload->do_upload('photo')){
			$error = array('error' => $this->upload->display_errors());
			// echo "<pre>";
			// print_r($error);
			$this->load-view('project/register',$error);
		}else{
			$info= $this->upload->data();
			$data['photo']=$info['file_name'];
			$this->User_model->saveFile($data);
		}
	}


}
