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
		$this->load->view('login');
	}
	public function project()
	{
		$this->load->view('project/index');
	
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

	public function test()
	{
	$data['name']='Khan'.'<br>';
	$data['roll']='1235';
	$data['date']=date('Y-m-d');
	$data['list']=[15,25,45,56];
	$this->load->view('test',$data);
	}
}
?>