<?php 
  $link = mysqli_connect("localhost","root","") or die("không thể kết nối đến server!");
  mysqli_select_db($link, "laura-ss_db") or die ("Database không tồn tại!");
  mysqli_query($link,'set names "utf8"');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./pageintrostores.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <title>PageIntroStores</title>
</head>

<body>
  <?php 
    if (isset($_GET['id'])) $id = $_GET['id'];
    $query='select * from wp_he_thong_ch where id = '.$id;
    $result = mysqli_query($link, $query);
    $mang = [];
    while($arr = mysqli_fetch_array($result)){
      $arr1 = explode(",",$arr['address']);
   
  ?>

  <div class="top">
    <div class="row">
      <div class="section_about_content col-md-12 imglogo">
        <div class="row">
          <div class="col-md-12" style="text-align: center">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                  aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                  aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                  aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active text_top_logo">
                  <img src="<?php echo $arr['img']?>" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                  <img src="<?php echo $arr['img']?>" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                  <img src="<?php echo $arr['img']?>" class="d-block w-100" alt="..." />
                  <div class="carousel-caption d-none d-md-block text_top_logo"></div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden"></span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden"></span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="bodyheader1">
      <div class="row">
        <div class="col-sm-6 textbodyheader1">
          Cửa hàng Laura Sunshine – <i><?php echo $arr1[count($arr1)-4].",".$arr1[count($arr1)-2] ?></i> là một
          trong số những
          <a style="text-decoration: none">cửa hàng thuộc hệ thống
            Laura
            Sunshine</a>.
          Địa
          chỉ cửa hàng
          ở <font style=" font-weight: bold"><?php echo $arr['address']?></font>
          </p>
          <p>
            Cửa hàng chính thức đi vào hoạt động từ ngày 01-01-2020, thời gian
            hoạt động từ 8h sáng đến 21h đêm. Và vào đêm khai trương ngày
            07-06-2020, chúng tôi cũng có một buổi Livestream với sự góp mặt
            cửa Ca sĩ/Diễn viên<font style=" font-weight: bold"> NHẬT KIM ANH</font>, để nói về các sản phẩm chăm sóc
            da
          </p>
        </div>
        <div class="col-sm-6 imgbodyheader1">
          <img src="<?php echo $arr['img']?>" style="height: 400px; width: 100%" />
        </div>
      </div>
    </div>

    <div class="bodyheader1">
      <div class="row">
        <div class="col-sm-6 imgbodyheader1">
          <img src="<?php echo $arr['img']?>" style="height: 400px; width: 100%" />
        </div>
        <div class="col-sm-6 textbodyheader1">
          <p>
            Với đội ngũ nhân viên chuyên nghiệp, tâm huyết và được đào tạo bài
            bản. Với mục tiêu trở thành người bạn thân thiết với khách hàng,
            Laura Sunshine – <i><?php echo $arr1[count($arr1)-4].",".$arr1[count($arr1)-2] ?></i> đang trên đà xây dựng
            và phát triển mạnh mẽ. Chúng tôi mong muốn mang đến cho quý khách
            hàng những sản phẩm dịch vụ tốt nhất với những mặt hàng chất lượng
            và mức giá hợp lý nhất.
          </p>
        </div>
      </div>
    </div>

    <div class="bodyheader1">
      <div class="row">
        <div class="col-sm-6 textbodyheader2">
          <div class="elementor-text-editor elementor-clearfix">
            <p style="text-align: center">
              <span style="text-decoration: underline; font-size: 120%"><strong><span
                    style="color: #000000; text-decoration: underline">TẤT CẢ SẢN PHẨM CỬA LAURA SUNSHINE ĐỀU ĐƯỢC SẢN
                    XUẤT TẠI
                    HÀN QUỐC VÀ PHÁP</span></strong></span>
            </p>
            <p style="text-align: center">
              <span style="text-decoration: underline; font-size: 120%"><strong><span
                    style="color: #000000; text-decoration: underline">VỚI NHỮNG TIÊU CHUẨN – QUY TRÌNH KIỂM TRA KỸ
                    LƯỠNG</span></strong></span>
            </p>
            <p>
              <span style="font-size: 100%; color: #000000">Khi đến cửa hàng
                <i>Laura Sunshine – <?php echo $arr1[count($arr1)-4].",".$arr1[count($arr1)-2] ?></i>, khách hàng
                sẽ được:</span>
            </p>
            <ul>
              <li>
                <span style="font-size: 100%; color: #000000">Soi da miễn phí.</span>
              </li>
              <li>
                <span style="font-size: 100%; color: #000000">Tư vấn và giải đáp thắc mắc.</span>
              </li>
              <li>
                <span style="font-size: 100%; color: #000000">Nhận những phần quà hấp dẫn.</span>
              </li>
            </ul>

          </div>
        </div>
        <div class="col-sm-6 imgbodyheader1">
          <img src="<?php echo $arr['img']?>" style="height: 400px; width: 100%" />
        </div>
      </div>
    </div>



    <footer>
      <div class="row">
        <div class="col-sm-6 mapbodyheader4">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7877.578071067254!2d105.156712!3d9.173494!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfc07dd3d4caf424!2zTGF1cmEgU3Vuc2hpbmUgQ8OgIE1hdSAoTeG7uSBwaOG6qW0gTmjhuq10IEtpbSBBbmggQ8OgIE1hdSk!5e0!3m2!1svi!2s!4v1617203675197!5m2!1svi!2s"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>


        <div class="col-sm-4 textfooter">
          <div class="max-height" style="padding: 30px 60px">
            <big style="color: red; font-size: 15">THÔNG TIN LIÊN HỆ</big>
            <div style="line-height: 2">
              <address style="line-height: 2; font-size: 16px; color: #2b2020; ">
                <p style="color: #fff">CỬA HÀNG LAURA SUNSHINE</p><br />
                <big><b>Địa chỉ: </b></big><?php echo $arr['address']?><br />
                <big><b>Hotline: </b></big> (028) 3851 9999<br />
              </address>
              <address style=" line-height: 1.7; font-size: px; color: #ffffff">

                <a href="https://www.facebook.com/NhatKimAnh.MyPhamLauraSunshine/" class="fa fa-facebook"></a>
                <a href="https://laura-sunshine.com/" class="fa fa-google"></a>
              </address>
              <address style="line-height: 1.7; font-size: px; color: #ffffff"></address>
              <address style="line-height: 1.7; font-size: px; color: #ffffff"></address>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <?php } ?>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
    integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
    integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
  </script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=&v=weekly" async>
  </script> -->
</body>

</html>