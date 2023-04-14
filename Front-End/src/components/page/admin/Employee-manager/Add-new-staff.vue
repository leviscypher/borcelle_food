<script lang="ts" setup>
import { reactive, computed, onMounted } from "vue";

import { usePosition } from "@/stores/admin";

const positionAdd = reactive({
  name: "",
});

const position = usePosition();

onMounted(() => {
  position.fetchPosition();
});
const getPosition = computed(() => {
  return position.getPosition;
});

const addPosition = () => {
  position.fetchAdd(positionAdd);
  position.fetchPosition();
};

const deletePosition = (id: any) => {
  position.fetchDelete(id);
  position.fetchPosition();
};
</script>
<template>
  <main class="app-content mt-0 pt-0">
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới nhân viên</h3>
          <div class="tile-body">
            <div class="row element-button">
              <div class="col-sm-2">
                <base-button
                  class="btn btn-add btn-sm"
                  data-bs-toggle="modal"
                  data-bs-target="#exampleModal"
                  ><b><i class="fas fa-folder-plus"></i> Tạo chức vụ mới</b>
                </base-button>
              </div>
            </div>
            <form class="row">
              <div class="form-group col-md-4">
                <label class="control-label">Tài khoản nhân viên</label>
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
  <div
    class="modal modals"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title text-black" id="exampleModalLabel">Thêm chức vụ mới</h2>
          <button
            type="button"
            class="btn-close p-0 m-0"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <div class="form-group col-md-12 mt-5 mb-5">
            <input
              class="form-control"
              v-model="positionAdd.name"
              placeholder="Thêm chức vụ"
              type="text"
              required
            />
          </div>
          <ul>
            <li
              class="list-none text-[16px] pt-2 pb-2"
              v-for="position in getPosition"
              :key="position.id"
            >
              <span class="col-md-10"> {{ position.name }} </span>
              <span class="cursor-pointer" @click="deletePosition(position.id)">
                <i class="bx bx-x-circle"></i>
              </span>
            </li>
          </ul>
        </div>
        <div class="modal-footer gap-[10px]">
          <base-button
            type="button"
            class="btn-footer bg-red-600 text-white"
            @click="addPosition"
            >Thêm</base-button
          >
        </div>
      </div>
    </div>
  </div>
</template>
<style lang="scss" scoped>
@import "@/assets/styles/admin/admin.scss";
@import "@/assets/styles/admin/add/add.scss";
</style>
