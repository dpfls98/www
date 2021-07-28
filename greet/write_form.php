<? 
	session_start(); 

	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);
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
    <link rel="stylesheet" href="./common/css/sub1common.css">
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
            <img src="./common/images/visual.jpg" alt="?">
        </div>
        <div class="sub_menu">
            <h3>회사소개</h3>
            <ul>
            <li><a href="../sub1/sub1_1.html">기업개요</a></li>
                <li><a href="../sub1/sub1_2.html">연혁</a></li>
                <li class="current"><a href="./list.php">공지사항</a></li>
                <li><a href="../sub1/sub1_4.html">오시는길</a></li>
            </ul> 
        </div>

        <article id="content">

            <div class="title_area">
                <div class="line_map">
                    <span class="hidden">홈아이콘</span>
                    <i class="fas fa-home"></i> 
                    &gt; 회사소개 &gt;<strong> 공지사항 </strong>
                </div>
                <h2>공지사항</h2>

                <!-- <div class="navBox">
                    <ul class="slideMenu">
                        <li><a class="link1" href="#">기업소개</a></li>
                        <li><a class="link2" href="#">CEO인사말</a></li>
                        <li><a class="link3" href="#">고객경영중심</a></li>
                    </ul>
                </div> -->
            </div>

            <div class="content_area">
                <form  name="board_form" method="post" action="insert.php"> 
                    <div class='title'>
                        <p>글쓰기<p>
                    </div>
		            <div id="write_form">
                        <ul id="write_row1">
                            <li class="col1">작성자</li>
                            <li class="col2"><?=$usernick?></li>
                            <li class="col3 hidden"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</li>
                        </ul>

                        <ul id="write_row2">
                            <li class="col1">
                                제목
                            </li>
                            <li class="col2">
                                <input type="text" name="subject">
                            </li>
                        </ul>

                        <ul id="write_row3">
                            <li class="col1">
                                내용
                            </li>
                            <li class="col2">
                                <textarea rows="15" cols="79" name="content"></textarea>
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