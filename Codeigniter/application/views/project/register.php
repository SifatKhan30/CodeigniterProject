<div>
    <form action="<?php echo base_url('Welcome/registration') ?>" method="post" enctype="multipart/form-data">
<input type="text" name="name">
<input type="text" name="email">
<input type="file" name="photo">
<input type="submit" value="Save">
<?php 
// echo $error 
?>
</form>
</div>