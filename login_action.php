<?php
session_start();

$link = mysqli_connect("127.0.0.1", "root", "1234", "web1");

$id = $_POST['id'];
$pw = $_POST['pw'];
$query = "select * from member where id='$id'";
$result = $link->query($query);

$row = mysqli_fetch_assoc($result);
if ($row['password'] == $pw) {
    $_SESSION['userid'] = $id;
    $_SESSION['username'] = $row['name'];
    if (isset($_SESSION['userid'])) {
        ?> <script>
            location.replace("./content.php");
        </script>
        <?php
    } 
    else {
        ?> <script>
            alert("잘못된 입력");
            history.back(); 
        </script>
        <?php
    }
} 
?>