<?php

if (get_magic_quotes_gpc()) {
    stripslashes_all($_POST);
    stripslashes_all($_GET);
}

$id = trim($_GET['id']);

?>

<html>
<head>
    <title>초 허접 게시판</title>
    <style>
        <!--
        td {
            font-size: 9pt; }
        A:link {
            font : ;
            color: black;
            text-decoration: none;
            font-family: 굴림;
            font-size: 9pt;
        }
        A:visited {
            text-decoration: none;
            color: black;
            font-size: 9pt;
        }
        A:hover {
            text-decoration: underline;
            color: black;
            font-size: 9pt;
        }
        -->
    </style>
</head>

<body topmargin="0" leftmargin="0" text="#464646">
<center>
    <BR>
    <!-- 입력된 값을 다음 페이지로 넘기기 위해 FORM 을 만든다. -->
    <form action="update.php?id=<?=$id?>" method="post">
        <table width="580" border="0" cellpadding="2" cellspacing="1" bgcolor="#777777">
            <tr>
                <td height="20" align="center" bgcolor="#999999">
                    <font color="white"><B>글 수정하기</B></font>
                </td>
            </tr>

            <?php
            // 데이터베이스 연결하기
            include "db_info.php";

            // 먼저 쓴 글의 정보를 가져온다.
            $query = "SELECT * FROM board WHERE id=$id";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            ?>

            <!-- 입력 부분 -->
            <tr>
                <td bgcolor="white">&nbsp;
                    <table>
                        <tr>
                            <td width="60" align="left">이름</td>
                            <td align="left">
                                <INPUT type="text" name="name" size="20" value="<?=$row['name']?>">
                            </td>
                        </tr>
                        <tr>
                            <td width="60" align="left">이메일</td>
                            <td align="left">
                                <INPUT type="text" name="email" size="20" value="<?=$row['email']?>">
                            </td>
                        </tr>
                        <tr>
                            <td width="60" align="left">비밀번호</td>
                            <td align="left">
                                <INPUT type="password" name="pass" size="8">
                                (비밀번호가 맞아야 수정가능)
                            </td>
                        </tr>
                        <tr>
                            <td width="60" align="left">제 목</td>
                            <td align="left">
                                <INPUT type="text" name="title" size="60" value="<?=$row['title']?>">
                            </td>
                        </tr>
                        <tr>
                            <td width="60" align="left">내용</td>
                            <td align="left">
                                <TEXTAREA name="content" cols="65" rows="15">
                                    <?=$row['content']?>
                                </TEXTAREA>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" align="center">
                                <INPUT type="submit" value="글 저장하기">
                                &nbsp;&nbsp;
                                <INPUT type="reset" value="다시 쓰기">
                                &nbsp;&nbsp;
                                <INPUT type="button" value="되돌아가기" onclick="history.back(-1)">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
<!-- 입력 부분 끝 -->
        </table>
    </form>
</center>
</body>
</html>
