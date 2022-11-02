<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <style>
        table.tab {
            border-spacing: 1px;
            text-align: left;
            line-height: 1.5;
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
    $link = mysqli_connect('127.0.0.1', 'root', '1234', 'db_board');
    $number = $_GET['number'];
    $query = "select title, content, date, id from board where number = $number";
    $result = $link->query($query);
    $rows = mysqli_fetch_assoc($result);
    $title = $rows['title'];
    $content = $rows['content'];
    $userid = $rows['id'];
    session_start();
    ?>
    <form method="POST" action="modify_action.php">
        <table class="tab" align=center width=auto>
            <tr>
                <td>닉네임</td>
                <td><input type="hidden" name="id" value="<?= $_SESSION['userid'] ?>"><?= $_SESSION['userid'] ?></td>
            </tr>
            <tr>
                <td>제목</td>
                <td><input type=text name=title size=80 value="<?= $title ?>"></td>
            </tr>
            <tr>
                <td>내용</td>
                <td><textarea name=content cols=75 rows=20><?= $content ?></textarea></td>
            </tr>
        </table>
            <center>
                <input type="hidden" name="number" value="<?= $number ?>">
                <input style="height:30x; width:50px; font-size:15px;" type="submit" value="수정">
            </center>
            </td>
            </tr>
        </table>
    </form>
<?php    
?>
</body>
</html>
