<?php
session_start();
$result = session_destroy();

if ($result) {  //로그아웃에 성공했을 경우
?><script>
        history.back(); //전 페이지로 이동()
    </script>
<?php } ?>
