<?php
$link = mysqli_connect("127.0.0.1", "root", "1234", "web1");

$id = $_POST['id'];                 
$title = $_POST['title'];               
$content = $_POST['content'];
$name = $_POST['name'];               
        
$query = "INSERT INTO board (number, title, content, username, id) values(NULL, '$title', '$content', '$name', '$id')";

$result = mysqli_query($link, $query);
if ($result) {
    ?> 
    <script>
        alert("<?php echo "등록 성공" ?>");
        location.replace("<?php echo "./content.php"?>");
    </script>
    <?php
} 
else {
    ?>
    <script>
        alert("<?php echo "등록 실패" ?>");
        location.replace("<?php echo "./content.php"?>");
    </script>
    <?php
}
mysqli_close($link);
?>