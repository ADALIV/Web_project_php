<?php include 'includes/db.php' ?>
<?php
if (!session_id()) session_start();
$open_range = $_GET['open'];
//isset - 설정되었는지 확인
if (!isset($_SESSION['name'], $_SESSION['id']) && $open_range) {
    echo "<script>alert('회원전용 글입니다. 로그인 후 이용해 주세요.');</script>";
    echo "<script>if (document.referrer) location.href='main_page.php'; else history.back();</script>";
}
else if (!isset($_SESSION['name'], $_SESSION['id'])) {
    include 'includes/header.php';
}
else {
    include 'includes/header_in.php';
}
?>

<?php
$post_code = $_GET['post_code'];
$sql = "select * from `board` where post_code='$post_code'";
$query = $connect->query($sql)->fetch_array(MYSQLI_ASSOC);
if ($query != null) {
    if (isset($query["post_group"])) $post_group = $query["post_group"];
    if (isset($query["writer_id"])) $writer_id = $query["writer_id"];
    if (isset($query["writer_name"])) $writer_name = $query["writer_name"];
    if (isset($query["title"])) $title = $query["title"];
    if (isset($query["text"])) $text = $query["text"];
    if (isset($query["picture"])) $picture = $query["picture"];
    if (isset($query["re_date"])) $re_date = $query["re_date"];
    if (isset($query["view_count"])) $view_count = $query["view_count"];
    if (isset($query["recommend_count"])) $recommend_count = $query["recommend_count"];
    $view_count++;
    $q = "update `board` set view_count='$view_count' where post_code='$post_code'";
    $query = $connect->query($q);
}
?>

<?php include 'includes/post.php' ?>

<?php include 'includes/footer.php' ?>