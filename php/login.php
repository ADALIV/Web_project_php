<?php include 'includes/db.php' ?>

<?php
if (!session_id()) session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = preg_replace("/\s+/", "", $_POST['id']); //name="id" input value
    $password = preg_replace("/\s+/", "", $_POST['password']); //name="password" input value
    if (mb_strlen($id)<4 || mb_strlen($id)>16) {
        echo "<script>alert('아이디: 4~16자의 문자를 사용해 주세요.')</script>";
        echo "<script>location.replace('login.php');</script>";
        exit;
    }
    if (mb_strlen($password)<6 || mb_strlen($password)>16) {
        echo "<script>alert('비밀번호: 6~16자의 문자를 사용해 주세요.')</script>";
        echo "<script>location.replace('login.php');</script>";
        exit;
    }
    $q = "select * from `user_info` where id = '$id' and password = '$password'";
    $query = $connect->query($q);
    $user = $query->fetch_array(MYSQLI_ASSOC);
    if ($user != null) {
        $_SESSION['name'] = $user['name'];
        $_SESSION['id'] = $user['id'];
        echo "<script>location.replace('main_page_in.php');</script>";
        session_regenerate_id();
        exit;
    }
    if ($user == null) {
        echo "<script>alert('아이디 또는 비밀번호를 잘못 입력했습니다.')</script>";
        echo "<script>location.replace('login.php');</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../images/logo.png">
        <title>믹스(mix community) 로그인</title>
        <link rel="stylesheet" href="../css/login.css">
    </head>
    <body>
        <div id="container">
            <a href="main_page.php"><img src="../images/logo.png"></a>
            <h1>mix community<h1>
            <form action="login.php" method="POST" id="login_form">
                <div class="login_box">
                    <input type="text" name="id" placeholder="아이디(4-16)" minlength=4 maxlength=16>
                    <label for="id">아이디(4-16)</label>
                </div>
                <div class="login_box">
                    <input type="password" name="password" placeholder="비밀번호(6-16)" minlength=6 maxlength=16>
                    <label for="id">비밀번호(6-16)</label>
                </div>
                <input id="submit" type="submit" value="로그인">
            </form>

<?php include 'includes/footer.php' ?>