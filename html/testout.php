<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	$irum1=$_REQUEST[irum1];
	$irum2=$_REQUEST[irum2];
?>
<html>
<head>
<title>test 결과</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
받은 irum1은 <font color="blue"><?=$irum1?></font>입니다. 
<br><br>
받은 irum2는 <font color="blue"><?echo("$irum2");?></font>입니다. 
<br><br>
<a href="javascript:history.back();">돌아가기</a>
</body>
</html>
