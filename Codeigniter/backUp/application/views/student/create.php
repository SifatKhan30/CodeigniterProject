<?php $this->load->view('student/layout') ?>
<form action="<?php echo base_url('Student/save') ?>" method="post">
    <input type="text" name="name" value="<?php echo set_value('name') ?>">
    <?php  echo (form_error('name'))?form_error('name'):'' ?><br>
    <input type="text" name="roll" value="<?php echo set_value('roll') ?>">
    <?php echo (form_error('roll'))?form_error('roll'):'' ?><br>
    <input type="text" name="dpt" value="<?php echo set_value('dpt') ?>">
    <?php echo (form_error('dpt'))?form_error('dpt'):'' ?><br>
    <input type="submit" value="Save">
</form>
<?php
// $d=validation_errors();
// if(isset($d)){
// // if((validation_errors())){
//     echo validation_errors();
// }