<?php
	header("Content-Type:application/json");

	include '../../dbconfig.php';
	
	$page_key = $_GET["PAGE_NO"];
	$category_key = $_GET['CATEGORY_KEY'];

	$query =
		"(SELECT
			  A.B_INDEX
			, A.CATEGORY_KEY
			, A.B_SUBJECT
			, A.B_CONTENT
			, SUBSTR(A.B_DATE, 1, 10) AS B_DATE
			, A.B_TYPE
		 FROM BOARD A
	     WHERE A.PAGE_KEY='$page_key'
			AND A.CATEGORY_KEY='$category_key'
			AND A.B_TYPE='공지사항'
		LIMIT 0, 1)
		UNION	
		(SELECT
			  B.B_INDEX
			, B.CATEGORY_KEY
			, B.B_SUBJECT
			, B.B_CONTENT
			, SUBSTR(B.B_DATE, 1, 10) AS B_DATE
			, B.B_TYPE
		 FROM BOARD B
		 WHERE B.PAGE_KEY='$page_key'
			AND B.CATEGORY_KEY='$category_key'
			AND B.B_TYPE='일반게시판'
		 LIMIT 0, 5)
		 ORDER BY B_INDEX DESC";
		
	if($result = mysqli_query($conn, $query, MYSQLI_USE_RESULT)) {
		$board_list = array();
		
		while($row = mysqli_fetch_object($result)) {
			$t = new stdClass();

			$t->CATEGORY_KEY 	= 	$row->CATEGORY_KEY;
			$t->B_SUBJECT 	= 	$row->B_SUBJECT;
			$t->B_CONTENT 	= 	$row->B_CONTENT;
			$t->B_DATE 		= 	$row->B_DATE;
			$t->B_TYPE			= 	$row->B_TYPE;
			
			$board_list[] = $t;
			unset($t);
		}
	} else {
		$board_list = array(0 => 'empty');
	}
			
	mysqli_close($conn);
	
	echo json_encode($board_list);
?>