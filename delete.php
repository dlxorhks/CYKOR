<?php
$link = mysqli_connect('127.0.0.1', 'root', '1234', 'web1');
$number = $_GET['number'];
$query = "select id from board where number = $number";
$result = $link->query($query);
$rows = mysqli_fetch_assoc($result);
$id = $rows['id'];

session_start();
?>

<?php
if (!isset($_SESSION['userid'])) {
    ?> <script>
        alert("권한 없음");
        location.replace("<?php echo "./content.php" ?>");
    </script>

    <?php 
} 
else if ($_SESSION['userid'] == $id) {
    $q = "delete from board where number = $number";
    $r = $link->query($q); 
    ?>
    <script>
        alert("삭제 성공");
        location.replace("<?php echo "./content.php" ?>");
    </script>
    <?php 
} 
else { 
    ?>
    <script>
        alert("권한 없음");
        location.replace("<?php echo "./content.php" ?>");
    </script>
    <?php 
}
?>