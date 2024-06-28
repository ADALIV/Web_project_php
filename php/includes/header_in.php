<?php
if (!session_id()) session_start();
//isset - 설정되었는지 확인
if (!isset($_SESSION['name'], $_SESSION['id'])) {
    echo "<script>location.replace('main_page.php');</script>";
}
else {
    $name = $_SESSION['name'];
    $id = $_SESSION['id'];
}
?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../images/logo.png">
        <title>믹스(mix community)</title>
        <link rel="stylesheet" href="../css/main_page.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/board.css">
        <link rel="stylesheet" href="../css/post.css">
    </head>
    <body>
        <div id="container">
            <header>
                <div id="logo">
                    <a href="main_page_in.php"><img src="../images/logo.png"></a>
                </div>
                <nav><ul id="member">
                    <li>환영합니다 <?= $name ?>님(<?= $id ?>)</li>
                    <li><a href="logout.php">로그아웃</a></li>
                </ul></nav>
                <form id="search" action="search.php?" method="get">
                    <input type="text" placeholder="통합검색">
                    <button type="submit">검색</button>
                </form>
                <nav><ul id="top">
                    <li><a href="board_entertainment.php">연예</a></li>
                    <li><a href="board_game.php">게임</a></li>
                    <li><a href="board_cartoon.php">만화/애니</a></li>
                    <li><a href="board_music.php">음악</a></li>
                    <li><a href="board_sports.php">스포츠</a></li>
                    <li><a href="board_health.php">건강</a></li>
                    <li><a href="board_food.php">음식</a></li>
                </ul></nav>
            </header>