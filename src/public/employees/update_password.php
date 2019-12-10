<?php require_once('../../private/initialize.php');
require_login(); ?>

<?php
$page_title = 'Update Employee';
include(SHARED_PATH . '/admin_header.php'); ?>

<?php
// Get requested ID
$id = $_GET['id'] ?? false;
if (!$id) {
    redirect_to('index.php');
}
// Find using ID
$employee = Employee::find_by_id($id);
//cannot find
if ($employee == false) {
    redirect_to('index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get new
    $args = $_POST['employee'];
    //update
    $employee->update_property($args);
    //update database
    $result = $employee->save();

    if($result === true) {
        redirect_to('index.php');
    }

}
?>

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="list-group">
                <a href="index.php" class="list-group-item active">All Products</a>
                <a href="#" class="list-group-item">Search Product</a>
                <a href="add.php" class="list-group-item">Add Product</a>
            </div>
        </div>
        <div class="col-md-10">

            <!--Error Msg-->
            <?php echo display_errors($employee->errors); ?>
            <!--Error Msg-->

            <div class="page_header"><h3>Reset Password</h3></div>
            <ul class="nav nav-tabs">
                <li><a href="index.php">All</a></li>
                <li class="active"><a href="#"><?php echo $employee->full_name() ?></a></li>
            </ul>

            <!--form-->
            <form action="" class="uesr_search" method="post">
                <fieldset disabled="disabled">
                <div class="form-group">
                    <label for="first_name">First name</label>
                    <input type="text" name="employee[first_name]" class="form-control" value="<?php echo htmlspecialchars($employee->first_name); ?>">
                </div>
                <div class="form-group">
                    <label for="last_name">Last name</label>
                    <input type="text" name="employee[last_name]" class="form-control" value="<?php echo htmlspecialchars($employee->last_name); ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="employee[email]" class="form-control" value="<?php echo htmlspecialchars($employee->email); ?>">
                </div>
                    </fieldset>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="employee[password]" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="employee[confirm_password]" class="form-control" value="">
                        </div>

                <button type="submit" class="btn btn-default">Save</button>
            </form>
            <!--form-->

        </div>
    </div>
</div>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>
