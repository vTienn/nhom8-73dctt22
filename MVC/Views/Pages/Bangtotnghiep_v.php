<!-- Header -->
  <header id="portfolio">
    <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>Xin chào !</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      <span class="w3-margin-right">Filter:</span> 
      <button class="w3-button w3-black" data-toggle="modal" data-target="#myModal" >
            <span ></span>Thêm mới
      </button>
      <!-- <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i>Design</button>
      <button class="w3-button w3-white w3-hide-small"><i class="fa fa-photo w3-margin-right"></i>Photos</button>
      <button class="w3-button w3-white w3-hide-small"><i class="fa fa-map-pin w3-margin-right"></i>Art</button> -->
    </div>
    </div>
  </header>

<form method="post" action="http://localhost/congnghephanmem/Bangtotnghiep/timkiem">
    <div class="form-inline">
      <label style="width:150px;">Mã bằng tốt nghiệp</label>
      <input style="width:240px;" type="text" class="form-control" name="txtMabang" 
      value="<?php if(isset($data['mabang'])) echo $data['mabang'] ?>">
      <label style="width:150px;">Tên sinh viên</label>
      <input style="width:240px;" type="text" class="form-control" name="txtTensv" 
      value="<?php if(isset($data['tensv'])) echo $data['tensv'] ?>">
      <label style="width:150px;"></label>
      <button type="submit" class="w3-button w3-black" name="btnTimkiem">Tìm kiếm</button>
   </div>
   </form>
   <br>
   <div style=" width: 100%;
        height: 661px;
        overflow-y: auto;">
     <table class="table table-striped">
          <thead style="position: sticky; top: 0; background-color: white;">
              <tr>
                  <th>STT</th>
                  <th>Mã bằng</th>
                  <th>Tên sinh viên</th>
                  <th>Mã sinh viên</th>
                  <th>Mã khoa</th>
                  <th>Loại bằng</th>
                  <th>Xếp hạng</th>
                  <th>Ngày cấp</th>
                  <th>Trạng thái</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
              <?php 
                  if(isset($data['dulieu'])&& mysqli_num_rows($data['dulieu'])>0){
                      $i=0;
                      while($row=mysqli_fetch_assoc($data['dulieu'])){
              ?>
                          <tr>
                              <td><?php echo (++$i) ?></td>
                              <td><?php echo $row['MaBang'] ?></td>
                              <td><?php echo $row['TenSinhVien'] ?></td>
                              <td><?php echo $row['MaSinhVien'] ?></td>
                              <td><?php echo $row['MaKhoa'] ?></td>
                              <td><?php echo $row['LoaiBang'] ?></td>
                              <td><?php echo $row['XepHang'] ?></td>
                              <td><?php echo $row['NgayCapBang'] ?></td>
                              <td>
                                    <form method="post" action="http://localhost/congnghephanmem/Bangtotnghiep/capNhatTrangThaiBangTotNghiep">
                                        <input type="hidden" name="MaBang" value="<?php echo $row['MaBang']; ?>">
                                        <?php if ($row['TrangThai'] == 'Chưa nhận') { ?>
                                            <button type="submit" class="w3-button w3-red">Chưa nhận</button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-success" disabled>Đã nhận</button>
                                        <?php } ?>
                                    </form>
                                </td>
                              <td>
                              <a class="btn btn-outline-primary" 
                                  href="http://localhost/congnghephanmem/Bangtotnghiep/sua/<?php echo $row['MaBang'] ?>"
                                  >Sửa</a>
                                  <a class="btn btn-outline-danger" 
                                  href="http://localhost/congnghephanmem/Bangtotnghiep/xoa/<?php echo $row['MaBang'] ?>"
                                      onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xóa</a>
                                  <a class="btn btn-success" 
                                  href="http://localhost/congnghephanmem/Bangtotnghiep/inBTN/<?php echo $row['MaBang']; ?>"
                                  >In</a>
                              </td>
                          </tr>
              <?php
                      }
                  }
              ?>
          </tbody>
      </table>
   </div>

   <!-- Modal thêm mới  -->
   <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm bằng tốt nghiệp</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="http://localhost/congnghephanmem/Bangtotnghiep/themmoi" method="POST">
            <table width="100%">
              <tr>
                <td>Mã bằng tốt nghiệp:</td>
                <td>
                  <input style = "width: 280px" type="text" name="txtMabang" class="dd1" value="<?php if(isset($data['mabang'])) echo $data['mabang'] ?>" />
                </td>
              </tr>
              <tr>
                <td>Tên sinh viên:</td>
                <td>
                  <input style = "width: 280px" type="text" name="txtTensv" class="dd1" value="<?php if(isset($data['tensv'])) echo $data['tensv'] ?>" />
                </td>
              </tr>
              <tr>
                <td>Mã sinh viên:</td>
                <td>
                  <input style = "width: 280px" type="text" name="txtMasv" class="dd1" value="<?php if(isset($data['masv'])) echo $data['masv'] ?>" />
                </td>
              </tr>
              <tr>
                <td>Mã khoa:</td>
                <td>
                <select style="width: 280px" name="ddlMakhoa" id="" class="dd10">
                    <option value="">---Chọn khoa---</option>
                    <?php
                    if(isset($data['khoa']) && mysqli_num_rows($data['khoa']) > 0){
                        while($r4 = mysqli_fetch_assoc($data['khoa'])){
                            $selected = (isset($_SESSION['MaKhoa']) && $_SESSION['MaKhoa'] == $r4['MaKhoa']) ? 'selected' : '';
                            echo '<option value="'.$r4['MaKhoa'].'" ' . $selected . '>'.$r4['TenKhoa'].'</option>';
                        }
                    }
                    ?>
                </select>
                </td>
              </tr>
              <tr>
                <td>Loại bằng:</td>
                <td>
                  <select style="width: 280px" name="ddlLoaibang" class="dd10">
                    <option value="">---Chọn loại bằng---</option>
                    <option value="Thạc sĩ" <?php if(isset($_SESSION['loaibang']) && $_SESSION['loaibang'] == 'Thạc sĩ') echo 'selected'; ?>>Thạc sĩ</option>
                    <option value="Cử nhân" <?php if(isset($_SESSION['loaibang']) && $_SESSION['loaibang'] == 'Cử nhân') echo 'selected'; ?>>Cử nhân</option>
                    <option value="Kỹ sư" <?php if(isset($_SESSION['loaibang']) && $_SESSION['loaibang'] == 'Kỹ sư') echo 'selected'; ?>>Kỹ sư</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Xếp hạng:</td>
                <td>
                  <select style="width: 280px" name="ddlXephang" class="dd10">
                    <option value="">---Chọn xếp hạng---</option>
                    <option value="Xuất sắc" <?php if(isset($_SESSION['xephang']) && $_SESSION['xephang'] == 'Xuất sắc') echo 'selected'; ?>>Xuất sắc</option>
                    <option value="Giỏi" <?php if(isset($_SESSION['xephang']) && $_SESSION['xephang'] == 'Giỏi') echo 'selected'; ?>>Giỏi</option>
                    <option value="Khá" <?php if(isset($_SESSION['xephang']) && $_SESSION['xephang'] == 'Khá') echo 'selected'; ?>>Khá</option>
                    <option value="Trung bình" <?php if(isset($_SESSION['xephang']) && $_SESSION['xephang'] == 'Trung bình') echo 'selected'; ?>>Trung bình</option>
                  </select>
                </td>
              </tr>
              <tr>
                  <td>Ngày cấp:</td>
                  <td>
                    <input style="width: 280px" type="date" name="txtNgaycap" class="dd1" value="<?php echo isset($_SESSION['ngaycap']) ? $_SESSION['ngaycap'] : ''; ?>" />
                  </td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <input type="submit" name="btnInsert" value="Lưu" class="dd3" />
                </td>
              </tr>
            </table>
          </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
   
