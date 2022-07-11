<?
	
	include "../common.php";

	$no=$_REQUEST[no];
	$name=$_REQUEST[name]; //혹은 $name=$_POST[name];
	$sm=$_REQUEST[sm]; 
	$juso=$_REQUEST[juso];
	$uid=$_REQUEST[uid];
	$email=$_REQUEST[email];
	$gubun=$_REQUEST[gubun];
	$zip=$_REQUEST[zip];
	
	$pwd=$_REQUEST[pwd];
	$pwd1=$_REQUEST[pwd1];
	$pwd2=$_REQUEST[pwd2];
	

	$tel1=$_REQUEST[tel1];
	$tel2=$_REQUEST[tel2];
	$tel3=$_REQUEST[tel3];

	$birthday1=$_REQUEST[birthday1];
	$birthday2=$_REQUEST[birthday2];
	$birthday3=$_REQUEST[birthday3];

	$phone1=$_REQUEST[phone1];
	$phone2=$_REQUEST[phone2];
	$phone3=$_REQUEST[phone3];

	//$cookie_no=$_COOKIE[cookie_no];
	

	$tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);  
	$birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);
	$phone = sprintf("%-3s%-4s%-4s", $phone1, $phone2, $tel3); 


	//$query="update member set name47='$name',sm47=$sm, tel47='$tel', email47='$email',
			//birthday47='$birthday', pwd47='$pwd', phone47='$phone',zip47='$zip',gubun47=$gubun,
			//juso47='$juso' where no47=$no;";
	//$result=mysqli_query($db,$query);
	//if(!$result)exit("에러:$query");

	$query="update member set pwd47='$pwd', name47='$name',
				birthday47='$birthday', tel47='$tel', sm47=$sm, phone47='$phone', 
				zip47='$zip' , email47='$email', juso47='$juso',gubun47='$gubun' where no47=$no;";
	$result=mysqli_query($db,$query);
	if(!$result)exit("에러:$query");
	echo("<script>location.href='member.php'</script>");
	
	/*
	if(!$pwd1){
		$query="update member set name47='$name', 
				tel47='$tel', phone47='$phone', sm47=$sm, birthday47='$birthday', 
				zip47='$zip' , email47='$email' , juso47='$juso',gubun47='$gubun' where no47=$cookie_no;";
		$result=mysqli_query($db,$query);
		if(!$result)exit("에러:$query");
		echo("<script>location.href='member.php'</script>");
		
	}
	else {
		if($pwd1==$pwd2){
			$query="update member set name47='$name', 
					tel47='$tel', phone47='$phone', sm47=$sm, birthday47='$birthday',pwd47='$pwd1', 
					zip47='$zip' , email47='$email' , juso47='$juso' where no47=$cookie_no;";
		$result=mysqli_query($db,$query);
		if(!$result)exit("에러:$query");
		echo("<script>location.href='member.php'</script>");
		}
	}
	*/
?>