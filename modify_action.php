<?php
$link = mysqli_connect('127.0.0.1', 'root', '1234', 'db_board');

$number = $_POST['number'];
$title = $_POST['title'];
$content = $_POST['content'];

$date = date('Y-m-d H:i:s');

$query = "update board set title='$title', content='$content', date='$date' where number=$number";
$result = $link->query($query);
if ($result) {
    ?>
    <script>
        alert("수정 완료");
        location.replace("./content.php");
    </script>
    <?php
} 
else {
    ?>
    <script>
        alert("수정 실패");
        location.replace("./modify.php?number=<?= $number ?>");
    </script>
    <?php
}
?>