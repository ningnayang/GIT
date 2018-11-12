<?php

header('content-type:text/html;charset=utf-8');
session_start();
if(isset($_COOKIE['username'])) {
    $user = $_COOKIE['username'];
    $_SESSION['username'] = $user;
} else {
    $user = '游客';
}
echo '你好, '.$user;