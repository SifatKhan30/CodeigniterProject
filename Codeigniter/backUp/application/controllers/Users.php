<?php
class Users extends CI_Controller
{
    public function index()
    {
        // $this->load->model('User_model');
        $data['list']=$this->User_model->get_user_list();
        $this->load->view('user_list',$data);
    }
    public function create()
    {
        $this->load->view('create_user');
    }
    public function save()
    {
       $name=$this->input->post('name');
       $email=$this->input->post('email');
       $password=$this->input->post('password');

    //    $this->load->model('User_model');
       $this->User_model->save_user($name,$email,$password);
       redirect(base_url('Users'),'refresh');
    }
    public function edit($id)
    {
        $data['edit']=$this->User_model->getUser($id);
        $this->load->view('edit_user',$data);
    }
    public function update($id)
    {
        $name=$this->input->post('name');
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $this->User_model->update_user($id,$name,$email,$password);
        redirect(base_url('Users'),'refresh');
    }
    public function delete($id)
    {
        $this->User_model->delete_user($id);
        redirect(base_url('Users'),'refresh');
    }
}
