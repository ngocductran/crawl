<?php 
//index.php
$conn=mysqli_connect("localhost","root","","tiki3") or die("Lỗi");
        mysqli_set_charset($conn, "utf8");

$result = mysqli_query($conn, 'select count(id) as total from product');

        $row = mysqli_fetch_assoc($result);
        $total_records = 50;
 
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 10;

        $total_page = ceil($total_records / $limit);
 
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        $start = ($current_page - 1) * $limit;
 
        $result = mysqli_query($conn, "SELECT * FROM product LIMIT $start, $limit");


$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ ten:'".$row["ten"]."', review_count:".$row["review_count"].", gia:".$row["gia"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>
<div>
   <h2 align="center">Morris.js chart with PHP & Mysql</h2>
   <h3 align="center">Last 10 tens Profit, Purchase and Sale Data</h3>   
   <br /><br />
   <div style="border-radius: 10px;" id="chart"></div>
   <div class="agil-info-calendar">
        <div class="col-md-12 w3agile-notifications text-center" style="height: 55px; width: 100%;">
                <nav>
                    <ul class="pagination">
                    <?php 
                        if ($current_page > 1 && $total_page > 1){
                            echo '<li><a href="bar.php?page='.($current_page-1).'">&laquo;</a> </li>';
                        }
                        for ($i = 1; $i <= $total_page; $i++){
                    
                            if ($i == $current_page){
                                echo '<li><span style="color: white; background-color: #337ab7;">'.$i.'</span> </li>';
                            }
                            else{
                                echo '<li><a href="bar.php?page='.$i.'">'.$i.'</a>  </li>';
                            }
                        }
                        if ($current_page < $total_page && $total_page > 1){
                            echo '<li><a href="bar.php?page='.($current_page+1).'">&raquo;</a> </li>';
                        }
                       ?>
                   </ul>
                </nav>
        </div>
    </div>
</div>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'ten',
 ykeys:['review_count', 'gia'],
 labels:['Số lượng bán', 'Giá'],
 hideHover:'auto',
 stacked:true
});
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>