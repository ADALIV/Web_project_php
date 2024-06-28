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
                    <a href="main_page.php"><img src="../images/logo.png"></a>
                </div>
                <nav><ul id="member">
                    <li><a href="login.php">로그인</a></li>
                    <li><a href="join.php">회원가입</a></li>
                </ul></nav>
                <form id="search" action="search.php?" method="get">
                    <input type="text" placeholder="통합검색" maxlength=16>
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