<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <style>
        table.tab {
            border-spacing: 2px;
            text-align: left;
            line-height: 2;
            border-top: 1px solid; }
        table.tab tr {
            width: 50px;
            padding: 10px;
            font-weight: bold;
            border: 1px solid; }
        table.tab td {
            width: 100px;
            padding: 10px;
            border: 1px solid; }
    </style>
</head>

<body>
    <?php
    $link = mysqli_connect('3.34.99.164', 'dlxorhks', 'password', 'web1', '9876');
    $number = $_GET['number'];
    $query = "select title, content, username, id from board where number = $number"; //get 형식으로 받은 number와 동일한 number를 가진 board table의 모든 값을 가져오는 쿼리
    $result = $link->query($query);
    $rows = mysqli_fetch_assoc($result);
    $title = $rows['title'];
    $content = $rows['content'];
    $id = $rows['id'];
    session_start();
    ?>
    <form method="POST" action="update_action.php"> //input 값들을 post 형식으로 update_action.php에게 전달
        <table class="tab" align=center width=auto>
            <tr>
                <td>name</td>
                <td><input type="hidden" name="name" value="<?= $_SESSION['username'] ?>"><?= $_SESSION['username'] ?></td> //username을 출력하고, post 형식으로 전달
            </tr>
            <tr>
                <td>title</td>
                <td><input type=text name=title size=80 value="<?= $title ?>"></td> //새로운 title 입력
            </tr>
            <tr>
                <td>content</td>
                <td><textarea name=content cols=75 rows=20><?= $content ?></textarea></td> //새로운 content 입력
            </tr>
        </table>
            <center>
                <input type="hidden" name="number" value="<?= $number ?>"> //number 변수를 post 형식으로 전달
                <input style="height:30x; width:120px; font-size:15px;" type="submit" value="submit">
            </center>
            </td>
            </tr>
        </table>
    </form>
<?php    
?>
</body>
</html>
