<?php
session_start();

$link = mysqli_connect("127.0.0.1", "root", "1234", "web1");

$id = $_POST['id'];
$pw = $_POST['pw'];
$query = "select * from member where id='$id'"; //post 형식으로 받은 id 변수와 동일한 id를 가지고 있는 member table을 가져오는 쿼리
$result = $link->query($query);

$row = mysqli_fetch_assoc($result);
if ($row['password'] == $pw) { //입력된 비밀번호와 member table의 password가 동일할 경우
    $_SESSION['userid'] = $id; //userid 세션 변수에 member table의 id를 넣음
    $_SESSION['username'] = $row['name']; // username 세션 변수에 member table name을 넣음
    if (isset($_SESSION['userid'])) {
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
