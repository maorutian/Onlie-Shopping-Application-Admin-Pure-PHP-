<?php

function redirect_to($location) {
    header("Location: " . $location);
    exit;
}

function display_errors($errors=array()) {
    $output = '';
    if(!empty($errors)) {
        $output .= "<div class=\"alert alert-danger alert-dismissible fade in\" role=\"alert\">";
        $output .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>";
        $output .= "<ul>";
        foreach($errors as $error) {
            $output .= "<li>" . htmlspecialchars($error) . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}



function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

function require_login() {
    global $session;
    if(!$session->is_logged_in()) {
        redirect_to( WWW_ROOT . '/login.php');
    }
}

function display_session_message() {
    global $session;
    $msg = $session->message();
    if(isset($msg) && $msg != '') {
        $session->clear_message();
        return '<div id="message">' . htmlspecialchars($msg) . '</div>';
    }
}