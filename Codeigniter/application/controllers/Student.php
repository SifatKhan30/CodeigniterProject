<?php

class Student extends CI_Controller
{
    public function index(){
        $data['list']=$this->Student_model->std_list();
        $this->load->view('student/index',$data);
    }
    public function create(){

        $this->load->view('student/create');
    }
    public function save(){
       $name=$this->input->post('name');
       $roll=$this->input->post('roll');
       $dpt=$this->input->post('dpt');
       $this->Student_model->saveStd($name,$roll,$dpt);
    }

    public function test()
    {
        $date = date('Y-m-d', strtotime("+1 day"));
        echo $date;
    }
    // public function page()
    // {
    //    $this->load->library("pagination");
    //    $config=array();
    //    $config["base_url"]=base_url('Student/page');
    //    $config["total_rows"]=$this->User_model->get_count();
    //    $config["per_page"]=4;
    //    $config["uri_segment"]=3;

    //   $this->pagination->initialize($config);

    //   $page=($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    //   $data=['list']=$this->User_model->reservelist(10,$page);
    //   $data['page']=$page;
    //   $data['links']=$this->pagination->create_links();
    //   $this->load->view('admin/r_list',$data);
    // }
}

?>