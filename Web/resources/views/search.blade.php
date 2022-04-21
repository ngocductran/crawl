
@extends('welcome')
@section('content')          
           
                        <!--  product -->

      <?php
        $conn=mysqli_connect("localhost","root","","tiki3") or die("Lỗi");
        mysqli_set_charset($conn, "utf8");

        $sort_price ="";
        $sort = isset($_GET['sort']) ? $_GET['sort'] : "";
        if (!empty($sort)) {
           $sort_price = "ORDER BY price ".$sort;
        }


        $sort_start ="";
        $sort1 = isset($_GET['sort1']) ? $_GET['sort1'] : "";
        if (!empty($sort1)) {
           $sort_start = "ORDER BY point desc";
        }


        $sort_sell ="";
        $sort2 = isset($_GET['sort2']) ? $_GET['sort2'] : "";
        if (!empty($sort2)) {
           $sort_sell = "ORDER BY review_count desc";
        }


        $sort_sell2 ="";
        $sort2 = isset($_GET['sort2']) ? $_GET['sort2'] : "";
        if (!empty($sort2)) {
           $sort_sell2 = "ORDER BY historical_sold desc";
        }

        $sort_sell3 ="";
        $sort2 = isset($_GET['sort2']) ? $_GET['sort2'] : "";
        if (!empty($sort2)) {
           $sort_sell3 = "ORDER BY view_count desc";
        }

        $result = mysqli_query($conn, "select DISTINCT count(id) as total from product WHERE (ten like '%$keywords%')");
        $row = mysqli_fetch_assoc($result);
        $records_tiki = $row['total'];

        $result = mysqli_query($conn, "select DISTINCT count(id) as total from sendo WHERE (ten like '%$keywords%')");
        $row = mysqli_fetch_assoc($result);
        $records_sendo = $row['total'];

        $result = mysqli_query($conn, "select DISTINCT count(id) as total from shoppe WHERE (ten like '%$keywords%')");
        $row = mysqli_fetch_assoc($result);
        $records_shopee = $row['total'];
 


        $total_records = $records_tiki + $records_sendo + $records_shopee;
       
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8;

        $total_page = ceil($total_records / ($limit*3));
 
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        $start = ($current_page - 1) * $limit;

        /*tiki*/
        $query = "SELECT DISTINCT * FROM product WHERE (ten like '%$keywords%') $sort_price $sort_start $sort_sell limit $start, $limit";   
          $sql = mysqli_query($conn, $query);
          $num = mysqli_num_rows($sql);

       /* SHOPPE*/
        $query2 = "SELECT DISTINCT * FROM shoppe WHERE (ten like '%$keywords%') $sort_price $sort_start $sort_sell2 limit $start, $limit";
          $sql2 = mysqli_query($conn, $query2);
          $num2 = mysqli_num_rows($sql2);

      /* sendo*/
        $querysendo = "SELECT DISTINCT * FROM sendo WHERE (ten like '%$keywords%') $sort_price $sort_start $sort_sell3 limit $start, $limit";   
        $sqlsendo = mysqli_query($conn, $querysendo);
        $numsendo = mysqli_num_rows($sqlsendo);
        

      ?>
<div>
    <div class="col-md-12" style="height: 75px; background: rgba(0,0,0,.03);">
      <div style="margin-left: 30px; padding-top: 10px;"><span style="font-weight: bold;">Sắp xếp theo</span>
            <a href="?sort1=best&txtkey=<?php echo $keywords ?>&btnsearch=<?php echo $keywords ?>&page=<?php echo $current_page ?>"><button style="height: 40px; width: 116px; margin-left: 30px; background-color: white; color: black;" type="button" class="btn text-center" value="">Tốt nhất</button></a>
            <a href="?sort2=sell&txtkey=<?php echo $keywords ?>&btnsearch=<?php echo $keywords ?>&page=<?php echo $current_page ?>"><button style="height: 40px; width: 116px; margin-left: 30px; background-color: white; color: black;" type="button" class="btn" value="">Bán chạy</button></a>
          <select  style="height: 40px; margin-left: 30px; width: 150px; padding-left: 10px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option value="">&ensp; Giá</option>
                <option value="?sort=desc&txtkey=<?php echo $keywords ?>&btnsearch=<?php echo $keywords ?>&page=<?php echo $current_page ?>">&ensp; Giá cao đến thấp</option>
                <option value="?sort=asc&txtkey=<?php echo $keywords ?>&btnsearch=<?php echo $keywords ?>&page=<?php echo $current_page ?>">&ensp; Giá thấp đến cao</option>
          </select>
      </div>   
    </div>
      <br>
     <h3 style=" font-weight:bold;color: #FE9A2E"> Có <?php echo $total_records; ?> tìm kiếm cho từ khoá: <?php echo $keywords ?></h3>
     <br>
         <?php  
            /* TIKI*/
              if ($num > 0) {
                      while($row = mysqli_fetch_assoc($sql))
                      {
                         ?>
                  <div class="col-md-3 show" style="float: left; height: 500px; padding-top: 5px;">
          
                      <img style="width: 50px;height: 50px" src="https://brasol.vn/public/ckeditor/uploads/thiet-ke-logo-tin-tuc/y-nghia-logo-tiki.jpg"> 

                      <img width="300px" height="300px" src="<?php echo $row['url_image'];?>">
                            
                      <div>
                        <br><a href="tiki?key=<?php echo $row['id']; ?>">
                            <b style="font-size: 15px"><?php echo $row["ten"]?> (-<?php   echo $row["discount_rate"] ?>%)</b></a>
                      </div>
                    <div style="font-size: 15px; ">
                        <?php 
                          if ($row['point'] >0 && $row['point'] < 1.1){
                              echo '<i style="color: rgb(255 193 32);" class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                          }
                          else if ($row['point'] >1 && $row['point'] < 2.1)
                          {
                              echo '<i style="color: rgb(255 193 32);" class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                          }
                          else if ($row['point'] >2 && $row['point'] < 3.1){
                              echo '<i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                          }
                          else if ($row['point'] >3 && $row['point'] < 4.1){
                              echo '<i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                          }
                          else if ($row['point'] >4 && $row['point'] < 5){
                              echo '<i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i class="fa fa-star"></i>';
                          }
                          else{
                              echo '<i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i>';
                          }
                       ?><?php echo '('.$row["review_count"].')';?>
                        
                    </div>
                      <div><b style="font-size: 15px; font-weight: bold">Giá: <?php echo  number_format($row["gia"],2,",",".");?></b>&ensp;<del style="font-size: 12px;"><?php echo  number_format($row["giagoc"],2,",",".");?></del>
                      </div>
                  </div>
                      <?php  
                      }
                  } 
              ?>
              <br><br>
 <!--  shopee --> 
               <?php  
              if ($num2 > 0) {
                      while($row = mysqli_fetch_assoc($sql2))
                      {
                        $gia = substr($row["price"], 0, -5);
                        $gia2 = substr($row["price_min_before_discount"], 0, -5);
                          ?>

                  <div class="col-lg-3 col-md-3 show" style="float: left; height: 500px; padding-top: 5px;">
                      <img style="width: 50px;height: 50px; border-radius:2px" src="https://dinhduongthiennhien.com/wp-content/uploads/2019/08/logo-shopee-1.jpg"> 
                      <img width="280px" height="280px" src="https://cf.shopee.vn/file/<?php echo $row['image'];?>">
                      <div><br><a href="shoppe?key=<?php echo $row['id']; ?>"><b style="font-size: 15px"><?php echo $row["ten"]?>(-
                        <?php   echo $row["discount"] ?>)
                      </b></a></div>
                     <div style="font-size: 15px; ">
                       <?php 
                          if ($row['point'] >0 && $row['point'] < 1.1){
                              echo '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                          }
                          else if ($row['point'] >1 && $row['point'] < 2.1)
                          {
                              echo '<i style="color: rgb(255 193 32);" class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                          }
                          else if ($row['point'] >2 && $row['point'] < 3.1){
                              echo '<i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                          }
                          else if ($row['point'] >3 && $row['point'] < 4.1){
                              echo '<i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                          }
                          else if ($row['point'] >4 && $row['point'] < 5){
                              echo '<i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i class="fa fa-star"></i>';
                          }
                          else{
                              echo '<i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i>';
                          }
                       ?><?php echo '('.$row["historical_sold"].')';?></n>
                    </div>
                      <div><b style="font-size: 15px; font-weight: bold">Giá: <?php echo number_format($gia,2,",",".");?></b>&ensp;<del style="font-size: 12px;"><?php echo ($gia2. ' đ');?></del></div>
                  </div>
                      <?php  
                      }
                  } 
              ?> 
              <br><br>
<!--  sendo -->
                    <?php  
              if ($numsendo > 0) {
                      while($row = mysqli_fetch_assoc($sqlsendo))
                      {
                          ?>
                  <div class="col-lg-3 col-md-3 show" style="float: left; height: 500px; padding-top: 5px;">
                    <img style="width: 50px;height: 50px" src="https://cdn.chanhtuoi.com/uploads/2020/02/w400/sendo.png.webp"> 
                      <img width="280px" height="280px" src="<?php echo $row['url_image'];?>">
                      <div><br><a href="sendo?key=<?php echo $row['id']; ?>"><b style="font-size: 15px"><?php echo $row["ten"]?>
                      (-<?php   echo $row["promotion_percent"] ?>%)
                        
                      </b></a></div>
                     <div style="font-size: 15px; ">
                        <?php 
                          if ($row['point'] >0 && $row['point'] < 1.1){
                              echo '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                          }
                          else if ($row['point'] >1 && $row['point'] < 2.1)
                          {
                              echo '<i style="color: rgb(255 193 32);" class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                          }
                          else if ($row['point'] >2 && $row['point'] < 3.1){
                              echo '<i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                          }
                          else if ($row['point'] >3 && $row['point'] < 4.1){
                              echo '<i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                          }
                          else if ($row['point'] >4 && $row['point'] < 5){
                              echo '<i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i class="fa fa-star"></i>';
                          }
                          else{
                              echo '<i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i><i style="color: rgb(255 193 32);" class="fa fa-star"></i>';
                          }
                       ?><?php echo '('.$row["view_count"].')';?>
                    </div>
                      <div><b style="font-size: 15px; font-weight: bold">Giá: <?php echo number_format($row["price_max"],2,",",".");?></b>&ensp;<del style="font-size: 12px;"><?php echo number_format($row["price"],2,",",".");?></del></div>
                  </div>
                      <?php  
                      }
                  } 
              ?>
</div>
                  </div>
                </div>
              </div>
            </div>

<div class="tab-content" style="width: 1700px; overflow-x:auto;">
  <nav>
      <ul class="pagination">
      <?php 
          if ($current_page > 1 && $total_page > 1){
              echo '<li><a href="timkiem?sort='.($sort).'&txtkey='.($keywords).'&btnsearch='.($keywords).'&page='.($current_page-1).'">&laquo;</a> </li>';
          }
          for ($i = 1; $i <= $total_page; $i++){
      
              if ($i == $current_page){
                  echo '<li class="active">'.$i.'</li>';
              }
              else{
                  echo '<li><a href="timkiem?sort='.($sort).'&txtkey='.($keywords).'&btnsearch='.($keywords).'&page='.$i.'">'.$i.'</a>  </li>';
              }
          }
          if ($current_page < $total_page && $total_page > 1){
              echo '<li><a href="timkiem?sort='.($sort).'&txtkey='.($keywords).'&btnsearch='.($keywords).'&page='.($current_page+1).'">&raquo;</a> </li>';
          }
         ?>
     </ul>
  </nav>
</div> 
@endsection