<?php 
ob_start();
  $link = mysqli_connect("localhost","root","") or die("không thể kết nối đến server!");
  mysqli_select_db($link, "laura-ss_db") or die ("Database không tồn tại!");
  mysqli_query($link,'set names "utf8"');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="./connnect.css">
  <title>Button_Addstore</title>
</head>

<body>
  <?php 
  if(isset($_GET['id'])){
    $query = "select * from wp_he_thong_ch where id = ".$_GET['id'];
    $result = mysqli_query($link, $query);
    $store = mysqli_fetch_array($result);
  }
    
    
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
  <div class="container">

    <form action="" method="GET" name="myform">

      <select name="tinhthanh" id="" onchange="myform.submit()" class="mb-3">
        <option value="" style="display:none"></option>
        <?php 
      for($i = 0; $i < count($mang);$i++){
      ?>

        <option value="<?php echo $mang[$i]; ?>" <?php if($store['tinhthanh']==$mang[$i]) echo "selected" ; ?>>
          <?php echo $mang[$i]; ?>
        </option>
        <?php } ?>
      </select>
    </form>


    <form action="" method="POST" name="myform2">

      <div class="row mb-3">
        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">URL hình ảnh</label>
        <div class="col-sm-4">
          <input type="text" name="urlimg" class=" form-control form-control-lg" id="colFormLabelLg"
            placeholder="URL hình ảnh cửa hàng" value="<?php echo $store['img'];?>">
        </div>
      </div>

      <div class="row mb-3">
        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Tên cửa hàng</label>
        <div class="col-sm-4">
          <input type="text" name="namestore" class="form-control form-control-lg" id="colFormLabelLg"
            placeholder="Tên cửa hàng" value="<?php echo $store['title']?>">
        </div>
      </div>

      <div class="row mb-3">
        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Link trang web cửa hàng</label>
        <div class="col-sm-4">
          <input type="text" name="urlweb" class="form-control form-control-lg" id="colFormLabelLg"
            placeholder="link website cửa hàng" value="<?php echo $store['url']?>">
        </div>
      </div>


      <div class="row mb-3">
        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Địa chỉ</label>
        <div class="col-sm-4">
          <input type="text" name="address_store" class="form-control form-control-lg" id="colFormLabelLg"
            placeholder="Địa chỉ cửa hàng" value="<?php echo $store['address']?>">
        </div>
      </div>

      <div class="row mb-3">
        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Phone</label>
        <div class="col-sm-4">
          <input type="text" name="sdt" class="form-control form-control-lg" id="colFormLabelLg" placeholder="Phone"
            pattern="\d{3} \d{3} \d{4}" value="<?php echo $store['phone']?>">
          <small>Định dạng theo: 090 476 2223|090 111 2223|090 222 3334</small>
        </div>
      </div>

      <div class="row mb-3">
        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Link Fan page</label>
        <div class="col-sm-4">
          <input type="text" name="urlfb" class="form-control form-control-lg" id="colFormLabelLg"
            placeholder="Link fan page website" value="<?php echo $store['facebook_url']?>">

        </div>

      </div>

      <div class="row mb-3">
        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Link Google Map</label>
        <div class="col-sm-4">
          <input type="text" name="urlggm" class="form-control form-control-lg" id="colFormLabelLg"
            placeholder="Link Google Map" value="<?php echo $store['map_url']?>">
        </div>
      </div>
      <input type="hidden" name="tinhthanh" value="<?php echo $store['tinhthanh']; ?>">
      <button type="submit" name="submit" class="btn btn-primary">Update</button>

    </form>



    <?php 

    if(isset($_POST['submit'])){
      $id =$_GET['id'];
      $urlimg = $_POST['urlimg'];
      $namestore = $_POST['namestore'];
      $urlweb = $_POST['urlweb'];
      $address_store = $_POST['address_store'];
      $sdt = $_POST['sdt'];
      $urlfb = $_POST['urlfb'];
      $urlggm = $_POST['urlggm'];
      $tinhthanh = $_POST['tinhthanh'];

      $query="update wp_he_thong_ch 
      set img = '$urlimg',
      title = '$namestore',
      url = '$urlweb',
      address = '$address_store',
      phone = '$sdt',
      facebook_url = '$urlfb',
      map_url = '$urlggm',
      tinhthanh = '$tinhthanh'
      where id = $id
      ";
      
      if(mysqli_query($link, $query)){
        header('Location: http://localhost/codenap/addstore.php?edit_status=success');
      }
      else{
        echo $query;
      }
      
    }
  ?>

    <br>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
    integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
    integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
  </script>
</body>

</html>