<? session_start(); ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="../common/css/common.css">
     <!-- 아이콘폰트 -->
     <script src="https://kit.fontawesome.com/ca7d9c82c9.js" crossorigin="anonymous"></script>
</head>
<body>
    
<form  id="id_box" name="member_form" method="post" action="login.php"> 

    <div class="id_top">
            <a href="../index.html" class="form_logo">하나투어나로고</a>
            <h2>login</h2>
    </div>

    <div id="id_pw_input">
        <ul>
            <li><input type="text" name="id" class="login_input" placeholder="아이디" required></li>
            <li><input type="password" name="pass" class="login_input" placeholder="비밀번호" required></li>
        </ul>						
	</div>

    <div id="login_button">
		<button type="submit">로그인</button>
        <a href="../index.html" onclick="join_cancel()">취소</a>

	</div>

    <ul class='join_ip'>
        <li>
        <i class="fas fa-lock"></i>
            보안접속
        </li>
        <li>
            <span><a href="id_find.php">아이디 찾기</a></span>
            <span><a href="pw_find.php">비밀번호 찾기</a></span>
        </li>
	</ul>

    <div id="join_button">
        <div class="join_box">
            <span>JOIN US</span>
            <p>아직 하나투어에 회원이 아닌가요?</p>
        </div>
        <a href="../member/member_check.html">회원가입</a>
    </div>


</form>

</body>
</html>