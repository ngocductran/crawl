        <?php
                  
                      $conn=mysqli_connect("localhost","root","","tiki3") or die("Lỗi");
                      mysqli_set_charset($conn, "utf8");
                          $query = "SELECT * FROM goiy order by gia DESC limit 4  ";
                          $sql = mysqli_query($conn, $query);
                          $num = mysqli_num_rows($sql);
                          /* shoppe*/
                      $conn2=mysqli_connect("localhost","root","","tiki3") or die("Lỗi");
                      mysqli_set_charset($conn2, "utf8");
                          $query2 = "SELECT DISTINCT(a.id),SUBSTR(price, 1, LENGTH(price) - 5) as price , SUBSTR(ten, 1, LENGTH(ten) - 2) as ten, a.image,a.idshop,a.itemid,a.view_count,price_max_before_discount FROM shoppe a WHERE image IS NOT  NULL  ORDER BY price DESC limit 8 ";
                          $sql2 = mysqli_query($conn2, $query2);
                          $num2 = mysqli_num_rows($sql2);

                          /* giá*/


                           
                    ?>


          <!--  tiki -->
              <?php  
              if ($num > 0) {
                      while($row = mysqli_fetch_assoc($sql))
                      {
                          ?>
                    <div  style="float:right" class="col-lg-3 col-md-6" >
                    <img style="width: 50px;height: 50px" src="https://brasol.vn/public/ckeditor/uploads/thiet-ke-logo-tin-tuc/y-nghia-logo-tiki.jpg"> 
                      <img width="280px" height="280px" src="<?php echo $row['url_image'];?>">
                      <div><br><a class="a2" href="http://tiki.vn/<?php echo $row['url_path']; ?>"><b style="font-size: 15px"><?php echo $row["ten"]?></b></a></div>
                     <div style="color: rgb(255 193 32); font-size: 15px; ">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i></i>
                        <n style="color: black;"><?php echo '('.$row["review_count"].')';?></n>
                    </div>
                      <div><b style="font-size: 15px">Giá: <?php echo ($row["gia"]. ' đ');?></b>&ensp;<del style="font-size: 15px;"><?php echo ($row["giagoc"]- $row["gia"]. ' đ');?></del></div>
                  </div>
                      <?php  
                      }
                  } 
                  else {
                      echo "Không tìm thấy kết quả với từ khóa: <b>".$search."</b>";
                  }
              
              ?>  


              <!--  shopee --> 
               <?php  
              if ($num > 0) {
                      while($row = mysqli_fetch_assoc($sql2))
                      {
                          ?>
                    <div  style="float:right" class="col-lg-3 col-md-6" >
                    <img style="width: 50px;height: 50px" src="http://shopeeplus.com//upload/images/4321Shopee-logo-512x512.png"> 
                      <img width="280px" height="280px" src="https://cf.shopee.vn/file/<?php echo $row['image'];?>">
                      <div><br><a class="a2" href="https://shopee.vn/<?php echo $row['ten']?>.-i.<?php echo $row['idshop']?>.<?php echo $row['itemid']; ?>"><b style="font-size: 15px"><?php echo $row["ten"]?>
                        
                      </b></a></div>
                     <div style="color: rgb(255 193 32); font-size: 15px; ">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i></i>
                        <n style="color: black;"><?php echo '('.$row["view_count"].')';?></n>
                    </div>
                      <div><b style="font-size: 15px">Giá: <?php echo number_format($row["price"],2,",",".");?></b>&ensp;<del style="font-size: 15px;"><?php echo ($row["price_max_before_discount"]. ' đ');?></del></div>
                  </div>
                      <?php  
                      }
                  } 
                  else {
                      echo "Không tìm thấy kết quả với từ khóa: <b>".$search."</b>";
                  }
              
              ?> 

  <!--  SENDO -->