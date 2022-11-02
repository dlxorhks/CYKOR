<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <style>
        table { 
            border: 2px solid; }
        tr {
            border: 1px solid; }
        td {
            border: 1px solid; }
        .text {
            text-align: center;
            padding-top: 20px; }
        .text:hover {
            text-decoration: underline; }
        a:link {
            color: blue; }
        a:hover {
            text-decoration: underline; }
    </style>
</head>

<body>
    <?php
    $link = mysqli_connect('127.0.0.1', 'root', '1234', 'web1'); 
    $query = "select * from board order by number desc"; //number 순서로 모든 board table을 database로부터 가져오는 쿼리
    $result = mysqli_query($link, $query);

    session_start();

    if (isset($_SESSION['userid'])) { //로그인 되어있는 상태
        ?>
        <button onclick="location.href='./logout_action.php'" style="float:right; font-size:20px;">logout</button>           
        <?php //로그아웃 버튼
    } 
    else { //로그아웃 되어있는 상태
        ?>
        <button onclick="location.href='./login.php'" style="float:right; font-size:20px;">login</button> 
        <?php //로그인 버튼
    }
    ?>
    <p style="font-size:40px; text-align:center"> 게시판</p> //게시판 이름 설정
    <table align=center> 
        <thead align="center">
            <tr>
                <td width="150" align="center">name</td>
                <td width="500" align="center">title</td>
            </tr>
        </thead>
//table을 만들어 앞의 150px에는 name을, 뒤의 500px에는 title을 적는 칸임을 나타내는 코드
        <tbody>
            <?php 
            while ($rows = mysqli_fetch_assoc($result)) { //모든 board에 대해서 진행
                ?>
                <tr>     
                    <td width="150" align="center"><?php echo $rows['username'] ?></td> //board에 있는 username을 출력 
                    <td width="500" align="center">
                        <a href="read.php?number=<?php echo $rows['number'] ?>"> 
                        <?php echo $rows['title'] ?> //board에 있는 title을 출력하고 누를 시 해당 title의 글 read 페이지로 이동
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <div class=text>
        <button onclick="location.href='./write.php'" style="float:center; font-size:15px;">wrtie</button> //write 페이지로 넘어가는 
    </div>
</body>
</html>
