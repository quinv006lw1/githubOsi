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
  <link rel="stylesheet" href="./hethongcuahang.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>Hệ thống cửa hàng</title>




  <style>
  #callnowbutton {
    display: none;
  }

  @media screen and (max-width:1300px) {
    #callnowbutton {
      display: block;
      height: 80px;
      position: fixed;
      width: 100%;
      left: 0;
      bottom: -20px;
      border-top: 2px solid rgba(51, 187, 51, 1);
      background: url(https://callnowbutton.com/phone/callbutton01.png) center 10px no-repeat #009900;
      text-decoration: none;
      box-shadow: 0 0 5px #888;
      -webkit-box-shadow: 0 0 5px #888;
      -moz-box-shadow: 0 0 5px #888;
      z-index: 9999;
    }
  }
  </style>

</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-sm-5">
      </div>
      <div class="col-sm-7">

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

          
        ?>
        <?php 
        $tinhthanh = "";
          if (isset($_GET['tinhthanh'])) $tinhthanh=$_GET['tinhthanh'];
            $query2 = $query . " where tinhthanh = '".$tinhthanh. "'";
            $bien = "";
            $result= mysqli_query($link, $query2);
          
            $thongbao = "";
            if (mysqli_num_rows($result)==0)
            $thongbao = 'Hiện tại '. $tinhthanh. ' chưa có cửa hàng, vui lòng gọi số  '. "<b>". "(028) 3851 9999". "</b>". " để được hỗ trợ";
          
  
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



      </div>

    </div>

    <?php while ($arr = mysqli_fetch_array($result))
        {
          $arrm = $arr['map_url'] ;
          $arrfb = $arr['facebook_url'] ;
        ?>

    <div class="row" style="margin-top: 30px">
      <div class="col-sm-5">
        <img src="<?php echo $arr['img'] ; ?>" style="width: 200px; height: 200px; margin-right:20px; float: right"
          id="left_img">
      </div>
      <div class="col-sm-5 right">
        <h3><a href="#" style="text-decoration:none"><?php echo $arr['title'] ; ?></a></h3>
        <h4 style="font-weight: bold">Địa chỉ:</h4> <span><?php echo $arr['address'] ; ?></span>
        <h4 style="font-weight: bold">Hotline:</h4>
        <?php if(str_contains($arr['phone'],"|")){
          $phone = explode("|",$arr['phone']);
        }else {
          $phone = [$arr['phone']];
        }
        for($i = 0;$i < count($phone);$i++){
        ?>

        <a href="tel:<?php echo $phone[$i] ?>"><?php echo $phone[$i] ; ?></a>
        <?php } ?>
        <div class="d-grid gap-2 d-md-block">
          <button class="btn btn-outline-primary" type="button" onclick="window.location.href='<?php echo $arrfb ?>'">
            Facebook
          </button>
          <button class="btn btn-outline-warning" type="button" onclick="window.location.href='<?php echo $arrm ?>'">
            Xem Bản Đồ
          </button>
          <a href="tel:0868295640" onclick="_gaq.push(['_trackEvent', 'Contact', 'Call Now Button', 'Phone']);"
            id="callnowbutton">&nbsp;</a>
        </div>
      </div>

    </div>
    <?php } ?>
    <?php if($thongbao) echo $thongbao ?>
  </div>






  <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
    integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
    integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
  </script>
</body>

</html>