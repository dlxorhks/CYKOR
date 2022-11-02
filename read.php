<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>

    <style>
        .read_table {
            border: 1px solid; }
        .read_title {
            height: 45px;
            font-size: 25px;
            text-align: center;
            background-color: yellow;
            width: 1000px; }
        .read_name {
            text-align: center;
            background-color: green;
            width: 100px;
            height: 35px; }
        .name {
            background-color: white;
            width: 600px;
            height: 35px;
            padding-left: 10px; }
        .read_content {
            padding: 10px;
            border: 1px solid;
            height: 500px; } 
        .btn {
            width: 700px;
            height: 200px;
            text-align: center;
        } 
        .content_btn {
            height: 45px;
            width: 90px;
            font-size: 20px;
            text-align: center;
            background-color: grey;
            border: 2px solid black; }
    </style>
</head>

<body>
    <?php
    $link = mysqli_connect('127.0.0.1', 'root', '1234', 'web1');
    $number = $_GET['number'];
    session_start();
    $query = "select title, content, username, id from board where number = $number"; //get 형식으로 받아온 변수와 number가 동일한 board의 값들을 모두 가져오는 쿼리
    $result = $link->query($query);
    $rows = mysqli_fetch_assoc($result);

    ?>
    <table class="read_table" align=center>
        <tr>
            <td colspan="4" class="read_title"><?php echo $rows['title'] ?></td> //글의 title을 출력
        </tr>
        <tr>
            <td class="read_name">name</td>
            <td class="name"><?php echo $rows['username'] ?></td> //글의 작성자를 출력
        </tr>
        <tr>
            <td colspan="4" class="read_content" valign="top"> //글의 내용을 출력
                <?php echo $rows['content'] ?></td>
        </tr>
    </table>

    <div class="btn">
        <button class="content_btn" onclick="location.href='./content.php'">content</button> //다시 content 페이지로 복귀하는 버튼
        <?php
        if (isset($_SESSION['userid']) and $_SESSION['userid'] == $rows['id']) { ?> //현재 로그인 되어있고, 로그인 id와 board의 id가 동일한 경우
            <button class="content_btn" onclick="location.href='./update.php?number=<?= $number ?>'">update</button> //update 페이지로 이동
            <button class="content_btn" onclick="location.href='./delete.php?number=<?= $number ?>'">delete</button> //delete 페이지로 이동
            <?php 
        } 
        ?>
    </div>
</body>
</html>
