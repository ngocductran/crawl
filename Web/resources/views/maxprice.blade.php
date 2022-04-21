
@extends('welcome')
@section('content')          
           
                        <!--  product -->

<div>

      <?php
      

       $conn=mysqli_connect("localhost","root","","tiki3") or die("Lỗi");

        mysqli_set_charset($conn, "utf8");
        $keywords ="SELECT a.txtsearch FROM  history as a ORDER BY  id DESC LIMIT 1";
        $sql3= mysqli_query($conn, $keywords);
        $row = mysqli_fetch_assoc($sql3);
        $key =  $row['txtsearch'];
         $query2 = "SELECT * FROM product WHERE (ten like '%$key%') ORDER BY gia DESC  limit 4";
                          $sql2 = mysqli_query($conn, $query2);
                          $num = mysqli_num_rows($sql2);


                            /* SHOPPE*/
         $conn4=mysqli_connect("localhost","root","","tiki3") or die("Lỗi");
         mysqli_set_charset($conn4, "utf8");
         $query4 = "SELECT DISTINCT(a.ten),SUBSTR(price, 1, LENGTH(price) - 5) as price , SUBSTR(ten, 1, LENGTH(ten) - 1) as ten, a.image,a.idshop,a.itemid,a.view_count, SUBSTR( price_max_before_discount, 1, LENGTH( price_max_before_discount) - 5) as price_max_before_discount, historical_sold FROM shoppe a WHERE image IS NOT  NULL  and  a.ten like'$key%'  ORDER BY price DESC  limit 4";
          $sql4 = mysqli_query($conn4, $query4);
          $num4 = mysqli_num_rows($sql4);

          /* sendo*/
            $connsendo=mysqli_connect("localhost","root","","tiki3") or die("Lỗi");
                      mysqli_set_charset($connsendo, "utf8");
            $querysendo = "SELECT * FROM sendo WHERE (ten like '%$key%') ORDER BY  price DESC limit 4 ";
            $sqlsendo = mysqli_query($connsendo, $querysendo);
            $numsendo = mysqli_num_rows($sqlsendo);

      ?>
     <h3 style=" font-weight:bold;color: #FE9A2E"> Từ khóa tìm kiếm : <?php echo $row['txtsearch']; ?></h3>
         <?php  


              if ($num > 0) {
                      while($row = mysqli_fetch_assoc($sql2))
                      {
                         ?>
             
                  <div  style="float:left" class="col-lg-3 col-md-12" >
          
                    <img style="width: 50px;height: 50px" src="https://brasol.vn/public/ckeditor/uploads/thiet-ke-logo-tin-tuc/y-nghia-logo-tiki.jpg"> 
                      <img width="290px" height="290px" src="<?php echo $row['url_image'];?>">
                      <div>
                        <br><a class="a2" href="http://tiki.vn/<?php echo $row['url_path']; ?>">
                            <b style="font-size: 15px"><?php echo $row["ten"]?></b></a>
                     </div>
                    <div style="color: rgb(255 193 32); font-size: 15px; ">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i></i>
                        <n style="color: black;"><?php echo '('.$row["review_count"].')';?></n>
                    </div>
                      <div><b style="font-size: 15px; font-weight: bold">Giá: <?php echo number_format($row["gia"],2,",",".");?></b>&ensp;<del style="font-size: 15px;"><?php echo number_format($row["giadiscount"],2,",",".");?></del>
                      </div>
                    </div>
                      <?php  
                      }

                  } 
                  
              ?>  
              <!--  shoppe maxx -->
              <?php  
              if ($num4 > 0) {
                      while($row = mysqli_fetch_assoc($sql4))
                      {
                          ?>
                    <div  style="float:right;" class="col-lg-3 col-md-6" >
                    <img style="width: 50px;height: 50px" src="http://shopeeplus.com//upload/images/4321Shopee-logo-512x512.png"> 
                      <img width="290px" height="290px" src="https://cf.shopee.vn/file/<?php echo $row['image'];?>">
                      <div><br><a class="a2" href="https://shopee.vn/<?php echo $row['ten']?>.-i.<?php echo $row['idshop']?>.<?php echo $row['itemid']; ?>"><b style="font-size: 15px"><?php echo $row["ten"]?>
                        
                      </b></a></div>
                     <div style="color: rgb(255 193 32); font-size: 15px; ">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i></i>

                        <n style="color: black;"><?php echo '(Lượt mua:'.$row["historical_sold"].')';?></n>
                    </div>
                      <div><b style="font-size: 15px;font-weight: bold;">Giá: <?php echo number_format($row["price"],2,",",".");?></b>&ensp;<del style="font-size: 15px;"><?php echo ($row["price_max_before_discount"]. ' đ');?></del></div>
                  </div>
                      <?php }} ?> 
             <!-- sendo -->
                 <?php  
              if ($numsendo > 0) {
                      while($row = mysqli_fetch_assoc($sqlsendo))
                      {
                          ?>
                    <div  style="float:right;margin-bottom:15px" class="col-lg-3 col-md-6" >
                    <img style="width: 50px;height: 50px" src="https://cdn.chanhtuoi.com/uploads/2020/02/w400/sendo.png.webp"> 
                      <img width="280px" height="280px" src="<?php echo $row['url_image'];?>">
                      <div><br><a class="a2" href="https://www.sendo.vn/<?php echo $row['product_url']; ?>"><b style="font-size: 15px"><?php echo $row["ten"]?>
                        
                      </b></a></div>
                     <div style="color: rgb(255 193 32); font-size: 15px; ">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i></i>

                        <n style="color: black;"><?php echo '( Lượt mua:'.$row["view_count"].')';?></n>
                    </div>
                      <div><b style="font-size: 15px;font-weight: bold">Giá: <?php echo number_format($row["price_max"],2,",",".");?></b>&ensp;<del style="font-size: 15px;"><?php echo number_format($row["price"],2,",",".");?></del></div>
                  </div>
                      <?php  }}?> 





</div>

  
<div style=" margin-left: 700px">
  

  <b>SỐ TRANG:</b>
  <?php  echo $num ?>
  <<a href="#" title="">NEXT>></a>
 </div> 
@endsection