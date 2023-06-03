<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>
<body>
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
                <td><?php echo $d->password ?></td>
            </tr>

        <?php } ?>
    </table>
</body>
</html>