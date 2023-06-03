<?php
class Student_model extends CI_Model
{
    public function student_list()
    {
        $data=$this->db->get('student');
        return $data->result();
    }
    public function getByroll($roll)
    {
        $data=$this->db->where('roll',$roll)->get('student');
        return $data->row();
    }
    public function login($email,$pass)
    {
        return $this->db->where(['email'=>$email,'password'=>$pass])->get('users')->row();

    }
    public function profile($id)
    {
        return $this->db->where('id',$id)->get('users')->row();

    }
    public function std_list($limit,$start)
    {
        $this->db->limit($limit, $start);
        $data=$this->db->get('student');
        return $data->result();
    }
    public function saveStd($name,$roll,$dpt)
    {
        $this->db->insert('student',array('name'=>$name,'roll'=>$roll,'dpt'=>$dpt));
    }
    public function updateStd($id,$name,$roll,$dpt)
    {
        $this->db->where('id',$id);
        $this->db->update('student',array('name'=>$name,'roll'=>$roll,'dpt'=>$dpt));
    }
    public function getStd_1($id)
    {
       $data=$this->db->where('id',$id)->get('student');
       return $data->row();
    }
    public function deleteStd($id)
    {
       $this->db->where('id',$id)->delete('student');
    }
    public function get_count()
    {
        return $this->db->count_all("student");
    }
    public function table()
    {
        return $this->db->get('student');
    }
}
