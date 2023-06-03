<?php 
class Api extends CI_Controller
{
    public function student_list()
    {
     header('Access-Controll-Allow-Origin: *');
     header('Access-Controll-Allow-Methods: GET, OPTIONS');
     
     $this->load->model('Student_model');
     $data=$this->Student_model->std_list();
     $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function login()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
        $data=json_decode(file_get_contents("php://input"),true);
    
    // $data=$this->input->post();
    $user=$this->Student_model->login($data);
    if(isset($user)){
      $this->load->library('JWT');
      $token=array(
        "iss" => $this->config->item('iss'),
        "aud" => $this->config->item('aud'),
        "iat" => $this->config->item('iat'),
        "nbf" => $this->config->item('nbf'),
        "exp" => $this->config->item('exp'),
        "data" => ['name'=>$user->name,'id'=>$user->id]
      );
      $t=$this->jwt->encode($token, $this->config->item('key'), 'HS256');
      $this->output->set_content_type('application/json')->set_output(json_encode(['token'=>$t,'status'=>true]));
    }else{
        $this->output->set_content_type('application/json')->set_output(json_encode(['status'=>false]));
    }
    }
}

?>