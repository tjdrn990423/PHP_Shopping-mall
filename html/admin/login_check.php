<?
	include "../common.php";
	$adminid=$_REQUEST[adminid];
	$adminpw=$_REQUEST[adminpw];


	if($adminid == $admin_id&&$adminpw ==$admin_pw)
	{
		setcookie("cookie_admin","yes");
		//$cookie_admin변수에 "yes"로 쿠키 저장.
		//setcooke("변수명","값")
		echo("<script>location.href='member.php'</script>");
	}
	else
	{
		setcookie("yes","");
		//cookie_amdin 변수 삭제
		echo("<script>location.href='index.html'</script>");
	}
?>