<form action="<?php echo base_url('Users/save') ?>" method="post">
    <table border="1">
        <tr>
            <th>Name</th>
            <td><input type="text" name="name"></td>
            <th>Email</th>
            <td><input type="text" name="email"></td>
            <th>Password</th>
            <td><input type="password" name="password"></td>
            <td><input type="submit" value="Save"></td>
        </tr>
    </table>
</form>