<table border="1">
    <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th></th>
    </tr>
    <?php foreach ($list as $key => $value) {?>

        <tr>
            <td></td>
            <td><?php echo $value['name'] ?></td>
            <td><?php echo $value['price'] ?></td>
            <td> 
                <form action="<?php echo base_url('Student/update_cart') ?>" method="post">
                <input type="hidden" value="<?php echo $value['rowid'] ?>" name="rowid"> 
                <input type="text" value="<?php echo $value['qty'] ?>" name="qty"> 
                <input type="submit" value="Update"> 
                </form>
            </td>
            <td><?php echo $value['subtotal'] ?></td>
            <td><a href="<?php echo base_url('Student/remove_cart/'.$value['rowid']) ?>">Remove</a></td>
        </tr>
        <?php } ?>
        <tr>
            <th colspan="4">Total=</th>
            <th><?php echo $this->cart->total() ?></th>
        </tr>
</table>