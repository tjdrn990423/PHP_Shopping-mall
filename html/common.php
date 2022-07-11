<?
	$page_line=5; // 페이지당 line수
	$page_block=5; // 블록당 page수
	
	$admin_id="admin";
	$admin_pw="1234";
	
	$a_idname=array("전체","이름", "ID","email");     //  2줄은 common.php에 작성.
	$n_idname=count($a_idname);
	
	$a_menu=array("분류선택","OUTER","TOP","PANTS","SHOES","ACC");
	$n_menu=count($a_menu);

	$a_status=array("상품상태","판매중","판매중지","품절");
	$n_status=count($a_status);

	$a_icon=array("아이콘","New","Hit","Sale");
	$n_icon=count($a_icon);

	$a_text1=array("","제품이름","제품번호");   // for문의 $i는 1부터 시작
	$n_text1=count($a_text1);

	$baesongbi = 2500;
    $max_baesongbi = 100000;

	$a_state=array("전체","주문신청","주문확인","입금확인", "배송중", "주문완료",
                          "주문취소");
	$n_state=count($a_state);

	$a_name=array("주문번호","고객명","상품명");
	$n_name=count($a_name);





	
	$db=mysqli_connect("localhost","shop47","1234","shop47");
	if(!$db)exit("DB연결에러");
?>