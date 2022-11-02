<?php
$link = mysqli_connect('127.0.0.1', 'root', '1234', 'web1');
$number = $_GET['number'];
$query = "select id from board where number = $number"; //board의 number가 get 형식으로 받은 number 변수와 동일한 board의 id를 가져오는 쿼리
$result = $link->query($query);
$rows = mysqli_fetch_assoc($result);
$id = $rows['id'];

session_start();
?>

<?php
if (!isset($_SESSION['userid'])) { //로그아웃 되어있는 상태
    ?> <script>
        alert("권한 없음"); 
        location.replace("<?php echo "./content.php" ?>"); //content 페이지로 복귀
    </script>

    <?php 
} 
else if ($_SESSION['userid'] == $id) { //로그인 되어있는 상테
    $q = "delete from board where number = $number"; //get 방식으로 받아온 변수와 board의 number가 동일한 board를 db에서 삭제하는 쿼리
    $r = $link->query($q); 
    ?>
    <script>
        alert("삭제 성공");
        location.replace("<?php echo "./content.php" ?>"); //content 페이지로 복귀
    </script>
    <?php 
} 
else { 
    ?>
    <script>
        alert("권한 없음");
        location.replace("<?php echo "./content.php" ?>"); //content 페이지로 복귀
    </script>
    <?php 
}
?>
