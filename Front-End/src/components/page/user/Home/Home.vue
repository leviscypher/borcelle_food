<script lang="ts" setup>
import { ref } from 'vue'
import Banner from './layout/Banner.vue'
import Futured from './layout/Futured.vue'
import Services from './layout/services.vue'
import Restant from './layout/restant.vue'
import Resevation from './layout/resevation.vue'
import Blogs from './layout/blogs.vue'
import Subcribe from './layout/subcribe.vue'

const toLinks = ref('/productdetail')

</script>
<template>
<button
  type="button"
  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
  data-toggle="modal"
  data-target="#exampleModal"
>
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">asdfasdfadsf</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Close
        </button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <banner />
    <futured />
    <services />
    <restant />
    <base-collections :data="toLinks" />
    <resevation />
    <blogs />
    <subcribe />
  </div>
</template>

<style lang="scss" scoped></style>
