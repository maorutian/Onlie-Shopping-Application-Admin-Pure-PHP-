<?php require_once('../../private/initialize.php');
require_login(); ?>

<?php
$page_title = 'Employees';
include(SHARED_PATH . '/admin_header.php'); ?>

<?php
$employees = Employee::find_all();
?>

    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="list-group">
                    <a href="index.php" class="list-group-item active">All Employees</a>
                    <a href="#" class="list-group-item">Search Employees</a>
                    <a href="add.php" class="list-group-item">Add Employee</a>
                </div>
            </div>
            <div class="col-md-10">
                <div class="page_header"><h3>All Employees</h3></div>
                <ul class="nav nav-tabs">
                    <li class="active"><a href="index.php">All</a></li>
                </ul>

                <!--table-->
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($employees as $employee) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($employee->first_name); ?></td>
                            <td><?php echo htmlspecialchars($employee->last_name); ?></td>
                            <td><?php echo htmlspecialchars($employee->email); ?></td>
                            <td>
                                <ul class="nav nav-pills">
                                    <li role="presentation" class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                           aria-haspopup="true" aria-expanded="false">
                                            Edit <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="<?php echo WWW_ROOT . '/employees/update.php?id=' . htmlspecialchars(urlencode($employee->id)); ?>">Edit
                                                    Information</a></li>
                                            <li>
                                                <a href="<?php echo WWW_ROOT . '/employees/update_password.php?id=' . htmlspecialchars(urlencode($employee->id)); ?>">Reset
                                                    Password</a></li>
                                        </ul>
                                    </li>
                                    <li role="presentation"><a
                                                href="<?php echo WWW_ROOT . '/employees/delete.php?id=' . htmlspecialchars(urlencode($employee->id)); ?>">Delete</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <!--table-->

            </div>
        </div>
    </div>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>