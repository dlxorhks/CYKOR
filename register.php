<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
</head>

<body>
    <div align="center">
        <form method='post' action='register_action.php'> //input data를 post 형식으로 register_action.php에게 전달
            <p>NAME <input name="name" type="text"></p> //이름 입력 칸
            <p>ID   <input name="id" type="text"></p> //id 입력 칸
            <p>PW   <input name="pw" type="text"></p> //password 입력 칸
            <input type="submit" value="submit">
        </form>
    </div>
</body>

</html>
