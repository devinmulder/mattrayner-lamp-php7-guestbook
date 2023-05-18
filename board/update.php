<?php
// 데이터베이스 연결
include "db_info.php";

if (get_magic_quotes_gpc()) {
    stripslashes_all($_POST);
    stripslashes_all($_GET);
}

$id = trim($_GET['id']);

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$pass = trim($_POST['pass']);
$title = trim($_POST['title']);
$content = trim($_POST['content']);

// 글의 비밀번호를 가져온다.
$query = "SELECT pass FROM board WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

// 입력된 값과 비교한다.
if ($pass == $row['pass']) {
    $query = "UPDATE board SET name = '$name', email = '$email',
                 title = '$title', content = '$content'
                 WHERE id = $id";

    mysqli_query($conn, $query);
}

else {
    echo ("
    <script>
    alert('비밀번호가 틀립니다.');
    history.go(-1);
    </script>      
    ");
    exit;
}

// DB 연결 종료
mysqli_close($conn);


// 수정하기 경우 : 수정된 글로 이동
echo ("<meta http-equiv='Refresh' content='1;URL=read.php?id=$id'>");

?>

<center>
    <font size="2">정상적으로 수정되었습니다.</font>
</center>
