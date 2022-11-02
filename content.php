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
    $query = "select * from board order by number desc";    
    $result = mysqli_query($link, $query);

    session_start();

    if (isset($_SESSION['userid'])) {
        ?>
        <button onclick="location.href='./logout_action.php'" style="float:right; font-size:20px;">logout</button>
        <?php
    } 
    else {
        ?>
        <button onclick="location.href='./login.php'" style="float:right; font-size:20px;">login</button>
        <?php
    }
    ?>
    <p style="font-size:40px; text-align:center">두근두근 게시판</p>
    <table align=center>
        <thead align="center">
            <tr>
                <td width="150" align="center">name</td>
                <td width="500" align="center">title</td>
            </tr>
        </thead>

        <tbody>
            <?php
            while ($rows = mysqli_fetch_assoc($result)) { 
                ?>
                <tr>     
                    <td width="150" align="center"><?php echo $rows['username'] ?></td>  
                    <td width="500" align="center">
                        <a href="read.php?number=<?php echo $rows['number'] ?>">
                        <?php echo $rows['title'] ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <div class=text>
        <button onclick="location.href='./write.php'" style="float:center; font-size:15px;">wrtie</button>
    </div>
</body>
</html>