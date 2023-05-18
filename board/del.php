<?php
//데이터베이스 연결하기
include "db_info.php";

if (get_magic_quotes_gpc()) {
    stripslashes_all($_POST);
    stripslashes_all($_GET);
}

$id = trim($_GET['id']);
$pass = trim($_POST['pass']);


//데이터 베이스 연결하기 3 include "db_info.php";
$result=mysqli_query($conn, "SELECT pass FROM board WHERE id=$id");

$row=mysqli_fetch_array($result);

if ($pass==$row[pass]) {
    $query = "DELETE FROM board WHERE id=$id ";
    $result=mysqli_query($conn, $query);
}
else
{
    echo ("
    <script>
    alert('비밀번호가 틀립니다.');
    history.go(-1);
    </script>
    ");
    exit;
}
?>
<center>
<meta http-equiv='Refresh' content='1; URL=list.php'>
<FONT size=2>삭제되었습니다.</font>