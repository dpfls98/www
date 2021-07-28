<? 
	session_start(); 

	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);
	
	include "../lib/dbconn.php";

	if ($mode=="modify")  //수정 글쓰기면....
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
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
    <link rel="stylesheet" href="./css/write_form.css">
    <!-- 아이콘폰트 -->
    <script src="https://kit.fontawesome.com/ca7d9c82c9.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
    <script>
        function check_input()
        {
            if (!document.board_form.subject.value)
            {
                alert("제목을 입력하세요!");    
                document.board_form.subject.focus();
                return;
            }

            if (!document.board_form.content.value)
            {
                alert("내용을 입력하세요!");    
                document.board_form.content.focus();
                return;
            }
            document.board_form.submit();
        }
    </script>
    
    <!--[if IE 9]>  
          <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <![endif]-->
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
			<?
			if($mode=="modify")
			{
			?>
				<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
				<?
					}
					else
					{
				?>
				<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
				<?
					}
				?>
					<div class='title'>
                        <p>글쓰기<p>
                    </div>
					<div id="write_form">

						<ul id="write_row1">
							<li class="col1">작성자</li>
							<li class="col2"><?=$usernick?></li>
							<?
								if( $userid && ($mode != "modify") )
								{
							?>
							<li class="col3 hidden"><input type="checkbox" name="html_ok" value="y">HTML 쓰기</li>
							<?
								}
							?>						
						</ul>

						<ul id="write_row2">
							<li class="col1">
								제목
							</li>
							<li class="col2">
								<input type="text" name="subject" value="<?=$item_subject?>">
							</li>
						</ul>

						<ul id="write_row3">
							<li class="col1">
								내용
							</li>
							<li class="col2">
								<textarea rows="15" cols="79" name="content"><?=$item_content?></textarea>
							</li>
						</ul>

						<ul id="write_row4">
							<li class="col1">이미지파일1</li>
							<li class="col2">
								<input type="file" name="upfile[]">
							</li>
						</ul>
							<? 	if ($mode=="modify" && $item_file_0)
								{
							?>
						<div class="delete_ok">
							<?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제
						</div>

						<?
							}
						?>

						<ul id="write_row5">
							<li class="col1"> 이미지파일2</li>
							<li class="col2"><input type="file" name="upfile[]"></li>
						</ul>
						<? 	if ($mode=="modify" && $item_file_1)
							{
						?>
						<div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. 
							<input type="checkbox" name="del_file[]" value="1"> 삭제
						</div>
						
						<?
							}
						?>


						<ul id="write_row6">
							<li class="col1">이미지파일3</li>
							<li class="col2">
								<input type="file" name="upfile[]">
							</li>
						</ul>
						<? 	if ($mode=="modify" && $item_file_2)
							{
						?>
					</div>

					<div class="delete_ok">
						<?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="2"> 삭제
					</div>

					<?
						}
					?>

					<div id="write_button">
						<a href="#" onclick="check_input()" class='bt'>
							확인
						</a>&nbsp;
						<a href="list.php?table=<?=$table?>&page=<?=$page?>" class='bt'>
						목록
					</a>


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
