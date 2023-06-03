<?php
class My_model extends CI_Model
{
    public function getData()
    {
        $data=$this->db->get('posts');
        return $data->result();
    }
    public function test()
    {
        $this->load->dbutil();
        $prefs = array(
            'tables'        => array('users', 'student','posts'),  
            'ignore'        => array(),                   
            'format'        => 'txt',                     
            'filename'      => 'mybackup.sql',            
            // 'add_drop'      => TRUE,                      
            // 'add_insert'    => TRUE,                        
            'newline'       => "\n"                         
        );
    
        $backup=$this->dbutil->backup($prefs);
        
        $this->load->helper('file');
        write_file('mybackup.sql', $backup);

        $this->load->helper('download');
        force_download('mybackup.sql', $backup);
       
    }
}
