<script lang="ts" setup></script>
<template>
  <main class="app-content mt-0 pt-0">
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới nhân viên</h3>
          <div class="tile-body">
            <div class="row element-button">
              <div class="col-sm-2">
                <a
                  class="btn btn-add btn-sm"
                  data-toggle="modal"
                  data-target="#exampleModalCenter"
                  ><b><i class="fas fa-folder-plus"></i> Tạo chức vụ mới</b></a
                >
              </div>
            </div>
            <form class="row">
              <div class="form-group col-md-4">
                <label class="control-label">ID nhân viên</label>
                <input class="form-control" type="text" />
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Họ và tên</label>
                <input class="form-control" type="text" required />
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Địa chỉ email</label>
                <input class="form-control" type="text" required />
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Địa chỉ thường trú</label>
                <input class="form-control" type="text" required />
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Số điện thoại</label>
                <input class="form-control" type="number" required />
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Ngày sinh</label>
                <input class="form-control" type="date" />
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Nơi sinh</label>
                <input class="form-control" type="text" required />
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Số CMND</label>
                <input class="form-control" type="number" required />
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Ngày cấp</label>
                <input class="form-control" type="date" required />
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Nơi cấp</label>
                <input class="form-control" type="text" required />
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Giới tính</label>
                <select class="form-control" id="exampleSelect2" required>
                  <option>-- Chọn giới tính --</option>
                  <option>Nam</option>
                  <option>Nữ</option>
                </select>
              </div>

              <div class="form-group col-md-3">
                <label for="exampleSelect1" class="control-label">Chức vụ</label>
                <select class="form-control" id="exampleSelect1">
                  <option>-- Chọn chức vụ --</option>
                  <option>Bán hàng</option>
                  <option>Tư vấn</option>
                  <option>Dịch vụ</option>
                  <option>Thu Ngân</option>
                  <option>Quản kho</option>
                  <option>Bảo trì</option>
                  <option>Kiểm hàng</option>
                  <option>Bảo vệ</option>
                  <option>Tạp vụ</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Bằng cấp</label>
                <select class="form-control" id="exampleSelect3">
                  <option>-- Chọn bằng cấp --</option>
                  <option>Tốt nghiệp Đại Học</option>
                  <option>Tốt nghiệp Cao Đẳng</option>
                  <option>Tốt nghiệp Phổ Thông</option>
                  <option>Chưa tốt nghiệp</option>
                  <option>Không bằng cấp</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Tình trạng hôn nhân</label>
                <select class="form-control" id="exampleSelect2">
                  <option>-- Chọn tình trạng hôn nhân --</option>
                  <option>Độc thân</option>
                  <option>Đã kết hôn</option>
                  <option>Khác</option>
                </select>
              </div>

              <div class="form-group col-md-12">
                <label class="control-label">Ảnh 3x4 nhân viên</label>
                <div id="myfileupload">
                  <input
                    type="file"
                    id="uploadfile"
                    name="ImageUpload"
                    onchange="readURL(this);"
                  />
                </div>
                <div id="thumbbox">
                  <img
                    height="300"
                    width="300"
                    alt="Thumb image"
                    id="thumbimage"
                    style="display: none"
                  />
                  <a class="removeimg" href="javascript:"></a>
                </div>
                <div id="boxchoice">
                  <a href="javascript:" class="Choicefile"
                    ><i class="bx bx-upload"></i
                  ></a>
                  <p style="clear: both"></p>
                </div>
              </div>
            </form>
          </div>
          <div class="flex gap-[15px]">
            <button class="btn btn-save" type="button">Lưu lại</button>
            <router-link class="btn btn-cancel" to="/admin/employee-management"
              >Hủy bỏ</router-link
            >
          </div>
        </div>
      </div>
    </div>
  </main>
</template>
<style lang="scss" scoped>
@import "@/assets/styles/admin/admin.scss";
@import "@/assets/styles/admin/add/add.scss";
</style>
