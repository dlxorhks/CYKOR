<?php
$link = mysqli_connect('127.0.0.1', 'root', '1234', 'web1');

$number = $_POST['number'];
$title = $_POST['title'];
$content = $_POST['content'];

$query = "update board set title='$title', content='$content' where number=$number";
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
        location.replace("./update.php?number=<?= $number ?>");
    </script>
    <?php
}
?>