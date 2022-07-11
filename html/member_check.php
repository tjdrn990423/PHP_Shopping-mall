<?
	include "common.php";

	$uid =$_REQUEST[uid];
	$pwd=$_REQUEST[pwd];
	

	$query="select no47, name47 from member where uid47='$uid' and pwd47='$pwd'";
	$result=mysqli_query($db,$query);
	if(!$result)exit("에러:$query");
	$row=mysqli_fetch_array($result);

	$count=mysqli_num_rows($result);

	if ($count>0) {
	   //고객의 번호와 이름을 cookie로 저장(cookie_no, cookie_name)
	   //index.html로 이동.   
		setcookie("cookie_no",$row[no47]);
		setcookie("cookie_name",$row[name47]);
		echo("<script>location.href='index.html'</script>");
	}
	else
	   echo("<script>location.href='member_login.php'</script>");
?>