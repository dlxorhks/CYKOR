<?php
$link = mysqli_connect('127.0.0.1', 'root', '1234', 'web1');
$id = $_POST['id'];
$pw = $_POST['pw'];
$name = $_POST['name'];

$q1 = "select * from member where id='$id'";
$r1 = $link->query($q1);
$cnt1 = mysqli_num_rows($r1);

if ($cnt1) {      
    ?><script>
        alert('ID 중복');
        history.back();
    </script>
    <?php 
} 
else {  
    $q2 = "select * from member where name='$name'";
    $r2 = $link->query($q2);
    $cnt2 = mysqli_num_rows($r2);

    if ($cnt2) {      
        ?><script>
            alert('NAME 중복');
            history.back();
        </script>
        <?php 
    }
    else{
        $query = "insert into member(id, password, name) values('$id', '$pw', '$name')";
        $result = $link->query($query);
        if ($result) {
            ?> <script>
                alert('회원 가입 완료');
                location.replace("./login.php");
            </script>
            <?php 
        } 
        else {
            ?> <script>
                alert("회원 가입 실패");
            </script>
        <?php 
        }
    }
}
mysqli_close($link);
?>