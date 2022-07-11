<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	

<?
	include "common.php";
	include "main_top.php";

	$query="select * from product 
                where icon_new47=1 and status47=1 
                order by rand()  limit 15";
	$result=mysqli_query($db,$query);
    if(!$result) exit("에러 : $query");

?>



<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	
<script>
	function zoomIn(event){
		event.target.style.transform="scale(1.5,1.5)";
		event.target.style.zIndex=1;
		event.target.style.transition="all 0.5s";
}
	function zoomOut(event){
		event.target.style.transform="scale(1)";
		event.target.style.zIndex=0;
		event.target.style.transition="all 0.5s";
	}
</script>
			
			<!---- 화면 우측(신상품) 시작 -------------------------------------------------->	
			<table width="767" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td height="60">
						<img src="images/main_newproduct.jpg" width="767" height="40">
					</td>
				</tr>
			</table>
<?
	
	$num_col=5;   $num_row=3;                   // column수, row수
	$count=mysqli_num_rows($result);         // 출력할 제품 개수
	$icount=0;                                                // 출력한 제품 개수 카운터
	echo("<table border='0' cellpadding='0' cellspacing='0'>");
	for ($ir=0; $ir<$num_row; $ir++)
	{

		 echo("<tr>");
		 for ($ic=0;  $ic<$num_col;  $ic++)
		{
			 if ($icount < $count)
			{
				 $row=mysqli_fetch_array($result);
				 $price = number_format($row[price47]);
				 $saleprice = number_format( round($row[price47]*(100-$row[discount47])/100, -3) );
				 
				 if ($row[icon_new47]==1) $icon_new = "<img src='images/i_new.gif' align='absmiddle' vspace='1'>"; else $icon_new = "";
				 if ($row[icon_hit47]==1) $icon_hit = "<img src='images/i_hit.gif' align='absmiddle' vspace='1'>"; else $icon_hit = "";
				 if ($row[icon_sale47]==1) $icon_sale = "<img src='images/i_sale.gif' align='absmiddle' vspace='1'>"; else $icon_sale = "";
				 
				 
				 echo("<td width='150' height='205' align='center' valign='top'> <table border='0' cellpadding='0' cellspacing='0' width='100' class='cmfont'>
							<tr> 
								<td align='center'> 
									<a href='product_detail.php?no=$row[no47]'><img src='product/$row[image147]' width='120' height='140' border='0'
									onmouseenter='zoomIn(event)'
									onmouseleave='zoomOut(event)'></a>
								</td>
							</tr>
							<tr><td height='5'></td></tr>
							<tr> 
								<td height='20' align='center'>
									<a href='product_detail.php?no=$row[no47]'><font color='444444'>$row[name47]</font></a>&nbsp; 
									$icon_new $icon_hit $icon_sale  

								</td>
							</tr>
							");
							if($row[icon_sale47]==1){
								echo("<tr><td height='20' align='center'><strike>$price 원</strike><br><b>$saleprice 원</b></td></tr>");
							}
							else
								echo("<tr><td height='20' align='center'><b>$price 원</b></td></tr>");
							echo("</table> </td>");
			 }
			 else
				 echo("<td></td>");      // 제품 없는 경우
			 $icount++;
		 }
		echo("</tr>");
	}
	echo("</table>");

?>
			
				<!---1번째 줄-->
				<!--<tr>
					<td width="150" height="205" align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="100" class="cmfont">
							<tr> 
								<td align="center"> 
									<a href="product_detail.html?no=109469"><img src="product/0000_s.jpg" width="120" height="140" border="0"></a>
								</td>
							</tr>
							<tr><td height="5"></td></tr>
							<tr> 
								<td height="20" align="center">
									<a href="product_detail.html?no=1"><font color="444444">상품명1</font></a>&nbsp; 
									<img src="images/i_hit.gif" align="absmiddle" vspace="1"> <img src="images/i_new.gif" align="absmiddle" vspace="1"> 
								</td>
							</tr>
							<tr><td height="20" align="center"><b>89,000 원</b></td></tr>
						</table>
					</td>
				
				</tr>	
				<tr><td height="10"></td></tr>
				
			</table>

			<!---- 화면 우측(신상품) 끝 -------------------------------------------------->	



<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<?
	include "main_bottom.php";
?>
