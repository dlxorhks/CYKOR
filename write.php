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
    session_start();
    if (!isset($_SESSION['userid'])) { //로그아웃 되어있는 경우
        ?>
        <script>
            alert("권환 없음");
            location.replace("<?php echo "./content.php" ?>"); //권환이 없으므로 다시 content 페이지로 이동
        </script>
    <?php
    }
    ?>
    <form method="post" action="write_action.php"> //input들을 post 형식으로 wrtie_action.php에 전달
        <table class="tab" align=center width=auto>
            <tr>
                <td>name</td>
                <td><input type="hidden" name="name" value="<?= $_SESSION['username'] ?>"><?= $_SESSION['username'] ?></td> //username을 출력하고 input data로 넣음
            </tr> 
            <tr>
                <td>title</td>
                <td><input type=text name=title size=80></td> //title 입력 칸
            </tr>
            <tr>
                <td>content</td>
                <td><textarea name=content cols=75 rows=20></textarea></td> //content 입력 칸
            </tr>
            <input type="hidden" name="id" value="<?= $_SESSION['userid'] ?>"> //userid도 input data로 
        </table>
             <center>
                <input style="height:30px; width: 120px; font-size:20px;" type="submit" value="submit">
            </center>
            </td>
        </tr>
        </table>
    </form>
</body>

</html>
