<div class="post_page_list">
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
<div class="post_page_post">
    <h2><?= $post_group ?> (<?= $post_code ?>)</h2>
    <h3><?= $title ?></h3>
    <div>
        <ul>
            <li><?= $writer_name ?><li>
            <li>조회 <?= $view_count ?></li>
            <li>추천 <?= $recommend_count ?></li>
            <li><?= $re_date ?></li>
            <li><?php
                $differ = strtotime(date("Y-m-d H:i:s"))-strtotime($re_date);
                $differ = ceil($differ / (60*60*24));
                if ($differ > 0) echo $differ."일 전";
            ?></li>
        </ul>
    </div>
    <div id="post">
        <?= $text ?>
        <?= $picture ?>
        <p><a href="recommend.php"><img src="../images/recommend.png"></a></p>
    </div>
</div>