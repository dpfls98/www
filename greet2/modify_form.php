<? 
	session_start(); 

	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);
	/*
		$_SESSION['userid']
		$_SESSION['username']
		$_SESSION['usernick']
		$_SESSION['userlevel']

		$num=1  (나야나~~~~~)
		$page=2
	*/
	
	include "../lib/dbconn.php";

	$sql = "select * from greet2 where num=$num";
	$result = mysql_query($sql, $connect);

	$row = mysql_fetch_array($result);       	
	$item_subject     = $row[subject];
	$item_content     = $row[content];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>하나투어:공지사항</title>

    <!-- 헤더푸터영역링크 -->
    <link rel="stylesheet" href="../common/css/common.css">
    <!-- 서브공통영역링크 -->
    <link rel="stylesheet" href="./common/css/sub5common.css">
    <!-- 서브1_1영역콘텐츠영역링크 -->
    <link rel="stylesheet" href="./css/write_form.css">
    <!-- 아이콘폰트 -->
    <script src="https://kit.fontawesome.com/ca7d9c82c9.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>

    
    <!--[if IE 9]>  
          <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <![endif]-->

        
</head>
<body>
    <div class="wrap">
        <!-- 헤더영역 -->
        <? include "../common/sub_head.html" ?>
        <div class="visual">
            <img src="./common/images/sub5_visual.jpg" alt="?">
        </div>
        <div class="sub_menu">
            <h3>채용정보</h3>
            <ul>
                <li><a href="../sub5/sub5_1.html">인사정보</a></li>
                <li><a href="../sub5/sub5_2.html">직무소개</a></li>
                <li class="current"><a href="./list.php">모집공고</a></li>
                <li><a href="../sub5/sub5_4.html">채용문의</a></li>
            </ul>
        </div>

        <article id="content">

            <div class="title_area">
                <div class="line_map">
                    <span class="hidden">홈아이콘</span>
                    <i class="fas fa-home"></i> 
                    &gt; 채용정보 &gt; <strong>모집공고</strong>
                </div>
                <h2>모집공고</h2>

                <!-- <ul>
                    <li><a href="#">투어챌린저</a></li>
                    <li><a href="#">투어챌린저 하이스쿨</a></li>
                </ul> -->
            </div>

            <div class="content_area">
                <form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>"> 
                    <div id="write_form">

                        <ul id="write_row1">
                            <li class="col1">
                                닉네임
                            </li>
                            <li class="col2"><?=$usernick?></li>
                        </ul>

                        <ul id="write_row2">
                            <li class="col1">
                                제목
                            </li>
                            <li class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></li>
                        </ul>

                        <ul id="write_row3">
                            <li class="col1">
                                내용
                            </li>
                            <li class="col2">
                                <textarea rows="15" cols="79" name="content"><?=$item_content?></textarea>
                            </li>
                        </ul>
                    </div>

                    <div id="write_button">
                        <input type="submit" value="확인" class='bt'>&nbsp;
                        <a href="list.php?page=<?=$page?>" class='bt'>목록</a>
                    </div>
                </form>
            </div>
        </article>
<!-- 푸터영역 -->
<? include "../common/sub_foot.html" ?>
    </div>


<!-- JQuery -->
<script src="../common/js/jquery-1.12.4.min.js"></script>
<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
<script src="../common/js/fullnav.js"></script>



<!-- <script src="자바 넣는 파일경로"></script> -->

</body>
</html>