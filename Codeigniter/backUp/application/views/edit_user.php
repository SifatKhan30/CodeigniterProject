<form action="<?php echo base_url('Users/update/'.$edit->id) ?>" method="post">
    <table border="1">
        <tr>
            <th>Name</th>
            <td><input type="text" name="name" value="<?php echo $edit->name ?>"></td>
            <th>Email</th>
            <td><input type="text" name="email" value="<?php echo $edit->email ?>"></td>
            <th>Password</th>
            <td><input type="password" name="password" value="<?php echo $edit->password ?>"></td>
            <td><input type="submit" value="Update"></td>
        </tr>
    </table>
</form>