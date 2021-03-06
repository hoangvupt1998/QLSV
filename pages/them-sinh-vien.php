<?php 

// create session
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['level']))
{
  // include file
  include('../layouts/header.php');
  include('../layouts/topbar.php');
  include('../layouts/sidebar.php');

  // create  var default
  $maNhanVien = "MNV" . time();

  // show data
  // ----- Quốc tịch
  $quocTich = "SELECT id, ten_quoc_tich FROM quoc_tich";
  $resultQuocTich = mysqli_query($conn, $quocTich);
  $arrQuocTich = array();
  while ($rowQuocTich = mysqli_fetch_array($resultQuocTich)) 
  {
    $arrQuocTich[] = $rowQuocTich;
  }

  // ----- Tôn giáo
  $tonGiao = "SELECT id, ten_ton_giao FROM ton_giao";
  $resultTonGiao = mysqli_query($conn, $tonGiao);
  $arrTonGiao = array();
  while ($rowTonGiao = mysqli_fetch_array($resultTonGiao)) 
  {
    $arrTonGiao[] = $rowTonGiao;
  }

  // ----- Dân tộc
  $danToc = "SELECT id, ten_dan_toc FROM dan_toc";
  $resultDanToc = mysqli_query($conn, $danToc);
  $arrDanToc = array();
  while ($rowDanToc = mysqli_fetch_array($resultDanToc)) 
  {
    $arrDanToc[] = $rowDanToc;
  }
  // ----- Xuất Thân
  $xuatThan = "SELECT id, xuat_than FROM xuatthan";
  $resultXuatThan = mysqli_query($conn, $xuatThan);
  $arrXuatThan = array();
  while ($rowXuatThan = mysqli_fetch_array($resultXuatThan)) 
  {
    $arrXuatThan[] = $rowXuatThan;
  }
  // ----- Xuất Thân
  $phuongThuc = "SELECT id, ten_phuongthuc FROM phuongthuc_xettuyen";
  $resultPhuongThuc = mysqli_query($conn, $phuongThuc);
  $arrPhuongThuc = array();
  while ($rowPhuongThuc = mysqli_fetch_array($resultPhuongThuc)) 
  {
    $arrPhuongThuc[] = $rowPhuongThuc;
  }
  //
  $khoaHoc = "SELECT id, ten_khoahoc FROM khoa_hoc";
  $resultkhoaHoc = mysqli_query($conn, $khoaHoc);
  $arrkhoaHoc = array();
  while ($rowkhoaHoc = mysqli_fetch_array($resultkhoaHoc)) 
  {
    $arrkhoaHoc[] = $rowkhoaHoc;

  }


  // ----- Loại sinh viên
  $loaiNhanVien = "SELECT id, ten_chinh_sach FROM chinh_sach";
  $resultLoaiNhanVien = mysqli_query($conn, $loaiNhanVien);
  $arrLoaiNhanVien = array();
  while ($rowLoaiNhanVien = mysqli_fetch_array($resultLoaiNhanVien)) 
  {
    $arrLoaiNhanVien[] = $rowLoaiNhanVien;
  }

  // ----- Trình độ
  $trinhDo = "SELECT id, ten_nam_sinh_vien FROM nam_sinh_vien";
  $resultTrinhDo = mysqli_query($conn, $trinhDo);
  $arrTrinhDo = array();
  while ($rowTrinhDo = mysqli_fetch_array($resultTrinhDo)) 
  {
    $arrTrinhDo[] = $rowTrinhDo;
  }

  // ----- Chuyên môn
  $chuyenMon = "SELECT id, ten_lop FROM lop";
  $resultChuyenMon = mysqli_query($conn, $chuyenMon);
  $arrChuyenMon = array();
  while ($rowChuyenMon = mysqli_fetch_array($resultChuyenMon)) 
  {
    $arrChuyenMon[] = $rowChuyenMon;
  }

  // ----- Bằng cấp
  $bangCap = "SELECT id, ten_noi_tot_nghiep FROM noi_tot_nghiep";
  $resultBangCap = mysqli_query($conn, $bangCap);
  $arrBangCap = array();
  while ($rowBangCap = mysqli_fetch_array($resultBangCap)) 
  {
    $arrBangCap[] = $rowBangCap;
  }

  // ----- Phòng ban
  $phongBan = "SELECT id, ten_khoa FROM khoa";
  $resultPhongBan = mysqli_query($conn, $phongBan);
  $arrPhongBan = array();
  while ($rowPhongBan = mysqli_fetch_array($resultPhongBan)) 
  {
    $arrPhongBan[] = $rowPhongBan;
  }

  // ----- Chức vụ
  $chucVu = "SELECT id, ten_chuc_vu FROM chuc_vu";
  $resultChucVu = mysqli_query($conn, $chucVu);
  $arrChucVu = array();
  while ($rowChucVu = mysqli_fetch_array($resultChucVu)) 
  {
    $arrChucVu[] = $rowChucVu;
  }

  // ----- Hôn sinh
  $honNhan = "SELECT id, ten_tinh_trang FROM tinh_trang_hon_nhan";
  $resultHonNhan = mysqli_query($conn, $honNhan);
  $arrHonNhan = array();
  while ($rowHonNhan = mysqli_fetch_array($resultHonNhan)) 
  {
    $arrHonNhan[] = $rowHonNhan;
  }


  // chuc nang them nhan vien
  if(isset($_POST['save']))
  {
    // tao bien bat loi
    $error = array();
    $success = array();
    $showMess = false;

    // lay du lieu ve
    $khoaHoc= $_POST['khoaHoc'];
    $soDienThoai = $_POST['soDienThoai'];
    $Email= $_POST['Email'];
    $soTruong=$_POST['soTruong'];
    $phuongThuc=$_POST['phuongThuc'];
    $diemXetTuyen=$_POST['diemXetTuyen'];
    $maSinhVien = $_POST['maSinhVien'];
    $hoSinhVien = $_POST['hoSinhVien'];
    $tenNhanVien = $_POST['tenNhanVien'];
    $bietDanh = $_POST['bietDanh'];
    $honNhan = $_POST['honNhan'];
    $CMND = $_POST['CMND'];
    $ngayCap = $_POST['ngayCap'];
    $noiCap = $_POST['noiCap'];
    $ngayVaoDoan = $_POST['ngayVaoDoan'];
    $quocTich = $_POST['quocTich'];
    $tonGiao = $_POST['tonGiao'];
    $danToc = $_POST['danToc'];
    $loaiNhanVien = $_POST['loaiNhanVien'];
    $bangCap = $_POST['bangCap'];
    $trangThai = $_POST['trangThai'];
    $gioiTinh = $_POST['gioiTinh'];
    $ngaySinh = $_POST['ngaySinh'];
    $noiSinh = $_POST['noiSinh'];
    $nguyenQuan = $_POST['nguyenQuan'];
    $hoKhau = $_POST['hoKhau'];
    $tamTru = $_POST['tamTru'];
    $phongBan = $_POST['phongBan'];
    $xuatThan =$_POST['xuatThan'];
    $chucVu = $_POST['chucVu'];
    $trinhDo = $_POST['trinhDo'];
    $chuyenMon = $_POST['chuyenMon'];
    $tenBo=$_POST['tenBo'];
    $ngheBo=$_POST['ngheBo'];
    $ngaySinhBo=$_POST['ngaySinhBo'];
    $soBo=$_POST['soBo'];
    $tenMe=$_POST['tenMe'];
    $ngheMe=$_POST['ngheMe'];
    $ngaySinhMe=$_POST['ngaySinhMe'];
    $soMe=$_POST['soMe'];
    $id_user = $row_acc['id'];
    $ngayTao = date("Y-m-d H:i:s");
   
    // cau hinh o chon anh
    $hinhAnh = $_FILES['hinhAnh']['name'];
    $target_dir = "../uploads/staffs/";
    $target_file = $target_dir . basename($hinhAnh);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//

    // validate

    if(empty($soDienThoai))
      $error['soDienThoai'] = 'error';
    if(empty($maSinhVien))
      $error['maSinhVien'] = 'error';
      if(empty($hoSinhVien))
      $error['hoSinhVien'] = 'error';
    if(empty($tenNhanVien))
      $error['tenNhanVien'] = 'error';
    if($honNhan == 'chon')
      $error['honNhan'] = 'error';
    if(empty($CMND))
      $error['CMND'] = 'error';
    if(empty($noiCap))
      $error['noiCap'] = 'error';
    if($quocTich == 'chon')
      $error['quocTich'] = 'error';
    if($danToc == 'chon')
      $error['danToc'] = 'error';
    if($loaiNhanVien == 'chon')
      $error['loaiNhanVien'] = 'error';
    if($trangThai == 'chon')
      $error['trangThai'] = 'error';
    if($gioiTinh == 'chon')
      $error['gioiTinh'] = 'error';
    if(empty($hoKhau))
      $error['hoKhau'] = 'error';
    if($phongBan == 'chon')
      $error['phongBan'] = 'error';
    if($chucVu == 'chon')
      $error['chucVu'] = 'error';
    if($trinhDo == 'chon')
      $error['trinhDo'] = 'error';
    if($xuatThan == 'chon')
    $error['xuatThan'] = 'error';
    if($phuongThuc == 'chon')
    $error['phuongThuc'] = 'error';
    
   // validate file
    if($hinhAnh)
    {
      if($_FILES['hinhAnh']['size'] > 50000000)
        $error['kichThuocAnh'] = 'error';
      if($imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'png' && $imageFileType != 'gif')
        $error['kieuAnh'] = 'error';
    }
    if(!$error)
    {
      
      if($hinhAnh)
      {
        $imageName = time() . "." . $imageFileType;
        $moveFile = $target_dir . $imageName;

        // insert data
        $insert = "INSERT INTO sinhvien(ma_sv, hinh_anh,ho_sv, ten_sv, biet_danh, gioi_tinh, ngay_sinh, noi_sinh, so_dienthoai, email, so_truong, phuong_thuc_id, diem_xettuyen, hon_nhan_id, so_cmnd, noi_cap_cmnd, ngay_cap_cmnd, nguyen_quan, quoc_tich_id, ton_giao_id, dan_toc_id, ho_khau, tam_tru, xuat_than_id, chinh_sach_id, nam_sinh_vien_id, lop_id, noi_tot_nghiep_id, ngay_vao_doan, khoa_id, chuc_vu_id, hoten_bo, nghenghiep_bo, ngaysinh_bo, sdt_bo,  hoten_me, nghenghiep_me, ngaysinh_me, sdt_me, trang_thai, nguoi_tao_id, ngay_tao, nguoi_sua_id, ngay_sua, ma_sinhvien, khoahoc_id ) VALUES('$maNhanVien', '$imageName','$hoSinhVien', '$tenNhanVien', '$bietDanh', '$gioiTinh', '$ngaySinh', '$noiSinh', '$soDienThoai', '$Email', '$soTruong', '$phuongThuc', '$diemXetTuyen', '$honNhan', '$CMND', '$noiCap', '$ngayCap', '$nguyenQuan', '$quocTich', '$tonGiao', '$danToc', '$hoKhau', '$tamTru','$xuatThan', '$loaiNhanVien', '$trinhDo', '$chuyenMon', '$bangCap', '$ngayVaoDoan', '$phongBan', '$chucVu', '$tenBo', '$ngheBo','$ngaySinhBo','$soBo', '$tenMe', '$ngheMe', '$ngaySinhMe', '$soMe', '$trangThai', '$id_user', '$ngayTao', '$id_user', '$ngayTao', '$maSinhVien','$khoaHoc')";
        $result = mysqli_query($conn, $insert);
        // echo $insert;
        // die;
        if($result)
        {
          $showMess = true;
          // move image
          move_uploaded_file($_FILES["hinhAnh"]["tmp_name"], $moveFile);

          $success['success'] = 'Thêm sinh viên thành công';
          echo '<script>setTimeout("window.location=\'them-sinh-vien.php?p=staff&a=add-staff\'",1000);</script>';
        }
      }
      else
      {
        $showMess = true;
        $hinhAnh = "demo-3x4.jpg";
        // insert data
        $insert = "INSERT INTO sinhvien(ma_sv, hinh_anh, ho_sv, ten_sv, biet_danh, gioi_tinh, ngay_sinh, noi_sinh, so_dienthoai, email, so_truong, phuong_thuc_id, diem_xettuyen, hon_nhan_id, so_cmnd, noi_cap_cmnd, ngay_cap_cmnd, nguyen_quan, quoc_tich_id, ton_giao_id, dan_toc_id, ho_khau, tam_tru, xuat_than_id, chinh_sach_id, nam_sinh_vien_id, lop_id, noi_tot_nghiep_id, ngay_vao_doan, khoa_id, chuc_vu_id, hoten_bo, nghenghiep_bo, ngaysinh_bo, sdt_bo,  hoten_me, nghenghiep_me, ngaysinh_me, sdt_me, trang_thai, nguoi_tao_id, ngay_tao, nguoi_sua_id, ngay_sua, ma_sinhvien, khoahoc_id ) VALUES('$maNhanVien', '$hinhAnh','$hoSinhVien', '$tenNhanVien', '$bietDanh', '$gioiTinh', '$ngaySinh', '$noiSinh', '$soDienThoai', '$Email', '$soTruong', '$phuongThuc', '$diemXetTuyen', '$honNhan', '$CMND', '$noiCap', '$ngayCap', '$nguyenQuan', '$quocTich', '$tonGiao', '$danToc', '$hoKhau', '$tamTru', '$xuatThan', '$loaiNhanVien', '$trinhDo', '$chuyenMon', '$bangCap', '$ngayVaoDoan', '$phongBan', '$chucVu', '$tenBo', '$ngheBo','$ngaySinhBo','$soBo', '$tenMe', '$ngheMe', '$ngaySinhMe', '$soMe', '$trangThai', '$id_user', '$ngayTao', '$id_user', '$ngayTao', '$maSinhVien','$khoaHoc')";
        $result = mysqli_query($conn, $insert);
        // echo $insert;
        // die;
        if($result)
        {
          $success['success'] = 'Thêm sinh viên thành công';
          echo '<script>setTimeout("window.location=\'them-sinh-vien.php?p=staff&a=add-staff\'",1000);</script>';
        }
      }
    }
  }

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm mới sinh viên
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Tổng quan</a></li>
        <li><a href="them-sinh-vien.php?p=staff&a=add-staff">Sinh viên</a></li>
        <li class="active">Thêm mới sinh viên</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Thêm mới sinh viên</h3> &emsp;
              <small>Những ô nhập có dấu <span style="color: red;">*</span> là bắt buộc</small>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php 
                // show error
                if($row_acc['quyen'] != 1) 
                {
                  echo "<div class='alert alert-warning alert-dismissible'>";
                  echo "<h4><i class='icon fa fa-ban'></i> Thông báo!</h4>";
                  echo "Bạn <b> không có quyền </b> thực hiện chức năng này.";
                  echo "</div>";
                }
              ?>

              <?php 
                // show success
                if(isset($success)) 
                {
                  if($showMess == true)
                  {
                    echo "<div class='alert alert-success alert-dismissible'>";
                    echo "<h4><i class='icon fa fa-check'></i> Thành công!</h4>";
                    foreach ($success as $suc) 
                    {
                      echo $suc . "<br/>";
                    }
                    echo "</div>";
                  }
                }
              ?>
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Mã sinh viên: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="maNhanVien" value="<?php echo $maNhanVien; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Mã sinh viên <span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập mã sinh viên" name="maSinhVien" value="<?php echo isset($_POST['maSinhVien']) ? $_POST['maSinhVien'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['maSinhVien'])){ echo "Mã sinh viên không được để trống"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Họ và tên đệm sinh viên <span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sinh viên" name="hoSinhVien" value="<?php echo isset($_POST['hoSinhVien']) ? $_POST['hoSinhVien'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['hoSinhVien'])){ echo "Họ và tên đệm sinh viên không được để trống"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Tên sinh viên <span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sinh viên" name="tenNhanVien" value="<?php echo isset($_POST['tenNhanVien']) ? $_POST['tenNhanVien'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['tenNhanVien'])){ echo "Tên sinh viên không được để trống"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Biệt danh: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập biệt danh" name="bietDanh" value="<?php echo isset($_POST['bietDanh']) ? $_POST['bietDanh'] : ''; ?>">
                    </div>
                    <div class="form-group">
                      <label>Tình trạng hôn nhân <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="honNhan">
                        <option value="chon">--- Chọn tình trạng hôn nhân ---</option>
                        <?php 
                          foreach ($arrHonNhan as $hn)
                          {
                            echo "<option value='".$hn['id']."'>".$hn['ten_tinh_trang']."</option>";
                          }
                        ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['honNhan'])){ echo "Vui lòng chọn tình trạng hôn sinh"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Số CMND <span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập số CMND" name="CMND" value="<?php echo isset($_POST['CMND']) ? $_POST['CMND'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['CMND'])){ echo "Vui lòng nhập số CMND"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Ngày cấp <span style="color: red;">*</span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập nơi cấp" name="ngayCap" value="<?php echo date("Y-m-d"); ?>">
                    </div>
                    <div class="form-group">
                      <label>Nơi cấp <span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập nơi cấp" name="noiCap" value="<?php echo isset($_POST['noiCap']) ? $_POST['noiCap'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['noiCap'])){ echo "Vui lòng nhập nơi cấp"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Quốc tịch <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="quocTich">
                      <option value="chon">--- Chọn quốc tịch ---</option>
                      <?php 
                        foreach ($arrQuocTich as $qt)
                        {
                          echo "<option value='".$qt['id']."'>".$qt['ten_quoc_tich']."</option>";
                        }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['quocTich'])){ echo "Vui lòng chọn quốc tịch"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Tôn giáo: </label>
                      <select class="form-control" name="tonGiao">
                      <?php 
                      foreach ($arrTonGiao as $tg)
                      {
                        echo "<option value='".$tg['id']."'>".$tg['ten_ton_giao']."</option>";
                      }
                      ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Dân tộc <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="danToc">
                      <option value="chon">--- Chọn dân tộc ---</option>
                      <?php 
                      foreach ($arrDanToc as $dt)
                      {
                        echo "<option value='".$dt['id']."'>".$dt['ten_dan_toc']."</option>";
                      }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['danToc'])){ echo "Vui lòng chọn dân tộc"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Diện chính sách <span style="color: red;">*</span> : </label>
                      <select class="form-control" name="loaiNhanVien">
                      <option value="chon">--- Chọn diện chính sách ---</option>
                      <?php 
                        foreach ($arrLoaiNhanVien as $lnv)
                        {
                          echo "<option value='".$lnv['id']."'>".$lnv['ten_chinh_sach']."</option>";
                        }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['loaiNhanVien'])){ echo "Vui lòng chọn loại sinh viên"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Nơi tốt nghiệp: </label>
                      <select class="form-control" name="bangCap">
                      <?php 
                        foreach ($arrBangCap as $bc)
                        {
                          echo "<option value='".$bc['id']."'>".$bc['ten_noi_tot_nghiep']."</option>";
                        }
                      ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Ngày vào đoàn <span style="color: red;">*</span>: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập vào đoàn" name="ngayVaoDoan" value="<?php echo date("Y-m-d"); ?>">
                    </div>
                   
                    
                    <div class="form-group">
                      <label>Phương thức xét tuyển <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="phuongThuc">
                      <option value="chon">--- Chọn phương thức xét tuyển ---</option>
                      <?php 
                        foreach ($arrPhuongThuc as $qt)
                        {
                          echo "<option value='".$qt['id']."'>".$qt['ten_phuongthuc']."</option>";
                        }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['phuongThuc'])){ echo "Vui lòng chọn phương thức xét tuyển"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Điểm xét tuyển: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập điểm" name="diemXetTuyen" value="<?php echo isset($_POST['diemXetTuyen']) ? $_POST['diemXetTuyen'] : ''; ?>">
                    </div>
                    <div class="form-group">
                      <label>Khoa <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="phongBan">
                      <option value="chon">--- Chọn khoa ---</option>
                      <?php 
                        foreach ($arrPhongBan as $pb)
                        {
                          echo "<option value='".$pb['id']."'>".$pb['ten_khoa']."</option>";
                        }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['phongBan'])){ echo "Vui lòng chọn phòng ban"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Chức vụ <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="chucVu">
                      <option value="chon">--- Chọn chức vụ ---</option>
                      <?php 
                      foreach ($arrChucVu as $cv)
                      {
                        echo "<option value='".$cv['id']."'>".$cv['ten_chuc_vu']."</option>";
                      }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['chucVu'])){ echo "Vui lòng chọn chức vụ"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Sinh viên năm <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="trinhDo">
                      <option value="chon">--- Chọn sinh viên năm ---</option>
                      <?php 
                        foreach ($arrTrinhDo as $td)
                        {
                          echo "<option value='".$td['id']."'>".$td['ten_nam_sinh_vien']."</option>";
                        }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['trinhDo'])){ echo "Vui lòng chọn sinh viên năm"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Khoá <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="khoaHoc">
                      <option value="chon">--- Chọn khoá học ---</option>
                      <?php 
                        foreach ($arrkhoaHoc as $td)
                        {
                           echo "<option value='".$td['id']."'>".$td['ten_khoahoc']."</option>";

                        }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['khoaHoc'])){ echo "Vui lòng chọn sinh viên năm"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Lớp: </label>
                      <select class="form-control" name="chuyenMon">
                      <?php 
                        foreach ($arrChuyenMon as $cm)
                        {
                          echo "<option value='".$cm['id']."'>".$cm['ten_lop']."</option>";
                        }
                      ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Trạng thái <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="trangThai">
                        <option value="chon">--- Chọn trạng thái ---</option>
                        <option value="2">Đã tốt nghiệp</option>
                        <option value="1">Đang học</option>
                        <option value="0">Đã nghỉ học</option>
                      </select>
                      <small style="color: red;"><?php if(isset($error['trangThai'])){ echo "Vui lòng chọn trạng thái"; } ?></small>
                    </div>
                    
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Ảnh 3x4 (Nếu có): </label>
                      <input type="file" class="form-control" id="exampleInputEmail1" name="hinhAnh">
                      <small style="color: red;"><?php if(isset($error['kichThuocAnh'])){ echo "Kích thước ảnh quá lớn"; } ?></small>
                      <small style="color: red;"><?php if(isset($error['kieuAnh'])){ echo "Chỉ nhận file ảnh dạng: jpg, jpeg, png, gif"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Giới tính <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="gioiTinh">
                        <option value="chon">--- Chọn giới tính ---</option>
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                      </select>
                      <small style="color: red;"><?php if(isset($error['gioiTinh'])){ echo "Vui lòng chọn giới tính"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Ngày sinh: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" name="ngaySinh" value="<?php echo date("Y-m-d"); ?>">
                    </div>
                    <div class="form-group">
                      <label>Nơi sinh: </label>
                      <textarea class="form-control" name="noiSinh"><?php echo isset($_POST['noiSinh']) ? $_POST['noiSinh'] : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Nguyên quán: </label>
                      <textarea class="form-control" name="nguyenQuan"><?php echo isset($_POST['nguyenQuan']) ? $_POST['nguyenQuan'] : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Hộ khẩu <span style="color: red;">*</span>: </label>
                      <textarea class="form-control" name="hoKhau"></textarea>
                      <small style="color: red;"><?php if(isset($error['hoKhau'])){ echo "Vui lòng nhập hộ khẩu"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Tạm trú: </label>
                      <textarea class="form-control" name="tamTru"><?php echo isset($_POST['tamTru']) ? $_POST['tamTru'] : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Xuất thân <span style="color: red;">*</span>: </label>
                      <select class="form-control" name="xuatThan">
                      <option value="chon">--- Chọn xuất thân ---</option>
                      <?php 
                      foreach ($arrXuatThan as $xt)
                      {
                        echo "<option value='".$xt['id']."'>".$xt['xuat_than']."</option>";
                      }
                      ?>
                      </select>
                      <small style="color: red;"><?php if(isset($error['xuatThan'])){ echo "Vui lòng chọn xuất thân"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Số điện thoại <span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập số sinh viên" name="soDienThoai" value="<?php echo isset($_POST['soDienThoai']) ? $_POST['soDienThoai'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['soDienThoai'])){ echo "Số sinh viên không được để trống"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Email: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập email" name="Email" value="<?php echo isset($_POST['Email']) ? $_POST['Email'] : ''; ?>">
                    </div>
                    <div class="form-group">
                      <label>Sở trường: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập sở trường" name="soTruong" value="<?php echo isset($_POST['soTruong']) ? $_POST['soTruong'] : ''; ?>">
                    </div>
                    <div> <h3>Thông tin về gia đình</h3>
                    </div>
                    <div class="form-group">
                      <label>Họ tên bố <span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên bố" name="tenBo" value="<?php echo isset($_POST['tenBo']) ? $_POST['tenBo'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['tenBo'])){ echo "Tên bố không được để trống"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Nghề nghiệp bố: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập nghề nghiệp" name="ngheBo" value="0<?php echo isset($_POST['ngheBo']) ? $_POST['ngheBo'] : ''; ?>">
                    </div>
                    <div class="form-group">
                      <label>Ngày sinh bố: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" name="ngaySinhBo" value="<?php echo date("Y-m-d"); ?>">
                    </div>
                    <div class="form-group">
                      <label>Số điện thoại bố <span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập số bố" name="soBo" value="<?php echo isset($_POST['soBo']) ? $_POST['soBo'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['soBo'])){ echo "Số bố không được để trống"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Họ tên mẹ <span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên mẹ" name="tenMe" value="<?php echo isset($_POST['tenMe']) ? $_POST['tenMe'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['tenMe'])){ echo "Tên mẹ không được để trống"; } ?></small>
                    </div>
                    <div class="form-group">
                      <label>Nghề nghiệp mẹ: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập nghề nghiệp" name="ngheMe" value="<?php echo isset($_POST['ngheMe']) ? $_POST['ngheMe'] : ''; ?>">
                    </div>
                    <div class="form-group">
                      <label>Ngày sinh mẹ: </label>
                      <input type="date" class="form-control" id="exampleInputEmail1" name="ngaySinhMe" value="<?php echo date("Y-m-d"); ?>">
                    </div>
                    <div class="form-group">
                      <label>Số điện thoại mẹ <span style="color: red;">*</span>: </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập số mẹ" name="soMe" value="<?php echo isset($_POST['soMe']) ? $_POST['soMe'] : ''; ?>">
                      <small style="color: red;"><?php if(isset($error['soMe'])){ echo "Số mẹ không được để trống"; } ?></small>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
                <?php 
                  if($_SESSION['level'] == 1)
                    echo "<button type='submit' class='btn btn-primary' name='save'><i class='fa fa-plus'></i> Thêm mới sinh viên</button>";
                ?>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<?php
  // include
  include('../layouts/footer.php');
}
else
{
  // go to pages login
  header('Location: dang-nhap.php');
}

?>