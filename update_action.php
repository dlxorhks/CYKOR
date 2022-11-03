<?php
$link = mysqli_connect('3.34.99.164', 'dlxorhks', 'password', 'web1', '9876');

$number = $_POST['number'];
$title = $_POST['title'];
$content = $_POST['content'];

$query = "update board set title='$title', content='$content' where number=$number"; //post 형식으로 입력받은 새 title과 content를 board에 update하는 쿼리
$result = $link->query($query);
if ($result) { //수정에 성공한 경우
    ?>
    <script>
        alert("수정 완료");
        location.replace("./content.php"); //content 페이지로 이동
    </script>
    <?php
} 
else { //수정에 실패한 경우
    ?>
    <script>
        alert("수정 실패");
        location.replace("./update.php?number=<?= $number ?>"); //다시 update 페이지로 
    </script>
    <?php
}
?>
