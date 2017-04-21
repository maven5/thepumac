<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<script src="//code.jquery.com/jquery.min.js"></script>
<body>

<?php
/*
 ** 관리비 등록
**
*/
	include '../../dbconfig.php';
	
	
	$files = $_FILES['e_files']; // 파일
	$upload_url = "../../upload_exel/"; //경로
	$origin_name = iconv("UTF-8","EUC-KR",$files['name']);
	
	if(isset($_FILES['e_files']) && !$_FILES['e_files']['error']){ // 파일이 있다면
	
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
	
	 
	error_reporting(E_ALL ^ E_NOTICE);
	require_once 'excel_reader2.php';
	//$data = new Spreadsheet_Excel_Reader("example.xls");
	$data = new Spreadsheet_Excel_Reader();
	$data->setOutputEncoding("UTF-8//IGNORE");
	$data->read($total_url);
	
	
	$realData = $data->sheets[0];
	
	$colcount = $data->colcount($sheet_index=0);
	
	$rowcount = 1;
	
	for($i=2; $i<=$realData["numRows"]; $i++) {
		$arrayRow = array();
		for($j=0;$j<=$colcount;$j++){
			array_push($arrayRow, $realData["cells"][$i][$j]);
		}
	
		$query ="insert into b_expense(
		    idx,dong,ho,sil,use_type,resident,date_charge,general,cleaning,guard,maintenance,disposal,
			insurance,election,power_use,power_unit,power_comm,elevator,tv,water,water_unit,water_comm,
			charge_this,payback,extra,charge_month,penalty_exc,year_mo)";
	
	
		$query=$query." values(".$rowcount.",";
		for($a=1;$a<=26;$a++){
			$query = $query."'".$arrayRow[$a]."',";
		}
		$rowcount++;
		$query = $query."'2016-04')";
	
	mysqli_query($conn,$query);
	}
	
	
	mysqli_close($conn);
	
	
	echo '<script>
				alert("글작성 완료");
				location.href="/thepumac/admin/?page_content=expense_write";
					</script>'; 
	
	
?>
		
		
</body>

</html>