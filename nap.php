<?php
  $link=@mysqli_connect("localhost","root","") or die("Không thể kết nối đến server!");
  mysqli_select_db($link,"laura-ss_db") or die("DB không tồn tại!");
  mysqli_query($link,"set names 'utf8'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" />
  <title>Osi</title>
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
        <?php echo $mang[$i];?>
        <ul style="list-style-type: none;">
          <?php
          $query2 = $query." where tinhthanh = '".$mang[$i]."'";
          $result = mysqli_query($link, $query2);
          while($arr = mysqli_fetch_array($result)){
        ?>
          <li>
            <a href="<?php echo $arr['url']; ?> " target=_blank>
              <?php 
              if($mang[$i] == "Hồ Chí Minh"){
                $arr1 = explode(",",$arr['address']);
                
                echo "<b>".$arr1[count($arr1)-2].": </b> ".$arr['address']."";
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

  <!-- -------------------- -->

  <?php 
    $query='select * from wp_he_thong_ch';
    $result = mysqli_query($link, $query);
    $mang = ['Hồ Chí Minh', 'Trà Vinh', 'dg'];
    // while($arr = mysqli_fetch_array($result)){
    //   if(!in_array($arr['tinhthanh'],$mang)){
    //       array_push($mang,$arr['tinhthanh']);
    //   }
    // }
    
  ?>


  <?php
    if(isset($_GET['tinhthanh'])){
      $query2 = $query." where tinhthanh = '".$_GET['tinhthanh']."'";
      $bien = "";
      $result = mysqli_query($link, $query2);
      if(mysqli_num_rows($result) == 0)
      $bien = "Hiện tại khu vực quý khách chọn chưa có cửa hàng, vui lòng chọ hình thức “Giao tận nơi” hoặc đặt hàng qua số (028) 3851 9999 để Laura Sunshine vận chuyển miễn phí tận nơi cho quý khách!";
    }
  ?>

  <form action="" name=" form" method="GET">
    <select name="tinhthanh" id="" onchange="form.submit()">
      <?php 
      for($i = 0; $i < count($mang);$i++){
    ?>
      <option value="<?php echo $mang[$i]; ?>"
        <?php if(isset($_GET['tinhthanh']) && $_GET['tinhthanh'] == $mang[$i]) echo "selected"; ?>>
        <?php echo $mang[$i]; ?>
      </option>

      <?php } ?>
    </select>
  </form>

  <ul>
    <?php      
          while($arr = mysqli_fetch_array($result))
          {
        ?>
    <li>

      <?php 
        echo $arr['address'];
      ?>
    </li>

    <?php } ?>
    <?php if($bien) echo '<li>'.$bien.'</li>'; ?>
  </ul>


</body>

</html>