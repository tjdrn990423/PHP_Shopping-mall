<?
   $cart = $_COOKIE[cart]; //배열
   $n_cart = $_COOKIE[n_cart]; //총 제품이 몇개인지
   $kind = $_REQUEST [kind]; //?=kind로 넘겨주는 변수
   $no = $_REQUEST[no];
   $num = $_REQUEST[num];
   $num2 = $_REQUEST[num2];
   $opts1 = $_REQUEST[opts1];
   $opts2 = $_REQUEST[opts2];
   $pos = $_REQUEST[pos];

   //장바구니 초기화
   if (!$n_cart) $n_cart=0;   // 제품개수 0으로 초기화
   
   switch ($kind) 
      {
         case "insert":      // 장바구니 담기
         case "order":      // 바로 구매하기
            //제품개수 1 증가
            $n_cart ++;
            //제품정보 합치기.
            $cart[$n_cart] = implode("^", array($no, $num, $opts1, $opts2));
   


            //제품정보, 개수($cart[$n_cart], $n_cart) 쿠키로 저장.
            setcookie("cart[$n_cart]",$cart[$n_cart]);
            setcookie("n_cart",$n_cart);
            break;
            
         case "delete":// 제품삭제
            setcookie("cart[$pos]",""); //쿠키 삭제.
            break;

         case "update":     // 수량 수정
            list($no, $num, $opts1, $opts2)=explode("^", $cart[$pos]); //$pos번째 제품번호, 옵션값들 알아내기.
            $cart[$pos] = implode("^", array($no, $num2, $opts1, $opts2)); //이전 값에 새 수량으로 제품정보 합치기.
            setcookie("cart[$pos]",$cart[$pos]); //$pos번째에 제품정보 저장.
            break;
         case "deleteall":    // 장바구니 전체 비우기
            for($i=1;$i<=$n_cart;$i++){
               if($cart[$i]){
                  setcookie("cart[$i]","");
               }
            }
            $n_cart=0;
            setcookie("n_cart","");
            break;
      }
      

   if ($kind=="order")
      echo("<script>location.href='order.php'</script>");
   else
      echo("<script>location.href='cart.php?no=$row[no47]'</script>");


         
?>