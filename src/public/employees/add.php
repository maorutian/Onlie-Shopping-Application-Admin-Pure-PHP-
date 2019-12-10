<?php require_once('../../private/initialize.php');
require_login(); ?>

<?php
$page_title = 'Add Employee';
include(SHARED_PATH . '/admin_header.php'); ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Create record using post parameters
    $args = $_POST['employee'];
    $employee = new Employee($args);
    $result = $employee->save();

    if($result === true) {
        $new_id = $product->id;
        redirect_to(WWW_ROOT . '/employees/index.php');
    }

} else {
    // display the form
    $employee = new Employee;
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

            <!--Error Msg-->
            <?php echo display_errors($employee->errors); ?>
            <!--Error Msg-->

            <div class="page_header"><h3>Create a New Employee</h3></div>

            <!--form-->
            <form action="" class="uesr_search" method="post">
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
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="employee[password]" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="employee[confirm_password]" class="form-control" value="">
                </div>

                <button type="submit" class="btn btn-default">Create Employee</button>
            </form>
            <!--form-->

        </div>
    </div>
</div>



<?php include(SHARED_PATH . '/admin_footer.php'); ?>

