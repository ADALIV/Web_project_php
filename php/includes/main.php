<?php include 'db.php' ?>

<div id="notice">
    <h2>믹스 공지</h2>
    <ul>
        <li>NEW COMMUNITY, 믹스입니다.</li>
        <li>유머, 잡담 등 여러 주제를 다루는<br>종합 커뮤니티입니다.</li>
        <li>특정 집단이나 특정 인물에 대한<br>혐오는 자제해 주세요.</li>
        <li>메뉴 추가 요청 및 기타 건의는<br><a href="to_admin.php">To.관리자</a> 클릭!</li>
    </ul>
</div>
<div class="mix_list">
    <ul>
        <li><a href="board_entertainment.php">연예</a></li>
        <li><a href="board_game.php">게임</a></li>
        <li><a href="board_cartoon.php">만화/애니</a></li>
        <li><a href="board_music.php">음악</a></li>
        <li><a href="board_sports.php">스포츠</a></li>
        <li><a href="board_health.php">건강</a></li>
        <li><a href="board_food.php">음식</a></li>
        <li><a href="board_humor.php">유머</a></li>
        <li><a href="board_chat.php">잡담</a></li>
    </ul>
</div>
<div class="main_post">
    <h2>인기 믹스</h2>
    <table class="post_list">
        <thead>
            <tr>
                <th>글번호</th>
                <th>메뉴</th>
                <th>제목</th>
                <th>글쓴이</th>
                <th>조회수</th>
                <th>추천수</th>
            </tr>
        </thead>
        <?php   
        $q = $connect->query("select * from board where re_date between date_add(now(), interval -2 day) and now() order by view_count desc, recommend_count desc limit 20");
        while ($list = $q->fetch_array(MYSQLI_ASSOC)) {
            //25글자까지만 출력
            $title = $list["title"];
            if (mb_strlen($title) > 20) {
                $title = mb_substr($title, 0, 20, "UTF-8")."...";
            }
            $name = $list["writer_name"];
            if (mb_strlen($name) > 5) {
                $name = mb_substr($name, 0, 5, "UTF-8")."...";
            }
        ?>
        <tbody>
            <tr onclick="location.href='view_post.php'+'?post_code='+<?= $list['post_code'] ?>+'&open='+<?= $list['open_range'] ?> ">
                <td><?php echo $list["post_code"] ?></td>
                <td><?php echo '['.$list["post_group"].']' ?></td>
                <td><?php if ($list["open_range"]) echo "<img src=\"../images/lock.png\">"; echo $title ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $list["view_count"] ?></td>
                <td><?php echo $list["recommend_count"] ?></td>
            </tr>
        </tbody>
        <?php } ?>
    </table>
</div>