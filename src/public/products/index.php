<?php require_once('../../private/initialize.php');
require_login(); ?>

<?php
$page_title = 'Product';
include(SHARED_PATH . '/admin_header.php'); ?>

<?php

$current_page = $_GET['page'] ?? 1;
$per_page = 5;
$total_count = Product::count_all();
$pagination = new Pagination($current_page, $per_page, $total_count);
//$products = Product::find_all();
$products = Product::find_all_pagination($pagination);

?>

    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="list-group">
                    <a href="index.php" class="list-group-item active">All Products</a>
                    <a href="#" class="list-group-item">Search Product</a>
                    <a href="add.php" class="list-group-item">Add product</a>
                </div>
            </div>
            <div class="col-md-10">
                <div class="page_header"><h3>All Products</h3></div>
                <ul class="nav nav-tabs">
                    <li class="active"><a href="index.php">All</a></li>
                </ul>

                <!--table-->
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $product) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product->name); ?></td>
                            <td><?php echo htmlspecialchars($product->price); ?></td>
                            <td><?php echo htmlspecialchars($product->category); ?></td>
                            <td>
                                <ul class="nav nav-pills">
                                    <li role="presentation"><a
                                                href="<?php echo WWW_ROOT . '/products/detail.php?id=' . htmlspecialchars(urlencode($product->id)); ?>">View</a>
                                    </li>
                                    <li role="presentation"><a
                                                href="<?php echo WWW_ROOT . '/products/update.php?id=' . htmlspecialchars(urlencode($product->id)); ?>">Edit</a>
                                    </li>
                                    <li role="presentation"><a
                                                href="<?php echo WWW_ROOT . '/products/delete.php?id=' . htmlspecialchars(urlencode($product->id)); ?>">Delete</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <!--table-->

                <!--pagination-->
                <?php
                $url = WWW_ROOT . '/products/index.php';
                echo $pagination->page_links($url);
                ?>
                <!--pagination-->

            </div>
        </div>
    </div>


<?php include(SHARED_PATH . '/admin_footer.php'); ?>