<?php
class Student_model extends CI_Model
{
    public function std_list(){
       $data=$this->db->get('users');
       return $data->result('users');
    }
    public function login($data)
    {
       return $this->db->where(['email'=>$data['email'],'password'=>$data['password']])->get('users')->row();
    }

    public function create(){
        $data=$this->db->insert('student',['name'=>$name,'roll'=>$roll,'dpt'=>$dpt]);
    }
}


?>