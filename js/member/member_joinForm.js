
$(document).ready(function(){
	$('.nextB').click(function(){ // 약관동의 유효성검사

		var check1 = $('#checkbox1 input').prop("checked");
		var check2 = $('#checkbox2 input').prop("checked");
		
		if(check1==false){
			$('#checkbox1 input').focus();
			alert('약관 동의를 체크해주세요!');
			return false;
		}else if(check2==false){
			$('#checkbox2 input').focus();
			alert('약관 동의를 체크해주세요!');
			return false;
		}
		
		location.href='?page_content=member_joinForm';
	});
	
	$('.joinB').click(function(){ // 회원가입 유효성검사
		validate();
	});	
	
	function validate(){
		var m_id = $('input[name=member_id]').val();
		var m_pwd1 = $('.password1').val();
		var m_pwd2 = $('.password2').val();
		
		var m_name = $('input[name=member_name').val();
		var m_nickname = $('input[name=member_nickname').val();
		
		var m_apt = $('select[name=member_apt').val();
		var m_dong = $('select[name=member_dong').val();
		var m_hosu = $('select[name=member_hosu').val();
		
		var m_email = $('input[name=member_email').val();
		
		var m_phone1 = $('input[name=m_phone1').val();
		var m_phone2 = $('input[name=m_phone2').val();
		var m_phone3 = $('input[name=m_phone3').val();
		
		
		if(m_id==""){
			alert('아이디를 입력하세요!');
			return false;
		}else if(m_pwd1==""){
			alert('비밀번호를 입력하세요!');
			return false;
		}else if(m_pwd2==""){
			alert('비밀번호를 입력하세요!');
			return false;
		}else if(m_pwd1!=m_pwd2){
			alert('비밀번호가 서로 맞지 않습니다!');
			return false;
		}else if(m_name==""){
			alert('이름을 입력하세요!');
			return false;
		}else if(m_nickname==""){
			alert('닉네임을 입력하세요!');
			return false;
		}else if(m_apt==""){
			alert('아파트를 입력하세요!');
			return false;
		}else if(m_dong=="동"){
			alert('동을 선택하세요!');
			return false;
		}else if(m_hosu=="호수"){
			alert('호수를 선택하세요!');
			return false;
		}else if(m_email==""){
			alert('이메일을 입력하세요!');
			return false;
		}else if(m_phone1=="" || m_phone2=="" || m_phone3==""){
			alert('연락처를 입력하세요!');
			return false;
		}
		
		$('.boardWriteForm').submit();
	}
	
});