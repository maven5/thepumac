<?php
	function access_admit($ma_index){
		$count = sizeOf($ma_index); // 매개변수의 길이
		if($count>1){ // 2개 이상이라면
			for($i=0;$i<$count;$i++){
				if($_SESSION['ma_index']==$ma_index[$i])
					message();
			}
		}else{ // 한개라면
			if($_SESSION['ma_index']==$ma_index)
				message();
		}
	}
	
	function message(){
		echo '<script>
				alert("접근 권한이 없습니다.");
				location.href="/pumac2/admin/";
			</script>';
	}
?>