<?php
//데이터베이스 연결하기
include "db_info.php";

if (get_magic_quotes_gpc()) {
    stripslashes_all($_POST);
    stripslashes_all($_GET);
}

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$pass = trim($_POST['pass']);
$title = trim($_POST['title']);
$content = trim($_POST['content']);
$remote_addr = trim($_SERVER['REMOTE_ADDR']);

/*
$name = "devin";
$email = "naver@com";
$pass = "1111";
$title = "제목";
$content = "글 내용입니다.";
$REMOTE_ADDR = "100.200.300.400";*/

$query = "INSERT INTO board (name, email, pass, title, content, wdate, ip, view)
VALUES ('$name', '$email', $pass, '$title', '$content', now(), '$remote_addr', 0)";

$result = mysqli_query($conn, $query);

mysqli_close($conn);

// 새 글쓰기인 경우, 리스트로..
echo ("<meta http-equiv='Refresh' content='1; URL=list.php'>");

?>
<center>
    <font size="2">정상적으로 저장되었습니다.</font>
</center>
