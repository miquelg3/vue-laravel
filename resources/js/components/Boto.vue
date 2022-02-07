<template>
<!-- Creem el modal -->
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
                    <input type="text" class="form-control" id="nom" v-model="nom" :state="nomState" required>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label" >Url web:</label>
                    <input type="url" class="form-control" id="urlweb" v-model="urlweb" :state="urlwebState" required>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Url imagen:</label>
                    <input type="text" class="form-control" id="urlimage" v-model="urlimagen" :state="urlimagenState" required>
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
// src="/node_modules/vue-cookie/build/vue-cookie.js'"

import { Modal } from 'bootstrap'
export default {
  name: "App",
  data: () => ({
    crearNueva: {nom: '', urlweb: '', urlimagen: ''}
  }),
  mounted() {
    this.modal = new Modal(this.$refs.exampleModal)
  },
  methods: {
    crearNueva(){
      axios.post('crear_nueva', this.crearNueva).then(res=> {

      })
    }
  }
};
</script>