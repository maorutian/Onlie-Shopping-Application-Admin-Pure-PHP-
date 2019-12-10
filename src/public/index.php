<?php require_once('../private/initialize.php');
require_login(); ?>

<?php
$page_title = 'Home';
include(SHARED_PATH . '/admin_header.php'); ?>

    <!--charjs-->
    <script src="<?php echo WWW_ROOT . '/js/Chart.js' ?>"></script>
    <script src="<?php echo WWW_ROOT . '/js/script.js' ?>"></script>

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <!--alter-->
                <div class="alert alert-info" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h4>Hi <?php echo $session->first_name; ?></h4>
                    <p>Welcome to Cakefactory Admin System</p>
                </div>
                <!--alter-->

                <!--    table-->
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Track</div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>New orders</th>
                                    <th>New visitors</th>
                                    <th>Sales</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">2019/10/20</th>
                                    <td>300</td>
                                    <td>2345</td>
                                    <td>300000</td>
                                </tr>
                                <tr>
                                    <th scope="row">2019/10/19</th>
                                    <td>234</td>
                                    <td>984</td>
                                    <td>276544</td>
                                </tr>
                                <tr>
                                    <th scope="row">2019/10/18</th>
                                    <td>394</td>
                                    <td>2737</td>
                                    <td>93737</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--    table-->
                <!--Chart-->
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Chart</div>
                        <div class="panel-body">
                            <canvas id="canvas" class="col-md-12"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Chart-->
            </div>
        </div>
    </div>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>