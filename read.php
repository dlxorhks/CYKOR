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
    $query = "select title, content, username, id from board where number = $number";
    $result = $link->query($query);
    $rows = mysqli_fetch_assoc($result);

    ?>
    <table class="read_table" align=center>
        <tr>
            <td colspan="4" class="read_title"><?php echo $rows['title'] ?></td>
        </tr>
        <tr>
            <td class="read_name">name</td>
            <td class="name"><?php echo $rows['username'] ?></td>
        </tr>
        <tr>
            <td colspan="4" class="read_content" valign="top">
                <?php echo $rows['content'] ?></td>
        </tr>
    </table>

    <div class="btn">
        <button class="content_btn" onclick="location.href='./content.php'">content</button>
        <?php
        if (isset($_SESSION['userid']) and $_SESSION['userid'] == $rows['id']) { ?>
            <button class="content_btn" onclick="location.href='./update.php?number=<?= $number ?>'">update</button>
            <button class="content_btn" onclick="location.href='./delete.php?number=<?= $number ?>'">delete</button>
            <?php 
        } 
        ?>
    </div>
</body>
</html>
