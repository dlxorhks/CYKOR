<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
</head>

<body>
    <div align='center'> 
        <form method='post' action='login_action.php'> //post 형식으로 login_action.php에게 input 데이터를 줌
            <p>ID <input name="id" type="text"></p> //id를 받아오는 칸
            <p>PW<input name="pw" type="text"></p> //password를 받아오는 칸
            <input type="submit" value="login">
        </form>
        <button onclick="location.href='./register.php'">register</button> //회원 가입 페이지로 넘어가는 버튼
    </div>
</body>

</html>
