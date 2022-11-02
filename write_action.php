<?php
$link = mysqli_connect("127.0.0.1", "root", "1234", "web1");

$id = $_POST['id'];                 
$title = $_POST['title'];               
$content = $_POST['content'];
$name = $_POST['name'];               
        
$query = "INSERT INTO board (number, title, content, username, id) values(NULL, '$title', '$content', '$name', '$id')"; //post 형식으로 입력받은 값들을 board에 넣는 쿼리

$result = mysqli_query($link, $query);
if ($result) { //write에 성공한 경우
    ?> 
    <script>
        alert("<?php echo "등록 성공" ?>");
        location.replace("<?php echo "./content.php"?>"); //content 페이지로 이동
    </script>
    <?php
} 
else { //wrtie에 실패한 경우
    ?>
    <script>
        alert("<?php echo "등록 실패" ?>");
        location.replace("<?php echo "./content.php"?>"); //content 페이지로 
    </script>
    <?php
}
?>
