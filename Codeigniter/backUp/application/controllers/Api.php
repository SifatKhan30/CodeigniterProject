<?php
class Api extends CI_Controller
{
    public function login()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
        $data=json_decode(file_get_contents("php://input"),true);
        $user=$this->Student_model->login($data['email'],$data['password']);
        if(isset($user)){
            $this->load->library('JWT');
            $token = array(
                "iss" => $this->config->item('iss'),
                "aud" => $this->config->item('aud'),
                "iat" => $this->config->item('iat'),
                "nbf" => $this->config->item('nbf'),
                "exp" => $this->config->item('exp'),
                "data" => ['name'=>$user->name,'id'=>$user->id]
            );
            $t=$this->jwt->encode($token, $this->config->item('key'),'HS256');
            $this->output->set_content_type('application/json')->set_output(json_encode(['token'=>$t,'status'=>true]));
        }else{
            $this->output->set_content_type('application/json')->set_output(json_encode(['status'=>false]));
        }
    }
    public function test()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
        
        $roll=json_decode(file_get_contents("php://input"),true);
        $data=$this->Student_model->getByroll($roll['roll']);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
