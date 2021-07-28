<? 
	session_start(); 
	$table = "concert";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>하나투어: 보도자료</title>

    <!-- 헤더푸터영역링크 -->
    <link rel="stylesheet" href="../common/css/common.css">
    <!-- 서브공통영역링크 -->
    <link rel="stylesheet" href="./common/css/sub6common.css">
    <!-- 서브6_1영역콘텐츠영역링크 -->
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
       $scale=10; 			// 한 화면에 표시되는 글 수
	}

    if ($mode=="search")
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

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
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
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>

</head>
<body>
    <div class="wrap">
        <!-- 헤더영역 -->
        <? include "../common/sub_head.html" ?>
        <div class="visual">
            <img src="./common/images/sub6_visual.jpg" alt="?">
        </div>
        <div class="sub_menu">
            <h3>홍보센터</h3>
            <ul>
                <li class="current"><a href="./list.php">보도자료</a></li>
                <li><a href="../sub6/sub6_2.html">CF광고</a></li>
                <li><a href="../sub6/sub6_3.html">인쇄광고</a></li>
            </ul> 
        </div>

        <article id="content">
            <div class="title_area">
                <div class="line_map">
                    <span class="hidden">홈아이콘</span>
                    <i class="fas fa-home"></i> 
                    &gt; 홍보센터 &gt; <strong>보도자료</strong>
                </div>
                <h2>보도자료</h2>
                <span>“내 소중한 여행의 동반자, <br>
                    하나투어의 소식을 확인하세요 ”</span>
                <!-- <ul>
                    <li><a href="#">인재상</a></li>
                    <li><a href="#">인사제도</a></li>
                    <li><a href="#">복리후생</a></li>
                </ul> -->
            </div>

            <div class='content_area'>
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
                                <option value='2'>2</option>
                                <option value='10'>10</option>
                                <option value='15'>15</option>
                                <option value='20'>20</option>
                    </select>
                    <div class="list_total">▷ 총 <?= $total_record ?> 개의 게시물이 있습니다. </div>
		        </div>
        		<div id="list_content">
					<?		
					for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
					{
						mysql_data_seek($result, $i);       
						// 가져올 레코드로 위치(포인터) 이동  
						$row = mysql_fetch_array($result);       
						// 하나의 레코드 가져오기
						
						$item_num     = $row[num];
						$item_id      = $row[id];
						$item_name    = $row[name];
						$item_nick    = $row[nick];
						$item_hit     = $row[hit];
						$item_date    = $row[regist_day];
						$item_date = substr($item_date, 0, 10);  
						$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

						if(!$row[file_copied_0]){
							$thum_img = './data/default.jpg'; 
						}else{
							$thum_img =$row[file_copied_0];  //첫번째 업로드된 이미지 파일  2021_07_22_11_00_35_0.jpg
							$thum_img = './data/'.$thum_img;  //   ./data/2021_07_22_11_00_35_0.jpg
						}
					?>
					<ul id="list_item">
						<li class="list_item1"><?= $number ?></li>  
						<li class="list_item2">
				   			<a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
								<img src="<?=$thum_img?>" alt="">
								<p><?= $item_subject ?></p>
				  			</a>
						</li>
						<li class="list_item3"><?= $item_nick ?></li>
						<li class="list_item4"><?= $item_date ?></li>
						<li class="list_item5"><?= $item_hit ?></li>
					</ul>
						<?
							$number--;
						}
						?>
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
										echo "<a href='list.php?table=$table&page=$i&scale=$scale'> $i </a>";
									}      
							}
							?>			
					
					</div>
						<div id="button">
							<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
								<? 
									if($userid)
									{
								?>
							<a href="write_form.php?table=<?=$table?>">글쓰기</a>
								<?
									}
								?>
						</div>
				</div> <!-- end of page_button -->		
        	</div> <!-- end of list content -->

        
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