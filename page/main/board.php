<?php 
	include 'dbconfig.php'; 
?>

<script>
	$(document).ready(function(){
		$('.board_open').click(function(){
			$(this).parent().next().slideToggle();
		});
	});

	
	function category_list1(category, key, e) { 
		var page_no;
		var url = "/pumac2/action/board/getCategory_list.php";
		var index = 0;
	
		if(category == "english") {
			page_no = "page05";
		} else if(category == "football") {
			page_no = "page06";
		} else if(category == "hiking") {
			page_no = "page07";
		} else {
			page_no = "page08";
		}

		// 글자색 변경 #181818
		$('.txtcolor1').css("color","#181818");
		e.style.color="#fe9601";
		
		$.get(url, {PAGE_NO : page_no, CATEGORY_KEY : key}, function(data) {
			//console.log(data);
			$category = $("#category_02_subject div.board_contents_list");

			//공지사항 초기화
			$notice = $("#category_02_notice");
			$notice.html("");

			//리스트 초기화
			$category.each(function(index) {
				//console.log($(this).children());
				//console.log($(this).eq(index));
				$(this).children().html("");
			});

 			if(data == "" && data == null && data == undefined) {
				
			} else {		
				//리스트 추가
	 			for(var i=0; i<data.length; i++) {
					if(data[i]["B_TYPE"] == "공지사항") {
						$notice.html(data[i]["B_SUBJECT"]);
					} else {
						$category.find("div.board_contents_list_subject.align_floatLeft").eq(index).html(data[i]["B_SUBJECT"]);
						$category.find("div.board_contents_list_date.align_floatLeft").eq(index).html("("+data[i]["B_DATE"]+")");
						index++;
					}
				}
			}
		});
	}


	function category_list2(category, key, e) {
		var page_no;
		var url = "/pumac2/action/board/getCategory_list.php";
		var index = 0;
	
		if(category == "share") {
			page_no = "page09";
		} else if(category == "exchange") {
			page_no = "page10";
		} else if(category == "sell") {
			page_no = "page11";
		} else {
			page_no = "page12";
		}

		// 폰트색 변경
		$('.txtcolor2').css("color","#181818");
		e.style.color="#fe9601";

		
		$.get(url, {PAGE_NO : page_no, CATEGORY_KEY : key}, function(data) {
			//console.log(data);
			$category = $("#category_03_subject div.board_contents_list");

			//공지사항 초기화
			$notice = $("#category_03_notice");
			$notice.html("");

			//리스트 초기화
			$category.each(function(index) {
				//console.log($(this).children());
				//console.log($(this).eq(index));
				$(this).children().html("");
			});

 			if(data == "" && data == null && data == undefined) {
				
			} else {		
				//리스트 추가
	 			for(var i=0; i<data.length; i++) {
					if(data[i]["B_TYPE"] == "공지사항") {
						$notice.html(data[i]["B_SUBJECT"]);
					} else {
						$category.find("div.board_contents_list_subject.align_floatLeft").eq(index).html(data[i]["B_SUBJECT"]);
						$category.find("div.board_contents_list_date.align_floatLeft").eq(index).html("("+data[i]["B_DATE"]+")");
						index++;
					}
				}
			}
		});
	}
</script>

<!--게시판  -->
<div class="board_wrap">
	<div class="board_rows">
	
		<div class="board_cols">
			<div class="board_title title_colorB">
				<div class="board_titleLeft">시민공간</div>
				<div class="board_open">펼쳐보기 <i class="fa fa-angle-down" aria-hidden="true" style="color:#0b7eb4;"></i></div>
			</div>
			
			<div class="board_contents">
				<div style="height:200px;" >
				<div class="board_contents_list">
					<div class="board_contents_list_pumac_head align_floatLeft" 
					style="font-size:17px;font-weight:bold;text-align:left; margin-top:25px;"  onclick="location.href='?page_content=board_normal&board_category=생활편의전화&board_page=공지사항&board_cateNo=05' ">부영아파트 공지사항</div>
				</div>
				
				<?php 
					
					$q2 = "select * from board where page_key='page24' and category_key='5'  and b_type='일반게시판' order by b_index desc   LIMIT 0,3";
					
					$result = mysqli_query($conn,$q2);
					$rowcount =  mysqli_num_rows($result);
					
					while($row=mysqli_fetch_array($result)){
				?>
				<div class="board_contents_list">
					<div class="board_contents_list_subject align_floatLeft" style="text-align:left;" onclick="location.href='?page_content=board_normal&board_category=시민공간&board_page=재능나눔&board_cateNo=01' "><?=$row['b_subject']?></div>
					<div class="board_contents_list_date align_floatLeft">(<?=substr($row['b_date'],0,10)?>)</div>
				</div>
				
				<?php 
					}
				?>
				
				<!-- 
				<div class="board_contents_list">
					<div class="board_contents_list_pumac_subject align_floatLeft" style="text-align:left;">영어프리토킹 </div>
					<div class="board_contents_list_pumac_mno align_floatLeft">모집인원:1</div>
					<div class="board_contents_list_pumac_target align_floatLeft">대상:성인</div>
					<div class="board_contents_list_pumac_apply align_floatLeft">
					<img src="image/board/apply1.jpg"></div>
				</div>
				 -->
				
				
				<div class="board_contents_list" style="margin-top:5px;">
					<div class="board_contents_list_pumac_head align_floatLeft" 
					style="font-size:17px;font-weight:bold;text-align:left;"  onclick="location.href='?page_content=board_normal&board_category=시민공간&board_page=재능나눔&board_cateNo=01' ">재능나눔 공간</div>
				</div>
				
				<?php 
					
					$q2 = "select * from board where page_key='page01' and category_key='1'  and b_type='일반게시판' order by b_index desc   LIMIT 0,3";
					
					$result = mysqli_query($conn,$q2);
					$rowcount =  mysqli_num_rows($result);
					
					while($row=mysqli_fetch_array($result)){
				?>
				<div class="board_contents_list">
					<div class="board_contents_list_subject align_floatLeft" style="text-align:left;" onclick="location.href='?page_content=board_normal&board_category=시민공간&board_page=재능나눔&board_cateNo=01' "><?=$row['b_subject']?></div>
					<div class="board_contents_list_date align_floatLeft" >(<?=substr($row['b_date'],0,10)?>)</div>
				</div>
				
				<?php 
					}
				?>
				

			</div>
	
			</div>
		</div>
			
		<div class="board_cols">
			<div class="board_title title_colorG " >
				<div class="board_titleLeft">재능동아리</div>
				<div class="board_open">펼쳐보기 <i class="fa fa-angle-down" aria-hidden="true" style="color:#0b7eb4;"></i></div>	
			</div>
			
			<div class="disnone">
				<div class="board_contents contents_bgcolorG" >
				<ul>
						<li class="txtcolor1" style="color:#fe9601;margin-left:-20px;" onclick="category_list1('english', 2, this);"> 영어과외 </li>
					    <li class="txtcolor1" onclick="category_list1('football', 2, this);"> 청소년축구교실 </li>
						<li class="txtcolor1" onclick="category_list1('hiking', 2, this);"> 통일하이킹 </li>
						<li class="txtcolor1" onclick="category_list1('golf', 2, this);"> 홀인원클럽 </li>
					</ul>
				</div>
				
				<div style="height:200px;" onclick="location.href='?page_content=board_normal&board_category=재능동아리&board_page=영어과외방&board_cateNo=02' ">
					<div class="board_contents_list" style="margin-top:10px;">
						
						
						<?php 
							$q2 = "select * from board where page_key='page05' and category_key='2'  and b_type='공지사항' order by b_index desc   LIMIT 0,1";
								
							$result = mysqli_query($conn,$q2);
							while($row=mysqli_fetch_array($result)){
						?>
						<div id="category_02_notice" class="board_contents_list_subject align_floatLeft" style="text-align:left; font-weight:bold;"><?=$row['b_subject']?></div>
						<?php } ?>
					</div>
					
					
					
					<div id="category_02_subject">
						<?php 
							
							$q2 = "select * from board where page_key='page05' and category_key='2' and b_type='일반게시판' order by b_index desc   LIMIT 0,5";
							
							$result = mysqli_query($conn,$q2);
							$rowcount =  mysqli_num_rows($result);
							
							while($row=mysqli_fetch_array($result)){
						?>
						<div class="board_contents_list">
							<div class="board_contents_list_subject align_floatLeft" style="text-align:left;"><?=$row['b_subject']?></div>
							<div class="board_contents_list_date align_floatLeft">(<?=substr($row['b_date'],0,10)?>)</div>
						</div>
						<?php 
							}
						?>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="board_cols" style="margin-right:0px;">
				<div class="board_title title_colorG">
					<div class="board_titleLeft">중고장터</div>
					<div class="board_open">펼쳐보기 <i class="fa fa-angle-down" aria-hidden="true" style="color:#0b7eb4;"></i></div>	
				</div>
				
				<div class="disnone">
					<div class="board_contents contents_bgcolorG">
					<ul>
							<li class="txtcolor2" style="color:#fe9601; width:50px;margin-left:-10px;margin-right:10px;" onclick="category_list2('share', 3, this);"> 나눔 </li>
							<li class="txtcolor2" style="width:80px;margin-right:10px;" onclick="category_list2('exchange', 3, this);"> 물물교환 </li>
							<li class="txtcolor2" style="width:70px;margin-right:10px;" onclick="category_list2('sell', 3, this);"> 팝니다 </li>
							<li class="txtcolor2" style="width:70px;margin-right:10px;" onclick="category_list2('buy', 3, this);"> 삽니다 </li>
						</ul>                  
					</div>
					
					<div style="height:200px;" onclick="location.href='?page_content=board_normal&board_category=중고장터&board_page=나눔&board_cateNo=03' ">	
						<div class="board_contents_list" style="margin-top:10px;">
							
							<?php 
							$q2 = "select * from board where page_key='page09' and category_key='3'  and b_type='공지사항' order by b_index desc   LIMIT 0,1";
								
							$result = mysqli_query($conn,$q2);
							while($row=mysqli_fetch_array($result)){
						?>
						<div id="category_03_notice" class="board_contents_list_subject align_floatLeft" style="text-align:left; font-weight:bold;"><?=$row['b_subject']?></div>
						<?php } ?>
					</div>
					
					
					<div id="category_03_subject">
						<?php 
							
							$q2 = "select * from board where page_key='page09' and category_key='3' and b_type='일반게시판' order by b_index desc   LIMIT 0,5";
							
							$result = mysqli_query($conn,$q2);
							$rowcount =  mysqli_num_rows($result);
							
							while($row=mysqli_fetch_array($result)){
						?>
						<div class="board_contents_list" >
							<div class="board_contents_list_subject align_floatLeft" style="text-align:left;"><?=$row['b_subject']?></div>
							<div class="board_contents_list_date align_floatLeft">(<?=substr($row['b_date'],0,10)?>)</div>
						</div>
						<?php 
							}
						?>
					</div>
				</div>
			</div>
		</div>
	
	<p style="height:10px;clear:left;"></p>
	
	<div class="board_rows" style="">
		<div class="board_cols">
			<div class="board_title title_colorB">
				<div class="board_titleLeft">부동산</div>
				<div class="board_open">펼쳐보기 <i class="fa fa-angle-down" aria-hidden="true" style="color:#0b7eb4;"></i></div>	
			</div>
			
			<div class="disnone">
				<div class="realty_title">매물</div>
			
				
				<?php 
					$q2 = "select * from wc_content2 order by no desc limit 0,6";
						
					$result = mysqli_query($conn,$q2);
					$rowcount =  mysqli_num_rows($result);
						
					while($row=mysqli_fetch_array($result)){
				?>
				<div class="realtyHover" style="overflow: hidden;cursor: pointer;margin-bottom:14px;"  onclick="location.href='?page_content=realty_list&board_category=부동산&board_page=매물&board_cateNo=07'" >
					<div class="realty_col1"><?= ($row['fld45']=="") ? "종류없음" : $row['fld45'] ?></div>
					<div class="realty_col2"><?= ($row['title']=="") ? "매물명없음" : $row['title'] ?></div>
					<div class="realty_col3"><?=$row['fld4']?></div>
					<div class="realty_col4"><?=$row['fld6']?></div>
				</div>
				<?php } ?>
			</div>
		</div>
		
		<div class="board_cols">
			<div class="board_title title_colorG">
				<div class="board_titleLeft">갤러리</div>
				<div class="board_open">펼쳐보기 <i class="fa fa-angle-down" aria-hidden="true" style="color:#0b7eb4;"></i></div>	
			</div>
			
			<div class="disnone">
				<div class="board_contents_gallary">
				<div class="board_contents_gallary1 align_floatLeft">
					<?php 
						$q2 = "select * from board where page_key='page23' and category_key='5'  and b_type='일반게시판' order by b_index desc   LIMIT 0,1";
							
						$result = mysqli_query($conn,$q2);
						$rowcount =  mysqli_num_rows($result);
							
						while($row=mysqli_fetch_array($result)){
						
						preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $row['b_content'], $matches); 
					?>
					<img src="<?=$matches[1][0]?>" width="225px;" height="216px;" onclick="location.href='?page_content=board_normal&board_category=생활편의전화&board_page=갤러리&board_cateNo=05' ">
					<?php 
						}
					?>			
				</div>
				<div class="board_contents_gallary2 align_floatLeft">
					<ul>
					<?php 
						$q2 = "select * from board where page_key='page23' and category_key='5'  and b_type='일반게시판' order by b_index desc   LIMIT 1,3";
							
						$result = mysqli_query($conn,$q2);
						$rowcount =  mysqli_num_rows($result);
							
						while($row=mysqli_fetch_array($result)){
						
						preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $row['b_content'], $matches); 
					?>
						<li><img src="<?=$matches[1][0]?>" width="120px;" height="70px;" onclick="location.href='?page_content=board_normal&board_category=생활편의전화&board_page=갤러리&board_cateNo=05' "></li>
					<?php
						 }
					?>
					
					</ul>
				</div>
				</div>
			</div>
			
		</div>
		</div>
		
		<div class="board_cols" style="margin-right:0px;">
			<div class="board_title title_colorG">
				<div class="board_titleLeft">내아파트</div>
				<div class="board_open">펼쳐보기 <i class="fa fa-angle-down" aria-hidden="true" style="color:#0b7eb4;"></i></div>	
			</div>
			
				<div class="disnone">
					<div class="board_contents_apt ">
					<ul>
						<li><img src="image/board/apt1.jpg" onclick="location.href='?page_content=board_manageE&board_category=내아파트&board_page=관리비조회&board_cateNo=06' "> </li>
						<li><img src="image/board/apt2.jpg" onclick="window.open('https://play.google.com/store/apps/details?id=com.hdtel.smarthome')"> </li>
						<li>
							<form method="post" target="_blank" action='http://sujain.libworks.co.kr/member_sso.asp' id="form1">
								<input type="hidden" name="user_id" value="<?= $_SESSION['m_id']?>"/>
								<input type="hidden" name="user_pw" value="<?= $_SESSION['m_pwd']?>"/>
								<input type="hidden" name="user_nm" value="<?= $_SESSION['m_name']?>"/>
								<a onclick="document.getElementById('form1').submit(); return false;"><img src="image/board/apt3.jpg" alt="전자도서관" />	</a>
							</form>	
						</li>
						<li><img src="image/board/apt4.jpg" onclick="location.href='?page_content=board_reserve&board_category=게스트하우스&board_page=게스트하우스&board_cateNo=06'"> </li>	
					
					</ul>
				</div>
		
			</div>
		</div>
	</div>
	
</div>



<?php 
	mysqli_close($conn); // DB Close
?>
