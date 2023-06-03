<h1>User List</h1>
<a href="<?php echo base_url('Users/create') ?>">Create user</a>
<table border="1" width="90%">
    <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    
    <?php foreach($list as $k=>$l){ ?>
    <tr>
        <td><?php echo $k+1 ?></td>
        <td><?php echo $l->name ?></td>
        <td><?php echo $l->email ?></td>
        <td>
            <a href="<?php echo base_url('Users/view/'.$l->id) ?>">view</a>
            <a href="<?php echo base_url('Users/edit/'.$l->id) ?>">edit</a>
            <a href="<?php echo base_url('Users/delete/'.$l->id) ?>" onclick="return confirm('Are you sure?')">delete</a>
        </td>
    </tr>
    <?php } ?>
</table>