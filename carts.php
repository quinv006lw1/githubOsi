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
  <title>Cart</title>
</head>

<body>
  <?php 
    $query='select * from wp_he_thong_ch';
    $result = mysqli_query($link, $query);
    $mang = ['Hồ Chí Minh', 'Đà Nẵng', 'An Giang', 'Bà Rịa - Vũng Tàu', 'Bắc Giang', 'Bắc Kạn',
            'Bạc Liêu', 'Bắc Ninh', 'Bến Tre', 'Bình Định', 'Bình Dương', 'Bình Phước','Bình Thuận', 'Cà Mau',
            'Cần Thơ', 'Cao Bằng', 'Đắk Lắk', 'Đắk Nông', 'Điện Biên', 'Đồng Nai', 'Đồng Tháp', 'Gia lai', 
            'Hà Giang', 'Hà Nam', 'Hà Tĩnh', 'Hải Dương', 'Hải Phòng', 'Hậu Giang', 'Hòa Bình', 'Hưng Yên', 'Khánh Hòa',
            'Kiên Giang', 'Kiên Giang','Kon Tum', 'Lai Châu', 'Lâm Đồng', 'Lạng Sơn', 'Lào Cai', 'Long An', 'Nam Đinh',
            'Nghệ An', 'Ninh Bình', 'Ninh Thuận', 'Phú Thọ', 'Phú Yên', 'Quảng Bình','Quảng Nam', 'Quảng Ngãi', 'Quảng Ninh',
            'Quảng Trị', 'Sóc Trăng', 'Sơn La', 'Tây Ninh', 'Thái Bình', 'Thái Nguyên', 'Thanh Hóa', 'Thừa Thiên Huế',
            'Tiền Giang', 'Trà Vinh', 'Tuyên Quang', 'Vĩnh Long', 'Vĩnh Phúc', 'Yên Bái'];
    // $mang=[];
    // while($arr = mysqli_fetch_array($result)){
    //   if(!in_array($arr['tinhthanh'],$mang)){
    //       array_push($mang,$arr['tinhthanh']);
    //   }
    // }
    
  ?>
  <?php 
  $tinhthanh ="";
    if (isset($_GET['tinhthanh'])) $tinhthanh=$_GET['tinhthanh'];
      $query2 = $query . " where tinhthanh = '".$tinhthanh. "'";
      $bien = "";
      $result= mysqli_query($link, $query2);
     
      if (mysqli_num_rows($result)==0)
      $bien = 'Hiện tại khu vực quý khách chọn chưa có cửa hàng, vui lòng chọn hình thức "Giao tận nơi" hoặc đặt hàng qua
        số '. "<b>". "(028) 3851 9999". "</b>". " để Laura Sunshine vận chuyển miến phí tận nơi cho quý khách! ";
    
  ?>

  <form action="" method="GET" name="myform">

    <select name="tinhthanh" id="" onchange="myform.submit()">
      <option></option>
      <?php 
      for($i = 0; $i < count($mang);$i++){
      ?>
      <option value="<?php echo $mang[$i]; ?>"
        <?php if(isset($_GET['tinhthanh']) && $_GET['tinhthanh']==$mang[$i]) echo "selected" ; ?>>
        <?php echo $mang[$i]; ?>
      </option>
      <?php } ?>
    </select>
  </form>

  <ul>
    <?php while ($arr = mysqli_fetch_array($result))
    {
    ?>
    <li>
      <?php echo $arr['address'] ; ?>
    </li>
    <?php } ?>
    <?php if($bien) echo '<li>'.$bien.'</li>'; ?>
  </ul>


</body>

</html>