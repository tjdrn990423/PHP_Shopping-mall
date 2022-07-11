<?
   include"../common.php";

   $name=$_REQUEST[name]; //또는, $name=$_POST[name];
   $no1=$_REQUEST[no1];
   $menu=$_REQUEST[sel3];
   $code=$_REQUEST[code];
   $coname=$_REQUEST[coname];
   $price=$_REQUEST[price];
   $opt1=$_REQUEST[opt1];
   $opt2=$_REQUEST[opt2];
   $content=$_REQUEST[content];
   $status=$_REQUEST[status];
   
   $regday1=$_REQUEST[regday1];
   $regday2=$_REQUEST[regday2];
   $regday3=$_REQUEST[regday3];
   $regday=sprintf("%04d-%02d-%02d", $regday1, $regday2, $regday3);
   
   $icon_new=$_REQUEST[icon_new];
    $icon_hit=$_REQUEST[icon_hit];
    $icon_sale=$_REQUEST[icon_sale];
    $discount=$_REQUEST[discount];
   
   $fname1=$image1;
   $fname2=$image2;
   $fname3=$image3;

   $content= addslashes($content);

   $fname1=$image1;
if ($_FILES["image1"]["error"]==0) 
{
    $fname1=$_FILES["image1"]["name"];    
    if (!move_uploaded_file($_FILES["image1"]["tmp_name"],
          "../product/" . $fname1)) exit("업로드 실패");
}
$fname2=$image2;
if ($_FILES["image2"]["error"]==0) 
{
    $fname2=$_FILES["image2"]["name"];    
    if (!move_uploaded_file($_FILES["image2"]["tmp_name"],
          "../product/" . $fname2)) exit("업로드 실패");
}
$fname3=$image3;
if ($_FILES["image3"]["error"]==0) 
{
    $fname3=$_FILES["image3"]["name"];    
    if (!move_uploaded_file($_FILES["image3"]["tmp_name"],
          "../product/" . $fname3)) exit("업로드 실패");
}



   if (!$icon_new){   
		$icon_new=0;}   
	else{   
		$icon_new=1;}

	if (!$icon_hit){   
		$icon_hit=0;}   
	else{   
		$icon_hit=1;}

	if (!$icon_sale){   
		$icon_sale=0;}   
	else{   
		$icon_sale=1;}

   /////////////////////////////////////////////////
   //if($icon_new) $icon_new=1; else $icon_new=0;
   //if($icon_hit) $icon_hit=1; else $icon_hit=0;
   //if($icon_sale) $icon_sale=1; else $icon_sale=0;
   //if($discount) $discount=1; else $icon_sale=0;
   
   $query="insert into product (menu47, code47, name47, coname47, price47, opt147, opt247, content47, status47, regday47, icon_new47, icon_hit47, icon_sale47, discount47, image147, image247, image347)
      values ($menu, '$code', '$name', '$coname', $price, $opt1, $opt2, '$content', $status, '$regday', $icon_new, $icon_hit, $icon_sale, $discount, '$fname1', '$fname2', '$fname3');";
   $result=mysqli_query($db,$query);
   if (!$result) exit("에러: $query");
   
   echo("<script>location.href='product.php?&sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4&text1=$text1&page=$page'</script>
");
?>