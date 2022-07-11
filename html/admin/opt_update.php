<?
	
	include "../common.php";

	$no1=$_REQUEST[no1];
	$name=$_REQUEST[name]; //혹은 $name=$_POST[name];
	
	

	$query="update opt set no47='$no1', name47='$name' where no47=$no1;";
	$result=mysqli_query($db,$query);
	if(!$result)exit("에러:$query");
	echo("<script>location.href='opt.php'</script>");
	
	
?>