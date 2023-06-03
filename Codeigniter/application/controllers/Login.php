<?php

class Login extends CI_Controller
{
   public function signin(){
    $email=$this->input->post('email');
    $password=$this->input->post('password');
    $data=$this->User_model->login($email,$password);
    if($data!=null){
        $this->session->set_userdata(['userID'=>$data->id,'name'=>$data->name]);
    }else{
        echo "error";
    }
    redirect(base_url('Users'));
   }
   public function logout()
   {
    $this->session->sess_destroy();
    redirect(base_url());
   }
  
}
?>