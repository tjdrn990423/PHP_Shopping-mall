<?
	include "../common.php";

	$no=$_REQUEST[no];
	$checkno1=$_REQUEST[checkno1];
	$checkno2=$_REQUEST[checkno2];
	$checkno3=$_REQUEST[checkno3];
	$menu=$_REQUEST[sel3];
	$code=$_REQUEST[code];
	$name=$_REQUEST[name];
	$coname=$_REQUEST[coname];
	$price=$_REQUEST[price];
	$opt1=$_REQUEST[opt1];
	$opt2=$_REQUEST[opt2];
	$content=$_REQUEST[contents];
	$status=$_REQUEST[status];
	$regday=$_REQUEST[regday];
	$icon_new=$_REQUEST[icon_new];
	$icon_hit=$_REQUEST[icon_hit];
	$icon_sale=$_REQUEST[icon_sale];
	$discount=$_REQUEST[discount];
	$image1=$_REQUEST[image1];
	$image2=$_REQUEST[image2];
	$image3=$_REQUEST[image3];

	$regday1=$_REQUEST[regday1];
	$regday2=$_REQUEST[regday2];
	$regday3=$_REQUEST[regday3];
	$regday = sprintf("%04d-%02d-%02d", $regday1, $regday2, $regday3);

	$fname1=$_REQUEST[fname1];
	$fname2=$_REQUEST[fname2];
	$fname3=$_REQUEST[fname3];
	$content = addslashes($content);
	addslashes($content);

	if (!$icon_new)   
	$icon_new=0;   
	else   
	$icon_new=1;

	if (!$icon_hit)   
	$icon_hit=0;   
	else   
	$icon_hit=1;

	if (!$icon_sale)   
	$icon_sale=0;   
	else   
	$icon_sale=1;

	  $fname1=$_REQUEST[imagename1];
	   if ($checkno1=="1") $fname1="";
	   if ($_FILES["image1"]["error"]==0)
	  {
		$fname1=$_FILES["image1"]["name"];    
		if (!move_uploaded_file($_FILES["image1"]["tmp_name"],
			  "../product/$fname1")) exit("업로드 실패");
	   }
	 
	   $fname2=$_REQUEST[imagename2];
	   if ($checkno2=="1") $fname2="";
	   if ($_FILES["image2"]["error"]==0)
	   {
		$fname2=$_FILES["image2"]["name"];    
		if (!move_uploaded_file($_FILES["image2"]["tmp_name"],
			  "../product/$fname2")) exit("업로드 실패");
	  }

	   $fname3=$_REQUEST[imagename3];
	   if ($checkno3=="1") $fname3="";
	   if ($_FILES["image3"]["error"]==0)
		{
		$fname3=$_FILES["image3"]["name"];    
		if (!move_uploaded_file($_FILES["image3"]["tmp_name"],
			  "../product/$fname3")) exit("업로드 실패");
		 }

		$query="update product set menu47=$menu , code47='$code', name47='$name',coname47='$coname', price47='$price', opt147='$opt1', opt247='$opt2', content47='$content', status47='$status', regday47='$regday', icon_new47='$icon_new', icon_hit47='$icon_hit', icon_sale47='$icon_sale', discount47='$discount', image147='$fname1',image247='$fname2',image347='$fname3'  where no47=$no;";
		$result=mysqli_query($db,$query);
		if (!$result) exit("에러:$query");

		echo("<script>location.href='product.php?sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4&text1=$text1&page=$page';</script>");
?>