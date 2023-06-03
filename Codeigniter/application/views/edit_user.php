<?php $this->load->view('layout') ?>
<div class="container">
    <div style="background-color: rgb(100,150,100); padding:2px">
    <h1 class="display-3 text-center">Update Your Info</h1>
    </div>
    <form action="<?php echo base_url('Users/update/' . $edit->id) ?>" method="post" class="form-control">
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td><input type="text" name="name" value="<?php echo $edit->name ?>"></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="text" name="email" value="<?php echo $edit->email ?>"></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="password" name="password" value="<?php echo $edit->password ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="" value="Update" class="btn btn-xs btn-primary"></td>
            </tr>
        </table>
    </form>
</div>