<?php if ($edit){ ?>
    <h3 class="fw-bold p-2">
        Edit Product
    </h3>
<?php } else { ?>
    <h3 class="fw-bold p-2" > 
        View Product
    </h3> 
<?php } ?>


<?php if (!null == validation_errors()) : ?>
    <div class="alert alert-danger col-md-4" role="alert">
        <?php echo validation_errors(); ?>
    </div>
<?php endif; ?>
<div class="col-md-4 p-2">
    <?php echo form_open_multipart('Products/processEditProduct/'.$product->prod_id); ?>
    <form>
        <br>
        <div class="form-group">
            <label for=prod_name><b>Prod Name</b></label>
            <input name="prod_name" type="text" class="form-control" id="prod_name" placeholder="Product Name" value="<?php echo $product->prod_name; ?>">
        </div>
        <br>
        <div class="form-group">
            <label for=prod_description><b>Product Description</b></label>
            <input name="prod_description" type="text" class="form-control" id="prod_description" placeholder="Product Description" value="<?php echo $product->prod_description; ?>">
        </div>
        <br>
        <div class="form-group">
            <label for=prod_price><b>Product Price</b></label>
            <input name="prod_price" type="text" class="form-control" id="prod_price" placeholder="Product Price" value="<?php echo $product->prod_price; ?>">
        </div>
        <br>
        <br>
        
        <a type="a" class="btn btn-primary" href="<?= base_url('Home/view_products'); ?>">Back</a>
        <?php if ($edit) : ?>
            <button type="submit" class="btn btn-success">Update</button>
        <?php endif ?>
    </form>
</div>