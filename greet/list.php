<? 
	session_start(); 
/* $_SESSION['userid']
    $_SESSION['username']
    $_SESSION['usernick']
    $_SESSION['userlevel']
	 */
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
    <!-- 서브1_3영역콘텐츠영역링크 -->
    <link rel="stylesheet" href="./css/list.css">
    <!-- 아이콘폰트 -->
    <script src="https://kit.fontawesome.com/ca7d9c82c9.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>

    
    <!--[if IE 9]>  
          <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <![endif]-->

        
        <?
    @extract($_POST);
	@extract($_GET);
	@extract($_SESSION);

	include "../lib/dbconn.php";

	if (!$scale){
	    $scale=10;			// 한 화면에 표시되는 글 수
	}
    if ($mode=="search")  //검색을 했을때
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from greet where $find like '%$search%' order by num desc";
	}
	else   //처음 레코드를 읽어올때 (검색하지 않았을때)
	{
		$sql = "select * from greet order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;     //읽어올 레코드의 인덱스 번호 

	$number = $total_record - $start;   //출력할 일련번호의 시작값
?>
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
                <form  name="board_form" method="post" action="list.php?mode=search"> 
		            <ul id="list_search">
                        <li id="list_search1">
                            <select name="find">
                                <option value='subject'>제목</option>
                                <option value='content'>내용</option>
                                <option value='nick'>별명</option>
                                <option value='name'>이름</option>
                            </select>
                        </li>
			            <li id="list_search2"><input type="text" name="search"></li>
			            <li id="list_search3"><input type="submit" value="검색"></li>
		            </ul>
		        </form>

                <div class="scale_list">
                    <select name="scale" onchange="location.href='list.php?scale='+this.value" class="scale_v">
                                <option value=''>보기</option>
                                <option value='5'>5</option>
                                <option value='10'>10</option>
                                <option value='15'>15</option>
                                <option value='20'>20</option>
                    </select>
                    <div class="list_total">▷ 총 <?= $total_record ?> 개의 게시물이 있습니다. </div>
		        </div>
                

                <div id="list_content">
                <table>
                            <tbody>
                                <tr class="title">
                                    <th>No.</th>
                                    <th>제목</th>
                                    <th>글쓴이</th>
                                    <th>등록일</th>
                                    <th>조회</th>
                                </tr>
                                
                    <?		
                    for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
                    {
                        mysql_data_seek($result, $i);       
                        // 가져올 레코드로 위치(포인터) 이동  
                        $row = mysql_fetch_array($result);       
                        // 하나의 레코드 가져오기
                        
                        $item_num     = $row[num]; //게시판번호(삭제/수정/글보기)
                        $item_id      = $row[id];
                        $item_name    = $row[name];
                        $item_nick    = $row[nick];
                        $item_hit     = $row[hit];

                        $item_date    = $row[regist_day];   //2021-07-21 (10:32)
                        $item_date = substr($item_date, 0, 10);  //2021-07-21

                        $item_subject = str_replace(" ", "&nbsp;", $row[subject]); //문자열을 바꾸는 메소드

                    ?>
                                <tr class="list">
                                    <td>
                                        <?= $number ?>
                                    </td>
                                    <td>
                                        <a href="view.php?num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a>
                                    </td>
                                    <td>
                                        <?= $item_nick ?>
                                    </td>
                                    <td><?= $item_date ?></td>
                                    <td>
                                        <?= $item_hit ?>
                                    </td>
                                    </tr>

                    <?
                        $number--;
                    }
                    ?>          
                        </tbody>

                        </table>
                    <div id="page_button">
                        <div id="page_num"> 
                            <?
                            // 게시판 목록 하단에 페이지 링크 번호 출력
                            for ($i=1; $i<=$total_page; $i++)
                            {
                                    if ($page == $i)     // 현재 페이지 번호 링크 안함
                                    {
                                        echo "<b> $i </b>";
                                    }
                                    else
                                    { 
                                        echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
                                    }      
                            }
                            ?>			
                                        
                        </div>
                        <div id="button">
                            <a href="list.php?page=<?=$page?>">목록보기</a>&nbsp;
                            <? 
                                if($userid)  //로그인이 된 상태라면
                                {
                            ?>
                            <a href="write_form.php?page=<?=$page?>">글쓰기</a>
                            <?
                                }
                            ?>
				        </div>
			        </div> <!-- end of page_button -->
                </div> 
            </div><!-- end of list content -->

		    <div class="clear"></div>
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