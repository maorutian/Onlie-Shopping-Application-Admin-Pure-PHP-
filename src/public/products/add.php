<?php require_once('../../private/initialize.php');
require_login(); ?>

<?php
$page_title = 'Add Product';
include(SHARED_PATH . '/admin_header.php'); ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Create record using post parameters
    $args = $_POST['product'];
    $product = new Product($args);
    $result = $product->save();

    if($result === true) {
        $new_id = $product->id;
        redirect_to(WWW_ROOT . '/products/detail.php?id=' . $new_id);
    }

} else {
    // display the form
    $product = new Product;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="list-group">
                <a href="index.php" class="list-group-item">All Products</a>
                <a href="#" class="list-group-item">Search Product</a>
                <a href="add.php" class="list-group-item active">Add product</a>
            </div>
        </div>
        <div class="col-md-10">

            <!--Error Msg-->
            <?php echo display_errors($product->errors); ?>
            <!--Error Msg-->

            <div class="page_header"><h3>Create a New Product</h3></div>

            <!--form-->
            <form action="" class="uesr_search" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="product[name]" class="form-control" value="<?php echo htmlspecialchars($product->name); ?>">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="product[price]" class="form-control" value="<?php echo htmlspecialchars($product->price); ?>">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="product[category]" class="form-control">
                        <?php foreach (Product::CATEGORIES as $category) { ?>
                            <option value="<?php echo $category; ?>" <?php if($product->category == $category) { echo 'selected'; } ?>><?php echo $category; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-default">Create Product</button>
            </form>
            <!--form-->

        </div>
    </div>
</div>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>
