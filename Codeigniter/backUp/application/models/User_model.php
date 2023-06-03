<?php
class User_model extends CI_Model
{
    public function get_user_list()
    {
        $data=$this->db->get('users');
        return $data->result();
    }
    public function save_user($name,$email,$password)
    {
        $this->db->insert('users',['name'=>$name,'email'=>$email,'password'=>$password]);
    }
    public function getUser($id)
    {
        // $data=$this->db->where('id',$id)   
                //        ->get('users');
        // $data=$this->db->select('*')
                        // ->where('id',$id)
                        // ->get('users');
        // $data=$this->db->select('*')
        //             ->from('users')
        //             ->where('id',$id)
        //             ->get();
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id);
        $data=$this->db->get();
        return $data->row();
    }
    public function update_user($id,$name,$email,$password)
    {
        $this->db->where('id',$id)->update('users',['name'=>$name,'email'=>$email,'password'=>$password]);
    }
    public function delete_user($id)
    {
        $this->db->where('id',$id)->delete('users');
    }
    public function login($email,$password)
    {
        return $this->db->where('email',$email)
                    ->where('password',$password)
                    ->get('users')->row();
    }
    public function save_test($data)
    {
        $this->db->insert('users',$data);
    }
}
