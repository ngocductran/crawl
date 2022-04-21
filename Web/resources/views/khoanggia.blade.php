
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
                  if(isset($_GET["btnBW"])){
                    $min =$_GET["minprice"];
                    $max =$_GET["maxprice"];}
                  $query = "SELECT * FROM product WHERE (ten like '$key%') having gia BETWEEN $min AND $max limit 10 ";   
                  $sql = mysqli_query($conn, $query);
                  $num = mysqli_num_rows($sql);


        /* shoppe*/
         $conn2=mysqli_connect("localhost","root","","tiki3") or die("Lỗi");
          mysqli_set_charset($conn2, "utf8");
          $query2 = "SELECT DISTINCT(a.ten),SUBSTR(price, 1, LENGTH(price) - 5) as price , SUBSTR(ten, 1, LENGTH(ten) - 1) as ten, a.image,a.idshop,a.itemid,a.view_count, SUBSTR( price_min_before_discount, 1, LENGTH( price_min_before_discount) - 5) as price_min_before_discount, historical_sold FROM shoppe a   WHERE a.ten like'$key%' having price between $min and $max  ORDER BY price DESC   limit 10";
          $sql2 = mysqli_query($conn2, $query2);
          $num2 = mysqli_num_rows($sql2);

        /*sendo*/
           $connsendo=mysqli_connect("localhost","root","","tiki3") or die("Lỗi");
                      mysqli_set_charset($connsendo, "utf8");
           $querysendo = "SELECT * FROM sendo WHERE (ten like '$key%') having price BETWEEN $min AND $max limit 10";
                          $sqlsendo = mysqli_query($connsendo, $querysendo);
                          $numsendo = mysqli_num_rows($sqlsendo);

       

                        

      ?>

     <h3 style=" font-weight:bold;color: #FE9A2E"> Từ khóa tìm kiếm : <?php echo $key ;?> </h3>



     <!-- TIKI -->

          <?php  
              if ($num > 0) {
                      while($row = mysqli_fetch_assoc($sql))
                      {
                         ?>
             
                  <div  style="float:left" class="col-lg-3 col-md-12" >        
                    <img style="width: 50px;height: 50px" src="https://brasol.vn/public/ckeditor/uploads/thiet-ke-logo-tin-tuc/y-nghia-logo-tiki.jpg"> 
                      <img width="300px" height="300px" src="<?php echo $row['url_image'];?>">
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
                      <div><b style="font-size: 15px; font-weight: bold">Giá: <?php echo ($row["gia"]. ' đ');?></b>&ensp;<del style="font-size: 15px;"><?php echo ($row["giadiscount"]. ' đ');?></del>
                      </div>
                    </div>
                      <?php  
                      }
                  } 
                  else {
                      echo "Không tìm thấy kết quả với từ khóa: <b>".$row['txtsearch']."</b>";
                  }
              
              ?> 
<!--  end -->   
            <!-- shoppe -->
               <?php  
              if ($num2 > 0) {
                      while($row = mysqli_fetch_assoc($sql2))
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
                      <div><b style="font-size: 15px">Giá: <?php echo number_format($row["price"],2,",",".");?></b>&ensp;<del style="font-size: 15px;"><?php echo ($row["price_min_before_discount"]. ' đ');?></del></div>
                  </div>
                      <?php  
                      }
                  } 
                 
              
              ?> 
 <!--  end shoppe -->

 <!--  sendo -->
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
                      <div><b style="font-size: 15px">Giá: <?php echo ($row["price_max"]);?></b>&ensp;<del style="font-size: 15px;"><?php echo ($row["price"]. ' đ');?></del></div>
                  </div>
                      <?php  
                      }
                  } 
               
              ?> 



</div>
  
<div style=" margin-left: 700px">
  

  <b>SỐ TRANG:</b>
  <?php  echo $num ?>
  <<a href="#" title="">NEXT>></a>
 </div> 

@endsection