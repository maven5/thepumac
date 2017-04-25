<?php
	include 'dbconfig.php';
	
	$board_category = $_GET['board_category']; // 큰 카테고리
	$board_page = $_GET['board_page']; // 작은 카테고리
	$board_cateNo = $_GET['board_cateNo']; // 작은 카테고리
	$b_index = $_GET['b_index'];
	$page=$_GET['page'];
	
	$query = "select * from board where b_index='$b_index'";
	
	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
	
	$num = mysqli_num_rows($result);
	
	if($num==0){ // 없는 페이지를 들어갔을때 예외처리
		echo '<script>alert("잘못 된 접근방법입니다.");
				history.go(-1);
				</script>';
		}


	// ---------- 데이터 받아오기 --------------- //
	while($row=mysqli_fetch_array($result)){
	$b_subject = $row['b_subject'];
			$b_content = $row['b_content'];
			$b_date = $row['b_date'];
			$b_hit = $row['b_hit'];
			$b_writer = $row['b_writer'];
			$b_files= $row['b_files'];
	}
	////////////////////////////////////////////////////


	preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i",  $b_content, $matches); // 이미지 태그 추출
	$imgSrc = $matches[1]; // src 값만 추출하기

	//이미지 태그 제거
	$b_content_noImg = preg_replace("/<img[^>]+\>/i", "", $b_content);

	
	$og_type= $_GET['og_type'];

	$og_title = $_GET['og_title'];
	$og_image = $_GET['og_image'];
	$og_url = $_GET['og_url'];
	$og_description = $_GET['og_description'];
	
	// 현재 url
	$url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; 
?>

	<meta property="og:title" content="<?=$board_page." - ".$b_subject?>" />
	<meta property="og:type" content="board_view" />
	<meta property="og:image" content="<?=$imgSrc[0]?>" />
	<meta property="og:url" content="<?=$url?>" />
	<meta property="og:description" content="<?=strip_tags($b_content_noImg)?>" />


<?php 

?>
