<?php
session_start();
$_SESSION = array(); //session_unset();

//쿠키 삭제
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(), '', time() - 3600,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();
?>

<script>
    alert("로그아웃되었습니다.");
    location.replace('main_page.php');
</script>