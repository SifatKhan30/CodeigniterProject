<?php
class Users extends CI_Controller
{
    public function index(){
       $user=$this->session->userdata('userID');
       if(isset($user)){
        $data['list']=$this->User_model->get_user_list();
        $this->load->view('user_list',$data);
       }else{
        redirect(base_url());
       }
    }
    public function create(){
        $this->load->view('create_user');
    }

    public function save(){
        
       $name=$this->input->post('name');
       $email=$this->input->post('email');
       $password=$this->input->post('password');
      
       $this->User_model->save_user($name,$email,$password);
       $this->session->set_flashdata('msg','successfully Submitted!');
       redirect(base_url('Users'),'refresh');
    }

    public function edit($id){
    
        $this->User_model->getUser($id);
        $data['edit']=$this->User_model->getUser($id);
        $this->load->view('edit_user',$data);
    }
    public function update($id){
        $name=$this->input->post('name');
        $email=$this->input->post('email');
        $password=$this->input->post('password');
       
        $this->User_model->update_user($id,$name,$email,$password);
        redirect(base_url('Users'),'refresh');
    }
    public function delete($id){
      
        $this->User_model->getDelete($id);
        redirect(base_url('Users'),'refresh');
    }
    public function add_to_cart()
    {
        $this->load->library('cart');
        $data = array(
            
            'id'      => $this->input->post('id'),
            'qty'     => $this->input->post('qty'),
            'price'   => $this->input->post('price'),
            'name'    => $this->input->post('name'),
            'options' => array(
                'Size' => $this->input->post('Size'),
                 'Color' => $this->input->post('Color')
                 )
    );
    $this->session->set_flashdata('msg','Added Successfully!!');
    $this->load->view('add_cart');
    $this->cart->insert($data);
    }
    public function cart()
    {
        $this->load->library('cart');
        $data['list']=$this->cart->contents();
        $this->load->view('cart',$data);
    }
    public function remove_cart($id)
    {
        $this->load->library('cart');
       $this->cart->remove($id);
       redirect(base_url('Users/cart'));
    }
    public function update_cart()
    {
        $this->load->library('cart');
        $data=$this->input->post();
        $this->cart->update($data);
        redirect(base_url('Users/cart'));
    }

}
