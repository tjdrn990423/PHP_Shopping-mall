<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	$cookie_no=$_COOKIE[cookie_no];
	$cookie_name=$_COOKIE[cookie_name];


	include "main_top.php";
	include "common.php";

	 $no = $_REQUEST[no];
   $code=$_REQUEST[code];
   $name=$_REQUEST[name];
   $coname=$_REQUEST[coname];
   $price=$_REQUEST[price];
   $opt1=$_REQUEST[opt1];
   $opt2=$_REQUEST[opt2];
   $content=$_REQUEST[contents];
   $status=$_REQUEST[status];
   $regday=$_REQUEST[today];
   $icon_new=$_REQUEST[icon_new];
   $icon_hit=$_REQUEST[icon_hit];
   $icon_sale=$_REQUEST[icon_sale];
   $discount=$_REQUEST[discount]; 
   $image1=$_REQUEST[image1];
   $image2=$_REQUEST[image2];
   $image3=$_REQUEST[image3]
?>
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language="javascript">
				function SearchProduct() {
					form2.submit();
				}
			</script>

			<table border="0" cellpadding="0" cellspacing="0" width="747">
			  <tr><td height="13"></td></tr>
			  <tr>
			    <td height="30" align="center"><p><img src="images/search_title.gif" width="746" height="30" border="0" /></p></td>
			  </tr>
			  <tr><td height="13"></td></tr>
			</table>

			<table width="730" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center" valign="middle" colspan="3" height="5">
						<table border="0" cellpadding="0" cellspacing="0" width="690">
							<tr><td class="cmfont"><img src="images/search_title1.gif" border="0"></td></tr>
      			  <tr><td height="10"></td></tr>
			      </table>
					</td>
				</tr>
				<tr>
					<td width="730" align="center" valign="top" bgcolor="#FFFFFF"> 

        
						<table width="686" border="0" cellpadding=0 cellspacing=0 class="cmfont">
							<tr bgcolor="8B9CBF"><td height="3" colspan="5"></td></tr>
							<tr height="29" bgcolor="EEEEEE"> 
								<td width="80"  align="center">그림</td>
								<td align="center">상품명</td>
								<td width="150" align="right">가격</td>
								<td width="20"></td>
							</tr>
							<?
								$findtext=$_REQUEST[findtext];
								 $query = "select * from product where name47 like '%$findtext%' order by name47";
								$result=mysqli_query($db,$query);
								if(!$result) exit("에러 : $query");
								$count=mysqli_num_rows($result);

								$price = number_format($row[price47]);
								$saleprice = number_format( round($row[price47]*(100-$row[discount47])/100, -3) );

								for($i = 0; $i<$count; $i++)
                        {
                           $row=mysqli_fetch_array($result);
                        
                        echo("<tr bgcolor='8B9CBF'><td height='1' colspan='5'  bgcolor='AAAAAA'></td></tr>

                        <tr height='70'>
                           <td width='80' align='center' valign='middle'>
                              <a href='product_detail.php?no=$row[no47]'><img src='product/$row[image247]' width='60' height='60' border='0'></a>
                           </td>
                           <td align='left' valign='middle'>
                              <a href='product_detail.php?no=$row[no47]'><font color='#4186C7'>$row[name47]<b></b></font></a><br>");

                        
                              if($row[icon_new47] == 1)
                                 echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'>");
                              if($row[icon_hit47] == 1)
                                 echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'>");
                              if($row[icon_sale47] == 1)
                                 echo("<img src='images/i_sale.gif' align='absmiddle' vspace='1'>");
                           
                        echo("</td>");
                        
                           
                        $price = number_format($row[price47]);
                        $saleprice = number_format(round($row[price47]*(100 - $row[discount47]) / 100,-3));
                        if($row[icon_sale47] == 1)
                           echo("<td width='150' align='right'valign='middle'><strike>$price 원</strike> <br>$saleprice 원</td>");
                        if($row[icon_sale47] == 0)
                           echo("<td width='150' align='right'valign='middle'>$price 원</td>");
                        
                        
                        
                        echo("<td width='20'></td>
                     </tr>

                     <tr bgcolor='8B9CBF'><td height='3' colspan='5'></td></tr>");
                        }

							?>
							</table>
						</td>
					</tr>
				</table>

				<?

            $page=$_REQUEST[page];
            if(!$page) $page=1;
            $pages=ceil($count/$page_line);
            $first=1;
            if($count > 0) $first=$page_line*($page - 1);
            $page_last=$count - $first;
            if($page_last > $page_line) $page_last=$page_line;
            
            if($count > 0) mysqli_data_seek($result,$first);

            $blocks = ceil($pages/$page_block);
            $block = ceil($page/$page_block);
            $page_s = $page_block * ($block-1);
            $page_e = $page_block * $block;
            if($blocks <= $block) $page_e = $pages;

            echo("<table width='700' border='0' cellspacing='0' cellpadding='0'>
               <tr>
               <td height='20' align='center'>");

            if($block > 1)
            {
               $tmp = $page_s;
               echo("<a href='product_search.php?page=1'>
                     <img src='images/i_prev.gif' align='absmiddle' border='0'>
                  </a>&nbsp");
            }
            for($i=$page_s+1; $i<=$page_e; $i++)
            {
               if($page == $i)
                  echo("&nbsp;<font color='#FC0504'><b>$i</b></font>&nbsp;");
               else
                  echo("&nbsp;<a href='product_search.php?page=1'>[$i]</a>&nbsp;");
            }
            if($block < $blocks)
            {
               $tmp = $page_e+1;
               echo("<a href='product_search.php?page=1'>
                     <img src='images/i_next.gif' align='absmiddle' border='0'>
                  </a>");
            }
            
            echo("   </td>
               </tr>
               </table>");
         ?>

						

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	
<?
   include "main_bottom.php";
?> 