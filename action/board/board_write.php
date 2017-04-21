<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<script src="//code.jquery.com/jquery.min.js"></script>
<body>

<?php
	/*
	 ** 글쓰기
	 **
	 */

	include '../../dbconfig.php';
	
	$max_files_size = 10000000; // 10MB미만  파일크기제한
	$files = $_FILES['b_files']; // 파일
	$upload_url = "../../upload/"; //경로
	$origin_name = iconv("UTF-8","EUC-KR",$files['name']);
	
	if(isset($_FILES['b_files']) && !$_FILES['b_files']['error']){ // 파일이 있다면
	 	 if($files['size'] > $max_files_size) { // 10MB를 넘었다면 돌아가
		 echo '<script>
		alert("10MB미만의 파일만 업로드가 가능합니다.");
		history.back(-1);
		</script>';
		} 
		
		$origin_name = date("Y-m-d_H-i-s").'^'.$origin_name ; // + 문자열 ^ 을 넣고 다운로드 구현시 다시 분리하는식
		
		$total_url = $upload_url.$origin_name; // 파일을 저장할 디렉토리 + 파일명
		
		if(!move_uploaded_file($files['tmp_name'],$total_url)){
			echo '<script>
		alert("파일 업로드에 실패하였습니다.");
		history.back(-1);
		</script>';
		} 
		
		$m_files = iconv("UTF-8","EUC-KR",$origin_name).$files['name'];// DB에 넣을 파일이름 변수		 	
		
	}

	
	
	
 	$board_page = $_POST['board_page'];
	$board_category = $_POST['board_category'];
	
	
	// 카테고리,페이지 키값 검색
	$query = "select * from b_category where category_value='$board_category'";
	
	$result = mysqli_query($conn,$query);
	
	while($row=mysqli_fetch_array($result)){
			$category_key = $row['category_key'];
	}
	
	$query = "select * from b_page where page_value='$board_page'";
	
	$result = mysqli_query($conn,$query);
	
	while($row=mysqli_fetch_array($result)){
		$page_key = $row['page_key'];
	}
	//
	
	$b_type = $_POST['b_type'];
	$b_subject = $_POST['b_subject'];
	$b_content = $_POST['b_content'];
	$b_writer = $_POST['b_writer'];
	$board_cateNo = $_POST['board_cateNo'];
	
	$query = "insert into board(
			b_type,
			page_key,
			category_key,
			b_subject,
			b_content,
			b_writer,
			b_date,
			b_hit,
			b_files
		)
		 values(
			 '$b_type',
			'$page_key',
			'$category_key',
			'$b_subject',
			'$b_content',
			'$b_writer',
			NOW(),
			0,
			'$m_files'
		)";
		
	mysqli_query($conn,$query);
	
	mysqli_close($conn);
	
	 echo '<script>
				alert("글작성 완료");
				location.href="/thepumac/?page_content=board_normal&board_page='.$board_page.'&board_category='.$board_category.'&board_cateNo='.$board_cateNo.'";
			</script>';    
?>


</body>

</html>

