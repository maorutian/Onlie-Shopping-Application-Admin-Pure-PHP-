<?php
require_once('../private/initialize.php');

$errors = [];
$email = '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    // Validations
    if (is_blank($email)) {
        $errors[] = "Email cannot be blank.";
    }
    if (is_blank($password)) {
        $errors[] = "Password cannot be blank.";
    }
    // if there were no errors, try to login
    if (empty($errors)) {
        $employee = Employee::find_by_email($email);
        if ($employee == false) {
            $errors[] = "Wrong Email";
        } elseif (!$employee->verify_password($password)) {
            $errors[] = "Wrong Password";
        } else {
            $session->login($employee);
            redirect_to("index.php");
        }
    }
}
?>
<?php
$page_title = 'Login';
include(SHARED_PATH . '/admin_header.php'); ?>

    <div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <!--Error Msg-->
            <?php echo display_errors($errors); ?>
            <!--Error Msg-->
            <form action="" method="post">
                <div style="text-align:center">
                    <h3><span class="glyphicon glyphicon-user"></span> LOGIN</h3>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo htmlspecialchars($email); ?>"
                           placeholder="Email"/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" value="" placeholder="Password"/>
                </div>
                <div style="text-align:center">
                    <button type="submit" class="btn btn-default">LOGIN</button>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>