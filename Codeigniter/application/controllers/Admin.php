<?php
class Admin extends CI_Controller
{
	public function signin()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$data = $this->User_model->login($email, $password);
		if ($data != null) {
			$this->session->set_userdata(['userID' => $data->id, 'name' => $data->name]);
		} else {
			echo "error";
		}
		redirect(base_url('Admin/index'));
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function index()
	{
		$user = $this->session->userdata('userID');
		if (isset($user)) {
			$this->load->view('admin/dashboard');
		} else {
			redirect(base_url('admin/login'));
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('welcome/project'));
	}
	public function reserve()
	{
		$this->load->library("pagination");

		$config["base_url"] = 'http://localhost/Codeigniter/admin/reserve';
		$config["total_rows"] = 9;
		$config["per_page"] = 3;
		$config["uri_segment"] = 3;
		

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['list'] = $this->User_model->reserveList(3, $page);
		$data['page'] = $page;
		$data['links'] = $this->pagination->create_links();
		$this->load->view('admin/r_list', $data);

		// $data['list'] = $this->User_model->reserveList();

		// $this->load->view('admin/r_list', $data);
	}

	public function home_span()
	{
		$data['hspan'] = $this->User_model->span();
		$this->load->view('admin/span', $data);
	}
	public function registration()
	{
		$data = $this->input->post();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|JPG';
		$config['max_size'] = 1000;
		$config['max_width'] = 500;
		$config['max_height'] = 500;
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('logo')) {
			$error = array('error' => $this->upload->display_errors());
			// echo "<pre>";
			// print_r($error);
			$this->load - view('admin/span', $error);
		} else {
			$info = $this->upload->data();
			$data['logo'] = $info['file_name'];
			$this->User_model->saveSpan($data);
			redirect(base_url('admin/home_span'), 'refresh');
		}
	}
	public function homebody()
	{
		$data['list'] = $this->User_model->getHome();
		$this->load->view('admin/home_body', $data);
	}
	public function saveHome()
	{
		$data = $this->input->post();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|JPG';
		$config['max_size'] = 1000;
		$config['max_width'] = 700;
		$config['max_height'] = 700;
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('photo')) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('admin/home_body', $error);
		} else {
			$info = $this->upload->data();
			$data['photo'] = $info['file_name'];
			$this->User_model->save_home($data);
			redirect(base_url('admin/homebody'), 'refresh');
		}
	}
	public function home_edit($id)
	{
		$data['edit'] = $this->User_model->editHome($id);
		$this->load->view('admin/home_edit', $data);
	}
	public function updateHome($id)
	{
		$data = $this->input->post();
		$this->User_model->update_home($data, $id);
		redirect(base_url('admin/homebody'), 'refresh');
	}
	public function home_delete($id)
	{
		$this->User_model->Hdelete($id);
		redirect(base_url('admin/homebody'), 'refresh');
	}

	// public function sifat()
	// {
	//    $this->load->library("pagination");

	//    $config["base_url"]=base_url().'Admin/sifat';
	//    $config["total_rows"]=9;
	//    $config["per_page"]=3;
	//    $config["uri_segment"]=3;

	//   $this->pagination->initialize($config);

	//   $page=($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	//   $data=['list'] = $this->User_model->reserveList(3, $page);
	//   $data['page']=$page;
	//   $data['links']=$this->pagination->create_links();
	//   $this->load->view('admin/r_list',$data);
	// }
	// $this->User_model->get_count()
}
