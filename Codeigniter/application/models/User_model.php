<?php
class User_model extends CI_Model
{
    public function get_user_list(){
        $data=$this->db->get('users');
        return $data->result();
    }

    public function save_user($name,$email,$password){
        $this->db->insert('users',['name'=>$name,'email'=>$email,'password'=>$password]);
    }
    public function getUser($id){
        $data=$this->db->where('id',$id)->get('users');
        return $data->row();
    }
    public function update_user($id,$name,$email,$password){
        $this->db->where('id',$id);
        $this->db->update('users',['name'=>$name,'email'=>$email,'password'=>$password]);
    }
    public function getDelete($id)
    {
        $this->db->where('id',$id)->delete('users');
    }
    public function login($email,$password){
        $data=$this->db->where('email',$email)
                        ->where('password',$password)
                        ->get('users');
                return $data->row();
    }

    public function customer($data)
    {
       $this->db->insert('reserve',$data);
    }
    public function reserveList($limit,$start)
    {
        $this->db->limit($limit,$start);
        $data=$this->db->get('reserve');
        return $data->result();
    }
    public function saveFile($data)
    {
       $this->db->insert('users',$data);
    }
    public function saveSpan($data)
    {
       $this->db->insert('span',$data);
    }
    public function span()
    {
       $data=$this->db->get('span');
       return $data->result();
    }
    public function save_home($data)
    {
       $this->db->insert('home_body',$data);
    }
    public function getHome()
    {
       $data=$this->db->get('home_body');
       return $data->result();
    }
    public function editHome($id)
    {
       $data=$this->db->where('id',$id)->get('home_body');
       return $data->row();
    }
    public function update_home($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('home_body',$data);
    }
    public function Hdelete($id)
    {
      $this->db->where('id',$id)->delete('home_body');
    }
    public function get_count()
    {
      return $this->db->count_all("reserve");
    }
}


?>