<?php
session_start();

$link = mysqli_connect('3.34.99.164', 'dlxorhks', 'password', 'web1', '9876');

$id = $_POST['id'];
$pw = $_POST['pw'];
$query = "select * from member where id='$id' and password = '$pw'"; //post 형식으로 받은 변수와 동일한 id, pw 가지고 있는 member table을 가져오는 쿼리
$result = $link->query($query);

$row = mysqli_fetch_array($result);
if ($row) { //입력된 비밀번호 id와 member table의 password, id가 동일할 경우
    $_SESSION['userid'] = $id; //userid 세션 변수에 member table의 id를 넣음
    $_SESSION['username'] = $row['name']; // username 세션 변수에 member table name을 넣음
    if (isset($_SESSION['userid']) and isset($_SESSION['username'])) {
        ?> <script>
            location.replace("./content.php"); //content 페이지로 복귀
        </script>
        <?php
    } 
    else {
        ?> <script>
            alert("잘못된 입력"); 
            history.back(); //전 페이지로 이동(login.php)
        </script>
        <?php
    }
} 
?>
