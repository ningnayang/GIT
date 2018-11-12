<?php
//借助script标签对所有站点发出http请求
$username = trim(htmlentities($_GET['username']));
$token = $_GET['token'];
$from = $_GET['from'];
$operate = $_GET['operate'];
echo 1;
// 同时登陆、注销的站点 跨域的网站
$web_sites = array('www.site1.com', 'www.site2.com','www.sso.com');

foreach($web_sites as $sites) {
    ?>
    <script src="http://<?php echo $sites;?>/set_cookie.php?username=<?php echo $username;?>&token=<?php echo $token;?>&from=<?php echo urlencode($from);?>&operate=<?php echo $operate;?>"></script>

    <?php
}
$from = urldecode($from);
?>

<script>
    //如果为登录 则跳往首页 如果为注销 则跳往登录页面
    window.location = "<?php echo $from;?>/<?php if(1 == $operate) { echo 'index.php';}else { echo 'login.php';} ?>";
</script>