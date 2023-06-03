<?php
class Student extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->faker = Faker\Factory::create();
    }
    public function index()
    {
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "Student/index";
        $config["total_rows"] = $this->Student_model->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        $config['full_tag_open'] = '<ul class="pagination">';        
        $config['full_tag_close'] = '</ul>';     
        $config['first_link'] = 'First';      
        $config['last_link'] = 'Last';     
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['first_tag_close'] = '</span></li>';        
        $config['prev_link'] = '&laquo';        
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['prev_tag_close'] = '</span></li>';        
        $config['next_link'] = '&raquo';        
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['next_tag_close'] = '</span></li>';        
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['last_tag_close'] = '</span></li>';        
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
        $config['cur_tag_close'] = '</a></li>';        
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['num_tag_close'] = '</span></li>';
    
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["list"] = $this->Student_model->std_list(10, $page);
        $data['page']=$page;

        $data["links"] = $this->pagination->create_links();
        $this->load->view('student/index',$data);
    }
    public function create()
    {
        $this->load->view('student/create');
    }
    public function save()
    {
        $this->load->library('form_validation');
        // $this->form_validation->set_rules('name','Name','required|max_length[3]');
        // $this->form_validation->set_rules('roll','Roll','required|is_unique[student.roll]');
        // $this->form_validation->set_rules('dpt','Department','required');
        $conf=array(
            array(
                'field'=>'name',
                'label'=>'Name',
                'rules'=>'required|max_length[3]',
                // 'errors'=>array(
                //     'required'=>'You must fillup the %s',
                //     'max_length'=>'should be 3 maximum'
                // )
            ),
            array(
                'field'=>'roll',
                'label'=>'Roll',
                'rules'=>'required|is_unique[student.roll]'
            ),
            array(
                'field'=>'dpt',
                'label'=>'Department',
                'rules'=>'required'
            ),
        );
        $this->form_validation->set_rules($conf);
        if($this->form_validation->run()==true){
            $name=$this->input->post('name');
            $roll=$this->input->post('roll');
            $dpt=$this->input->post('dpt');

            $this->Student_model->saveStd($name,$roll,$dpt);
            $this->session->set_flashdata('msg','successfully submitted!');
            redirect(base_url('Student'),'refresh');
        }else{
            $this->load->view('student/create');
        }
    }
    public function edit($id)
    {
        $data['edit']=$this->Student_model->getStd_1($id);
        $this->load->view('student/edit',$data);
    }
    public function update($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('roll','Roll','required');
        $this->form_validation->set_rules('dpt','Department','required');
        if($this->form_validation->run()==true){
            $name=$this->input->post('name');
            $roll=$this->input->post('roll');
            $dpt=$this->input->post('dpt');

            $this->Student_model->updateStd($id,$name,$roll,$dpt);
            $this->session->set_flashdata('msg','successfully updated!');
            redirect(base_url('Student'),'refresh');
        }else{
            $data['edit']=$this->Student_model->getStd_1($id);
            $this->load->view('student/edit',$data);
        }
    }
    public function delete($id)
    {
        $this->Student_model->deleteStd($id);
        $this->session->set_flashdata('msg','successfully deleted!');
        redirect(base_url('Student'),'refresh');
    }
    public function seed()
    {
        for($i=0;$i<500;$i++){
            $data = array(
                'name' => $this->faker->firstName,
                'roll' => $this->faker->postcode,
                'dpt' => $this->faker->word,
            );
            $this->Student_model->saveStd($data['name'],$data['roll'],$data['dpt']);
        }
    }
    public function cc()
    {
        $this->load->view('cc');
    }
    public function add_to_cart()
    {
        $this->load->library('cart');

        $data = array(
            'id'      =>$this->input->post('id'),
            'qty'     => $this->input->post('qty'),
            'price'   => $this->input->post('price'),
            'name'    => $this->input->post('name'),
        );
    
        $this->cart->insert($data);
       
    }
    public function cart()
    {
        $this->load->library('cart');
        $data['list']=$this->cart->contents() ;
        // echo "<pre>";
        // print_r($data);exit;
        $this->load->view('cart',$data);
    }
    public function remove_cart($id)
    {
        $this->load->library('cart');
        $this->cart->remove($id);
        redirect(base_url('Student/cart'));
    }
    public function update_cart()
    {
        $this->load->library('cart');
        $data=$this->input->post();
        $this->cart->update($data);
        redirect(base_url('Student/cart'));
    }
    public function test()
    {
       
       $this->load->helper('form');
       $options = array(
            'small'         => 'Small Shirt',
            'med'           => 'Medium Shirt',
            'large'         => 'Large Shirt',
            'xlarge'        => 'Extra Large Shirt',
        );
        // $shirts_on_sale = array('small', 'large');
        echo form_dropdown('shirts', $options,'large',['class'=>'test','onchange'=>"alert('are you sure?')"]);
    }
    public function table()
    {
        $this->load->library('table');
        $data = $this->Student_model->table();
        $template = array(
            'table_open'            => '<table class="table table-bordered" border="1" cellpadding="4" cellspacing="0">',
    
            'thead_open'            => '<thead class="bg-primary">',
            'thead_close'           => '</thead>',
    
            'heading_row_start'     => '<tr>',
            'heading_row_end'       => '</tr>',
            'heading_cell_start'    => '<th>',
            'heading_cell_end'      => '</th>',
    
            'tbody_open'            => '<tbody>',
            'tbody_close'           => '</tbody>',
    
            'row_start'             => '<tr>',
            'row_end'               => '</tr>',
            'cell_start'            => '<td>',
            'cell_end'              => '</td>',
    
            'row_alt_start'         => '<tr>',
            'row_alt_end'           => '</tr>',
            'cell_alt_start'        => '<td>',
            'cell_alt_end'          => '</td>',
    
            'table_close'           => '</table>'
    );
    
        $this->table->set_template($template);
        $this->table->set_heading('ID','Name', 'Roll', 'Department');
        $d['t']=$this->table->generate($data);
        $this->load->view('table',$d);
    }
    
    public function help()
    {
        $this->load->helper('test');
        echo en2bn('15, March,2023');
    }
}
