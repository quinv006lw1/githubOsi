<?php 
  $link = mysqli_connect("localhost","root","") or die("không thể kết nối đến server!");
  mysqli_select_db($link, "laura-ss_db") or die ("Database không tồn tại!");
  mysqli_query($link,'set names "utf8"');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" />
  <title>footer</title>
</head>

<body>


  <?php 
    $query='select * from wp_he_thong_ch';
    $result = mysqli_query($link, $query);
    $mang = [];
    while($arr = mysqli_fetch_array($result)){
      if(!in_array($arr['tinhthanh'],$mang)){
          array_push($mang,$arr['tinhthanh']);
      }
    }
    
  ?>
  <ul style="list-style-type: none;">
    <?php 
      for($i = 0; $i < count($mang);$i++){
    ?>
    <li><i class="fas fa-map-marker-alt">
        <?php echo $mang[$i].":";?>
        <ul style="list-style-type: disc">
          <?php
          $query2 = $query." where tinhthanh = '".$mang[$i]."'";
          $result = mysqli_query($link, $query2);
          while($arr = mysqli_fetch_array($result)){
        ?>
          <li>
            <!-- <a href="<?php //echo $arr['url']; ?> " target=_blank> -->
            <a href="pageintro/pageintrostores.php?id=<?php echo $arr['id']; ?>" target=_blank>
              <?php 
              if($mang[$i] == "Hồ Chí Minh"){
                $arr1 = explode(",",$arr['address']);
                
                echo "<b>".$arr1[count($arr1)-2].": </b> ".$arr1[count($arr1)-4].",".$arr1[count($arr1)-3]."". "<br>"."<br>";
                //echo "---------".$arr1[count($arr1)-4].",".$arr1[count($arr1)-2];
              }
              else{
                echo $arr['address'];
              }
            ?>
            </a>
          </li>

          <?php } ?>
        </ul>
      </i>
    </li>
    <?php } ?>
  </ul>


</body>

</html>