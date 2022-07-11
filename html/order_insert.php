<?
   include "common.php";
   $cookie_no=$_COOKIE[cookie_no];
   $o_no=$_REQUEST[o_no];
   $o_name=$_REQUEST[o_name];
   $o_tel=$_REQUEST[o_tel];
   $o_phone=$_REQUEST[o_phone];
   $o_email=$_REQUEST[o_email];
   $o_zip=$_REQUEST[o_zip];
   $o_juso=$_REQUEST[o_juso];
   $r_name=$_REQUEST[r_name];
   $r_tel=$_REQUEST[r_tel];
   $r_phone=$_REQUEST[r_phone];
   $r_email=$_REQUEST[r_email];
   $r_zip=$_REQUEST[r_zip];
   $r_juso=$_REQUEST[r_juso];
   $memo=$_REQUEST[memo];
   $cart=$_COOKIE[cart];
   $n_cart=$_COOKIE[n_cart];
   $pay_method=$_REQUEST[pay_method];
   $card_kind=$_REQUEST[card_kind];
   $card_halbu=$_REQUEST[card_halbu];   
   $bank_kind=$_REQUEST[bank_kind];
   $bank_sender=$_REQUEST[bank_sender];
   $product_nums=0;
   $product_names="";
   $total_cash=0;
	

   $query="select no47 from jumun where jumunday47=curdate() order by no47 desc";
   $result=mysqli_query($db,$query);
   $row=mysqli_fetch_array($result);
   $count=mysqli_num_rows($result);
   $jumun_no=$row[no47];
   $jumun_no=substr("$jumun_no",-4);
   
	

   if($count>0){
      $jumun_no=date("ymd").$jumun_no+1;
   }
   else{
      $jumun_no=date("ymd")."0001";
   }
   $jumunday=substr("$jumun_no",0,6);

   for($i=1;$i<=$n_cart;$i++){
         if($cart[$i]){
         list($no, $num, $opts1, $opts2)=explode("^", $cart[$i]);
         $query="select *from product where no47=$no";
         $result=mysqli_query($db,$query);
         $row=mysqli_fetch_array($result);
         $cash = round($row[price47]*(100-$row[discount47])/100,-3);
         $query="insert into jumuns (jumun_no47, product_no47, num47, price47, cash47, discount47, opts_no147, opts_no247)
                        values ('$jumun_no', $no, $num, $row[price47], $cash, $row[discount47], $opts1, $opts2);";
   
         $result=mysqli_query($db,$query);
         if (!$result) exit("에러: $query");
         
         setcookie("cart[$i]",null);

         $total_cash=$total_cash+($cash*$num);
         $product_nums=$product_nums+1;
         if($product_nums==1)$product_names=$row[name47];
      }
   }
   $n_cart = 0;
   setcookie("n_cart",$n_cart);

   if($product_nums>1){
      $tmp=$product_nums;
      $tmp=$tmp-1;
      $product_names=$product_names." 외 ".$tmp;
   }

   if($total_cash<$max_baesongbi){
      $query="insert into jumuns (jumun_no47, product_no47, num47, price47, cash47, discount47, opts_no147, opts_no247)
                        values ($jumun_no, 0, 1, $baesongbi, $baesongbi, 0, 0, 0);";
      $result=mysqli_query($db,$query);
      if (!$result) exit("에러: $query");
      $total_cash=$total_cash+$baesongbi;
   }

   if($cookie_no) $member_no=$cookie_no;
   else $member_no=0;

   $query="insert into jumun (no47, member_no47, jumunday47, product_names47, product_nums47, o_name47, o_tel47, o_phone47, o_email47, o_zip47, o_juso47, r_name47, r_tel47, r_phone47, r_email47, r_zip47, r_juso47, memo47, pay_method47, card_okno47, card_halbu47, card_kind47, bank_kind47, bank_sender47, total_cash47, state47)
                        values ('$jumun_no', $member_no, '$jumunday', '$product_names', $product_nums, '$o_name', '$o_tel', '$o_phone', '$o_email', '$o_zip', '$o_juso', '$r_name', '$r_tel', '$r_phone', '$r_email', '$r_zip', '$r_juso', '$memo', $pay_method, '123456789', $card_halbu, $card_kind, $bank_kind, '$bank_sender', $total_cash, 1);";
   
   $result=mysqli_query($db,$query);
   if (!$result) exit("에러: $query");

   echo("<script>location.href='order_ok.php'</script>");
?>