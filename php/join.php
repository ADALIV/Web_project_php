<?php include 'includes/db.php' ?>

<?php
if (!session_id()) session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["name"])) {$name = preg_replace("/\s+/", "", $_POST["name"]);}
    if (isset($_POST["user"])) {$uid = preg_replace("/\s+/", "", $_POST["user"]);} //name="user" input value
    if (isset($_POST["password_1"])) {$password_1 = preg_replace("/\s+/", "", $_POST["password_1"]);}
    if (isset($_POST["password_2"])) {$password_2 = preg_replace("/\s+/", "", $_POST["password_2"]);}
    if (mb_strlen($name)<2 || mb_strlen($name)>16) {
        echo "<script>alert('이름: 2~16자의 문자를 사용해 주세요.')</script>";
        echo "<script>location.replace('join.php');</script>";
        exit;
    }
    if (mb_strlen($uid)<4 || mb_strlen($uid)>16) {
        echo "<script>alert('아이디: 4~16자의 문자를 사용해 주세요.')</script>";
        echo "<script>location.replace('join.php');</script>";
        exit;
    }
    if (mb_strlen($password_1)<6 || mb_strlen($password_1)>16) {
        echo "<script>alert('비밀번호: 6~16자의 문자를 사용해 주세요.')</script>";
        echo "<script>location.replace('join.php');</script>";
        exit;
    }
    if ($password_1 != $password_2) {
        echo "<script>alert('비밀번호: 비밀번호가 일치하지 않습니다.')</script>";
        echo "<script>location.replace('join.php');</script>";
        exit;
    }
    $q = "insert into `user_info` (name, id, password) values ('$name', '$uid', '$password_1')";
    $query = $connect->query($q);
    if ($query) {
        $_SESSION['name'] = $name;
        $_SESSION['id'] = $uid;
        echo "<script>alert('회원가입에 성공했습니다.');</script>";
        echo "<script>location.replace('main_page_in.php');</script>";
        session_regenerate_id();
        exit;
    } else {
        echo "<script>alert('회원가입에 실패했습니다.');</script>";
        echo "<script>location.replace('join.php');</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../images/logo.png">
        <title>믹스(mix community) 회원가입</title>
        <link rel="stylesheet" href="../css/login.css">
        <script>
            function checkid() {
                var userid = document.getElementById("uid").value;
                if (userid)	{
                    url = "check_duplicate.php?userid=" + userid;
                    window.open(url, "chkid", "width=600, height=200");
                } else {
                    alert("아이디를 입력하세요.");
                }
            }
            function decide() {
                document.getElementById("decide").innerHTML = "<span style='color:blue;'>사용가능한 아이디입니다.</span>";
                document.getElementById("uid").readonly = true; //disabled 오류발생 - form 전송불가
                document.getElementById("uid").value = document.getElementById("uid").value;
                document.getElementById("submit").disabled = false;
                document.getElementById("check_button").disabled = true;
            }
            function change() {
                document.getElementById("uid").disabled = false;
                document.getElementById("uid").value = "";
                document.getElementById("submit").disabled = true;
            }
        </script>
    </head>
    <body>
        <div id="container">
            <a href="main_page.php"><img src="../images/logo.png"></a>
            <h1>mix community 회원가입<h1>
            <form action="join.php" method="POST" id="login_form">
                <div class="login_box">
                    <input type="text" name="name" placeholder="이름(2-16)" minlength=2 maxlength=16>
                    <label for="name">이름(2-16)</label>
                </div>
                <div class="login_box">
                    <input type="text" name="user" id="uid" placeholder="아이디(4-16)" minlength=4 maxlength=16>
                    <label for="user">아이디(4-16)</label>
                </div>
                <div>
                    <input type="button" id="check_button" value="아이디 중복검사" onclick="checkid();">
                    <span id="decide" style='color:red;'>아이디 중복여부를 확인해주세요.</span>
                </div>
                <div class="login_box">
                    <input type="password" name="password_1" placeholder="비밀번호(6-16)" minlength=6 maxlength=16>
                    <label for="password_1">비밀번호(6-16)</label>
                </div>
                <div class="login_box">
                    <input type="password" name="password_2" placeholder="비밀번호(6-16)" minlength=6 maxlength=16>
                    <label for="password_2">비밀번호(6-16) 확인</label>
                </div>
                <input id="submit" type="submit" value="회원가입" disabled>
            </form>

<?php include 'includes/footer.php' ?>