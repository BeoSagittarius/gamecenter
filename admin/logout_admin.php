<?php
    $title_page = 'Logout';
	include('../includes/backend/mysqli_connect.php');
	include('../includes/functions.php');

    if(isset($_SESSION['fullname'])) {
         // Neu co thong tin nguoi dung, va da dang nhap, se logout nguoi dung.
        $_SESSION = array(); // Xoa het array cua SESSIOM
        session_destroy(); // Destroy session da tao
        setcookie(session_name(),'', time()-36000); // Xoa cookie cua trinh duyet

        redirect_to('admin/login_admin.php');
    }else {
        redirect_to('admin/login_admin.php');
    }
