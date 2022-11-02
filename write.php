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
    session_start();
    if (!isset($_SESSION['userid'])) {
        ?>
        <script>
            alert("권환 없음");
            location.replace("<?php echo "./content.php" ?>");
        </script>
    <?php
    }
    ?>
    <form method="post" action="write_action.php">
        <table class="tab" align=center width=auto>
            <tr>
                <td>name</td>
                <td><input type="hidden" name="name" value="<?= $_SESSION['username'] ?>"><?= $_SESSION['username'] ?></td>
            </tr>
            <tr>
                <td>title</td>
                <td><input type=text name=title size=80></td>
            </tr>
            <tr>
                <td>content</td>
                <td><textarea name=content cols=75 rows=20></textarea></td>
            </tr>
            <input type="hidden" name="id" value="<?= $_SESSION['userid'] ?>">
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