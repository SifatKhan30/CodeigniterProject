<?php $this->load->view('layout') ?>
<div class="container">
<table class="table table-borederd">
    <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Price</th>
        <th>Variation</th>
        <th>Quantity</th>
        <th>Sub total</th>
        <th>Action</th>
    </tr>
    <?php foreach ($list as $key => $value) { ?>
      <tr>

        <td> <?php 
        ?></td>
        <td><?php echo $value['name'] ?></td>
        <td><?php echo $value['price'] ?></td>
        <td><table>
          <tr>
            <th>Size</th>
            <th>Color</th>
          </tr>
          <tr>
            <td><?php echo $value['options']['Size'] ?></td>
            <td><?php echo $value['options']['Color'] ?></td>
          </tr>
        </table></td>
        <td>
        <form action="<?php echo base_url('Users/update_cart') ?>" method="post">
        <input type="hidden" value="<?php echo $value['rowid'] ?>" name="rowid">
        <input style="border:none; outline:none;"  type="text" value="<?php echo $value['qty'] ?>" name="qty">
        <input style="border:none" class="btn btn-sm btn-success" type="submit" value="Update">
        </form>    
        </td>
        <td>
          
            <?php echo $value['subtotal'] ?>
        </td>
        <td><a href="<?php echo base_url('Users/remove_cart/'.$value['rowid']) ?>" class="btn btn-sm btn-danger">Remove</a></td>
      </tr>
   <?php } ?>
   <tr>
    <th ></th>
    <th colspan="4">Total= </th>
    <th><?php echo $this->cart->total() ?></th>
   </tr>
</table>
</div>