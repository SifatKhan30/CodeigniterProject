<?php 
include('Parents.php');
class Numbers extends Parents{
    public function add()
    {
        return $this->a+$this->b;
    }
    public function sub()
    {
        return $this->a-$this->b;
    }
}