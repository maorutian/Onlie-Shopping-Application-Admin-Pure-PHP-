<?php require_once('../../private/initialize.php');
require_login(); ?>

<?php
$page_title = 'Product - Delete';
include(SHARED_PATH . '/admin_header.php'); ?>

<?php
// Get requested ID
$id = $_GET['id'] ?? false;
if (!$id) {
    redirect_to('index.php');
}
// Find product using ID
$employee = Employee::find_by_id($id);
//cannot find product
if ($employee == false) {
    redirect_to('index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee->delete();
    redirect_to('index.php');

}

?>

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="list-group">
                <a href="index.php" class="list-group-item">All Employees</a>
                <a href="#" class="list-group-item">Search Employees</a>
                <a href="add.php" class="list-group-item active">Add Employee</a>
            </div>
        </div>
        <div class="col-md-10">
            <div class="page_header"><h3>Delete Employees</h3></div>
            <ul class="nav nav-tabs">
                <li><a href="index.php">All</a></li>
                <li class="active"><a href="#"><?php echo $employee->full_name() ?></a></li>
            </ul>
            <!--alter-->
            <div class="col-md-12" id="delete_info">
                <form action="" method="post">
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        <h4>Delete information</h4>
                        <p>Are you sure you want to delete this person?</p>
                        <h4><?php echo htmlspecialchars($employee->full_name()); ?></h4>
                        <p>
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <button type="button" class="btn btn-default" data-dismiss="alert">cancel</button>
                        </p>
                </form>
            </div>
            <!--alter-->
        </div>
    </div>
</div>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>
