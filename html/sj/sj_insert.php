<?
	include "common.php";

	$name=$_REQUEST[name]; //νΉμ $name=$_POST[name];
	$kor=$_REQUEST[kor];
	$eng=$_REQUEST[eng];
	$mat=$_REQUEST[mat];
	$hap=$_REQUEST[hap];
	$avg=$_REQUEST[avg];

	$query="insert into sj(name47,kor47,eng47,mat47,hap47,avg47)
				values('$name',$kor,$eng,$mat,$hap,$avg);";
	$result=mysqli_query($db,$query);
	if(!$result)exit("μλ¬:$query");

	echo("<script>location.href='sj_list.php'</script>");
?>