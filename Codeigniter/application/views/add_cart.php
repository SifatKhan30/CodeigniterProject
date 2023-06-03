<?php $this->load->view('layout') ?>
<div class="container">
  
    <form action="<?php echo base_url('Users/add_to_cart') ?>" method="post">

    <?php if ($this->session->flashdata('msg')) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('msg') ?>
        </div>
    <?php }else{
        $this->session->sess_destroy();
    } ?>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">
                <h3>Id</h3>
            </label>
            <div class="col-sm-6">
                <input type="hidden" name="id" value="108" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">
                <h4>Quantity</h4>
            </label>
            <div class="col-md-6">
                <input type="text" style="border:none; outline:none;" name="qty" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">
                <h4>Price</h4>
            </label>
            <div class="col-md-6">
                <input type="text" style="border:none; outline:none;" name="price" value="1200" readonly class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">
                <h4>Product Name</h4>
            </label>
            <div class="col-md-6">
                <input type="text" style="border:none; outline:none;" name="name" value="Kurti" readonly class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">
                <h4>Size</h4>
            </label>
            <div class="col-md-6"  class="form-control btn-group dropright">
                <select name="Size" class="btn btn-info" style="border:none; outline:none;" id="">
                    <option value="S">Small</option>
                    <option value="M">Medium</option>
                    <option value="L">Large</option>
                    <option value="XL">XL</option>
                </select>
                <!-- <input type="text" style="border:none; outline:none;" name="Size" value="M" class="form-control"> -->
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">
                <h4>Color</h4>
            </label>
            <div class="col-md-6">
            <select name="Color" class="btn btn-info " style="border:none; outline:none;" id="">
                    <option value="Green">Green</option>
                    <option value="Red">Red</option>
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                </select>
            </div>
        </div>
        <input type="submit" value="Add to Cart" class="btn btn-xs btn-success">
    </form>
</div>