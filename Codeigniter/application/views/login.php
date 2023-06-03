<?php $this->load->view('layout') ?>

<div class="container">
    <div style="background-color: rgb(100,150,100); padding:2px">
    <h1 class="display-3 text-center">Choose Your Account</h1>
    </div>
<form action="<?php echo base_url('Admin/signin') ?>" method="post" class="form-control">

<table >
    <tr>
        <th>Email</th>
        <th>Password</th>
    </tr>
    <tr>
        <td><input type="text" name="email" placeholder="Enter email" class="form-control"></td>
        <td><input type="password" name="password" placeholder="Enter password" class="form-control"></td>
    </tr>
    <tr>
        <td><input type="submit" value="Login" class="btn btn-xs btn-primary"></td>
    </tr>
</table>
</form>
</div> 