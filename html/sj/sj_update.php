<?
	include "common.php";

	$no=$_REQUEST[no];
	$name=$_REQUEST[name]; //혹은 $name=$_POST[name];
	$kor=$_REQUEST[kor];
	$eng=$_REQUEST[eng];
	$mat=$_REQUEST[mat];
	$hap=$_REQUEST[hap];
	$avg=$_REQUEST[avg];

	$query="update sj set name47='$name',kor47=$kor,
			eng47=$eng,mat47=$mat,hap47=$hap,
			avg47=$avg where no47=$no;";
	$result=mysqli_query($db,$query);
	if(!$result)exit("에러:$query");

	echo("<script>location.href='sj_list.php'</script>");
?>