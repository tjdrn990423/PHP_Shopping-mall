<!-------------------------------------------------------------------------------------------->   
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->   

<?
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
   $regday=$_REQUEST[regday];
   $icon_new=$_REQUEST[icon_new];
   $icon_hit=$_REQUEST[icon_hit];
   $icon_sale=$_REQUEST[icon_sale];
   $discount=$_REQUEST[discount]; 
   $image1=$_REQUEST[image1];
   $image2=$_REQUEST[image2];
   $image3=$_REQUEST[image3];

   $sel3 = $_REQUEST[sel3];

   $menu = $_REQUEST[menu];
   
   

?>

<!-------------------------------------------------------------------------------------------->   
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->   

         <!---- 화면 우측(신상품) 시작 -------------------------------------------------->   
         <!-- form2 시작 -->
         <?
            
      
            

            $query="select * from product where menu47=$menu and status47=1";
            $row=mysqli_fetch_array($result);
            $result=mysqli_query($db,$query);
            if(!$result) exit("에러 : $query");
            $count=mysqli_num_rows($result);
            

         ?>
         <form name="form2" method="post" action="product.php">
         <input type="hidden" name="menu" value="<?=$menu;?>">

         <table border="0" cellpadding="0" cellspacing="5" width="767" class="cmfont" bgcolor="#efefef">
            <tr>
               <td bgcolor="white" align="center">
                  <table border="0" cellpadding="0" cellspacing="0" width="751" class="cmfont">
                     <tr>
                        <td align="center" valign="middle">
                           <table border="0" cellpadding="0" cellspacing="0" width="730" height="40" class="cmfont">
                              <tr>
                                 <td width="500" class="cmfont">
                                    <font color="black" class="cmfont"><b><?=$a_menu[$menu];?>&nbsp</b></font>&nbsp
                                 </td>
                                 <td align="right" width="274">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
                                       <tr>
                                          <td align="right"><font color="EF3F25"><b><?=$count;?></b></font> 개의 상품.&nbsp;&nbsp;&nbsp</td>
                                          <td width="100">
                                          <?
                                             echo("<select name='sort' size='1' class='cmfont' onChange='form2.submit()'>
                                                ");
                                                
                                                $sort = $_REQUEST[sort];
                                                if($sort == null)
                                                   echo("<option value='' selected>신상품순 정렬</option>");
                                                else
                                                   echo("<option value=''>신상품순 정렬</option>");

                                                if($sort == 'up')
                                                   echo("<option value='up' selected>고가격순 정렬</option>");
                                                else
                                                   echo("<option value='up'>고가격순 정렬</option>");

                                                if($sort == 'down')
                                                   echo("<option value='down' selected>저가격순 정렬</option>");
                                                else
                                                   echo("<option value='down'>저가격순 정렬</option>");

                                                if($sort == 'name')
                                                   echo("<option value='name' selected>상품명 정렬</option>");
                                                else
                                                   echo("<option value='name'>상품명 정렬</option>");
                                             
                                          ?>
                                             </select>
                                          </td>
                                       </tr>
                                    </table>
                                 </td>
                              </tr>
                           </table>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
         </form>
         <!-- form2 -->

         <table border="0" cellpadding="0" cellspacing="0">
            <!---1번째 줄-->
            <?
               $sort = $_REQUEST[sort];
               
               
               $num_col=5;   $num_row=4;                   // column수, row수
               $page_line=$num_col * $num_row;
               $page_last=$count - $first;

               $count=mysqli_num_rows($result);         // 출력할 제품 개수
               $icount=0;                                                // 출력한 제품 개수 카운터
               
               
               if ($sort=="up")            // 고가격순
                  $query="select * from product where menu47=$menu and status47=1 order by price47 desc";
               elseif ($sort=="down")  // 저가격순
                  $query="select * from product where menu47=$menu and status47=1 order by price47";
               elseif ($sort=="name")  // 이름순
                  $query="select * from product where menu47=$menu and status47=1 order by name47";
               else        // 신상품순
                  $query="select * from product where menu47=$menu and status47=1 order by regday47 ";
               

               $row=mysqli_fetch_array($result);
               $count=mysqli_num_rows($result);
               $result=mysqli_query($db,$query);
               if(!$result) exit("에러 : $query");
               
  echo("<table border='0' cellpadding='0' cellspacing='0'>");
   for ($ir=0; $ir<$num_row; $ir++)
   {
       echo("<tr>");
       for ($ic=0;  $ic<$num_col;  $ic++)
      {
          if ($icount < $count) //page_last-1
         {
             $row=mysqli_fetch_array($result);
          $price = number_format($row[price47]);
          $saleprice = number_format( round($row[price47]*(100-$row[discount47])/100, -3) );


            if ($row[icon_new47]==1) $icon_new = "<img src='images/i_new.gif' align='absmiddle' vspace='1'>"; 
            else $icon_new = "";
            
            if ($row[icon_hit47]==1) $icon_hit = "<img src='images/i_hit.gif' align='absmiddle' vspace='1'>"; 
            else $icon_hit = "";
            
            if ($row[icon_sale47]==1) 
            {$icon_sale = "<img src='images/i_sale.gif' align='absmiddle' vspace='1'>";} 
            else 
            {$icon_sale = "";}

             echo("<td width='150' height='205' align='center' valign='top'> <table border='0' cellpadding='0' cellspacing='0' width='100' class='cmfont'>
                     <tr> 
                        <td align='center'> 
                           <a href='product_detail.php?no=$row[no47]'><img src='product/$row[image147]' width='120' height='140' border='0'></a>
                        </td>
                     </tr>
                     <tr><td height='5'></td></tr>
                     <tr> 
                        <td height='20' align='center'>
                           <a href='product_detail.html?no=$row[no47]'><font color='444444'>$row[name47]</font></a>&nbsp; 
                          $icon_new $icon_hit $icon_sale  

                        </td>
                     </tr>");

                      if ($row[icon_sale47]==1)
               echo("<tr><td height='20' align='center'><strike>$price 원</strike> <br> <b>$saleprice 원</b></td></tr>");
            else
               echo("<tr><td height='20' align='center'><b>$price 원</b></td></tr>");

                echo ("</table> </td>");

          }

          else
             echo("<td></td>");      // 제품 없는 경우
          $icount++;
       }
      echo("</tr>");
   }
   echo("</table>");


            ?>
            
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


               

         <!---- 화면 우측(신상품) 끝 -------------------------------------------------->   




<!-------------------------------------------------------------------------------------------->   
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->   

<?
   include "main_bottom.php";
?> 