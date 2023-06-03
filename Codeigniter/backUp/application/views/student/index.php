<?php $this->load->view('student/layout') ?>

<div class="container">
<a href="<?php echo base_url('Student/create') ?>" class="btn btn-sm btn-success">Create student</a><br>
<a href="<?php echo base_url('Login/logout') ?>" class="btn btn-sm btn-danger">Logout</a><br>
<?php if($this->session->flashdata('msg')){ ?>
<div class="alert alert-success" role="alert">
<?php echo $this->session->flashdata('msg'); ?>
</div>
<?php } ?>

<table class="table table-bordered">
    <tr>
        <th>SL</th>
        <th>Name</th>
        <th>ROll</th>
        <th>Department</th>
        <th></th>
    </tr>
<?php foreach ($list as $key => $v) {?>
      <tr>
        <td><?php echo $page+$key+1 ?></td>
        <td><?php echo $v->name ?></td>
        <td><?php echo $v->roll ?></td>
        <td><?php echo $v->dpt ?></td>
        <td>
            <a href="<?php echo base_url('Student/edit/'.$v->id) ?>" class="btn btn-xs btn-primary">edit</a>
            <a href="<?php echo base_url('Student/delete/'.$v->id) ?>" class="btn btn-xs btn-danger">delete</a>
        </td>
      </tr>
    <?php } ?>
</table>
<?php echo $links ?>
</div>