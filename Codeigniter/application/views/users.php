

<table border="1">
    <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
    </tr>
    <?php foreach($list as $k=>$d){ ?>
        <tr>
        <td><?php echo $k+1 ?></td>
        <td><?php echo $d->name ?></td>
        <td><?php echo $d->email ?></td>
        <td><?php echo $k->password ?></td>
        </tr>
    <?php } ?>
</table>