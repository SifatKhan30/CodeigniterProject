<?php $this->load->view('layout') ?>

<div class="container">
    <div style="background-color: rgb(100,150,100); padding:2px">
        <h1 class="display-3 text-center">User List</h1>
    </div>
    <div class="bg-info p-2 ">
        <div class="row">
        <div class="col-md-2">
            <a href=" <?php echo base_url('Users/create') ?>" class="btn btn-xs btn-primary">Create User</a>
        </div>
        <div class="col-md-1 offset-md-9">
            <a href=" <?php echo base_url('Login/logout') ?>" class="btn btn-xs btn-danger">LogOut</a>
        </div>
        </div>
        
    </div>
    <?php echo $this->session->flashdata('msg') ?>
    <table class="table table-bordered">
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        foreach ($list as $k => $l) { ?>


            <tr>
                <td><?php echo $k + 1 ?></td>
                <td><?php echo $l->name ?></td>
                <td><?php echo $l->email ?></td>
                <td>
                    <a href="<?php echo base_url('Users/view/' . $l->id) ?>" class="btn btn-info">View</a>
                    <a href="<?php echo base_url('Users/edit/' . $l->id) ?>" class="btn btn-success">Edit</a>
                    <a href="<?php echo base_url('Users/delete/' . $l->id) ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>