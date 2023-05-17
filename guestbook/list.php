<?php
$conn = mysqli_connect("localhost", "admin", "apmsetup");
//mysqli_select_db("brain_php", $conn);
mysqli_select_db($conn, "brain_php");
//mysqli_query("set names euckr");

$query = "SELECT * FROM guestbook ORDER BY id DESC";
//$result = mysqli_query($query, $conn);
$result = mysqli_query($conn, $query);
//$total = mysqli_affected_rows($result);
$total = mysqli_num_rows($result);

$pagesize = 5;
?>

<FORM ACTION="insert.php" METHOD="POST">
    <TABLE BORDER="1" WIDTH="600">
        <TR>
            <TD>이름</TD>
            <TD><INPUT TYPE="TEXT" NAME="name"></TD>
            <TD>비밀번호</TD>
            <TD><INPUT TYPE="PASSWORD" NAME="pass"></TD>
        </TR>
        <TR>
            <TD COLSPAN="4">
                <TEXTAREA NAME="content" COLS="80" ROWS="5"></TEXTAREA>
            </TD>
        </TR>
        <TR>
            <TD COLSPAN="4" ALIGN="right">
                <INPUT TYPE="SUBMIT" VALUE=" 확 인 ">
            </TD>
        </TR>
    </TABLE>
</FORM>
<BR>

<?php
for ($i=$_GET[no] ; $i < $_GET[no] + $pagesize ; $i++) {
    if ($i < $total)
    {
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_array($result);

?>

<TABLE WIDTH="600" BORDER="1">
    <TR>
        <TD>No. <?=$row[id]?></TD>
        <TD><?=$row[name]?></TD>
        <TD>(<?=$row[wdate]?>)</TD>
        <TD><a href="delete.php?id=<?=$row[id]?>">del</a></TD>
    </TR>
    <TR>
        <TD COLSPAN="4"><?=$row[content]?></TD>
    </TR>
</TABLE>

<?php
    }  //end if
}  //end for

$prev = $_GET[no] - $pagesize;  // 이전 페이지는 시작 글에서 $pagesize 를 뺀 값부터
$next = $_GET[no] + $pagesize;  // 다음 페이지는 시작 글에서 $pagesize 를 더한 값부터

if ($prev >= 0) {
    echo("<a href='$_SERVER[PHP_SELF]?no=$prev'>이전</a> " );
}

if ($next < $total) {
    echo("<a href='$_SERVER[PHP_SELF]?no=$next'>다음</a> " );
}
?>