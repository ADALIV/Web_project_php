<?php include 'includes/db.php' ?>

<?php
    $uid = $_GET["userid"]; //GET으로 넘긴 userid
    $sql = "select * from `user_info` where id='$uid'";
    $query = mysqli_fetch_array(mysqli_query($connect, $sql));

    if (!$query && mb_strlen($uid)>=4 && mb_strlen($uid)<=16) {
        echo "<span style='color:blue;'>$uid</span>는 사용가능한 아이디입니다.";
        ?><p><input type=button value="아이디 사용" onclick="opener.parent.decide(); window.close();"></p>
    <?php
    } else if (mb_strlen($uid)<4 || mb_strlen($uid)>16) {
        echo "<span style='color:blue'>아이디: 4~16자의 문자를 사용해 주세요.</span>";
        ?><p><input type=button value="다른 아이디 사용" onclick="opener.parent.change(); window.close();"></p>
    <?php
    } else {
        echo "<span style='color:red;'>$uid</span>는 중복된 아이디입니다.";
        ?><p><input type=button value="다른 아이디 사용" onclick="opener.parent.change(); window.close();"></p>
    <?php
    }
?>