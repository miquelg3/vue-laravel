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
                    <input type="text" class="form-control" id="nom" v-model="crearNuevo.nom" required="">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label" >Url web:</label>
                    <input type="text" class="form-control" id="linkweb" v-model="crearNuevo.linkweb" required="">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Url imagen:</label>
                    <input type="text" class="form-control" id="linkimage" v-model="crearNuevo.linkimage" required="">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Propietari:</label>
                    <input type="text" class="form-control" id="propietari" v-model="crearNuevo.propietari" required="">
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" @click="modal.hide()">Close</button>
          <button type="button" class="btn btn-primary"  @click.prevent="crear">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// Axios per a passar el post, que en routes será declarat, i posteriorment en HomeControllers especificat

import { Modal } from 'bootstrap'
import swal from 'sweetalert'

export default {
  name: "App",
  data: () => ({
    crearNuevo: {nom: '', linkweb: '', linkimage: '', propietari: ''}
  }),
  mounted() {
    this.modal = new Modal(this.$refs.exampleModal)
  },
  methods: {
    crear(){
      axios.post('crear_nueva', this.crearNuevo).then(res=> {
        this.nueva = res.data;
        $('#myModal').modal('hide')
        swal("¡Felicidades!", "Nuevo marcador añadido correctamente", "success");
      }).catch(function (error){
        swal("¡Error!", "Algo ha salido mal", "error");
        // console.log("Errr:: ", error.response.data);
      });
    }
  }
};
// https://help.twitter.com/content/dam/help-twitter/brand/logo.png
</script>