<?php
$link = mysqli_connect('127.0.0.1', 'root', '1234', 'web1');
$id = $_POST['id'];
$pw = $_POST['pw'];
$name = $_POST['name'];

$q1 = "select * from member where id='$id'"; //post 형식으로 입력받은 id와 동일한 id를 가지고 있는 member table 가져오는 쿼리
$r1 = $link->query($q1);
$cnt1 = mysqli_num_rows($r1);

if ($cnt1) { //입력한 id와 동일한 id를 가진 회원이 있을 경우     
    ?><script>
        alert('ID 중복'); 
        history.back(); //register.php로 이동
    </script>
    <?php 
} 
else {  
    $q2 = "select * from member where name='$name'"; //post 형식으로 입력받은 name과 동일한 name를 가지고 있는 member table 가져오는 쿼리
    $r2 = $link->query($q2);
    $cnt2 = mysqli_num_rows($r2);

    if ($cnt2) { //입력한 name과 동일한 name을 가진 회원이 있을 경     
        ?><script>
            alert('NAME 중복');
            history.back(); //register.php로 이동
        </script>
        <?php 
    }
    else{
        $query = "insert into member(id, password, name) values('$id', '$pw', '$name')"; //입력받은 id, password, name을 member table에 추가
        $result = $link->query($query);
        if ($result) { //회원 가입에 성공한 경우
            ?> <script>
                alert('회원 가입 완료');
                location.replace("./login.php"); //login 페이지로 이동
            </script>
            <?php 
        } 
        else { //회원 가입에 실패한 경우
            ?> <script>
                alert("회원 가입 실패"); 
            </script>
        <?php 
        }
    }
}
?>
