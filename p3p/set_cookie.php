<?php
//cookie处理页面
session_start();
header('Content-Type:text/javascript; charset=utf-8');
$salt = 'sso_example_'.strtotime(date('Y-m-d H'));

if($_GET['token'] == md5($salt) && isset($_GET['username']) && $_GET['username'] != '') {

    // 添加 SESSION 即为登录时
    if(1 == $_GET['operate']) {
        $username = trim(htmlentities($_GET['username']));
        $_SESSION['username'] = $username;
        setcookie('username', $username, time() + 3600, '/', 'sso.com');//设置在父域名下 则mall.site1.com也能用
    } else {
        //为注销时
        // 删除 SESSION
        session_unset();
        session_destroy();
        // 删除 COOKIE
        setcookie('username', false, time() - 1, '/', 'sso.com');
        if(isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 1, '/', 'sso.com');
        }
    }
}