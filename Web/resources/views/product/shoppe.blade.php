@extends('welcome')
@section('content')



<?php 
	$conn=mysqli_connect("localhost","root","","tiki3") or die("Lỗi");
    mysqli_set_charset($conn, "utf8");

 	$key = $_GET["key"];
		$sql = "select * from shoppe where id ='$key'";
		$result = mysqli_query($conn,$sql);
		//Lấy từng hàng của table result
		$row=mysqli_fetch_assoc($result);

    $gia = substr($row["price"], 0, -5);
    $gia2 = substr($row["price_min_before_discount"], 0, -5);
?>
<div class="row">
    <div class="col-md-5 col-sm-5 text-center">
        <img width="100%" height="700" src="https://cf.shopee.vn/file/<?php echo $row['image'];?>">
    </div>
    <div class="col-md-7 col-sm-7">
    	<br>
    	
    	<a style="font-size: 27px;" href="https://shopee.vn/<?php echo $row['ten']?>.-i.<?php echo $row['idshop']?>.<?php echo $row['itemid']; ?>"><b><?php echo $row["ten"]?></b></a><br><br>
        <div>
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
        </div><br>
        <div><b><?php echo ($gia. ' đ');?></b>&ensp;<del style="font-size: 9px;"><?php echo ($gia2. ' đ');?></del>&ensp;&ensp;&ensp;&ensp; <span style="color: red;"><?php echo ("-".$row["discount"].' %'); ?></span></div>
        <br><?php echo $row["mota"]; ?>
    </div>
</div>


@endsection