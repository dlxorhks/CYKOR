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
    $link = mysqli_connect('127.0.0.1', 'root', '1234', 'web1');
    $number = $_GET['number'];
    $query = "select title, content, username, id from board where number = $number";
    $result = $link->query($query);
    $rows = mysqli_fetch_assoc($result);
    $title = $rows['title'];
    $content = $rows['content'];
    $id = $rows['id'];
    session_start();
    ?>
    <form method="POST" action="update_action.php">
        <table class="tab" align=center width=auto>
            <tr>
                <td>name</td>
                <td><input type="hidden" name="name" value="<?= $_SESSION['username'] ?>"><?= $_SESSION['username'] ?></td>
            </tr>
            <tr>
                <td>title</td>
                <td><input type=text name=title size=80 value="<?= $title ?>"></td>
            </tr>
            <tr>
                <td>content</td>
                <td><textarea name=content cols=75 rows=20><?= $content ?></textarea></td>
            </tr>
        </table>
            <center>
                <input type="hidden" name="number" value="<?= $number ?>">
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
