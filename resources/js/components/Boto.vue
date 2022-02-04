<template>
    <br>
    <div class="col-4 text-center d-flex">
        <!-- boto -->
        <b-button v-b-modal.modal-prevent-closing>Open Modal</b-button>
        <b-modal v-model="modalShow">Hello From Modal!</b-modal>
        <!-- modal -->
        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="linkweb" class="col-form-label">Link web:</label>
                        <input type="link" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="linkimage" class="col-form-label">Link image:</label>
                        <input type="link" class="form-control">
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script>
  export default {
    data() {
      return {
        modalShow: false
      }
    }
  }
</script>