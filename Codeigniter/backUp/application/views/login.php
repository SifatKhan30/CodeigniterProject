<?php
$this->load->view('student/layout');
?>
<div class="container">
    <form action="<?php echo base_url('Login/signin') ?>" method="post">
    <table class="table table-bordered">
        <tr>
            <td><input type="text" name="email" id=""></td>
            </tr>
            <tr>
            <td><input type="password" name="password" id=""></td>
        </tr>
            <tr>
            <td><input type="submit" value="Login" id=""></td>
        </tr>
    </table>
</form>
<a href="<?php echo base_url('Welcome/test') ?>">Download Database</a>
</div>