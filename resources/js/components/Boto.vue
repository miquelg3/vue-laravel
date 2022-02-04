<!-- <template> -->
    <!-- <br> -->
    <!-- <div class="col-4 text-center d-flex"> -->
        <!-- boto -->
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
    <!-- </div>
</template> -->


<template>
  <button type="button" class="btn btn-primary" @click="modal.show()">
    Añadir nuevo
  </button>
  <div class="modal fade" ref="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo</h5>
          <button type="button" class="btn-close" @click="modal.hide()" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nom:</label>
                    <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">linkweb:</label>
                    <textarea type="link" class="form-control" id="message-text"></textarea>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">linkimage:</label>
                    <textarea type="link" class="form-control" id="message-text"></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" @click="modal.hide()">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Modal } from 'bootstrap'
export default {
  name: "App",
  data: () => ({
    modal: null
  }),
  mounted() {
    this.modal = new Modal(this.$refs.exampleModal)
  }
};
</script>